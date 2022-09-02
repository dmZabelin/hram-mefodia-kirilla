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
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/></svg>
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
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
						</a>
						<a class="social-shared__link" href="viber://forward?text=<?php echo ( get_the_date() . ' | ' . get_the_permalink() . ' | ' . get_the_excerpt() ); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M444 49.9C431.3 38.2 379.9.9 265.3.4c0 0-135.1-8.1-200.9 52.3C27.8 89.3 14.9 143 13.5 209.5c-1.4 66.5-3.1 191.1 117 224.9h.1l-.1 51.6s-.8 20.9 13 25.1c16.6 5.2 26.4-10.7 42.3-27.8 8.7-9.4 20.7-23.2 29.8-33.7 82.2 6.9 145.3-8.9 152.5-11.2 16.6-5.4 110.5-17.4 125.7-142 15.8-128.6-7.6-209.8-49.8-246.5zM457.9 287c-12.9 104-89 110.6-103 115.1-6 1.9-61.5 15.7-131.2 11.2 0 0-52 62.7-68.2 79-5.3 5.3-11.1 4.8-11-5.7 0-6.9.4-85.7.4-85.7-.1 0-.1 0 0 0-101.8-28.2-95.8-134.3-94.7-189.8 1.1-55.5 11.6-101 42.6-131.6 55.7-50.5 170.4-43 170.4-43 96.9.4 143.3 29.6 154.1 39.4 35.7 30.6 53.9 103.8 40.6 211.1zm-139-80.8c.4 8.6-12.5 9.2-12.9.6-1.1-22-11.4-32.7-32.6-33.9-8.6-.5-7.8-13.4.7-12.9 27.9 1.5 43.4 17.5 44.8 46.2zm20.3 11.3c1-42.4-25.5-75.6-75.8-79.3-8.5-.6-7.6-13.5.9-12.9 58 4.2 88.9 44.1 87.8 92.5-.1 8.6-13.1 8.2-12.9-.3zm47 13.4c.1 8.6-12.9 8.7-12.9.1-.6-81.5-54.9-125.9-120.8-126.4-8.5-.1-8.5-12.9 0-12.9 73.7.5 133 51.4 133.7 139.2zM374.9 329v.2c-10.8 19-31 40-51.8 33.3l-.2-.3c-21.1-5.9-70.8-31.5-102.2-56.5-16.2-12.8-31-27.9-42.4-42.4-10.3-12.9-20.7-28.2-30.8-46.6-21.3-38.5-26-55.7-26-55.7-6.7-20.8 14.2-41 33.3-51.8h.2c9.2-4.8 18-3.2 23.9 3.9 0 0 12.4 14.8 17.7 22.1 5 6.8 11.7 17.7 15.2 23.8 6.1 10.9 2.3 22-3.7 26.6l-12 9.6c-6.1 4.9-5.3 14-5.3 14s17.8 67.3 84.3 84.3c0 0 9.1.8 14-5.3l9.6-12c4.6-6 15.7-9.8 26.6-3.7 14.7 8.3 33.4 21.2 45.8 32.9 7 5.7 8.6 14.4 3.8 23.6z"/></svg>
						</a>
						<a class="social-shared__link" onclick="window.open(this.href, 'Поделиться в Telegram', 'width=800, height=500'); return false" 
							href="https://t.me/share/url?url=<?php echo esc_url( get_the_permalink() ); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z"/></svg>
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