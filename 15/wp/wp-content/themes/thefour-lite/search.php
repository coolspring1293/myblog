<?php
/**
 * The template part for displaying search results.
 * @package TheFour Lite
 */

get_header(); ?>

<section  id="content" class="content left">

	<?php if ( have_posts() ) : ?>

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

</section><!-- .content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
