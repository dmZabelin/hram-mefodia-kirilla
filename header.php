<?php
/**
 * Блок header для нашей темы
 *
 * Это шаблон, который отображает весь раздел <head> и все что до <main class="main">
 *
 * @package dmz_hram_site
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper d-flex">
		<header class="header">
			<div class="container d-flex align-i-center">
				<div class="humburger-wrap align-i-center d-flex">
					<a href="#" class="humburger">
						<span></span>
						<span></span>
						<span></span>
					</a>
					<span><?php pll_e( 'Меню' ); ?></span>
				</div>

				<?php wp_nav_menu( [

					'theme_location'   => 'header_menu',
					'container'        => 'nav',
					'container_class'  =>  'main-menu',
					'menu_class'	   => 'menu-list d-flex',
					'menu_id'	   => false
					
					] );
				?>
				
				<div class="languages d-flex">
					<?php pll_the_languages( [ 'display_names_as'=>'slug', 'show_names'=>0 ] ); ?>
				</div>
		</header>