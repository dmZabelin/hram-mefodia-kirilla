<?php
/**
 * Шаблон для отображения всех отдельных сообщений
 *
 * @package dmz_hram_site
 */

   get_header();

	$dmz_link_assets = DMZ_URL_ASSETS;
?>

		<main class="main">
			<section class="single-post">
				<div class="container">

					<?php 	
						while ( have_posts() ) : the_post(); ?>

							<h2 class="post-title text-center">
								<?php the_title(); ?>
								<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
							</h2>
							<p class="post-subtitle">
							    <?php echo get_the_excerpt(); ?>
							</p>
							<div class="post-content">
							<?php 
								$post_id = get_the_ID();
								$dmz_gallery_post = get_posts( [ 
								
									'post_type' => 'gallery',
									'include'	=> $post_id,
									
								] );
			
								foreach( $dmz_gallery_post as $post ):	setup_postdata( $post );

								$dmz_gallery_photo = '';
								$dmz_gallery_photo = dmz_get_meta( 'gallery_foto' ); 

								if( $dmz_gallery_photo ): ?>

									<div class="gallery-box d-flex wrap-wrap justify-center">
										<?php
											foreach ( $dmz_gallery_photo as $dmz_photo ): ?>
											<div class="gallery-item">
												<div class="gallery-item__inner">
													<a class="gallery-item__content" data-fancybox="gallery" href="<?php echo esc_url( wp_get_attachment_image_url( $dmz_photo, 'full' ) ); ?>">
														<img src="<?php echo esc_url( wp_get_attachment_image_url( $dmz_photo, 'gallery-min' ) ); ?>">
													</a>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
									
								<?php endif; endforeach;	wp_reset_postdata(); ?>

							</div>
							<?php	endwhile; ?>
							<a class="section-link section-link_gallery" href="<?php
								$lang_check = get_language_attributes();
								echo ( $lang_check == 'lang="ru-RU"' ) ? get_home_url( null, 'ru/gallery/' ) : get_home_url( null, '' ); ?>">
								<?php pll_e( 'вернуться назад' ); ?>
							</a>
				</div>
			</section>
		</main>

<?php
   get_footer();