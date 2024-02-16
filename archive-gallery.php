<?php
/**
 * Шаблон для отображения архива "Фотогаллереи"
 *
 * @package dmz_hram_site
 */

   get_header();
	$dmz_link_assets = DMZ_URL_ASSETS; ?>

<main class="main">
	<section class="archive archive-gallery">
		<div class="container">
			<h2 class="archive-title">
				<?php pll_e( 'Фотохроника' ); ?>
				<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.svg' ); ?>" alt="Separator">
			</h2>
			<div class="archive-content">
				<ul class="archive-gallery-list">
					<?php $dmz_gallery_post = get_posts( [

						'post_type' => 'gallery',
						'exclude'	=> 46,
						'posts_per_page' => -1

					] );

					foreach( $dmz_gallery_post as $post ):	setup_postdata( $post ); ?>
						
							<li class="archive-gallery-list__item">
								<span class="archive-gallery-list__date">
									<?php echo get_the_date(); ?>
								</span>
								<h4 class="archive-gallery-list__title">
									<?php echo get_the_title(); ?>
								</h4>
								<a class="archive-gallery-list__link" href="<?php echo get_the_permalink(); ?>">
									Смотреть фото
								</a>
							</li>

					<?php	endforeach;	wp_reset_postdata(); ?>

				</ul>
			</div>
		</div>
	</section>
</main>

<?php
   get_footer();