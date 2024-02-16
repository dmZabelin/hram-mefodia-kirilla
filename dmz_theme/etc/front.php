<?php

/*******************************************************
 * *РЕГИСТРАЦИЯ И ПОДКЛЮЧЕНИЕ СКРИПТОВ И СТИЛЕЙ ДЛЯ ТЕМЫ
 *******************************************************/

	//---CSS---//
	function dmz_enqueue_styles()
	{
		//Регистрируем стили	
		wp_register_style( 'jquery-fancybox', DMZ_URL_ASSETS . '/dist/libs/jquery.fancybox.min.css', '3.5.7' );
		wp_register_style( 'dmz-main', DMZ_URL_ASSETS . '/dist/main.min.css', DMZ_THEME_VERSION );
		wp_register_style( 'dmz-theme-style', get_stylesheet_uri() );
		
		wp_enqueue_style( 'jquery-fancybox' );
		wp_enqueue_style( 'dmz-main' );
		wp_enqueue_style( 'dmz-theme-style' );
	}
	add_action( 'wp_enqueue_scripts', 'dmz_enqueue_styles' );

	//---JS---//
	function dmz_enqueue_scripts() 
	{
		//Регистрируем скрипты
		wp_register_script( 'slick', DMZ_URL_ASSETS . '/dist/libs/slick.min.js', [ 'jquery' ], '1.8.1', true );
		wp_register_script( 'jquery-fancybox', DMZ_URL_ASSETS . '/dist/libs/jquery.fancybox.min.js', [ 'jquery' ], '3.5.7', true );
		wp_register_script( 'jquery-validate', 'https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js">', [ 'jquery' ], '1.14.0', true );
		wp_register_script( 'dmz-main-scripts', DMZ_URL_ASSETS . '/dist/main.min.js', [ 'jquery' ], DMZ_THEME_VERSION, true );
		wp_register_script( 'google-recapcha', 'https://www.google.com/recaptcha/api.js', [ 'dmz-main-scripts' ], DMZ_THEME_VERSION, true );

		//Подключаем скрипты	
		if ( is_page_template( 'template-page-home.php' ) ):

			wp_enqueue_script( 'slick' );
			wp_enqueue_script( 'jquery-validate' );
			wp_enqueue_script( 'google-recapcha' );

			wp_localize_script( 'dmz-main-scripts', 'dmz_ajax', [ 'ajaxurl' => admin_url( 'admin-ajax.php' ) ] );

			$load_args = [
				'nonce'       => wp_create_nonce( 'dmz-load-more-nonce' ),
				'ajaxurl'     => admin_url( 'admin-ajax.php' )
			];
			wp_localize_script( 'dmz-main-scripts', 'dmzloadmore', $load_args );

		endif;
		wp_enqueue_script( 'jquery-fancybox' );
		wp_enqueue_script( 'dmz-main-scripts' );

	}
	add_action( 'wp_enqueue_scripts', 'dmz_enqueue_scripts' );	


