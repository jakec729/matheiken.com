<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Matheiken_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class('container-fluid-max'); ?>>
	<header class="site-header" role="banner">
		<nav class="navbar navbar-fixed page-wrap" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'matheiken' ); ?>">
			<div class="container-fluid grid-lines">
				<div class="navbar__brand">
					<a href="<?php echo esc_url( home_url( '/' ) ) ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/matheiken.svg" alt="Site Logo	">
						<h1 class="seo-hidden"><?php bloginfo( 'name' ); ?></h1>
					</a>
				</div>
				<?php if ( has_nav_menu('primary') ) {
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'navbar__items',
						'container' 	 => ''
					 ) );
				}?>
			</div>
		</nav>
	</header>