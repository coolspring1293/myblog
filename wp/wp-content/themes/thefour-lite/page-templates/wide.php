<?php
/**
 * Template Name: Wide content
 * Description: Display page content widely.
 * @package TheFour Lite
 */

get_header(); ?>

<section  id="content" class="content wide">

	<?php if ( have_posts() ): the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'page' ); ?>

		<?php
		if ( comments_open() || get_comments_number() )
		{
			comments_template( '', true );
		}
		?>

	<?php endif; ?>

</section>

<?php get_footer(); ?>
