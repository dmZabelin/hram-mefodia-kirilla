<?php
/**
 * Шаблон для отображения страницы архива «Таинства»
 *
 * @package dmz_hram_site
 */

   get_header(); 

	$dmz_link_assets = DMZ_URL_ASSETS; ?>

<main class="main">
		<section class="archive archive-sacraments">
			<div class="container">
				<h2 class="archive-title">
					<?php pll_e( 'Таинства' ); ?>
					<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.svg' ); ?>" alt="Separator">
				</h2>	

				<?php 
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				
				$dmz_about_post = new WP_Query( [

					'post_type'			=> 'sacraments',
					'order'				=> 'ASC',
					'posts_per_page'	=> 3,
					'paged'				=> $paged

					] );

					if( $dmz_about_post->have_posts() ) : while ( $dmz_about_post->have_posts() ) : $dmz_about_post-> the_post(); ?>

						<div class="about-item d-flex"> 
							<div class="about-item__image"> 
								<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID,'about-page' ) ); ?>" alt="<?php the_title(); ?>">
							</div>
							<div class="about-item__info"> 
								<h3 class="about-item__title">
									<?php the_title(); ?>
								</h3>
								<p class="about-item__desc">
									<?php echo esc_html( dmz_limit_excerpt( 50 ) ); ?>
								</p>
								<a class="about-item__link" href="<?php echo esc_url( get_permalink() ); ?>">
									<?php pll_e( 'читать далее' ); ?>
								</a>
							</div>
						</div>

			 <?php endwhile; endif; wp_reset_postdata(); ?>

			<div class="pagination">
				<?php echo dmz_paginate_links( $dmz_about_post ); ?>
			</div>
			
		  </div>
		</section>
</main>

<?php
   get_footer();