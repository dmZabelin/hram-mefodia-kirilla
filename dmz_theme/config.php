<?php

// *Регистрируем строки для перевода polylang
add_action( 'init', function() 
{
	pll_register_string( 'dmz_theme_strings', 'Храм святых равноапостольных' );
	pll_register_string( 'dmz_theme_strings', 'Мефодия и Кирилла' );
	pll_register_string( 'dmz_theme_strings', 'Кирилл и Мефодий' );
	pll_register_string( 'dmz_theme_strings', 'Одесская епархия Украинской Православной Церкви' );
	pll_register_string( 'dmz_theme_strings', 'Храм святых равноапостольных Кирилла и Мефодия' );

	pll_register_string( 'dmz_theme_strings', 'скачать расписание' );
	pll_register_string( 'dmz_theme_strings', 'на неделю' );
	pll_register_string( 'dmz_theme_strings', 'на сегодня' );
	pll_register_string( 'dmz_theme_strings', 'на завтра' );

	pll_register_string( 'dmz_theme_strings', 'Полезная информация' );
	pll_register_string( 'dmz_theme_strings', 'Одесская Епархия' );
	pll_register_string( 'dmz_theme_strings', 'Cлово настоятеля' );
	pll_register_string( 'dmz_theme_strings', 'Проповеди настоятеля' );
	pll_register_string( 'dmz_theme_strings', 'Литературные беседы' );
	pll_register_string( 'dmz_theme_strings', 'Расписание Богослужений' );
	pll_register_string( 'dmz_theme_strings', 'О Настоятеле храма' );
	pll_register_string( 'dmz_theme_strings', 'Проповеди' );
	pll_register_string( 'dmz_theme_strings', 'Духовенство' );
	pll_register_string( 'dmz_theme_strings', 'О храме' );
	pll_register_string( 'dmz_theme_strings', 'Клуб «О православии с интересом»' );
	pll_register_string( 'dmz_theme_strings', 'Таинства' );
	pll_register_string( 'dmz_theme_strings', 'Объявление' );

	pll_register_string( 'dmz_theme_strings', 'далее' );
	pll_register_string( 'dmz_theme_strings', 'читать больше' );
	pll_register_string( 'dmz_theme_strings', 'читать далее' );
	pll_register_string( 'dmz_theme_strings', 'подробнее' );
	pll_register_string( 'dmz_theme_strings', 'перейти в архив' );
	pll_register_string( 'dmz_theme_strings', 'Предыдущая статья' );
	pll_register_string( 'dmz_theme_strings', 'Следующая статья' );

	pll_register_string( 'dmz_theme_strings', 'Месторасположение' );
	pll_register_string( 'dmz_theme_strings', 'Телефоны храма' );
	pll_register_string( 'dmz_theme_strings', 'Социальные сети' );
	pll_register_string( 'dmz_theme_strings', 'Двери храма открыты для всех' );
	pll_register_string( 'dmz_theme_strings', 'ежедневно' );


	pll_register_string( 'dmz_theme_strings', 'Задать вопрос настоятелю' );
	pll_register_string( 'dmz_theme_strings', 'Отвтеты на Вопросы' );
	pll_register_string( 'dmz_theme_strings', 'Ответ настоятеля:' );
	pll_register_string( 'dmz_theme_strings', 'Ваше имя' );
	pll_register_string( 'dmz_theme_strings', 'Для ответа на почту укажите e-mail' );
	pll_register_string( 'dmz_theme_strings', 'Ваш вопрос' );
	pll_register_string( 'dmz_theme_strings', 'Отправить' );
	pll_register_string( 'dmz_theme_strings', 'Спасибо, сообщение отправленно.' );
	pll_register_string( 'dmz_theme_strings', 'Cайт разработан:' );
	pll_register_string( 'dmz_theme_strings', 'Меню' );

	pll_register_string( 'dmz_theme_strings', 'Владимир Юрьевич Корецкий<span>Протоиерей</span>' );

	pll_register_string( 'dmz_theme_strings', 'Ошибка. Вы не прошли проверку reCaptcha' );
	pll_register_string( 'dmz_theme_strings', '<span>Протоиерей</span>Владимир Юрьевич Корецкий' );
	pll_register_string( 'dmz_theme_strings', 'В 1996-ом, Господь призвал на служение в священном сане.<br>4 августа был рукоположен Преосвященнейшим Епископом Тульчинским и Брацлавским Иннокентием. Служение начал в Тульчинской епархии. В 2009-м г. по возвращении в Одессу получил указ Высокопреосвященнейшего Митрополита Одесского и Измаильского Агафангела на настоятельство в храме равноапостольных Мефодия и Кирилла.' );

} );

// *Кастомные размеры картинок
	function dmz_get_images_sizes() 
	{
		return [
			'page' => [
				[
					'name'      => 'big_news',
					'width'     => 570,
					'height'    => 350,
					'crop'      => true,
				], [
					'name'      => 'gallery-min',
					'width'     => 300,
					'height'    => 300,
					'crop'      => true,
				], [
					'name'      => 'min_news',
					'width'     => 240,
					'height'    => 160,
					'crop'      => true,
				], [
					'name'      => 'preaching-home',
					'width'     => 970,
					'height'    => 575,
					'crop'      => true,
				], [
					'name'      => 'about-page',
					'width'     => 470,
					'height'    => 360,
					'crop'      => true,
				], [
					'name'      => 'clergy-image',
					'width'     => 270,
					'height'    => 350,
					'crop'      => true,
				],
			],
		];
	}

// *Фильтр для картинок что бы не загружать лишние кропы
	add_filter( 'intermediate_image_sizes', function ( $sizes ) 
	{
		if( isset( $_REQUEST['post_id'] ) && get_post_type( $_REQUEST['post_id'] ) === 'about' || isset( $_REQUEST['post_id'] ) && get_post_type( $_REQUEST['post_id'] ) === 'poster' ):

			$sizes = ['about-page'];

		endif;

		return $sizes;
	} );

	add_filter( 'intermediate_image_sizes', function ( $sizes ) 
	{
		if( isset( $_REQUEST['post_id'] ) && get_post_type( $_REQUEST['post_id'] ) === 'post' ):

			$sizes =	array_diff( $sizes, [
				'1536x1536',
				'2048x2048',
				'large',
				'medium_large',
				'medium',
				'about-page',
				'preaching-home',
				'gallery-min',
			 ] );

		elseif( isset( $_REQUEST['post_id'] ) && get_post_type( $_REQUEST['post_id'] ) === 'page' ):

			$sizes =	array_diff( $sizes, [
				'1536x1536',
				'2048x2048',
				'large',
				'medium_large',
				'medium',
				'clergy-image',
				'about-page',
				'preaching-home',
				'big_news',
				'min_news',
				'gallery-min',
			 ] );

		elseif( isset( $_REQUEST['post_id'] ) && get_post_type( $_REQUEST['post_id'] ) === 'abbot-word' ):

			$sizes =	array_diff( $sizes, [
				'1536x1536',
				'2048x2048',
				'large',
				'medium_large',
				'medium',
				'clergy-image',
				'about-page',
				'big_news',
				'gallery-min',
			 ] );

		elseif( isset( $_REQUEST['post_id'] ) && get_post_type( $_REQUEST['post_id'] ) === 'gallery' ):

			$sizes =	array_diff( $sizes, [
				'1536x1536',
				'2048x2048',
				'large',
				'medium_large',
				'medium',
				'clergy-image',
				'about-page',
				'big_news',
			 ] );
			 
		endif;
		
		return $sizes;
	} );

// *Функция добавления метаполей
	function dmz_do_meta_boxes ( $meta_options ) 
	{
		$meta_options = [];
		$prefix = "dmz_";

		// ?-Мета-бокс контактные данные "Главная страница"-?
		$meta_options[] = [
			'id'				=> 'meta_id',
			'title'			=> esc_html__( 'Контактные данные храма', 'dmz_hram_site' ),
			'post_type'		=> [ 'page' ],
			'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=>	'textarea',
					'id'			=>	$prefix . 'geo_address',
					'title'		=>	esc_html__( 'Адрес храма', 'dmz_hram_site' ),
					'desc'		=>	esc_html__( 'Теги <strong></strong> делают текст выделенным, так красиво', 'dmz_hram_site' ),
					'std'			=> '65020, Украина, Одесская область,<br><strong>Одесса, ул.Мечникова, 74</strong>',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'geo_mobile',
					'title'		=>	esc_html__( 'Номер телефона мобильный', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'geo_city',
					'title'		=>	esc_html__( 'Номер телефона городской', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'geo_google',
					'title'		=>	esc_html__( 'Ссылка на карту Google', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> 'https://goo.gl/maps/x1GUJiJDGBJ41gpw5',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'geo_2gis',
					'title'		=>	esc_html__( 'Ссылка на карту 2gis', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> 'https://go.2gis.com/7lamq',
				],
			],
		];

		// ?-Мета-бокс "Слайдер главного экрана"-?
		$meta_options[] = [
			'id'				=> 'slider_home_page',
			'title'			=> esc_html__( 'Слайдер главного экрана', 'dmz_hram_site' ),
			'post_type'		=> [ 'page' ],
			'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=> 'gallery',
					'id'			=> $prefix . 'slider_main_screen',
					'title'		=> '',
					'desc'		=> esc_html__( 'Загружай здесь фото наилучшего качества', 'dmz_hram_site' ),
					'std'			=> '',
					'valbtn'		=> esc_html__( 'Загрузить', 'dmz_hram_site' ),
				],
			],
		];

		// ?-Мета-бокс "Включение или выключение блоков сайта"-?
		$meta_options[] = [
			'id'				=> 'enabled_desabled_blocks_home',
			'title'			=> esc_html__( 'Включение или выключение блоков Главной страницы', 'dmz_hram_site' ),
			'post_type'		=> [ 'page' ],
			'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=> 'radio_on_of',
					'id'			=> $prefix . 'on_of_preaching',
					'title'		=> esc_html__( 'Включение или выключение  блока "СЛОВО НАСТОЯТЕЛЯ"', 'dmz_hram_site' ),
					'desc'		=> '',
					'std'			=> 'enable',
					'options' 	=> [
						[ 'name' => esc_html__( 'Включить','dmz_hram_site' ), 'value' => 'enable', ],
						[ 'name' => esc_html__( 'Выключить','dmz_hram_site' ), 'value' => 'disable', ],
					],
				],[
					'type'		=> 'radio_on_of',
					'id'			=> $prefix . 'on_of_abbot',
					'title'		=> esc_html__( 'Включение или выключение  блока "О НАСТОЯТЕЛЕ ХРАМА"', 'dmz_hram_site' ),
					'desc'		=> '',
					'std'			=> 'enable',
					'options' 	=> [
						[ 'name' => esc_html__( 'Включить','dmz_hram_site' ), 'value' => 'enable', ],
						[ 'name' => esc_html__( 'Выключить','dmz_hram_site' ), 'value' => 'disable', ],
					],
				],[
					'type'		=> 'radio_on_of',
					'id'			=> $prefix . 'on_of_answers',
					'title'		=> esc_html__( 'Включение или выключение  блока "ОТВТЕТЫ НА ВОПРОСЫ"', 'dmz_hram_site' ),
					'desc'		=> '',
					'std'			=> 'enable',
					'options' 	=> [
						[ 'name' => esc_html__( 'Включить','dmz_hram_site' ), 'value' => 'enable', ],
						[ 'name' => esc_html__( 'Выключить','dmz_hram_site' ), 'value' => 'disable', ],
					],
				],[
					'type'		=> 'radio_on_of',
					'id'			=> $prefix . 'on_of_uncos',
					'title'		=> esc_html__( 'Включение или выключение блока "НОВОСТИ"', 'dmz_hram_site' ),
					'desc'		=> '',
					'std'			=> 'enable',
					'options' 	=> [
						[ 'name' => esc_html__( 'Включить','dmz_hram_site' ), 'value' => 'enable', ],
						[ 'name' => esc_html__( 'Выключить','dmz_hram_site' ), 'value' => 'disable', ],
					],
				],[
					'type'		=> 'radio_on_of',
					'id'			=> $prefix . 'on_of_gallery',
					'title'		=> esc_html__( 'Включение или выключение  блока "ФОТОГАЛЕРЕЯ"', 'dmz_hram_site' ),
					'desc'		=> '',
					'std'			=> 'enable',
					'options' 	=> [
						[ 'name' => esc_html__( 'Включить','dmz_hram_site' ), 'value' => 'enable', ],
						[ 'name' => esc_html__( 'Выключить','dmz_hram_site' ), 'value' => 'disable', ],
					],
				],
			],
		];

		// ?-Мета-бокс "Расписание богослужений загрузка файла"-?
		$meta_options[] = [
			'id'				=> 'dmz_meta_schedule_file',
			'title'			=> esc_html__( 'Расписание богослужений на неделю', 'dmz_hram_site' ),
			'post_type'		=> [ 'schedule' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'side',
			'priority'		=>	'low',
			'fields'			=> [ 
				[
					'type'		=> 'file',
					'id'			=> $prefix . 'field_file',
					'title'		=> '',
					'desc'		=> esc_html__( 'Можно загрузить текстовые файлы или изображение', 'dmz_hram_site' ),
					'std'			=> '',
					'valbtn'		=> esc_html__( 'Загрузить', 'dmz_hram_site' ),
				],
			],
		];

		// ?-Мета-бокс "Расписание богослужений на понедельник"-?
		$meta_options[] = [
			'id'				=> 'dmz_meta_schedule__Mon',
			'title'			=> esc_html__( 'Расписание богослужений на понедельник', 'dmz_hram_site' ),
			'post_type'		=> [ 'schedule' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=>	'text',
					'id'			=>	$prefix . 'new_date_Mon',
					'title'		=>	esc_html__( 'Дата в новом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'old_date_Mon',
					'title'		=>	esc_html__( 'Дата в старом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_one_Mon',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_two_Mon',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				],[
					'type'		=> 'wysiwyg',
					'id'			=> $prefix . 'shedule_fields_Mon',
					'title' 		=> esc_html__( 'Поле редактирования расписания', 'dmz_hram_site' ),
					'desc' 		=> '',
					'std'			=> '',
				],
			],
		];
		
		// ?-Мета-бокс "Расписание богослужений на вторник"-?
		$meta_options[] = [
			'id'				=> 'dmz_meta_schedule_Tue',
			'title'			=> esc_html__( 'Расписание богослужений на вторник', 'dmz_hram_site' ),
			'post_type'		=> [ 'schedule' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=>	'text',
					'id'			=>	$prefix . 'new_date_Tue',
					'title'		=>	esc_html__( 'Дата в новом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'old_date_Tue',
					'title'		=>	esc_html__( 'Дата в старом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_one_Tue',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_two_Tue',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				],[
					'type'		=> 'wysiwyg',
					'id'			=> $prefix . 'shedule_fields_Tue',
					'title' 		=> esc_html__( 'Поле редактирования расписания', 'dmz_hram_site' ),
					'desc' 		=> '',
					'std'			=> '',
				],
			],
		];
		
		// ?-Мета-бокс "Расписание богослужений на среду"-?
		$meta_options[] = [
			'id'				=> 'dmz_meta_schedule_Wed',
			'title'			=> esc_html__( 'Расписание богослужений на среду', 'dmz_hram_site' ),
			'post_type'		=> [ 'schedule' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=>	'text',
					'id'			=>	$prefix . 'new_date_Wed',
					'title'		=>	esc_html__( 'Дата в новом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'old_date_Wed',
					'title'		=>	esc_html__( 'Дата в старом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_one_Wed',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_two_Wed',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				],[
					'type'		=> 'wysiwyg',
					'id'			=> $prefix . 'shedule_fields_Wed',
					'title' 		=> esc_html__( 'Поле редактирования расписания', 'dmz_hram_site' ),
					'desc' 		=> '',
					'std'			=> '',
				],
			],
		];
		
		// ?-Мета-бокс "Расписание богослужений на четверг"-?
		$meta_options[] = [
			'id'				=> 'dmz_meta_schedule_Thu',
			'title'			=> esc_html__( 'Расписание богослужений на четверг', 'dmz_hram_site' ),
			'post_type'		=> [ 'schedule' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=>	'text',
					'id'			=>	$prefix . 'new_date_Thu',
					'title'		=>	esc_html__( 'Дата в новом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'old_date_Thu',
					'title'		=>	esc_html__( 'Дата в старом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_one_Thu',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_two_Thu',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				],[
					'type'		=> 'wysiwyg',
					'id'			=> $prefix . 'shedule_fields_Thu',
					'title' 		=> esc_html__( 'Поле редактирования расписания', 'dmz_hram_site' ),
					'desc' 		=> '',
					'std'			=> '',
				],
			],
		];
		
		// ?-Мета-бокс "Расписание богослужений на пятницу"-?
		$meta_options[] = [
			'id'				=> 'dmz_meta_schedule_Fri',
			'title'			=> esc_html__( 'Расписание богослужений на пятницу', 'dmz_hram_site' ),
			'post_type'		=> [ 'schedule' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=>	'text',
					'id'			=>	$prefix . 'new_date_Fri',
					'title'		=>	esc_html__( 'Дата в новом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'old_date_Fri',
					'title'		=>	esc_html__( 'Дата в старом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_one_Fri',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_two_Fri',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				],[
					'type'		=> 'wysiwyg',
					'id'			=> $prefix . 'shedule_fields_Fri',
					'title' 		=> esc_html__( 'Поле редактирования расписания', 'dmz_hram_site' ),
					'desc' 		=> '',
					'std'			=> '',
				],
			],
		];
		
		// ?-Мета-бокс "Расписание богослужений на субботу"-?
		$meta_options[] = [
			'id'				=> 'dmz_meta_schedule_Sat',
			'title'			=> esc_html__( 'Расписание богослужений на субботу', 'dmz_hram_site' ),
			'post_type'		=> [ 'schedule' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=>	'text',
					'id'			=>	$prefix . 'new_date_Sat',
					'title'		=>	esc_html__( 'Дата в новом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'old_date_Sat',
					'title'		=>	esc_html__( 'Дата в старом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_one_Sat',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_two_Sat',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				],[
					'type'		=> 'wysiwyg',
					'id'			=> $prefix . 'shedule_fields_Sat',
					'title' 		=> esc_html__( 'Поле редактирования расписания', 'dmz_hram_site' ),
					'desc' 		=> '',
					'std'			=> '',
				],
			],
		];
		
		// ?-Мета-бокс "Расписание богослужений на воскресенье"-?
		$meta_options[] = [
			'id'				=> 'dmz_meta_schedule_Sun',
			'title'			=> esc_html__( 'Расписание богослужений на воскресенье', 'dmz_hram_site' ),
			'post_type'		=> [ 'schedule' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=>	'text',
					'id'			=>	$prefix . 'new_date_Sun',
					'title'		=>	esc_html__( 'Дата в новом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'old_date_Sun',
					'title'		=>	esc_html__( 'Дата в старом стиле', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_one_Sun',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'desc_day_two_Sun',
					'title'		=>	esc_html__( 'Описание дня', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				],[
					'type'		=> 'wysiwyg',
					'id'			=> $prefix . 'shedule_fields_Sun',
					'title' 		=> esc_html__( 'Поле редактирования расписания', 'dmz_hram_site' ),
					'desc' 		=> '',
					'std'			=> '',
				],
			],
		];

		// ?-Мета-бокс "Вопросы и ответы"-?
		$meta_options[] = [
			'id'				=> 'dmz_form_questions',
			'title'			=> esc_html__( 'Вопросы и ответы', 'dmz_hram_site' ),
			'post_type'		=> [ 'answers' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=>	'text',
					'id'			=>	$prefix . 'form_email',
					'title'		=>	esc_html__( 'E-mail отправителя вопроса', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=> 'wysiwyg',
					'id'			=> $prefix . 'form_question',
					'title' 		=> esc_html__( 'Поле редактирования вопроса настоятелю', 'dmz_hram_site' ),
					'desc' 		=> '',
					'std'			=> '',
				], [
					'type'		=> 'wysiwyg',
					'id'			=> $prefix . 'form_answer',
					'title' 		=> esc_html__( 'Поле редактирования ответа настоятеля', 'dmz_hram_site' ),
					'desc' 		=> '',
					'std'			=> '',
				],
			],
		];

		// ?-Мета-бокс "Поля описания проповеди"-?
		$meta_options[] = [
			'id'				=> 'dmz__meta_abbot-word',
			'title'			=> esc_html__( 'Поля описания проповеди', 'dmz_hram_site' ),
			'post_type'		=> [ 'abbot-word' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=> 'file',
					'id'			=> $prefix . 'foto_min_abbot-word',
					'title'		=> esc_html__( 'Фотография чтеца проповеди', 'dmz_hram_site' ),
					'desc'		=> esc_html__( 'Соотношение сторон 1:1', 'dmz_hram_site' ),
					'std'			=> '',
					'valbtn'		=> esc_html__('Загрузить', 'dmz_hram_site'),
				],[
					'type'		=>	'text',
					'id'			=>	$prefix . 'word_abbot-word',
					'title'		=>	esc_html__( 'Ссылка на проповедь или лекцию', 'dmz_hram_site' ),
					'desc'		=>	esc_html__( 'Вставьте в поле ссылку с Youtube', 'dmz_hram_site' ),
					'std'			=> '',
				],[
					'type'		=>	'textarea',
					'id'			=>	$prefix . 'subtitle_abbot-word',
					'title'		=>	esc_html__( 'Краткое описание проповеди', 'dmz_hram_site' ),
					'desc'		=>	esc_html__( 'Описание темы проповеди', 'dmz_hram_site' ),
					'std'			=> '',
				],
			],
		];

		// ?-Мета-бокс "Фотогалерея на главной странице"-?
		$meta_options[] = [
			'id'				=> 'gallery_home_page',
			'title'			=> esc_html__( 'Фотогалерея', 'dmz_hram_site' ),
			'post_type'		=> [ 'gallery' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=> 'gallery',
					'id'			=> $prefix . 'gallery_foto',
					'title'		=> '',
					'desc'		=> esc_html__( 'Загружай здесь фото наилучшего качества', 'dmz_hram_site' ),
					'std'			=> '',
					'valbtn'		=> esc_html__( 'Загрузить', 'dmz_hram_site' ),
				],
			],
		];

		// ?-Мета-бокс "Чин священика"-?
		$meta_options[] = [
			'id'				=> 'clergy_about_page',
			'title'			=> esc_html__( 'Чин священика', 'dmz_hram_site' ),
			'post_type'		=> [ 'clergy' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=>	'text',
					'id'			=>	$prefix . 'priest_rank',
					'title'		=>	'',
					'desc'		=>	esc_html__( 'Введите в поле чин священника', 'dmz_hram_site' ),
					'std'			=> '',
				],
			],
		];

		// ?-Мета-бокс контактные данные "Контакты"-?
		$meta_options[] = [
			'id'				=> 'meta_id_contacts',
			'title'			=> esc_html__( 'Контактные данные храма', 'dmz_hram_site' ),
			'post_type'		=> [ 'page' ],
			'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-contacts.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=>	'textarea',
					'id'			=>	$prefix . 'contacts_address',
					'title'		=>	esc_html__( 'Адрес храма', 'dmz_hram_site' ),
					'desc'		=>	esc_html__( 'Теги <strong></strong> делают текст выделенным, так красиво', 'dmz_hram_site' ),
					'std'			=> '65020, Украина, Одесская область,<br><strong>Одесса, ул.Мечникова, 74</strong>',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'contacts_mobile',
					'title'		=>	esc_html__( 'Номер телефона мобильный', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'contacts_city',
					'title'		=>	esc_html__( 'Номер телефона городской', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'contacts_mail',
					'title'		=>	esc_html__( 'Электронная почта храма', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> 'kirill.mefodiy.od@gmail.com',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'contacts_instagram',
					'title'		=>	esc_html__( 'Ссылка на Instagram', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'contacts_fasebook',
					'title'		=>	esc_html__( 'Ссылка на fasebook', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				], [
					'type'		=>	'text',
					'id'			=>	$prefix . 'contacts_youtube',
					'title'		=>	esc_html__( 'Ссылка на youtube', 'dmz_hram_site' ),
					'desc'		=>	'',
					'std'			=> '',
				],
			],
		];

		// ?-Мета-бокс "Годы жизни - Вечная память"-?
			$meta_options[] = [
				'id'				=> 'years-life',
				'title'			=> esc_html__( 'Годы жизни', 'dmz_hram_site' ),
				'post_type'		=> [ 'post' ],
				'show_on'		=> [ 'key' => 'term', 'value' => ['eternal-memory'], ],
				'taxonomy'		=> 'category',
				'context'		=> 'normal',
				'priority'		=>	'high',
				'fields'			=> [ 
					[
						'type'		=>	'text',
						'id'			=>	$prefix . 'person_life',
						'title'		=>	'',
						'desc'		=>	esc_html__( 'Введите в поле годы жизни', 'dmz_hram_site' ),
						'std'			=> '',
					],
				],
			];		

		// ?-Мета-бокс "Исторические факты"-?
			$meta_options[] = [
				'id'				=> 'about-historical_facts',
				'title'			=> esc_html__( 'Исторические факты', 'dmz_hram_site' ),
				'post_type'		=> [ 'about' ],
				'show_on'		=> [ 'key' => 'term', 'value' => ['priests'], ],
				'taxonomy'		=> 'about-category',
				'context'		=> 'normal',
				'priority'		=>	'high',
				'fields'			=> [ 
					[
						'type'		=> 'wysiwyg',
						'id'			=> $prefix . 'historical_facts',
						'title' 		=> esc_html__( 'В этом поле пишем о дополнителбных исторических фактах', 'dmz_hram_site' ),
						'desc' 		=> '',
						'std'			=> '',
						],
				],
			];

		// ?-Мета-бокс "Слайдер главного экрана"-?
		$meta_options[] = [
			'id'				=> 'slider_diocese',
			'title'			=> esc_html__( 'Репортажные фото', 'dmz_hram_site' ),
			'post_type'		=> [ 'diocese' ],
			//'show_on'		=> [ 'key' => 'page-template', 'value' => ['template-page-home.php'], ],
			'context'		=> 'normal',
			'priority'		=>	'high',
			'fields'			=> [ 
				[
					'type'		=> 'gallery',
					'id'			=> $prefix . 'slider_diocese',
					'title'		=> '',
					'desc'		=> esc_html__( 'Загружай здесь фото наилучшего качества', 'dmz_hram_site' ),
					'std'			=> '',
					'valbtn'		=> esc_html__( 'Загрузить', 'dmz_hram_site' ),
				],
			],
		];

		return $meta_options;
	}