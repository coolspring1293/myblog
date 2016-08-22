<?php
/**
 * The template part for displaying latest blog posts in the frontend.
 * @package TheFour Lite
 */

$posts = thefour_get_front_page_posts();
if ( ! $posts )
{
	return;
}
?>

<section  id="content" class="section blog">

	<h2 class="heading"><?php echo esc_html( thefour_setting( 'front_page_blog_title' ) ); ?></h2>

	<div class="grid">
		<?php
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			get_template_part( 'template-parts/content', 'grid' );
		endforeach;

		wp_reset_postdata();
		?>
	</div>

</section>
