<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area panel">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				_n(
					'"%2$s" has 1 comment',
					'"%2$s" has %1$s comments',
					get_comments_number(),
					'lumine'
				),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 32,
			) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'lumine' ); ?></h1>
				<div class="comment-nav">
					<div class="comment-nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'lumine' ) ); ?></div>
					<div class="comment-nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'lumine' ) ); ?></div>
				</div>
			</nav>
		<?php endif;?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'lumine' ); ?></p>
		<?php endif; ?>

	<?php endif;?>

	<?php comment_form(); ?>

</div>
