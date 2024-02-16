<?php
/**
 * Шаблон для отображения всех отдельных сообщений
 *
 * @package dmz_hram_site
 */

   get_header();

	$dmz_link_assets = DMZ_URL_ASSETS;
?>

		<main class="main">
			<section class="single-post">
				<div class="container">

					<?php 	
						while ( have_posts() ) : the_post(); ?>

							<h2 class="post-title text-center">
								<?php the_title(); ?>
								<span><?php echo dmz_get_meta( 'person_life' ); ?></span>
								<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.svg' ); ?>" alt="Separator">
							</h2>
							<div class="post-content">
								<?php the_content(); ?>
							</div>
					<?php	
						endwhile; ?>
				</div>
			</section>
		</main>

<?php
   get_footer();