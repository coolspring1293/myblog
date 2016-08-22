<?php
/**
 * The main theme file which handles all media files in themes
 * @package TheFour
 */

add_action( 'wp_enqueue_scripts', 'thefour_enqueue_scripts' );

/**
 * Enqueue scripts and styles
 */
function thefour_enqueue_scripts()
{
	wp_enqueue_style( 'thefour-fonts', thefour_google_fonts_url() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', '', '4.5.0' );

	/**
	 * Always load theme's style and allow child theme to add more style via style.css.
	 * @link http://justintadlock.com/archives/2014/11/03/loading-parent-styles-for-child-themes
	 */
	if ( is_child_theme() )
	{
		wp_enqueue_style( 'parent-style', trailingslashit( get_template_directory_uri() ) . 'style.css' );
	}
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'thefour-lite', get_template_directory_uri() . '/js/thefour.js', array( 'jquery' ), wp_get_theme( 'thefour-lite' )->version, true );

	// Comment threaded script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	{
		wp_enqueue_script( 'comment-reply' );
	}

	// Javascript for filtering portfolio items
	if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'portfolio-type' ) || ( is_front_page() && ! is_home() ) )
	{
		wp_enqueue_script( 'jquery-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ), '2.2.2', true );
		wp_enqueue_script( 'thefour-portfolio', get_template_directory_uri() . '/js/portfolio.js', array( 'jquery-isotope' ), wp_get_theme( 'thefour-lite' )->version, true );
	}
}

add_action( 'init', 'thefour_add_editor_styles' );

/**
 * Add editor style
 */
function thefour_add_editor_styles()
{
	add_editor_style( array( 'css/editor-style.css', thefour_google_fonts_url(), get_template_directory_uri() . '/css/font-awesome.min.css' ) );
}

/**
 * Get Google Fonts URL
 * @return string
 */
function thefour_google_fonts_url()
{
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'thefour-lite' ) )
	{
		$fonts[] = 'Lato:300,400,300italic,400italic';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Montserrat, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'thefour-lite' ) )
	{
		$fonts[] = 'Montserrat:400';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'thefour-lite' );

	if ( 'cyrillic' == $subset )
	{
		$subsets .= ',cyrillic,cyrillic-ext';
	}
	elseif ( 'greek' == $subset )
	{
		$subsets .= ',greek,greek-ext';
	}
	elseif ( 'devanagari' == $subset )
	{
		$subsets .= ',devanagari';
	}
	elseif ( 'vietnamese' == $subset )
	{
		$subsets .= ',vietnamese';
	}

	if ( $fonts )
	{
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
