<?php

/************************
* *Базовые установки
*************************/
	if ( ! function_exists( 'dmz_theme_setup' ) ) :

		function dmz_theme_setup() 
		{
		//Максимально допустимая ширина для любого контента в теме 
			if ( !isset( $content_width ) ) {
				$content_width = 600;
			}

		//Загружает файл перевода темы (.mo) в память, для дальнейшей работы с ним.
			load_theme_textdomain( 'dmz_hram_site', get_template_directory() . '/languages' );

		//Подключаем метатег <title>
			add_theme_support( 'title-tag' );

		//Включение поддержки миниатюр сообщений
			add_theme_support( 'post-thumbnails' );

		//Регистрируется сразу несколько расположений меню, к которым затем прикрепляются меню.
			register_nav_menus( [
				'header_menu'	=> esc_html__( 'Header Menu', 'dmz_hram_site' ),
				'mobile_menu'	=> esc_html__( 'Mobile Menu', 'dmz_hram_site' ),
			] );
		}

	endif;
	add_action( 'after_setup_theme', 'dmz_theme_setup' );

/************************
* *Чистим номер телефона
*************************/
	function dmz_phone_clear( $dmz_Phone )
	{
		$dmz_Phone = str_replace( [ '(', ')', ' ', '-', '<b>', '</b>', '<strong>', '</strong>' ], '', 'tel:+38' . $dmz_Phone );
		return( $dmz_Phone );
	}

/**************************************
* *Подсчет количества посещений страниц
**************************************/
	function dmz_postviews( $args = [] )
	{
		global $user_ID, $post, $wpdb;

		if( ! $post || ! is_singular() )
			return;

		$rg = (object) wp_parse_args( $args, [
			// Ключ мета поля поста, куда будет записываться количество просмотров.
			'meta_key' => 'views',
			// Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
			'who_count' => 0,
			// Исключить ботов, роботов? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.
			'exclude_bots' => true,
		] );

		$do_count = false;
		switch( $rg->who_count )
		{
			case 0:
				$do_count = true;
				break;
			case 1:
				if( ! $user_ID )
					$do_count = true;
				break;
			case 2:
				if( $user_ID )
					$do_count = true;
				break;
		}

		if( $do_count && $rg->exclude_bots ) {

			$notbot = 'Mozilla|Opera'; // Chrome|Safari|Firefox|Netscape - все равны Mozilla
			$bot = 'Bot/|robot|Slurp/|yahoo';
			if(
				! preg_match( "/$notbot/i", $_SERVER['HTTP_USER_AGENT'] ) ||
				preg_match( "~$bot~i", $_SERVER['HTTP_USER_AGENT'] )
			){
				$do_count = false;
			}

		}

		if( $do_count ){

			$up = $wpdb->query( $wpdb->prepare(
				"UPDATE $wpdb->postmeta SET meta_value = (meta_value+1) WHERE post_id = %d AND meta_key = %s", $post->ID, $rg->meta_key
			) );

			if( ! $up )
				add_post_meta( $post->ID, $rg->meta_key, 1, true );

			wp_cache_delete( $post->ID, 'post_meta' );
		}

	}
	add_action( 'wp_head', 'dmz_postviews' );

/*************************
* *Меняю класс у sub-menu
**************************/
	add_filter( 'nav_menu_submenu_css_class', 'change_wp_nav_menu', 10, 3 );

	function change_wp_nav_menu( $classes, $args, $depth ) 
	{
		foreach ( $classes as $key => $class ) 
		{
			if ( $class == 'sub-menu' ):
				$classes[ $key ] = 'submenu-list';
			endif;
		}

		return $classes;
	}

/************************************
* *AJAX Обработка формы вопрос/ответ
************************************/
	if( wp_doing_ajax() ):
		add_action( 'wp_ajax_homeanswer', 'dmz_ajax_homeanswer' );
		add_action( 'wp_ajax_nopriv_homeanswer', 'dmz_ajax_homeanswer' );
	endif;
	
	function dmz_ajax_homeanswer()
	{	
		$ch = curl_init();

			curl_setopt( $ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt( $ch, CURLOPT_POST, 1 );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( [
				'secret'   => '6LcVm8gaAAAAAEaQHBgOzFD9u7Ok7FX0YThTk3Ed',
				'response' => $_POST['g-recaptcha-response'],
			] ) );

			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

			$data = curl_exec( $ch );

			curl_close( $ch );

			$response = @json_decode( $data );

			if ( $response && $response->success )
			{
				$name = $_POST['name'];
				$email = $_POST['email'];
				$massage = $_POST['massage'];
				
				$post_data = [

					'post_title' => sanitize_text_field( $_POST['name'] ),
					'post_type'  => 'answers'

				];
				
				$post_id = wp_insert_post( $post_data, true );

				sanitize_text_field( update_post_meta( $post_id, 'dmz_form_email', $email ) );
				sanitize_text_field( update_post_meta( $post_id, 'dmz_form_question', $massage ) );

				wp_die();
			}
			else
			{
				wp_die();
			}	
		
	}

/****************************************
* *AJAX Обработка подгрузки вопрос ответ
*****************************************/
	if( wp_doing_ajax() ):
		add_action( 'wp_ajax_dmz_ajax_load_more', 'dmz_ajax_load_more' );
		add_action( 'wp_ajax_nopriv_dmz_ajax_load_more', 'dmz_ajax_load_more' );
	endif;

	function dmz_ajax_load_more() 
	{
		check_ajax_referer( 'dmz-load-more-nonce', 'nonce' );
		ob_start();
		
		$args = [

			'post_type' => 'answers',
			'posts_per_page' => 3,
			'offset'=> $_POST['offset'],

			];

			$dmz_answers_posts = new WP_Query( $args );

			if ( $dmz_answers_posts->have_posts() ) : while ( $dmz_answers_posts->have_posts() ) : $dmz_answers_posts->the_post(); ?>

				<div class="answers-info"><span class="answers-info__close"><i class="fas fa-angle-up"></i></span>
					<div class="answers-info__question">
						<span class="answers-info__user-name">
							<?php the_title(); ?>
						</span>
						<?php echo dmz_get_meta( 'form_question' ); ?> 
					</div>
					<div class="answers-info__answer">
						<span>Ответ настоятеля:</span>
						<?php echo dmz_get_meta( 'form_answer' ); ?> 
					</div>
				</div>

			<?php endwhile; endif; wp_reset_postdata();
			
		$data = ob_get_clean();
		wp_send_json_success( $data );
		wp_die();
}

/**************************************************
* *Функция пагинации работает с циклом new WP_Query
***************************************************/
	function dmz_paginate_links( $dmz_paginate ) 
	{
		$big = 999;
	
		$args = [
			'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format'  => '',
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total'   => $dmz_paginate->max_num_pages,
			'prev_next'    => false,
			'mid_size'     => 1,
		];
	
		$result = paginate_links( $args );
	
		// удаляем добавку к пагинации для первой страницы
		$result = preg_replace( '~/page/1/?([\'"])~', '\1', $result );
	
		echo $result;
	}

/**********************************************************
* *Добавляем Not public кастомные типы записей для перевода
***********************************************************/
	function add_cpt_to_pll_schedule( $post_types, $is_settings ) {
		if ( $is_settings ) {
			 unset( $post_types['schedule'] );
		} else {
			 $post_types['schedule'] = 'schedule';
		}
		return $post_types;
	}
	
	function add_cpt_to_pll_answers( $post_types, $is_settings ) {
		if ( $is_settings ) {
			 unset( $post_types['answers'] );
		} else {
			 $post_types['answers'] = 'answers';
		}
		return $post_types;
	}

	function add_cpt_to_pll_poster( $post_types, $is_settings ) {
		if ( $is_settings ) {
			 unset( $post_types['poster'] );
		} else {
			 $post_types['poster'] = 'poster';
		}
		return $post_types;
	}
	
	add_filter( 'pll_get_post_types', 'add_cpt_to_pll_schedule', 10, 2 );
	add_filter( 'pll_get_post_types', 'add_cpt_to_pll_poster', 10, 2 );
	add_filter( 'pll_get_post_types', 'add_cpt_to_pll_answers', 10, 2 );

/******************************
* *Асинхронная загрузка скрипта
******************************/
add_filter( 'script_loader_tag', 'dmz_add_async_attribute', 10, 2 );

	function dmz_add_async_attribute( $tag, $handle ) {
		if ( 'google-recapcha' !== $handle ) {
			 return $tag;
		}
	
		return str_replace( ' src', ' async="async" src', $tag );
  }
 
/*************************************
* *Фильтр категорий в админке (селект)
**************************************/
add_action( 'restrict_manage_posts', 'add_admin_filters', 10, 1 );
 
  function add_admin_filters( $post_type ) 
  {

	if( 'about' == $post_type ):
			$taxonomies_slug = 'about-category';
	elseif( 'abbot-word' == $post_type ):
		$taxonomies_slug = 'abbot-word-category';
	endif;
	
		$taxonomy = get_taxonomy( $taxonomies_slug );
		$selected = '';
		$selected = isset( $_REQUEST[ $taxonomies_slug ] ) ? $_REQUEST[ $taxonomies_slug ] : '';
		wp_dropdown_categories( [
			'show_option_all' =>  $taxonomy->labels->all_items,
			'taxonomy'        =>  $taxonomies_slug,
			'name'            =>  $taxonomies_slug,
			'orderby'         =>  'name',
			'value_field'     =>  'slug',
			'selected'        =>  $selected,
			'hierarchical'    =>  true,
		] );
  }