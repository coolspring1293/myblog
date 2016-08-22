<?php
/**
 * The template used for displaying child page on the grid template.
 *
 * @package TheFour Lite
 */
?>
<div class="column one-third">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php get_template_part( 'template-parts/content', 'media' ); ?>
		<div class="entry-text">
			<header class="entry-header">
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h3>
			</header>

			<?php if ( 'page' == get_post_type() ) : ?>

				<div class="entry-summary">
					<?php the_content(); ?>
				</div>

				<footer class="entry-footer">
					<a href="<?php the_permalink(); ?>"><?php _e( 'Continue reading &raquo;', 'thefour-lite' ); ?></a>
				</footer>

			<?php else : ?>

				<div class="entry-summary">
					<?php the_content(); ?>
				</div>

			<?php endif; ?>
		</div>
	</article>
</div>
