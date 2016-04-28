<?php
/**
 * The template part for displaying posts.
 * @package TheFour Lite
 */

get_header();?>

<section id="content" class="content left">

	<?php if ( have_posts() ) : ?>

		<?php
		$paged = max( get_query_var( 'paged' ), 1 );
		if ( 1 < $wp_query->max_num_pages && 1 < $paged ) : ?>
			<div class="page-title">
				<h4><?php printf( __( 'Page %s of %s', 'thefour-lite' ), $paged, $wp_query->max_num_pages ); ?></h4>
			</div>
		<?php endif; ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			</article>

		<?php endwhile; ?>

		<?php
		// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text' => __( '&laquo; Previous', 'thefour-lite' ),
			'next_text' => __( 'Next &raquo;', 'thefour-lite' ),
		) );
		?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
