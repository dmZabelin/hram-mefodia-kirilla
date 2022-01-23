<?php

if ( post_password_required() ) {
	return;
}

?>

<div id="comments" class="comments-area">

		<ul class="comment-list">
			<?php
				wp_list_comments(
					[
						'style'      => 'ul',
						'short_ping' => true,
					]
				);
			?>
		</ul>

		<?php if ( ! comments_open() ) : ?>
			
				<p class="no-comments">
					<?php esc_html_e( 'Комментарии закрыты', 'dmz_hram_site' ); ?>
				</p>

			<?php endif;

		comment_form(); ?>

</div>
