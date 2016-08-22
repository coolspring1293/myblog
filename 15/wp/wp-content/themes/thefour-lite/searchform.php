<?php
/**
 * The template part for displaying search form.
 * @package TheFour Lite
 */
?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url() ); ?>" role="search">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'thefour-lite' ); ?></span>
		<input type="search" class="addsearch search-field" name="s" id="s" placeholder="<?php _e( 'Search form', 'thefour-lite' ); ?>" value="<?php echo trim( get_search_query() ); ?>">
	</label>
	<button type="submit" id="searchsubmit" class="search-button">
		<i class="fa fa-search"></i><span class="screen-reader-text"><?php _e( 'Search', 'thefour-lite' ); ?></span>
	</button>
</form>
