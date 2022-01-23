<?php

	get_header();
	$dmz_link_assets = DMZ_URL_ASSETS; 
?>

<main class="main">
	<section class="helpful-information" id="helpful-information">
		<div class="container">
			<h2 class="helpful-information-title">
				Блог Настоятеля
				<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
			</h2>
		<div class="info-items"> 
				<?php

					$dmz_info_post = new WP_Query( [

						'post_type' => 'post',
						'posts_per_page' => 10,
						'paged' => $paged

					] );

					$i = 0;

						if( $dmz_info_post->have_posts() ) : while ( $dmz_info_post->have_posts() ) : $dmz_info_post-> the_post();

						if( $i == 0 || $i == 5 ): ?>

						<div class="info-card">
							<?php if( get_the_post_thumbnail_url( $post->ID,'big_news' ) ): ?>
								<a class="info-card__image" href="<?php echo esc_url( get_permalink() ); ?>">
									<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID,'big_news' ) ); ?>" alt="<?php the_title(); ?>">
								</a>
							<?php endif; ?>
							<span class="uncos-main__date">
								<?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?>
							</span>
							<h4 class="info-card__title">
								<?php the_title(); ?>
							</h4>
							<p class="info-card__desc">
								<?php esc_html_e( dmz_limit_excerpt( 30 ) ); ?>
							</p>
							<div class="info-card__wrapper">
								<div class="info-card__stat">
									<span class="info-card__see"> 
										<img src="<?php echo esc_url( $dmz_link_assets . '/img/view-white.svg' ); ?>" alt="View">
										<?php
											$dmz_views = get_post_meta( $post->ID, 'views', true );
											echo ( $dmz_views ) ? $dmz_views : '0';
										?>
									</span>
									<span class="info-card__comment">
										<img src="<?php echo esc_url( $dmz_link_assets . '/img/comm-white.svg' ); ?>" alt="Comment">
										<?php comments_number( '0', '1', '%' ); ?>
									</span>
								</div>
								<a class="info-card__link" href="<?php echo esc_url( get_permalink() ); ?>">
									<?php pll_e( 'читать далее' ); ?>
								</a>
							</div>
						</div>

				<?php else: ?>

					<div class="info-card"> 
						<a class="info-card__image" href="<?php echo esc_url( get_permalink() ); ?>">
							<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID,'min_news' ) ); ?>" alt="<?php the_title(); ?>">
						</a>
						<h4 class="info-card__title">
							<?php the_title(); ?>
						</h4>
						<p class="info-card__desc">
							<?php esc_html_e( dmz_limit_excerpt( 20 ) ); ?>
						</p>
						<div class="info-card__wrapper">
							<div class="info-card__stat">
								<span class="info-card__see"> 
									<img src="<?php echo esc_url( $dmz_link_assets . '/img/view.svg' ); ?>" alt="View">
									<?php
										$dmz_views = get_post_meta( $post->ID, 'views', true );
										echo ( $dmz_views ) ? $dmz_views : '0';
									?>
								</span>
								<span class="info-card__comment">
									<img src="<?php echo esc_url( $dmz_link_assets . '/img/comm.svg' ); ?>" alt="Comment">
									<?php comments_number( '0', '1', '%' ); ?>
								</span>
							</div>
							<a class="info-card__link" href="<?php echo esc_url( get_permalink() ); ?>">
								<?php pll_e( 'читать далее' ); ?>
							</a>
						</div>
					</div>
				<?php endif; $i++; endwhile; endif; wp_reset_postdata(); ?>
			</div>
			<div class="pagination">
				<?php echo dmz_paginate_links( $dmz_info_post ); ?>
			</div>
		</div>
	</section>
</main>

<?php
	get_footer();