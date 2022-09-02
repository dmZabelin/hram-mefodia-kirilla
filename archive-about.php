<?php
/**
 * Шаблон для отображения страницы архива «О храме»
 *
 * @package dmz_hram_site
 */

	get_header(); 

	$dmz_link_assets = DMZ_URL_ASSETS; ?>

<main class="main">
		<section class="archive archive-about">
		  <div class="container">
				<h2 class="archive-title">
					<?php pll_e( 'О храме' ); ?>
					<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
				</h2>	

			 <?php $dmz_about_terms = get_terms( [

						'taxonomy' => 'about-category',
						'order'		=> 'ASC',

					] );

					foreach( $dmz_about_terms as $term ): ?>

						<div class="about-item d-flex">
							<div class="about-item__image"> 
							<?php if( $term ): ?>
								<img src="<?php if ( $term->slug == 'priests' ): echo esc_url( $dmz_link_assets . '/img/kupola.jpg' ); elseif( $term->slug == 'parish-history' ): echo esc_url( $dmz_link_assets . '/img/church.jpg' ); endif; ?>" alt="<?php echo $term->name; ?>">
							<?php endif; ?>
							</div>
						
							<div class="about-item__info"> 
								<h3 class="about-item__title">
									<?php echo $term->name; ?>
								</h3>
								<p class="about-item__desc">
									<?php echo $term->description; ?>
								</p>
								<a class="about-item__link" href="<?php echo esc_url( get_term_link( $term->term_id, 'about-category' ) ); ?>">
									<?php pll_e( 'читать далее' ); ?>
								</a>
							</div>

						</div>

			 <?php endforeach; ?>
		  </div>
		</section>
		<?php $dmz_clergy_post = get_posts( [ 'post_type' => 'clergy', ] ); 

			if($dmz_clergy_post): ?>

			<section class="clergy" id="clergy">
				<div class="container">
					<h2 class="clergy-title">
						<?php pll_e( 'Клирики храма' ); ?>
						<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
					</h2>
					<div class="clergy-item d-flex justify-center">

							<?php foreach( $dmz_clergy_post as $post ):	setup_postdata( $post ); ?>

								<a class="clergy-item__person" href="<?php echo esc_url( get_permalink() ); ?>">
									<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID,'clergy-image' ) ); ?>" alt="<?php the_title(); ?>">
									<div class="clergy-item__person-info">
										<p class="clergy-item__person-regalia">
											<?php echo esc_html( dmz_get_meta( 'priest_rank' ) ); ?>
										</p>
										<h5 class="clergy-item__person-name"> 
											<?php the_title(); ?>
										</h5>
									</div>
								</a>

						<?php	endforeach;	wp_reset_postdata(); ?>
					</div>
				</div>
			</section>

		<?php endif; ?>
	</main>

<?php
	get_footer();