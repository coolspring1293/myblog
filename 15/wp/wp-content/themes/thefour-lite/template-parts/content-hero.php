<?php echo thefour_entry_meta_element( 'published_date' ); ?>
<h1 class="entry-title"><?php the_title(); ?></h1>
<?php
/**
 * Checks to see if the author has a Gravatar image.
 * @link https://tommcfarlin.com/check-if-a-user-has-a-gravatar/
 */
$author_email = get_the_author_meta( 'user_email' );
$url          = 'http://www.gravatar.com/avatar/' . md5( strtolower( trim( $author_email ) ) ) . '?d=404';
$headers      = @get_headers( $url );

// Only show author Gravatar if available
$has_avatar = preg_match( '|200|', $headers[0] );
?>
<p class="entry-meta<?php echo $has_avatar ? '' : ' no-avatar'; ?>">
	<?php
	echo $has_avatar ? get_avatar( $author_email, 32 ) : '';
	printf(
		__( 'by %s &mdash; in %s.', 'thefour-lite' ),
		thefour_entry_meta_element( 'author' ),
		get_the_category_list( ', ' )
	);
	comments_popup_link(
		__( 'No comment.', 'thefour-lite' ),
		__( '1 Comment.', 'thefour-lite' ),
		__( '% Comments.', 'thefour-lite' ),
		'comments-link',
		__( 'Comments are closed.', 'thefour-lite' )
	);

	/**
	 * Display social sharing buttons for single posts.
	 * For developers: you can remove these social buttons (if you want to use another plugin) by using the code:
	 * remove_theme_support( 'thefour-social-buttons' )
	 */
	if ( current_theme_supports( 'thefour-social-buttons' ) )
	{
		require_once get_template_directory() . '/inc/social-buttons.php';
		$social_buttons = new TheFour_Social_Buttons;
		$social_buttons->render();
	}
	?>
</p>
