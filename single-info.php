<?php
/**
 * Шаблон для отображения всех отдельных сообщений
 *
 * @package dmz_hram_site
 */

   get_header();

	$dmz_link_assets = DMZ_URL_ASSETS;
	if( has_term( 'eternal-memory', 'info-category', $post ) ):
		get_template_part('single-info-eternal-memory', 'eternal-memory');
	else: ?>

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
							<?php

								the_post_navigation( [

									'prev_text' => '<span class="nav-subtitle">' . pll__( 'Предыдущая статья' ) . '</span>',
									'next_text' => '<span class="nav-subtitle">' . pll__( 'Следующая статья' ) . '</span>',
									'in_same_term' => true,
									'taxonomy'           => 'category',

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
endif;
   get_footer();