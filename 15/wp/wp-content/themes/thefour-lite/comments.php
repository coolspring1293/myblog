<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package TheFour Lite
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
{
	return;
}
?>

<?php if ( have_comments() ) : ?>

	<div class="comments" id="comments">

		<h2 class="comments-title">
			<?php echo get_comments_number_text( false, __( '1 Comment', 'thefour-lite' ), __( '% Comments', 'thefour-lite' ) ); ?>
		</h2>
		<ol class="commentlist">
			<?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'thefour_comment' ) ); ?>
		</ol>

		<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>
			<div class="pingbacks">
				<div class="pingbacks-inner">
					<h3 class="pingbacks-title">
						<?php echo count( $comments_by_type['pings'] ) . ' ';
						echo _n( 'Pingback', 'Pingbacks', count( $comments_by_type['pings'] ), 'thefour-lite' ); ?>
					</h3>
					<ol class="pingbacklist">
						<?php wp_list_comments( array( 'type' => 'pings', 'callback' => 'thefour_comment' ) ); ?>
					</ol>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'thefour-lite' ); ?></h2>
				<div class="nav-links clearfix">
					<?php
					if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'thefour-lite' ) ) ) :
						printf( '<div class="nav-previous">&laquo; %s</div>', $prev_link );
					endif;

					if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'thefour-lite' ) ) ) :
						printf( '<div class="nav-next">%s &raquo;</div>', $next_link );
					endif;
					?>
				</div>
			</nav>
		<?php endif; ?>

	</div><!-- .comments -->

<?php endif; ?>

<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'thefour-lite' ); ?></p>
<?php endif; ?>

<?php
// Show comment form
$commenter = wp_get_current_commenter();
comment_form( array(
	'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', 'thefour-lite' ) . '</p>',
	'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="6" required></textarea></p>',
	'fields'               => array(
		'author' => '<p><input type="text" id="author" name="author" placeholder="' . esc_attr__( 'Name', 'thefour-lite' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"></p>',
		'email'  => '<p><input type="text" id="email" name="email" placeholder="' . esc_attr__( 'Email', 'thefour-lite' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"></p>',
		'url'    => '<p><input type="text" id="url" name="url" placeholder="' . esc_attr__( 'Website', 'thefour-lite' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"></p>'
	),
) );
