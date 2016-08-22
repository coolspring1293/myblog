<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package TheFour Lite
 */

if ( ! have_posts() )
{
	get_template_part( '404' );
	return;
}

// Trigger the_post() to setup post data. The data like author info will be used in hero area.
the_post();
?>

<?php get_header(); ?>

<section  id="content" class="content left">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content clearfix">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>

		<footer class="entry-footer">
			<?php
			// Post tags
			the_tags( '<p class="post-tags">', '', '</p>' );

			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'thefour-lite' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'thefour-lite' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'thefour-lite' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'thefour-lite' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );
			?>
		</footer>

		<?php
		if ( comments_open() || get_comments_number() )
		{
			comments_template( '', true );
		}
		?>

	</article>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
