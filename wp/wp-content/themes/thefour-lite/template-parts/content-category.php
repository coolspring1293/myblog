<h2 class="site-title">
	<?php the_archive_title(); ?>
	<?php
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	if ( 1 < $wp_query->max_num_pages ) : ?>
		<?php printf( __( '(page %s of %s)', 'thefour-lite' ), $paged, $wp_query->max_num_pages ); ?>
	<?php endif; ?>
</h2>
<h3 class="site-description"><?php the_archive_description(); ?></h3>
