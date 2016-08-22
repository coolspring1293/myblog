<?php
/**
 * Custom template tags for the frontend
 * @package TheFour Lite
 */

add_filter( 'excerpt_more', 'thefour_excerpt_more' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function thefour_excerpt_more()
{
	$text = sprintf( __( 'Continue reading &raquo; %s', 'thefour-lite' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' );
	$more = sprintf( '&hellip; <p><a href="%s" class="more-link">%s</a></p>', esc_url( get_permalink() ), $text );
	return $more;
}

add_filter( 'the_content_more_link', 'thefour_content_more' );

/**
 * Auto add more links.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function thefour_content_more()
{
	$text = sprintf( __( 'Continue reading &raquo; %s', 'thefour-lite' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' );
	$more = sprintf( '<p><a href="%s#more-%d" class="more-link">%s</a></p>', esc_url( get_permalink() ), get_the_ID(), $text );
	return $more;
}

add_filter( 'excerpt_length', 'thefour_excerpt_length' );

/**
 * Change Excerpt length
 *
 * @param $length
 * @return int
 */
function thefour_excerpt_length( $length )
{
	return 25;
}

/**
 * Display meta element for posts.
 * @param string $name Element name.
 * @return string
 */
function thefour_entry_meta_element( $name = '' )
{
	switch ( $name )
	{
		case 'published_date':
			$output = sprintf(
				'<time class="entry-date published" datetime="%s">%s</time>',
				esc_attr( get_the_time( 'c' ) ),
				esc_html( get_the_time( get_option( 'date_format' ) ) )
			);
			break;
		case 'author':
			$author_url = get_user_meta( get_the_author_meta( 'ID' ), 'googleplus', true );
			if ( ! $author_url )
			{
				$author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
			}
			$output = sprintf(
				'<span class="byline"><span class="author vcard"><a class="url fn n" href="%s" title="%s" rel="author">%s</a></span></span>',
				esc_url( $author_url ),
				esc_attr( sprintf( __( 'View all posts by %s', 'thefour-lite' ), get_the_author() ) ),
				get_the_author()
			);
			break;
		default:
			$output = '';
	}
	return $output;
}

/**
 * Get posts for front page.
 * Posts are tagged with specific tag in the Customizer.
 */
function thefour_get_front_page_posts()
{
	// Get post IDs from the cache.
	$post_ids = get_transient( 'thefour_blog_post_ids' );
	if ( false === $post_ids )
	{
		$post_ids = array();
		$term     = get_term_by( 'name', thefour_setting( 'front_page_blog_tag' ), 'post_tag' );
		if ( $term && ! is_wp_error( $term ) )
		{
			// Query for featured posts.
			$post_ids = get_posts( array(
				'fields'           => 'ids',
				'numberposts'      => 6,
				'suppress_filters' => false,
				'tax_query'        => array(
					array(
						'field'    => 'term_id',
						'taxonomy' => 'post_tag',
						'terms'    => $term->term_id,
					),
				),
			) );
		}
		$post_ids = array_map( 'absint', $post_ids );
		set_transient( 'thefour_blog_post_ids', $post_ids );
	}

	$args = array(
		'posts_per_page' => 6,
	);
	if ( $post_ids )
	{
		$args['include'] = $post_ids;
	}
	return get_posts( $args );
}

/**
 * Callback function to display comments, pingbacks and trackbacks.
 * This function loads template files 'template-parts/comment-$type.php'.
 *
 * @link http://wptheming.com/2014/07/altering-comment-markup/
 * @link https://github.com/justintadlock/hybrid-core/blob/master/inc/template-comments.php
 *
 * @param object $comment Comment object
 * @param array  $args    Comment arguments
 * @param int    $depth   Comment depth
 */
function thefour_comment( $comment, $args, $depth )
{
	$GLOBALS['comment'] = $comment;
	$post               = get_post();

	$comment_type = get_comment_type( $comment->comment_ID );
	$templates    = array( "template-parts/comment-$comment_type.php" );
	// If the comment type is a 'pingback' or 'trackback', allow the use of 'comment-ping.php'.
	if ( 'pingback' == $comment_type || 'trackback' == $comment_type )
	{
		$templates[] = 'template-parts/comment-ping.php';
	}
	// Add the fallback 'comment.php' template.
	$templates[] = 'template-parts/comment.php';

	require( locate_template( $templates ) );
}
