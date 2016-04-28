<?php
/**
 * Social buttons class.
 * @package TheFour Lite
 */

/**
 * Social buttons class
 * @package TheFour Lite
 */
class TheFour_Social_Buttons
{
	/**
	 * Render social buttons
	 * @return void
	 */
	public function render()
	{
		echo '<span class="social-buttons">';
		$link = get_permalink();
		$text = get_the_title();
		$this->facebook( $link );
		$this->twitter( $link, $text );
		$this->googleplus( $link );
		echo '</span>';
	}

	/**
	 * Generate HTML for a single Share Button
	 *
	 * @param string $link
	 *
	 * @return void
	 */
	public function facebook( $link )
	{
		printf(
			'<a class="facebook" target="_blank" title="%s" href="%s"><i class="fa fa-facebook"></i><span class="count"></span></a>',
			__( 'Share this on Facebook', 'thefour-lite' ),
			htmlentities( add_query_arg( array(
				'u' => rawurlencode( $link ),
			), 'https://www.facebook.com/sharer/sharer.php' ) )
		);
	}

	/**
	 * Generate HTML for a single Twitter Button
	 *
	 * @param string $link
	 * @param string $text
	 *
	 * @return void
	 */
	public function twitter( $link, $text )
	{
		printf(
			'<a class="twitter" target="_blank" title="%s" href="%s"><i class="fa fa-twitter"></i><span class="count"></span></a>',
			__( 'Tweet on Twitter', 'thefour-lite' ),
			htmlentities( add_query_arg( array(
				'url'  => rawurlencode( $link ),
				'text' => rawurlencode( $text ),
			), 'https://twitter.com/intent/tweet' ) )
		);
	}

	/**
	 * Generate HTML for a single Google+ Button
	 *
	 * @param string $link
	 *
	 * @return void
	 */
	public function googleplus( $link )
	{
		printf(
			'<a class="googleplus" target="_blank" title="%s" href="%s"><i class="fa fa-google-plus"></i><span class="count"></span></a>',
			__( 'Share on Google+', 'thefour-lite' ),
			htmlentities( add_query_arg( array(
				'url' => rawurlencode( $link ),
			), 'https://plus.google.com/share' ) )
		);
	}
}
