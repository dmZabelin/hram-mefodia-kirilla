<?php
/**
* *Template Name: Главная странца
*
*@package dmz_hram_site
*
*/
get_header();

	$dmz_link_assets = DMZ_URL_ASSETS; ?>

<main class="main">

		<section class="main-screen d-flex justify-center">
		  <div class="main-info">
			 <div class="main-info__image">
				 <img src="<?php echo esc_url( $dmz_link_assets . '/img/kirill-i-mefodiy.png' ); ?>" alt="<?php pll_e( 'Кирилл и Мефодий' ); ?>">
			</div>
			<div class="main-info__title">
				<h1>
					<span>
						<?php pll_e( 'Храм святых равноапостольных' ); ?>
					</span>
					<span>
						<?php pll_e( 'Мефодия и Кирилла' ); ?>
					</span>
				</h1>
				<p class="main-info__subtitle">
					<?php pll_e( 'Одесская епархия Украинской Православной Церкви' ); ?>
					<img src="<?php echo esc_url( $dmz_link_assets . '/img/сross.png' ); ?>" alt="Cross">
				</p>
			</div>
			<div class="main-info__contacts">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
				<div class="address">
					<?php echo dmz_wp_kses( dmz_get_meta( 'geo_address' ) ); ?>
				</div>
					<div class="phone">
						<?php 
							$dmz_phone_one = dmz_get_meta( 'geo_mobile' );
							$dmz_phone_two = dmz_get_meta( 'geo_city' );
							if( $dmz_phone_one  || $dmz_phone_two ): 
								if($dmz_phone_one ): ?>

									<a class="phone__mobile" href="<?php echo esc_attr( dmz_phone_clear( $dmz_phone_one ) ); ?>">
										<?php echo $dmz_phone_one; ?>
									</a>

						<?php endif;
								if($dmz_phone_two ): ?>

									<a class="phone__city" href="<?php echo esc_attr( dmz_phone_clear( $dmz_phone_two ) ); ?>">
										<?php echo $dmz_phone_two; ?>
									</a>

						<?php endif; 
							endif; 
							if( dmz_get_meta( 'geo_google' ) ): ?>

								<a class="phone__google" href="<?php echo esc_url( dmz_get_meta( 'geo_google' ) ); ?>" target="_blank">
									<img src="<?php echo esc_url( $dmz_link_assets . '/img/google-map.png' ); ?>" alt="Google Map">
								</a>

					<?php endif; 
							if( dmz_get_meta( 'geo_2gis' ) ): ?>

								<a class="phone__2gis" href="<?php echo esc_url( dmz_get_meta( 'geo_2gis' ) ); ?>" target="_blank">
									<img src="<?php echo esc_url( $dmz_link_assets . '/img/logo-2gis.png' ); ?>" alt="2GIS">
								</a>

					<?php endif; ?>
					</div>
			 </div>
		  </div>
			<?php 
				$dmz_offerSliders = '';
				$dmz_offerSliders = dmz_get_meta( 'slider_main_screen' );
				if( $dmz_offerSliders ): ?>

				<div class="main-slider">
					<?php foreach ( $dmz_offerSliders as $dmz_offerSlider ): ?>
						<div class="main-slider__image" style="background: url('<?php echo esc_url( wp_get_attachment_image_url( $dmz_offerSlider, 'full' ) ); ?>')no-repeat center center/cover;"></div>
					<?php endforeach; ?>
				</div>

			<?php endif; ?>
		</section>

		<?php
					$dmz_theDate_today = '';
					$dmz_theDate_tomorrow = '';
					$dmz_theDate_today = date( 'D' );
					$dmz_theDate_tomorrow = date( 'D', strtotime( "+1 days" ) );
					
					$dmz_schedule_post = get_posts( [

						'post_type'		=> 'schedule',
						'numberposts'	=> 1,
						'order'			=> 'ASC',
						
					] );  if ($dmz_schedule_post): ?>

		<section class="schedule" id="schedule">
			<div class="container">
				<div class="schedule-item">
				

				<?php	foreach( $dmz_schedule_post as $post ): setup_postdata( $post );

					$file_url =  dmz_get_meta( 'field_file' );

					if( $file_url ): ?>
						<a download class="schedule-item-download" href="<?php echo esc_url( wp_get_attachment_url( $file_url ) ); ?>">
							<img src="<?php echo esc_url( $dmz_link_assets . '/img/download.png'); ?>" alt="Download">
							<?php pll_e( 'скачать расписание' ); ?><br>
							<span>( <?php pll_e( 'на неделю' ); ?> )<span>
						</a>
				<?php endif; ?>
						<div class="schedule-item-wrap">
							<h2 class="schedule-item-title section-title">
								<?php pll_e( 'Расписание Богослужений' ); ?>
								<span class="the-date-wrapper d-flex">
									<a href="#schedule-item-calendar_today" class="the-date the-date_today active">
										<?php pll_e( 'на сегодня' ); ?>
									</a>
									<span>|</span>
									<a href="#schedule-item-calendar_tomorrow" class="the-date the-date_tomorrow">
										<?php pll_e( 'на завтра' ); ?>
									</a>
								</span>
								<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
							</h2>
							<div id="schedule-item-calendar_today" class="schedule-item-calendar">
								<p class="schedule-data d-flex justify-center text-center align-i-center">
									<span class="schedule-new-style">
										<?php esc_html_e( dmz_get_meta( 'new_date_' . $dmz_theDate_today ) ); ?>
									</span>
									<span class="schedule-year">
										<?php esc_html_e( date( 'Y' ) ); ?>
									</span>
									<span class="schedule-old-style">
										<?php esc_html_e( dmz_get_meta( 'old_date_' . $dmz_theDate_today ) ); ?>
									</span>
								</p>
								<p class="schedule-data-desc text-center">
									<?php esc_html_e( dmz_get_meta( 'desc_day_one_' . $dmz_theDate_today ) ); ?> 
									<span>
										<?php esc_html_e( dmz_get_meta( 'desc_day_two_' . $dmz_theDate_today ) ); ?> 
									</span>
								</p>
								<div class="schedule-table">
									<?php echo wp_kses_post( dmz_get_meta( 'shedule_fields_' . $dmz_theDate_today ) ); ?>
								</div>
							</div>
							<div id="schedule-item-calendar_tomorrow" class="schedule-item-calendar">
								<p class="schedule-data d-flex justify-center text-center align-i-center">
									<span class="schedule-new-style">
										<?php esc_html_e( dmz_get_meta( 'new_date_' . $dmz_theDate_tomorrow ) ); ?>
									</span>
									<span class="schedule-year">
										<?php esc_html_e( date( 'Y' ) ); ?>
									</span>
									<span class="schedule-old-style">
										<?php esc_html_e( dmz_get_meta( 'old_date_' . $dmz_theDate_tomorrow ) ); ?>
									</span>
								</p>
								<p class="schedule-data-desc text-center">
									<?php esc_html_e( dmz_get_meta( 'desc_day_one_' . $dmz_theDate_tomorrow ) ); ?> 
									<span>
										<?php esc_html_e( dmz_get_meta( 'desc_day_two_' . $dmz_theDate_tomorrow ) ); ?> 
									</span>
								</p>
								<div class="schedule-table">
									<?php echo wp_kses_post( dmz_get_meta( 'shedule_fields_' . $dmz_theDate_tomorrow ) ); ?>
								</div>
							</div>
						</div>

					<?php	endforeach;	wp_reset_postdata(); ?>
					<img class="schedule-item-image" src="<?php echo esc_url( $dmz_link_assets . '/img/kupola.png' ); ?>" alt="Cupola">
			 	</div>
		  	</div>
		</section>

	<?php endif;

		$dmz_poster_post = get_posts( [

			'post_type' => 'poster',
			'numberposts'	=> 1,
			'order'		=> 'ASC',

			] );
	
	if($dmz_poster_post): ?>
	\
		<article class="poster">
			<div class="container">
				<?php foreach( $dmz_poster_post as $post ):	setup_postdata( $post ); ?>

				<div class="poster-item d-flex">
				<?php if(get_the_post_thumbnail_url( $post->ID,'about-page' )): ?>
					<div class="poster-item__image"> 					
						<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID,'about-page' ) ); ?>" alt="<?php the_title(); ?>">					
					</div>
				<?php endif; ?>
					<div class="poster-item__info"> 
						<?php echo get_the_content(); ?>
					</div>
				</div>

				<?php	endforeach;	wp_reset_postdata(); ?>
			</div>
		</article>

	<?php endif; ?>

	<?php if( dmz_get_meta( 'on_of_preaching' ) === 'enable' ): ?>

		<section class="preaching" id="preaching">
			<div class="container">
				<h2 class="preaching-title">
					<?php pll_e( 'Cлово настоятеля' ); ?>
					<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
				</h2>
				<div class="word-link-wrapper d-flex justify-center">
					<a href="#word-item_preaching" class="word active">
						<?php pll_e( 'Проповеди настоятеля' ); ?>
					</a>
					<span>|</span>
					<a href="#word-item_lecture" class="word">
						<?php pll_e( 'Литературные беседы' ); ?>
					</a>
				</div>
				<div class="word-item-wrapper">
					<div id="word-item_preaching" class="word-item">
						<?php 
							$dmz_abbot_word_post = get_posts( [

								'post_type' => 'abbot-word',
								'tax_query' 		=> [
									[
										'taxonomy' 	=> 'abbot-word-category',
										'field'    	=> 'slug',
										'terms'    	=> 'preaching',
									]
								],
								'numberposts' => 10, 

							] );
								$i = 0;
								foreach( $dmz_abbot_word_post as $post ):	setup_postdata( $post );
								$image_url = dmz_get_meta( 'foto_min_abbot-word' );
								if( $i == 0 ): ?>
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
													<a class="preaching-image__links preaching-image__links_video" href="<?php echo esc_url( dmz_get_meta( 'word_abbot-word' ) ); ?>" data-fancybox>
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
								<div class="preaching-slider">
								<?php else: ?>
							
									<div class="preaching-item">
										<span class="preaching-item__date">
											<?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?>
										</span>
										<?php if( dmz_get_meta( 'word_abbot-word' ) ): ?>
											<a class="preaching-item__video" href="<?php echo esc_url( dmz_get_meta( 'word_abbot-word' ) ); ?>" data-fancybox>
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/></svg>
											</a>
										<?php endif; ?>
										<h4 class="preaching-item__title">
											<a href="<?php echo esc_url( get_permalink() ); ?>">
												<?php echo get_the_title(); ?>
											</a>
										</h4>
									</div>
								<?php endif; $i++; endforeach;	wp_reset_postdata(); ?>
						</div>
					</div>
					<div id="word-item_lecture" class="word-item">
						<?php 
							$dmz_abbot_word_post = get_posts( [

								'post_type' => 'abbot-word',
								'tax_query' 		=> [
									[
										'taxonomy' 	=> 'abbot-word-category',
										'field'    	=> 'slug',
										'terms'    	=> 'literaturnye-besedy',
									]
								],
								'numberposts' => 10, 

							] );
								$i = 0;
								foreach( $dmz_abbot_word_post as $post ):	setup_postdata( $post );
								$image_url = dmz_get_meta( 'foto_min_abbot-word' );
								if( $i == 0 ): ?>
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
													<a class="preaching-image__links preaching-image__links_video" href="<?php echo esc_url( dmz_get_meta( 'word_abbot-word' ) ); ?>" data-fancybox>
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
								<div class="preaching-slider">
								<?php else: ?>
							
									<div class="preaching-item">
										<span class="preaching-item__date">
											<?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?>
										</span>
										<?php if( dmz_get_meta( 'word_abbot-word' ) ): ?>
											<a class="preaching-item__video" href="<?php echo esc_url( dmz_get_meta( 'word_abbot-word' ) ); ?>" data-fancybox>
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/></svg>
											</a>
										<?php endif; ?>
										<h4 class="preaching-item__title">
											<a href="<?php echo esc_url( get_permalink() ); ?>">
												<?php echo get_the_title(); ?>
											</a>
										</h4>
									</div>
								<?php endif; $i++; endforeach;	wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php endif;

            $dmz_posts = new WP_Query( [

                'post_type'			=> 'club',
                'posts_per_page'	=> 10,

            ] );
            if( dmz_get_meta( 'on_of_uncos' ) === 'enable' && $dmz_posts ): ?>

            <section class="uncos" id="uncos">
                <div class="container">
                    <h2 class="uncos-title">
                       <?php pll_e( 'Клуб «О православии с интересом»' ); ?>
                        <img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
                    </h2>
                    <div class="uncos-block d-flex">
                    <?php
                            if( $dmz_posts->have_posts() ) : while ( $dmz_posts->have_posts() ) : $dmz_posts-> the_post();								?>

                                <div class="preaching-card">
                                    <a class="preaching-card__image" href="<?php echo esc_url( get_permalink() ); ?>">
                                    <?php if( get_the_post_thumbnail_url( $post->ID,'min_news' ) ): ?>
                                        <img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID,'min_news' ) ); ?>" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    </a>
                                    <h4 class="preaching-card__title">
                                        <a href="<?php echo esc_url( get_permalink() ); ?>">
                                            <?php echo get_the_title(); ?>
                                        </a>
                                    </h4>
                                    <p class="preaching-card__desc">
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                    <div class="preaching-card__wrapper">
                                        <div class="preaching-card__stat">
                                            <span class="preaching-card__see">
                                            <img src="<?php echo esc_url( $dmz_link_assets . '/img/view.svg' ); ?>" alt="View">
                                                <?php
                                                    $dmz_views = get_post_meta( $post->ID, 'views', true );
                                                    echo ( $dmz_views ) ? $dmz_views : '0'; ?>
                                            </span>
                                            <span class="preaching-card__comment">
                                                <img src="<?php echo esc_url( $dmz_link_assets . '/img/comm.svg' ); ?>" alt="Comment">
                                                <?php comments_number( '0', '1', '%' ); ?>
                                            </span>
                                        </div>
                                        <a class="preaching-card__link" href="<?php echo esc_url( get_permalink() ); ?>">
                                            <?php pll_e( 'подробнее' ); ?>
                                        </a>
                                    </div>
                                </div>

                                <?php endwhile; endif; wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <a class="section-link" href="<?php
                        $lang_check = get_language_attributes();
                        echo ( $lang_check == 'lang="ru-RU"' ) ? get_home_url( null, 'ru/club/' ) : get_home_url( null, 'uk/club/' ); ?>">
                        <?php pll_e( 'читать больше' ); ?>
                    </a>
                </div>
            </section>

	<?php endif;
		if( dmz_get_meta('on_of_abbot') === 'enable' ): ?>

		<section class="abbot" id="abbot">
		  <div class="container">
			 <h2 class="abbot-title"><?php pll_e( 'О Настоятеле храма' ); ?><img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator"></h2>
			 <div class="abbot-item d-flex justify-center">
				<form id="abbot-form" class="abbot-form">
					<h3 class="abbot-form__title"><?php pll_e( 'Задать вопрос настоятелю' ); ?></h3>
					<div class="abbot-form__input-wrap">
						<input class="abbot-form__input" type="text" name="name" required placeholder="<?php pll_e( 'Ваше имя' ); ?>">
					</div>
					<div class="abbot-form__input-wrap">
						<input class="abbot-form__input" type="email" name="email" placeholder="<?php pll_e( 'Для ответа на почту укажите e-mail' ); ?>">
					</div>
					<textarea name="massage" style="resize: none;" placeholder="<?php pll_e( 'Ваш вопрос' ); ?>"></textarea>
					<span class="btn-wraper d-flex justify-between">
						<div class="g-recaptcha" data-sitekey="6LcVm8gaAAAAAKwnZuMeyf5wTm1pO7mctxLna45B"></div>
						<input class="btn" type="submit" value="<?php pll_e( 'Отправить' ); ?>">
					</span>
					<div class="loader-tnx">
						<span class="loader">
								<img src="<?php echo esc_url( $dmz_link_assets . '/img/three-dots.svg' ); ?>" alt="Loader">
						</span>
						<span class="tnx">
							<?php pll_e( 'Спасибо, сообщение отправленно.' ); ?>
						</span>
						<span class="error-re">
							<?php pll_e( 'Ошибка. Вы не прошли проверку reCaptcha' ); ?>
						</span>
					</div>
				</form>
				<div class="abbot-info">
					<div class="abbot-info__image"><img class="img-fluid" src="<?php echo esc_url( $dmz_link_assets . '/img/batushka.jpg' ); ?>" alt="Настоятель"></div>
					<h3 class="abbot-info__name"><?php pll_e( '<span>Протоиерей</span>Владимир Юрьевич Корецкий' ); ?></h3>
					<p class="abbot-info__txt">
					<?php pll_e('В 1996-ом, Господь призвал на служение в священном сане.<br>4 августа был рукоположен Преосвященнейшим Епископом Тульчинским и Брацлавским Иннокентием. Служение начал в Тульчинской епархии. В 2009-м г. по возвращении в Одессу получил указ Высокопреосвященнейшего Митрополита Одесского и Измаильского Агафангела на настоятельство в храме равноапостольных Мефодия и Кирилла.'); ?>

						<a class="abbot-info__link" href="<?php
							$lang_check = get_language_attributes();
							echo ( $lang_check == 'lang="ru-RU"' ) ? get_home_url( null, 'ru/clergy/vladimir-jurevich-koreckij/' ) : get_home_url( null, 'uk/clergy/volodimir-jurjovich-koreckij/' ); ?>">
							<?php pll_e( 'читать больше' ); ?>
						</a>
					</p>
				</div>
			 </div>

			<?php if( dmz_get_meta( 'on_of_answers' ) === 'enable' ): ?>

				<div class="answers">
					<h3 class="answers-title">
						<?php pll_e( 'Ответы на Вопросы' ); ?>
						<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
					</h3>
					<div class="answers-item">

					<?php $dmz_answers_post = get_posts( [

							'post_type'		=> 'answers',
							'numberposts'	=> 3,

						] );

					foreach( $dmz_answers_post as $post ):	setup_postdata( $post );?>
					
						<div class="answers-info"><span class="answers-info__close">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3l-137.4 137.4c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25C368.4 348.9 360.2 352 352 352z"/></svg>
						</span>
							<div class="answers-info__question">
							<span class="answers-info__user-name"><?php the_title(); ?></span>
								<?php echo dmz_get_meta( 'form_question' ); ?> 
							</div>
							<div class="answers-info__answer">
								<span><?php pll_e( 'Ответ настоятеля:' ); ?></span>
								<?php echo wp_kses_post( dmz_get_meta( 'form_answer' ) ); ?>
							</div>
						</div>

			<?php endforeach; wp_reset_postdata(); ?>
				</div>
					</div>
					<a class="section-link load-more" href="#" data-offset="3" data-posts="<?php 
						$lang_check = get_language_attributes(); 
						echo ( $lang_check == 'lang="ru-RU"' ) ? pll_count_posts( 'ru', ['post_type'=>'answers'] ) : pll_count_posts( 'uk', ['post_type'=>'answers'] ); ?>">
						<span>
							<?php pll_e( 'читать больше' ); ?>
						</span>
					</a>
			<?php  endif; ?>
		  		</div>
		</section>
		
	<?php endif;

			$dmz_gallery_post = get_posts( [ 
				'post_type' => 'gallery',
				'include'	=> 46
				] );

			if( dmz_get_meta( 'on_of_gallery' ) === 'enable' && $dmz_gallery_post ): ?>
			
		<section class="gallery">
		  <div class="container-fluid">
			 <h2 class="insta-title">
				Фотогалерея
				<img src="<?php echo esc_url( $dmz_link_assets . '/img/separator.png' ); ?>" alt="Separator">
			 </h2>

			<?php foreach( $dmz_gallery_post as $post ):	setup_postdata( $post );

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

				<a class="section-link section-link_gallery" href="<?php
					$lang_check = get_language_attributes();
					echo ( $lang_check == 'lang="ru-RU"' ) ? get_home_url( null, 'ru/gallery/' ) : get_home_url( null, '' ); ?>">
					<?php pll_e( 'перейти в архив' ); ?>
				</a>

		  </div>
		</section>
		<?php endif; ?>		
</main>
<?php
	get_footer();
