<?php
/**
 * 
 *
 * @package dmz_hram_site
 */

   get_header();

	$dmz_link_assets = DMZ_URL_ASSETS; ?>

<main class="main">
	<section class="category category_about">
		<div class="container">
			<h2 class="category-title">
				<?php echo get_queried_object()->name; ?>
				<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
			</h2>
			<?php 
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$cat_slug = get_queried_object()->slug;
				$dmz_abbot_word_post = new WP_Query( [

					'post_type'			=> 'about',
					'tax_query' 		=> [
						[
							'taxonomy' 	=> 'about-category',
							'field'    	=> 'slug',
							'terms'    	=> $cat_slug,
						]
					],
					'order'				=> 'ASC',
					'posts_per_page'	=> 10,
					'paged'				=> $paged

					] );

					if( $dmz_abbot_word_post->have_posts() ) : while ( $dmz_abbot_word_post->have_posts() ) : $dmz_abbot_word_post-> the_post(); ?>

					<div class="post-content">
						<?php the_content(); ?>
					</div>
					
				<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</section>
</main>

<?php
   get_footer();