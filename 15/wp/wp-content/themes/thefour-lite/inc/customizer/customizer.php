<?php

/**
 * Register theme options in the Customizer
 * @package TheFour
 */
class TheFour_Customizer
{
	/**
	 * Add hooks for customizer
	 */
	public function __construct()
	{
		add_action( 'customize_register', array( $this, 'register' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue' ) );

		// Add body class to change the appearance according to the theme options
		add_filter( 'body_class', array( $this, 'body_class' ) );

		add_action( 'wp_loaded', array( $this, 'wp_loaded' ) );
		add_action( 'switch_theme', array( $this, 'delete_transient' ) );
		add_action( 'save_post', array( $this, 'delete_transient' ) );
	}

	/**
	 * Hide "front-page" tag from the front-end.
	 * Has to run on wp_loaded so that the preview filters of the Customizer have a chance to alter the value.
	 */
	public function wp_loaded()
	{
		if ( thefour_setting( 'front_page_blog_hide_tag' ) )
		{
			add_filter( 'get_terms', array( $this, 'hide_blog_tag' ), 10, 3 );
			add_filter( 'get_the_terms', array( $this, 'hide_the_blog_tag' ), 10, 3 );
		}
	}

	/**
	 * Delete front page blog post ids transient.
	 * Hooks in the "save_post" action.
	 */
	public static function delete_transient()
	{
		delete_transient( 'thefour_blog_post_ids' );
	}

	/**
	 * Register customizer settings
	 * @param WP_Customize_Manager $wp_customize WordPress customizer manager instance
	 */
	public function register( WP_Customize_Manager $wp_customize )
	{
		require_once get_template_directory() . '/inc/customizer/control-custom-content.php';
		require_once get_template_directory() . '/inc/customizer/sanitizer.php';

		$sanitizer = new TheFour_Customize_Sanitizer;

		// Theme option sections
		$wp_customize->add_section( 'header', array(
			'title' => __( 'Header', 'thefour-lite' ),
		) );

		// Remove default WordPress header image section and move that settings into theme's Header section
		$wp_customize->remove_section( 'header_image' );
		$wp_customize->get_control( 'header_image' )->section = 'header';

		// Topbar
		$wp_customize->add_setting( 'topbar_heading', array(
			'sanitize_callback' => array( $sanitizer, 'html' ),
		) );
		$wp_customize->add_control( new TheFour_Customize_Control_Custom_Content( $wp_customize, 'topbar_heading', array(
			'section'     => 'header',
			'content'     => '<hr><h4>' . __( 'Topbar', 'thefour-lite' ) . '</h4>',
			'description' => __( 'The topbar is displayed above the header image and navbar only displayed only if either topbar text is entered below or the Social Links Menu location has menu (see Menus panel in the Customizer).', 'thefour-lite' ),
		) ) );

		// Topbar text
		$wp_customize->add_setting( 'topbar_text', array(
			'sanitize_callback' => array( $sanitizer, 'html' ),
		) );
		$wp_customize->add_control( 'topbar_text', array(
			'label'       => __( 'Topbar text', 'thefour-lite' ),
			'section'     => 'header',
			'settings'    => 'topbar_text',
			'type'        => 'textarea',
			'description' => __( 'This text will be displayed on the left of the topbar. HTML is allowed.', 'thefour-lite' ),
		) );

		// Navbar position
		$wp_customize->add_setting( 'navbar_position', array(
			'sanitize_callback' => array( $sanitizer, 'select' ),
		) );
		$wp_customize->add_control( 'navbar_position', array(
			'label'   => __( 'Navbar position', 'thefour-lite' ),
			'section' => 'header',
			'type'    => 'select',
			'choices' => array(
				'overlay' => __( 'Overlay the header image', 'thefour-lite' ),
				'above'   => __( 'Above the header image', 'thefour-lite' ),
				'below'   => __( 'Below the header image', 'thefour-lite' ),
			),
		) );

		// Navbar fixed to top?
		$wp_customize->add_setting( 'navbar_fixed', array(
			'sanitize_callback' => array( $sanitizer, 'checkbox' ),
		) );
		$wp_customize->add_control( 'navbar_fixed', array(
			'label'   => __( 'Navbar fixed to top when scroll?', 'thefour-lite' ),
			'section' => 'header',
			'type'    => 'checkbox',
		) );

		// Logo
		$wp_customize->add_setting( 'logo', array(
			'sanitize_callback' => array( $sanitizer, 'image' ),
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'logo',
			array(
				'label'       => __( 'Logo', 'thefour-lite' ),
				'section'     => 'header',
				'settings'    => 'logo',
				'description' => __( 'The logo will be displayed on the left of the navbar. If no logo is selected, the website title will be displayed.', 'thefour-lite' ),
			)
		) );

		// Blog section.
		$wp_customize->add_setting( 'front_page_blog_title', array(
			'default'           => thefour_default_setting( 'front_page_blog_title' ),
			'sanitize_callback' => array( $sanitizer, 'text' ),

		) );
		$wp_customize->add_control( 'front_page_blog_title', array(
			'label'           => __( 'Blog section title', 'thefour-lite' ),
			'section'         => 'static_front_page',
			'type'            => 'text',
			'active_callback' => array( $this, 'is_page_on_front' )
		) );
		$wp_customize->add_setting( 'front_page_blog_tag', array(
			'default'              => thefour_default_setting( 'front_page_blog_tag' ),
			'sanitize_callback'    => array( $sanitizer, 'text' ),
			'sanitize_js_callback' => array( $this, 'delete_transient' ),
		) );
		$wp_customize->add_control( 'front_page_blog_tag', array(
			'label'           => __( 'Blog posts tag name', 'thefour-lite' ),
			'section'         => 'static_front_page',
			'description'     => sprintf(
				__( 'Use a <a href="%s">tag</a> to make your posts displayed in Blog section in the front page. If no posts match the tag, latest posts will be displayed instead.', 'thefour-lite' ),
				esc_url( add_query_arg( 'tag', _x( 'front-page', 'Front end default tag slug for featured blog posts', 'thefour-lite' ), admin_url( 'edit.php' ) ) )
			),
			'active_callback' => array( $this, 'is_page_on_front' )
		) );
		$wp_customize->add_setting( 'front_page_blog_hide_tag', array(
			'default'              => thefour_default_setting( 'front_page_blog_hide_tag' ),
			'sanitize_callback'    => array( $sanitizer, 'checkbox' ),
			'sanitize_js_callback' => array( $this, 'delete_transient' ),
		) );
		$wp_customize->add_control( 'front_page_blog_hide_tag', array(
			'label'           => __( 'Don&rsquo;t display tag on front end.', 'thefour-lite' ),
			'section'         => 'static_front_page',
			'type'            => 'checkbox',
			'active_callback' => array( $this, 'is_page_on_front' )
		) );

		$wp_customize->add_setting( 'front_page_flourish', array(
			'sanitize_callback' => array( $sanitizer, 'image' ),
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'front_page_flourish',
			array(
				'label'           => __( 'Flourish', 'thefour-lite' ),
				'section'         => 'static_front_page',
				'settings'        => 'front_page_flourish',
				'description'     => __( 'The flourish image will be displayed in the bottom of the front page. This can be an image of client logos, a promotional banner, a map showing where your business is located or anything else that you can think to put in this space.', 'thefour-lite' ),
				'active_callback' => array( $this, 'is_page_on_front' )
			)
		) );
		$wp_customize->add_setting( 'front_page_flourish_title', array(
			'sanitize_callback' => array( $sanitizer, 'text' ),
		) );
		$wp_customize->add_control( 'front_page_flourish_title', array(
			'label'           => __( 'Flourish section title', 'thefour-lite' ),
			'section'         => 'static_front_page',
			'type'            => 'text',
			'active_callback' => array( $this, 'is_page_on_front' )
		) );
	}

	/**
	 * Enqueue script for customizer control
	 */
	public function enqueue()
	{
		wp_enqueue_script( 'thefour-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'suggest' ), wp_get_theme( 'thefour-lite' )->version, true );
		wp_localize_script( 'thefour-customizer', 'theFourCustomizer',
			array(
				'pro'  => esc_html__( 'Upgrade to Pro', 'thefour-lite' ),
				'docs' => esc_html__( 'View documentation', 'thefour-lite' ),
			)
		);
	}

	/**
	 * Add body class to change the appearance according to the theme options
	 * @param array $classes
	 * @return array
	 */
	public function body_class( $classes )
	{
		if ( thefour_setting( 'topbar_text' ) || has_nav_menu( 'social' ) )
		{
			$classes[] = 'topbar-enabled';
		}

		$navbar_position = thefour_setting( 'navbar_position' );
		if ( 'above' == $navbar_position )
		{
			$classes[] = 'navbar-above';
			$classes[] = 'navbar-collapse';
		}
		elseif ( 'below' == $navbar_position )
		{
			$classes[] = 'navbar-below';
			$classes[] = 'navbar-collapse';
		}

		if ( thefour_setting( 'navbar_fixed' ) )
		{
			$classes[] = 'navbar-fixed';
		}

		return $classes;
	}

	/**
	 * Hide blog post tag from displaying when global tags are queried from the front-end.
	 *
	 * Hooks into the "get_terms" filter.
	 *
	 * @param array $terms      List of term objects. This is the return value of get_terms().
	 * @param array $taxonomies An array of taxonomy slugs.
	 * @return array A filtered array of terms.
	 */
	public function hide_blog_tag( $terms, $taxonomies, $args )
	{
		// Run only on the front-end with proper list of terms.
		if ( is_admin() || ! in_array( 'post_tag', $taxonomies ) || empty( $terms ) || 'all' != $args['fields'] )
		{
			return $terms;
		}

		$tag = thefour_setting( 'front_page_blog_tag' );
		foreach ( $terms as $order => $term )
		{
			if ( $tag === $term->name && 'post_tag' === $term->taxonomy )
			{
				unset( $terms[$order] );
			}
		}

		return $terms;
	}

	/**
	 * Hide blog post tag from display when tags associated with a post object are queried from the front-end.
	 *
	 * Hooks into the "get_the_terms" filter.
	 *
	 * @param array $terms    A list of term objects. This is the return value of get_the_terms().
	 * @param int   $id       The ID field for the post object that terms are associated with.
	 * @param array $taxonomy An array of taxonomy slugs.
	 * @return array Filtered array of terms.
	 */
	public function hide_the_blog_tag( $terms, $id, $taxonomy )
	{
		// Run only on the front-end with proper list of terms.
		if ( is_admin() || 'post_tag' != $taxonomy || empty( $terms ) )
		{
			return $terms;
		}

		$tag = thefour_setting( 'front_page_blog_tag' );
		foreach ( $terms as $order => $term )
		{
			if ( $tag === $term->name && 'post_tag' === $term->taxonomy )
			{
				unset( $terms[$order] );
			}
		}

		return $terms;
	}

	/**
	 * Callback function to detect if choice "page" is selected in the radio control, and return true if it is, and false otherwise
	 *
	 * @param $control
	 * @return bool
	 */
	function is_page_on_front( $control )
	{
		if ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
