<?php
/**
 * Шаблон для отображения страницы архива «Община»
 *
 * @package dmz_hram_site
 */

   get_header();

	$dmz_link_assets = DMZ_URL_ASSETS; ?>

<main class="main">
	<section class="archive archive-community">
		<div class="container">
			<h2 class="archive-title">
				<?php pll_e( 'Клуб «О православии с интересом»' ); ?>
				<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
			</h2>
			<div class="community-items d-flex wrap-wrap"> 
			
			<?php 
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				
				$dmz_community_post = new WP_Query( [

					'post_type'			=> 'club',
					'posts_per_page'	=> 12,
					'paged'				=> $paged

					] );

					if( $dmz_community_post->have_posts() ) : while ( $dmz_community_post->have_posts() ) : $dmz_community_post-> the_post(); ?>

					<div class="community-card"> 
						<a class="community-card__image" href="<?php echo esc_url( get_permalink() ); ?>">
							<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID,'min_news' ) ); ?>" alt="<?php the_title(); ?>">
						</a>
						<h4 class="community-card__title">
							<?php the_title(); ?>
						</h4>
						<p class="community-card__desc">
							<?php echo esc_html( dmz_limit_excerpt( 20 ) ); ?>
						</p>
						<div class="community-card__wrapper">
							<div class="community-card__stat">
								<span class="community-card__see"> 
									<img src="<?php echo esc_url( $dmz_link_assets . '/img/view.svg' ); ?>" alt="View">
									<?php
										$dmz_views = get_post_meta( $post->ID, 'views', true );
										echo ( $dmz_views ) ? $dmz_views : '0';
									?>
								</span>
								<span class="community-card__comment">
									<img src="<?php echo esc_url( $dmz_link_assets . '/img/comm.svg' ); ?>" alt="Comment">
									<?php comments_number( '0', '1', '%' ); ?>
								</span>
							</div>
							<a class="community-card__link" href="<?php echo esc_url( get_permalink() ); ?>">
								<?php pll_e( 'читать далее' ); ?>
							</a>
						</div>
					</div>

					<?php endwhile; endif; wp_reset_postdata(); ?>

					<div class="pagination">
						<?php echo dmz_paginate_links( $dmz_community_post ); ?>
					</div>
			</div>
		</div>
	</section>
</main>

<?php
   get_footer();