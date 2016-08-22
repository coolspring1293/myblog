<?php
/**
 * Theme functions file which contains global functions of the theme
 * @package TheFour Lite
 */

// Load theme files
require get_template_directory() . '/inc/media.php';
require get_template_directory() . '/inc/header.php';
require get_template_directory() . '/inc/customizer/customizer.php';
new TheFour_Customizer;

// Load file for the frontend only
if ( ! is_admin() )
{
	require get_template_directory() . '/inc/template-tags.php';
}

add_action( 'after_setup_theme', 'thefour_setup' );

/**
 * Setup theme
 */
function thefour_setup()
{
	// Theme features
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-formats', array( 'aside', 'quote', 'video', 'audio' ) );
	add_theme_support( 'custom-header', array(
		'width'         => 1920,
		'height'        => 500,
		'uploads'       => true,
		'default-image' => get_template_directory_uri() . '/img/header.jpg',
		'header-text'   => false,
	) );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'thefour-list-thumbnail', 760, 0 );
	add_image_size( 'thefour-grid-thumbnail', 348, 0 );

	// Custom theme features
	add_theme_support( 'thefour-social-buttons' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'thefour-lite' ),
		'social'  => __( 'Social Links Menu', 'thefour-lite' ),
	) );

	// Make the theme translation ready
	load_theme_textdomain( 'thefour-lite', get_template_directory() . '/lang' );
}

add_action( 'widgets_init', 'thefour_register_sidebars' );

/**
 * Register theme sidebars.
 */
function thefour_register_sidebars()
{
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'thefour-lite' ),
		'id'            => 'primary',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebars( 4, array(
		'name'          => __( 'Footer %d', 'thefour-lite' ),
		'id'            => 'footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function content_width() {
	$GLOBALS['content_width'] = apply_filters( 'content_width', 760 );
}
add_action( 'after_setup_theme', 'content_width', 0 );

/**
 * Get theme default settings.
 * @param string $name
 * @return mixed
 */
function thefour_default_setting( $name )
{
	$defaults = array(
		'front_page_blog_title'    => __( 'Latest Updates', 'thefour-lite' ),
		'front_page_blog_tag'      => _x( 'front-page', 'Front end default tag slug for featured blog posts', 'thefour-lite' ),
		'front_page_blog_hide_tag' => true,
	);
	return isset( $defaults[$name] ) ? $defaults[$name] : false;
}

/**
 * Get theme settings.
 * @param string $name
 * @return mixed
 */
function thefour_setting( $name )
{
	return get_theme_mod( $name, thefour_default_setting( $name ) );
}
