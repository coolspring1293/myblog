<?php
/**
 * The template part for displaying header.
 * @package TheFour Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">
	<div class="header-wrapper">
		<?php get_template_part( 'template-parts/topbar' ); ?>
		<header class="header" style="background-image: url(<?php header_image(); ?>)" role="banner">
			<div class="navbar">
				<div class="container clearfix">
					<?php
					$brand = esc_html( get_bloginfo() );
					if ( $logo = thefour_setting( 'logo' ) )
					{
						$brand = sprintf( '<img src="%s" alt="%s">', esc_url( $logo ), esc_attr( get_bloginfo() ) );
					}
					/**
					 * Allow developers to change the output of the brand
					 * @param string $brand HTML output of the brand
					 */
					$brand = apply_filters( 'thefour_brand', $brand );
					?>
					<a class="brand" href="<?php echo esc_url( home_url() ); ?>"><?php echo $brand; ?></a>
					<nav class="site-navigation right" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'thefour-lite' ); ?>">
						<button class="menu-toggle"><?php _e( 'Menu', 'thefour-lite' ); ?></button>
						<?php
						wp_nav_menu( array(
							'container_class' => 'main-menu',
							'menu_class'      => 'main-menu clearfix',
							'theme_location'  => 'primary',
							'items_wrap'      => '<ul>%3$s</ul>',
						) );
						?>
					</nav>
					<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'thefour-lite' ); ?></a>
				</div>
			</div>
			<div class="header-inner container title-center">
				<?php
				if ( $hero_content = thefour_setting( 'hero_content' ) )
				{
					echo do_shortcode( $hero_content );
				}
				else
				{
					$site_title       = get_bloginfo();
					$site_description = get_bloginfo( 'description' );
					if ( $site_title )
					{
						printf(
							'<h1 class="site-title"><a href="%s" title="%s" rel="home">%s</a></h1>',
							esc_url( home_url() ),
							esc_attr( $site_title ),
							esc_html( $site_title )
						);
					}
					if ( $site_description )
					{
						printf(
							'<h3 class="site-description">%s</h3>',
							esc_html( $site_description )
						);
					}
				}
				?>
			</div>
		</header>
	</div>
	<main class="main container clearfix" role="main">
