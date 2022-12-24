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
				СВЯЩЕННОСЛУЖИТЕЛИ И ЦЕРКОВНОСЛУЖИТЕЛИ
				<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.svg' ); ?>" alt="Separator">
				<p class="category-subtitle">
				<?php echo get_queried_object()->description; ?>
				</p>
			</h2>
			<div class="category-link-wrapper d-flex justify-center wrap-wrap text-center">
				<a href="#served" class="category-link active">
					Служившие в нашем храме
				</a>
				<span>|</span>
				<a href="#graduate" class="category-link">
					Выпускники Духовного училища
				</a>
				<a href="#teachers" class="category-link">
					Преподаватели и сотрудники Духовного училища
				</a>
				
			</div>
			<div class="category-priests-tabs">
			<div id="served" class="priests-wrapper">
					<?php 
						$dmz_served_post = new WP_Query( [

							'post_type'			=> 'about',
							'tax_query' 		=> [
								[
									'taxonomy' 	=> 'about-tag',
									'field'    	=> 'slug',
									'terms'    	=> 'served',
								]
							],
							'order'				=> 'ASC',
							'posts_per_page'	=> -1,
							] ); 

							if( $dmz_served_post->have_posts() ) : while ( $dmz_served_post->have_posts() ) : $dmz_served_post-> the_post(); ?>

								<div class="post-item__wrapper post-item_right d-flex">
									<div class="post-item__info">
										<h4>
											<?php the_title(); ?>
										</h4>
										<div class="post-item__content">
											<?php the_content();
												if(dmz_get_meta('historical_facts')): ?>
													<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-item__link"> 
														читать больше
													</a>
												<?php endif; ?>
										</div>
									</div>
									<div class="post-item__image">
										<img src="<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' ) ); ?>">
									</div>
								</div>
							
						<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
				<div id="graduate" class="priests-wrapper">
					<?php 
						$dmz_priests_post = new WP_Query( [

							'post_type'			=> 'about',
							'tax_query' 		=> [
								[
									'taxonomy' 	=> 'about-tag',
									'field'    	=> 'slug',
									'terms'    	=> 'graduate',
								]
							],
							'order'				=> 'ASC',
							'posts_per_page'	=> -1,

							] ); 

							if( $dmz_priests_post->have_posts() ) : while ( $dmz_priests_post->have_posts() ) : $dmz_priests_post-> the_post(); ?>

								<div class="post-item__wrapper post-item_right d-flex">
									<div class="post-item__info">
										<h4>
											<?php the_title(); ?>
										</h4>
										<div class="post-item__content">
											<?php the_content();
												if(dmz_get_meta('historical_facts')): ?>
													<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-item__link"> 
														читать больше
													</a>
												<?php endif; ?>
										</div>
									</div>
									<div class="post-item__image">
										<img src="<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' ) ); ?>">
									</div>
								</div>
							
						<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
				<div id="teachers" class="priests-wrapper">
					<?php 
						$dmz_teachers_post = new WP_Query( [

							'post_type'			=> 'about',
							'tax_query' 		=> [
								[
									'taxonomy' 	=> 'about-tag',
									'field'    	=> 'slug',
									'terms'    	=> 'teachers',
								]
							],
							'order'				=> 'ASC',
							'posts_per_page'	=> -1,

							] ); 

							if( $dmz_teachers_post->have_posts() ) : while ( $dmz_teachers_post->have_posts() ) : $dmz_teachers_post-> the_post(); ?>

								<div class="post-item__wrapper post-item_right d-flex">
									<div class="post-item__info">
										<h4>
											<?php the_title(); ?>
										</h4>
										<div class="post-item__content">
											<?php the_content();
												if(dmz_get_meta('historical_facts')): ?>
													<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-item__link"> 
														читать больше
													</a>
												<?php endif; ?>
										</div>
									</div>
									<div class="post-item__image">
										<img src="<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' ) ); ?>">
									</div>
								</div>
							
						<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div>
			
		</div>
	</section>
</main>

<?php
   get_footer();