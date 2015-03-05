<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package smpl
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

<body <?php body_class(); ?>>
<div id="page" class="hfeed site container900">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'smpl' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div id="top-nav" class="top-nav">
			<div class="site-branding clear">
				<nav id="site-navigation" class="main-navigation" role="navigation">
				<!--<?php _e( 'Primary Menu', 'smpl' ); ?>-->
					<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
				<?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
					<div class='site-logo'>
					<img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					</div>
				<?php else: ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php endif; ?>
			</div>
			<div class="site-title-container">
				<!--<?php if ( get_header_image() ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
				</a>
				<?php endif; // End header image check. ?>-->
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</div><!-- .site-branding -->

		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
