<?php
/**
 * Шаблон для отображения "single page" - "Духовенство"
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
							<?php echo esc_html( dmz_get_meta( 'priest_rank' ) ); ?>
								<?php the_title(); ?>
								<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
							</h2>

							<div class="post-content">
								<?php the_content(); ?>
							</div>

						<?php endwhile; ?>

						<?php
							$post_id = get_the_ID();
							$dmz_gallery_post = get_posts( [ 
								'post_type' => 'diocese',
								'include'	=> $post_id,
							] );
						
						foreach( $dmz_gallery_post as $post ):	setup_postdata( $post );

							$dmz_gallery_photo = '';
							$dmz_gallery_photo = dmz_get_meta( 'slider_diocese' ); 

							if( $dmz_gallery_photo ): ?>

								<div class="gallery-box d-flex wrap-wrap justify-center" style="margin-top: 4rem;">
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
			</section>
		</main>

<?php
   get_footer();