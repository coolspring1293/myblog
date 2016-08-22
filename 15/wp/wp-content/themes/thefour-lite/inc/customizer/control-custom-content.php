<?php
/**
 * Register custom control for arbitrary HTML.
 * @link    http://wptheming.com/2015/07/customizer-control-arbitrary-html/
 * @package TheFour Lite
 */

/**
 * Register custom control for arbitrary HTML.
 */
class TheFour_Customize_Control_Custom_Content extends WP_Customize_Control
{
	/**
	 * Custom content
	 * @var string
	 */
	public $content = '';

	/**
	 * The type of customize control being rendered.
	 * @var string
	 */
	public $type = 'custom-content';

	/**
	 * Loads the scripts/styles.
	 */
	public function enqueue()
	{
		wp_enqueue_style( 'thefour-customizer', get_template_directory_uri() . '/css/customizer.css' );
	}

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 */
	public function render_content()
	{
		$this->type = 'custom-content';

		if ( ! empty( $this->label ) )
		{
			echo '<span class="customize-control-title">' . $this->label . '</span>';
		}
		if ( ! empty( $this->content ) )
		{
			echo $this->content;
		}
		if ( ! empty( $this->description ) )
		{
			echo '<span class="description customize-control-description">' . $this->description . '</span>';
		}
	}
}
