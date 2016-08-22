<?php
/**
 * Template Name: Front Page
 * Description: Display content for the front page.
 * @package TheFour Lite
 */

get_header(); ?>

<section  id="content" class="content wide section">

	<?php if ( have_posts() ): the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'page' ); ?>

	<?php endif; ?>

</section>

<?php get_template_part( 'template-parts/front-page', 'blog' ); ?>
<?php get_template_part( 'template-parts/front-page', 'flourish' ); ?>

<?php get_footer(); ?>
