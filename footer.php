<?php
/**
 * Шаблон для отображения футера
 *
 * Содержит закрывающие теги  div.wrapper, body, html
 *
 * @package dmz_hram_site
 */
$dmz_link_assets = DMZ_URL_ASSETS;
?>

			<footer class="footer">
				<p>
					&copy; <?php pll_e( 'Храм святых равноапостольных Кирилла и Мефодия' ); ?>
				</p>
				<div class="dmz d-flex">
					<span> 
						<?php pll_e( 'Cайт разработан:' ); ?> 
					</span>
					<a href="https://dmz.name" target="_blank">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-dm.zabelin.svg' ); ?>" alt="Logo dm-zabelin">
					</a>
				</div>
			</footer>
			<div style="display: none;" id="prayer-modal" class="prayer-modal">
				<form id="prayer-form" class="prayer-form">
					<h3 class="prayer-form__title">Про</h3>
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
			</div>

			<?php 
				get_template_part( 'snippets/mobile-menu' ); 
				wp_footer(); 
			?>

		</div>
	</body>
</html>