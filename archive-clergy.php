<?php
/**
 * Шаблон для отображения страницы архива «Духовенство»
 *
 * @package dmz_hram_site
 */

   get_header();

	$dmz_link_assets = DMZ_URL_ASSETS; ?>

<main class="main">
	<section class="archive archive-clergy">
		<div class="container">
			<h2 class="archive-title">
				<?php pll_e( 'Клирики храма' ); ?>
				<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
			</h2>
			<div class="clergy-item d-flex justify-center">
				<?php $dmz_clergy_post = get_posts( [ 'post_type' => 'clergy', ] );

					foreach( $dmz_clergy_post as $post ):	setup_postdata( $post ); ?>

						<a class="clergy-item__person" href="<?php echo esc_url( get_permalink() ); ?>">
							<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, 'clergy-image' ) ); ?>" alt="<?php the_title(); ?>">
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
</main>

<?php
   get_footer();