<?php
/**
 * The template part for displaying sidebar.
 * @package TheFour Lite
 */
?>
<?php
if ( ! is_active_sidebar( 'primary' ) )
{
	return;
}
$class = 'right';
if ( is_home() || is_archive() || is_search() )
{
	$class = thefour_setting( 'archive_sidebar_layout' );
}
elseif ( is_single() )
{
	$class = thefour_setting( 'single_sidebar_layout' );
}
$class = in_array( $class, array( 'left', 'no-sidebar' ) ) ? $class : 'right';
?>

<aside class="sidebar <?php echo esc_attr( $class ); ?>" role="complementary">
	<?php dynamic_sidebar( 'primary' ); ?>
</aside>
