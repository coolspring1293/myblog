<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package TheFour Lite
 */
?>

<article class="no-results not-found">
	<header class="entry-header">
		<h2 class="entry-title"><?php _e( 'Nothing Found', 'thefour-lite' ); ?></h2>
	</header>

	<div class="entry-content clearfix">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'thefour-lite' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'thefour-lite' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'thefour-lite' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>
</article>
