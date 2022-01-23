<?php
/**
 * Шаблон для отображения "single page" - "Проповеди Настоятеля", "Литературные беседы"
 *
 * @package dmz_hram_site
 */

   get_header();

	$dmz_link_assets = DMZ_URL_ASSETS; ?>

		<main class="main">
			<section class="single-post">
				<div class="container">

					<?php while ( have_posts() ) : the_post(); 

						$image_url = dmz_get_meta( 'foto_min_abbot-word' );	?>
					<div class="preaching-image-respons">
						<figure class="preaching-image">
							<?php if( get_the_post_thumbnail_url( $post->ID, 'preaching-home' ) ): ?>
								<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID,'preaching-home' ) ); ?>" alt="Preaching">
							<?php endif; ?>
							<figcaption>
								<div class="preaching-image__wrap d-flex align-i-end">
									<?php if( wp_get_attachment_image_url( $image_url, 'thumbnail' ) ): ?>
										<div class="preaching-image__author-image">
											<img src="<?php echo esc_url( wp_get_attachment_image_url( $image_url, 'thumbnail' ) ); ?>" alt="Author">
										</div>
									<?php endif; ?>
									<?php if( dmz_get_meta( 'word_abbot-word' ) ): ?>
										<a class="preaching-image__links preaching-image__links_video" href="<?php echo esc_url( dmz_get_meta( 'word_abbot-word' ) ); ?>" data-fancybox >
											<i class="fas fa-play"></i>
										</a>
									<?php endif; ?>
								</div>
								<span class="preaching-image__date"> 
									<?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?>
								</span>
								<h4 class="preaching-image__title">
									<a href="<?php echo esc_url( get_permalink() ); ?>">
										<?php echo get_the_title(); ?>
									</a>
								</h4>
								<p class="preaching-image__desc">
									<?php echo esc_html( dmz_get_meta( 'subtitle_abbot-word' ) ); ?>
								</p>
							</figcaption>
						</figure>
					</div>
					<div class="social-shared d-flex">
						<p class="social-shared__desc">
							Поделиться с друзьями 
						</p>
						<a class="social-shared__link" onclick="window.open(this.href, 'Поделиться в Facebook Ленте', 'width=800, height=500'); return false"
							href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_the_permalink() ); ?>&t=<?php echo esc_attr( get_the_title() ); ?>">
							<i class="fab fa-facebook"></i>
						</a>
						<a class="social-shared__link" href="viber://forward?text=<?php echo ( get_the_date() . ' | ' . get_the_permalink() . ' | ' . get_the_excerpt() ); ?>">
							<i class="fab fa-viber"></i>
						</a>
						<a class="social-shared__link" onclick="window.open(this.href, 'Поделиться в Telegram', 'width=800, height=500'); return false" 
							href="https://t.me/share/url?url=<?php echo esc_url( get_the_permalink() ); ?>">
							<i class="fab fa-telegram"></i>
						</a>	
					</div>
						
							<?php	the_post_navigation( [

								'prev_text'          => 'Предыдущая',
								'next_text'          => 'Следующая',
								'in_same_term' => true,
								'taxonomy'           => 'abbot-word-category',

								] );
							
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; ?>

				</div>
			</section>
		</main>

<?php
   get_footer();