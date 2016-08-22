<?php
/**
 * The template for displaying topbar.
 *
 * @package TheFour Lite
 */

$text = thefour_setting( 'topbar_text' );
if ( empty( $text ) && ! has_nav_menu( 'social' ) )
{
	return;
}
?>
<div class="topbar hidden-xs">
	<div class="container clearfix">
		<?php if ( ! empty( $text ) ) : ?>
			<div class="text-topbar left">
				<?php echo $text; ?>
			</div>
		<?php endif; ?>
		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'social',
				'container_class' => 'social-links right',
				'depth'           => 1,
				'link_before'     => '<span>',
				'link_after'      => '</span>',
				'items_wrap'      => '<ul class="clearfix">%3$s</ul>',
			) );
			?>
		<?php endif; ?>
	</div>
</div>
