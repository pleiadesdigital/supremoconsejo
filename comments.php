<?php //The template for displaying comments ?>

<?php
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php	if (have_comments()) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ('1' === $comments_number) {
					printf(_x('One Reply to &ldquo;%s&rdquo;', 'comments title', 'pleiades17'), get_the_title());
				} else {
					printf(
						_nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'%1$s Replies to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'pleiades17'
						),
						number_format_i18n($comments_number),
						get_the_title()
					);
				}
			?>
		</h2>
		<ol class="comment-list">
			<?php
				wp_list_comments(array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => pleiades17_get_svg(array('icon' => 'mail-reply') ) . __('Reply', 'pleiades17'),
				));
			?>
		</ol>
		<?php the_comments_pagination(array(
			'prev_text' => pleiades17_get_svg(array('icon' => 'arrow-left')) . '<span class="screen-reader-text">' . __('Previous', 'pleiades17') . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __('Next', 'pleiades17') . '</span>' . pleiades17_get_svg( array('icon' => 'arrow-right')),
		) );
	endif;

	if (!comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments')) : ?>
		<p class="no-comments"><?php _e('Comments are closed.', 'pleiades17'); ?></p>
	<?php
	endif;
	
	comment_form();
	?>

</div><!-- #comments -->
