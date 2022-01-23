<?php 

function dmz_get_post_types() {
	return [
		'info' => [
			'config' => [
					'public' => true,
					'menu_position' => 4,
					'menu_icon'     => 'dashicons-media-document',
					'supports'=> ['title', 'thumbnail', 'editor', 'comments', 'excerpt'],
					'show_ui' => true,
					'has_archive' => true,
					'rewrite' => [
						'with_front' => false,
					],
				], 
			'singular' => esc_html__( 'Жизнь прихода', 'dmz_hram_site' ),
			'multiple' => esc_html__( 'Жизнь прихода', 'dmz_hram_site' ),
		],

		'schedule' => [
			'config' => [
					'public' => false,
					'menu_position' => 5,
					'menu_icon'     => 'dashicons-text-page',
					'supports'=> ['title'],
					'show_ui' => true,
				],
			'singular' => esc_html__( 'Расписание Богослужений', 'dmz_hram_site' ),
			'multiple' => esc_html__( 'Расписание Богослужений', 'dmz_hram_site' ),
		],

		'answers' => [
			'config' => [
					'public' => false,
					'menu_position' => 6,
					'menu_icon'     => 'dashicons-format-chat',
					'supports'=> ['title'],
					'show_ui' => true,
				],
			'singular' => esc_html__( 'Вопросы и ответы', 'dmz_hram_site' ),
			'multiple' => esc_html__( 'Вопросы и ответы', 'dmz_hram_site' ),
		],

		'abbot-word' => [
			'config' => [
					'public' => true,
					'menu_position' => 7,
					'menu_icon'     => 'dashicons-format-status',
					'supports'=> ['title', 'thumbnail', 'comments', 'excerpt' ],
					'show_ui' => true,
					'has_archive' => true,
					'rewrite' => [
						'with_front' => false,
					],
				],
			'singular' => esc_html__( 'Слово настоятеля', 'dmz_hram_site' ),
			'multiple' => esc_html__( 'Слово настоятеля', 'dmz_hram_site' ),
		],

		'gallery' => [
			'config' => [
					'public' => true,
					'menu_position' => 8,
					'menu_icon'     => 'dashicons-format-gallery',
					'supports'=> ['title', 'thumbnail', 'excerpt'],
					'has_archive' => true,
					'show_ui' => true,
					'rewrite' => [
						'with_front' => false,
					],
				],
			'singular' => esc_html__( 'Галерея', 'dmz_hram_site' ),
			'multiple' => esc_html__( 'Галерея', 'dmz_hram_site' ),
		],

		'poster' => [
			'config' => [
					'public' => false,
					'menu_position' => 8,
					'menu_icon'     => 'dashicons-bell',
					'supports'=> ['title', 'thumbnail', 'editor'],
					'show_ui' => true,
				],
			'singular' => esc_html__( 'Объявление', 'dmz_hram_site' ),
			'multiple' => esc_html__( 'Объявление', 'dmz_hram_site' ),
		],

		'about' => [
			'config' => [
					'public' => true,
					'menu_position' => 5,
					'menu_icon'     => 'dashicons-admin-home',
					'supports'=> ['title', 'thumbnail', 'editor', 'excerpt'],
					'show_ui' => true,
					'has_archive' => true,
					'rewrite' => [
						'with_front' => false,
					],
				],
			'singular' => esc_html__( 'О храме', 'dmz_hram_site' ),
			'multiple' => esc_html__( 'О храме', 'dmz_hram_site' ),
		],

		'diocese' => [
			'config' => [
					'public' => true,
					'menu_position' => 5,
					'menu_icon'     => 'dashicons-awards',
					'supports'=> ['title', 'thumbnail', 'editor'],
					'show_ui' => true,
					'has_archive' => true,
					'rewrite' => [
						'with_front' => false,
					],
				],
			'singular' => esc_html__( 'Одесская Епархия', 'dmz_hram_site' ),
			'multiple' => esc_html__( 'Одесская Епархия', 'dmz_hram_site' ),
			],

		'clergy' => [
			'config' => [
					'public' => true,
					'menu_position' => 5,
					'menu_icon'     => 'dashicons-businessman',
					'supports'=> ['title', 'thumbnail', 'editor'],
					'show_ui' => true,
					'has_archive' => true,
					'rewrite' => [
						'with_front' => false,
					],
				],
			'singular' => esc_html__( 'Клирики храма', 'dmz_hram_site' ),
			'multiple' => esc_html__( 'Клирики храма', 'dmz_hram_site' ),
		],
	];
}


// *Добавляем таксономии для постов
function dmz_get_taxonomies() {
	return [
		'abbot-word-category'    => [
			'for'        => ['abbot-word'],
			'config'    => [
				'hierarchical' => true,
				'rewrite' => [
					'with_front' => false,
				],
				'show_admin_column' => true,
			],
			'singular'    => esc_html__('Категория', 'dmz_hram_site'),
			'multiple'    => esc_html__('Категории', 'dmz_hram_site')
		],
		'about-category'    => [
			'for'        => ['about'],
			'config'    => [
				'hierarchical' => true,
				'rewrite' => [
					'with_front' => false,
				],
				'show_admin_column' => true,
			],
			'singular'    => esc_html__('Категория', 'dmz_hram_site'),
			'multiple'    => esc_html__('Категории', 'dmz_hram_site')
		],
		'about-tag'    => [
			'for'        => ['about'],
			'config'    => [
				'sort'        => true,
				'args'        => ['orderby' => 'term_order'],
				'hierarchical' => false,
			],
			'singular'    => esc_html__('Метка', 'dmz_hram_site'),
			'multiple'    => esc_html__('Метки', 'dmz_hram_site')
		],
		'info-category'    => [
			'for'        => ['info'],
			'config'    => [
				'hierarchical' => true,
				'rewrite' => [
					'with_front' => false,
				],
				'show_admin_column' => true,
			],
			'singular'    => esc_html__('Категория', 'dmz_hram_site'),
			'multiple'    => esc_html__('Категории', 'dmz_hram_site')
		],
	];
}