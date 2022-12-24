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
								<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.svg' ); ?>" alt="Separator">
							</h2>
							<div class="post-content">
								<?php the_content(); ?>
							</div>
							<div class="social-shared d-flex">
								<p class="social-shared__desc">
									Поделиться с друзьями 
								</p>
								<a class="social-shared__link" onclick="window.open(this.href, 'Поделиться в Facebook Ленте', 'width=800, height=500'); return false"
									href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_the_permalink() ); ?>&t=<?php echo esc_attr( get_the_title() ); ?>">
									<i class="fab fa-facebook"></i>
								</a>
								<a class="social-shared__link" href="viber://forward?text=<?php echo ( get_the_date() . ' | ' . get_the_permalink() . ' | Блог настоятеля.' ); ?>">
            							<i class="fab fa-viber"></i>
            						</a>
    								<a class="social-shared__link" onclick="window.open(this.href, 'Поделиться в Telegram', 'width=800, height=500'); return false" 
									href="https://t.me/share/url?url=<?php echo esc_url( get_the_permalink() ); ?>">
									<i class="fab fa-telegram"></i>
								</a>	
							</div>
							<?php

								the_post_navigation( [

									'prev_text' => '<span class="nav-subtitle">' . pll__( 'Предыдущая статья' ) . '</span>',
									'next_text' => '<span class="nav-subtitle">' . pll__( 'Следующая статья' ) . '</span>',

								] );
							
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile;
					?>
				</div>
			</section>
		</main>

<?php
   get_footer();