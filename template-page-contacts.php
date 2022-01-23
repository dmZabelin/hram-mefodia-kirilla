<?php
/**
* *Template Name: Страница контактов
*
*@package dmz_hram_site
*
*/
get_header(); ?>

<main class="main">
		<section class="contacts d-flex justify-center" id="contacts">
			<div class="contacts-info">
				<div class="contacts-info-wrapper">
					<?php if( dmz_get_meta( 'contacts_address' ) ): ?>
						<div class="contacts-info-location">
							<p class="contacts-info-title"><?php pll_e( 'Месторасположение' ); ?></p>
							<div class="location-wrapper d-flex align-i-center"><i class="fas fa-map-marker-alt"></i>
								<div class="address">
									<?php echo dmz_wp_kses( dmz_get_meta( 'contacts_address' ) ); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php 
						$dmz_phone_one = dmz_get_meta( 'contacts_mobile' );
						$dmz_phone_two = dmz_get_meta( 'contacts_city' );
						if( $dmz_phone_one  || $dmz_phone_two ): ?>
							<div class="contacts-info-phones">
								<p class="contacts-info-title"><?php pll_e( 'Телефоны храма' ); ?></p>
								<div class="phones-wrapper d-flex align-i-center">
									<i class="fas fa-phone-alt"></i>
									<div class="link-wrapper">
										<a class="contacts-info-link" href="<?php echo esc_attr( dmz_phone_clear( $dmz_phone_one ) ); ?>">
											<?php echo dmz_wp_kses( $dmz_phone_one ); ?>
										</a>
										<a class="contacts-info-link" href="<?php echo esc_attr( dmz_phone_clear( $dmz_phone_two ) ); ?>">
											<?php echo dmz_wp_kses( $dmz_phone_two ); ?>
										</a>
									</div>
								</div>
							</div>
					<?php endif; ?>
					<?php if( dmz_get_meta( 'contacts_mail' ) ): ?>
						<div class="contacts-info-mail">
							<p class="contacts-info-title">e-mail</p>
							<div class="mail-wrapper d-flex align-i-center">
								<i class="fas fa-envelope"></i>
								<a	class="contacts-info-link" href="mailto:<?php echo esc_attr( dmz_get_meta( 'contacts_mail' ) ); ?>">
									<?php echo esc_html( dmz_get_meta( 'contacts_mail' ) ); ?>
								</a>
							</div>
						</div>
					<?php endif; ?>
					<?php if( dmz_get_meta( 'contacts_instagram' ) || dmz_get_meta( 'contacts_fasebook' ) || dmz_get_meta( 'contacts_youtube' ) ): ?>
						<div class="contacts-info-social">
							<p class="contacts-info-title"><?php pll_e( 'Социальные сети' ); ?></p>
							<div class="link-wrapper d-flex">
							<?php if( dmz_get_meta( 'contacts_instagram' ) ): ?>
								<a class="contacts-info-link" href="<?php echo esc_url( dmz_get_meta( 'contacts_instagram' ) ); ?>" target="_blank">
									<i class="fab fa-instagram"></i>
									<span>Instagram</span>
								</a>
							<?php endif; if( dmz_get_meta( 'contacts_fasebook' ) ):?>
								<a class="contacts-info-link" href="<?php echo esc_url( dmz_get_meta( 'contacts_fasebook' ) ); ?>" target="_blank">
									<i class="fab fa-facebook-f"></i>
									<span>Facebook</span>
								</a>
							<?php endif; if( dmz_get_meta( 'contacts_youtube' ) ): ?>
								<a class="contacts-info-link"	href="<?php echo esc_url( dmz_get_meta( 'contacts_youtube' ) ); ?>" target="_blank">
									<i class="fab fa-youtube"></i>
									<span>Youtube</span>
								</a>
							<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<div class="contacts-info-time">
						<p class="contacts-info-title"><?php pll_e( 'Двери храма открыты для всех' ); ?></p>
						<div class="time-wrapper d-flex align-i-center"><i class="fas fa-clock"></i><span><?php pll_e( 'ежедневно' ); ?><br>с 08:00 до 17:00</span></div>
					</div>
				</div>
			</div>
			<div class="map-wrapper">
				<?php echo do_shortcode( '[dmz_google_map lat="46.4782374" zoom="18" long="30.7214801" width="100%" height="100%"]' ); ?>
			</div>
		</section>
	</main>

<?php
	get_footer();
