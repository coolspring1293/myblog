<?php
/**
 * This file handles the content in the header, including hero image and hero content.
 * It uses filters to change the hero image and hero content per page.
 *
 * @package TheFour Lite
 */

add_filter( 'theme_mod_header_image', 'thefour_header_image' );

/**
 * Set featured image of singular post or page as header image.
 * Also setup the default header image if it's missed.
 * @param string $image Header image source
 * @return string
 */
function thefour_header_image( $image )
{
	// Set featured image of singular post or page as header image.
	if ( is_singular() && has_post_thumbnail() )
	{
		$thumbnail_id = get_post_thumbnail_id();
		list( $image ) = wp_get_attachment_image_src( $thumbnail_id, 'full' );
	}

	// Setup the default header image
	if ( empty( $image ) || 'remove-header' == $image )
	{
		$image = get_template_directory_uri() . '/img/header.jpg';
	}
	return $image;
}

add_filter( 'theme_mod_hero_content', 'thefour_hero_content' );

/**
 * Change the hero content in single post or page to display post title and post meta
 * @param string $hero_content Hero content
 * @return string
 */
function thefour_hero_content( $hero_content )
{
	// Set hero content for default homepage (showing latest posts) in the Customizer
	if ( is_front_page() && is_home() )
	{
		return $hero_content;
	}

	$content = '';

	// Static front page: show the content before more tag if there's a more tag
	if ( is_front_page() )
	{
		$page_content = get_post_field( 'post_content', null );
		$page_content = get_extended( $page_content );
		if ( ! empty( $page_content['main'] ) && ! empty( $page_content['extended'] ) )
		{
			$content = $page_content['main'];
			$content = do_shortcode( $content );
		}
	}
	// Static blog page: show page content
	elseif ( is_home() )
	{
		$content = get_post_field( 'post_content', get_option( 'page_for_posts' ) );
		// Can use with or without more tag.
		// If more tag is used: use content before more tag. Otherwise use whole content.
		$content = get_extended( $content );
		$content = do_shortcode( $content['main'] );
	}
	// Page: show the content before more tag if there's a more tag, otherwise show title
	elseif ( is_page() )
	{
		$page_content = get_post_field( 'post_content', null );
		$page_content = get_extended( $page_content );
		if ( ! empty( $page_content['main'] ) && ! empty( $page_content['extended'] ) )
		{
			$content = $page_content['main'];
			$content = do_shortcode( $content );
		}
		else
		{
			$content = '<h1 class="entry-title">' . get_the_title() . '</h1>';
		}
	}
	elseif ( is_single() )
	{
		ob_start();
		get_template_part( 'template-parts/content', 'hero' );
		$content = ob_get_clean();
	}
	elseif ( is_search() )
	{
		global $wp_query;
		$content = '<h2 class="site-title">';
		$content .= sprintf( __( 'Search results: "%s"', 'thefour-lite' ), esc_html( get_search_query() ) );
		$paged = max( 1, get_query_var( 'paged' ) );
		if ( 1 < $wp_query->max_num_pages )
		{
			$content .= sprintf( __( '(page %s of %s)', 'thefour-lite' ), $paged, $wp_query->max_num_pages );
		}
	}
	elseif ( is_category() || is_archive() )
	{
		ob_start();
		get_template_part( 'template-parts/content', 'category' );
		$content = ob_get_clean();
	}
	elseif ( is_404() )
	{
		ob_start();
		get_template_part( 'template-parts/content', 'error-404' );
		$content = ob_get_clean();
	}

	return $content ? $content : $hero_content;
}
