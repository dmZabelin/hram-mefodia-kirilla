<?php

	get_header();
	$dmz_link_assets = DMZ_URL_ASSETS; ?>

<main class="main">
	<section class="category category-eternal-memory">
		<div class="container">
			<h2 class="category-title">
				<?php echo single_cat_title(); ?>
				<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.svg' ); ?>" alt="Separator">
			</h2>
			<div class="category-content">
				<div class="eternal-memory-item d-flex justify-center">
					<?php 
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$cat_slug = get_queried_object()->slug;
					$dmz_eternal_memory_post = new WP_Query( [

							'post_type'			=> 'info',
							'tax_query' 		=> [
								[
									'taxonomy' 	=> 'info-category',
									'field'    	=> 'slug',
									'terms'    	=> $cat_slug,
								]
							],
							'order'				=> 'ASC',
							'posts_per_page'	=> 10,
							'paged'				=> $paged

						] );

						if( $dmz_eternal_memory_post->have_posts() ) : while ( $dmz_eternal_memory_post->have_posts() ) : $dmz_eternal_memory_post-> the_post(); ?>

							<a class="eternal-memory-item__person" href="<?php echo esc_url( get_permalink() ); ?>">
								<?php if(get_the_post_thumbnail_url( $post->ID, 'clergy-image' )): ?>
									<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, 'clergy-image' ) ); ?>" alt="<?php the_title(); ?>">
								<?php endif; ?>
								<h5 class="eternal-memory-item__person-name"> 
									<?php the_title(); ?>
									<span><?php echo dmz_get_meta( 'person_life' ); ?></span>
								</h5>
							</a>

					<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
			</div>
		</div>
	</section>
</main>

<?php
	get_footer();