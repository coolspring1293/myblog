<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

	<div id="comment-<?php comment_ID(); ?>" class="comment">

		<div class="comment-meta comment-author vcard">

			<?php echo get_avatar( $comment, 120 ); ?>

			<div class="comment-meta-content">

				<?php
				printf( '<cite class="fn">%1$s %2$s</cite>',
					get_comment_author_link(),
					( $comment->user_id === $post->post_author ) ? '<span class="post-author"> ' . __( '(Post author)', 'thefour-lite' ) . '</span>' : ''
				);
				?>

				<p>
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php echo get_comment_date() . ' at ' . get_comment_time() ?></a>
				</p>

			</div>

		</div>

		<div class="comment-content">

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Awaiting moderation', 'thefour-lite' ); ?></p>
			<?php endif; ?>

			<?php comment_text(); ?>

			<div class="comment-actions">

				<?php edit_comment_link( __( 'Edit', 'thefour-lite' ), '', '' ); ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'thefour-lite' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>

		</div>

	</div>
