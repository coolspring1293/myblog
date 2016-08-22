<?php
/**
 * The template part for displaying flourish section in the frontend.
 * @package TheFour Lite
 */

$image = thefour_setting( 'front_page_flourish' );
$title = thefour_setting( 'front_page_flourish_title' );

if ( ! $image )
{
	return;
}
?>

<section  id="content" class="section flourish">

	<?php if ( $title ) : ?>
		<h2 class="heading"><?php echo esc_html( $title ); ?></h2>
	<?php endif; ?>

	<img src="<?php echo esc_url( $image ); ?>" alt="">

</section>
