<?php
/**
 * Шаблон для отображения страницы архива «Проповеди»
 *
 * @package dmz_hram_site
 */

   get_header();

	$dmz_link_assets = DMZ_URL_ASSETS; ?>

<main class="main">
	<section class="archive archive-preaching">
		<div class="container">
			<h2 class="archive-title">
				<?php pll_e( 'Cлово настоятеля' ); ?>
				<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
			</h2>
			<div class="preaching-link-wrapper d-flex justify-center">
				<a href="#preaching-items_preaching" class="preaching-link active">
					<?php pll_e( 'Проповеди настоятеля' ); ?>
				</a>
				<span>|</span>
				<a href="#preaching-items_lecture" class="preaching-link">
					<?php pll_e( 'Литературные беседы' ); ?>
				</a>
			</div>
			<div class="preaching-items-wrapper">
				<div id="preaching-items_preaching" class="preaching-items"> 
					<?php 
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						
						$dmz_abbot_word_post = new WP_Query( [

							'post_type' => 'abbot-word',
								'tax_query' 		=> [
									[
										'taxonomy' 	=> 'abbot-word-category',
										'field'    	=> 'slug',
										'terms'    	=> 'preaching',
									]
								],
							'posts_per_page'	=> 12,
							'paged'				=> $paged

							] );

							if( $dmz_abbot_word_post->have_posts() ) : while ( $dmz_abbot_word_post->have_posts() ) : $dmz_abbot_word_post-> the_post(); ?>

						<div class="preaching-card"> 
						
							<a class="preaching-card__image" href="<?php echo esc_url( get_permalink() ); ?>">
							<?php if( get_the_post_thumbnail_url( $post->ID,'min_news' ) ): ?>
								<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID,'min_news' ) ); ?>" alt="<?php the_title(); ?>">
							<?php endif; ?>
							</a>
							<h4 class="preaching-card__title">
								<a href="<?php echo esc_url( get_permalink() ); ?>">
									<?php echo get_the_title(); ?>
								</a>
							</h4>
							<p class="preaching-card__desc">
								<?php echo dmz_wp_kses( dmz_get_meta( 'subtitle_abbot-word' ) ); ?>
							</p>
							<div class="preaching-card__wrapper">
								<div class="preaching-card__stat">
									<span class="preaching-card__see"> 
									<img src="<?php echo esc_url( $dmz_link_assets . '/img/view.svg' ); ?>" alt="View">
										<?php
											$dmz_views = get_post_meta( $post->ID, 'views', true );
											echo ( $dmz_views ) ? $dmz_views : '0'; ?>
									</span>
									<span class="preaching-card__comment">
										<img src="<?php echo esc_url( $dmz_link_assets . '/img/comm.svg' ); ?>" alt="Comment">
										<?php comments_number( '0', '1', '%' ); ?>
									</span>
								</div>
								<a class="preaching-card__link" href="<?php echo esc_url( get_permalink() ); ?>">
									<?php pll_e( 'подробнее' ); ?>
								</a>
							</div>
						</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					<div class="pagination">
						<?php echo dmz_paginate_links( $dmz_abbot_word_post ); ?>
					</div>
				</div>
				<div id="preaching-items_lecture" class="preaching-items"> 
					<?php 
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						
						$dmz_abbot_word_post = new WP_Query( [

							'post_type' => 'abbot-word',
								'tax_query' 		=> [
									[
										'taxonomy' 	=> 'abbot-word-category',
										'field'    	=> 'slug',
										'terms'    	=> 'literaturnye-besedy',
									]
								],
							'posts_per_page'	=> 12,
							'paged'				=> $paged

							] );

							if( $dmz_abbot_word_post->have_posts() ) : while ( $dmz_abbot_word_post->have_posts() ) : $dmz_abbot_word_post-> the_post(); ?>

						<div class="preaching-card"> 
						
							<a class="preaching-card__image" href="<?php echo esc_url( get_permalink() ); ?>">
							<?php if( get_the_post_thumbnail_url( $post->ID,'min_news' ) ): ?>
								<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID,'min_news' ) ); ?>" alt="<?php the_title(); ?>">
							<?php endif; ?>
							</a>
							<h4 class="preaching-card__title">
								<a href="<?php echo esc_url( get_permalink() ); ?>">
									<?php echo get_the_title(); ?>
								</a>
							</h4>
							<p class="preaching-card__desc">
								<?php echo dmz_wp_kses( dmz_get_meta( 'subtitle_abbot-word' ) ); ?>
							</p>
							<div class="preaching-card__wrapper">
								<div class="preaching-card__stat">
									<span class="preaching-card__see"> 
									<img src="<?php echo esc_url( $dmz_link_assets . '/img/view.svg' ); ?>" alt="View">
										<?php
											$dmz_views = get_post_meta( $post->ID, 'views', true );
											echo ( $dmz_views ) ? $dmz_views : '0'; ?>
									</span>
									<span class="preaching-card__comment">
										<img src="<?php echo esc_url( $dmz_link_assets . '/img/comm.svg' ); ?>" alt="Comment">
										<?php comments_number( '0', '1', '%' ); ?>
									</span>
								</div>
								<a class="preaching-card__link" href="<?php echo esc_url( get_permalink() ); ?>">
									<?php pll_e( 'подробнее' ); ?>
								</a>
							</div>
						</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					<div class="pagination">
						<?php echo dmz_paginate_links( $dmz_abbot_word_post ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
   get_footer();