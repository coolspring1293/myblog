<?php
/**
 * The template part for displaying footer section.
 * @package TheFour Lite
 */
?>

</main>

<footer class="footer"  role="contentinfo">
	<div class="container">
		<?php
		$footer_sidebars = array( 'footer', 'footer-2', 'footer-3', 'footer-4' );
		$has_widget      = false;
		foreach ( $footer_sidebars as $footer_sidebar )
		{
			if ( is_active_sidebar( $footer_sidebar ) )
			{
				$has_widget = true;
				break;
			}
		}
		?>
		<?php if ( $has_widget ) : ?>
			<div class="footer-widgets row clearfix">
				<?php foreach ( $footer_sidebars as $footer_sidebar ) : ?>
					<?php if ( is_active_sidebar( $footer_sidebar ) ) : ?>
						<div class="column one-fourth">
							<div class="widgets">
								<?php dynamic_sidebar( $footer_sidebar ); ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="credits clearfix">
			<div class="left">
				<?php
				printf(
					esc_html__( 'Proudly powered by %s.', 'thefour-lite' ),
					sprintf( '<a href="%s">%s</a>', esc_url( 'http://wordpress.org/' ), 'WordPress' )
				);
				?>
			</div>
			<div class="right">
				<?php
				printf(
					esc_html__( 'Theme %s by %s.', 'thefour-lite' ),
					sprintf( '<a href="%s">%s</a>', esc_url( 'http://gretathemes.com/wordpress-themes/thefour/' ), 'thefour-lite' ),
					'GretaThemes'
				);
				?>
			</div>
		</div>
	</div>
</footer><!-- .footer -->

</div><!-- .wrapper -->

<?php wp_footer(); ?>

<nav class="mobile-navigation" role="navigation">
	<?php
	wp_nav_menu( array(
		'container_class' => 'mobile-menu',
		'menu_class'      => 'mobile-menu clearfix',
		'theme_location'  => 'primary',
		'items_wrap'      => '<ul>%3$s</ul>',
	) );
	?>
</nav>

</body>
</html>
