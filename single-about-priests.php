<?php
/**
 * Шаблон для отображения "single page" - "О храме"
 *
 * @package dmz_hram_site
 */

   get_header();

	$dmz_link_assets = DMZ_URL_ASSETS;  ?>	

		<main class="main">
			<section class="single-post">
				<div class="container">

					<?php 	
						while ( have_posts() ) : the_post(); ?>

							<h2 class="post-title text-center">
								<?php the_title(); ?>
								<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
							</h2>
							
							<div class="post-content">
								<?php echo dmz_get_meta('historical_facts'); ?>
							</div>
								
						<?php endwhile; ?>

				</div>
			</section>
		</main>

<?php
		get_footer();