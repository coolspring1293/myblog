<?php
/**
 * The template for displaying aside post formats
 * Used for index/archive/search.
 *
 * @package TheFour Lite
 */
?>

<div class="entry-content clearfix">
	<?php the_content(); ?>
	<a class="permalink" href="<?php the_permalink(); ?>">&infin;</a>
</div>