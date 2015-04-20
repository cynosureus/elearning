<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package elearning
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
<div id="page" class="hfeed site container-fluid" data-role = "page">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'elearning' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class = "row topbar">
			<div class = "topbar-main left-padding">

				<div class = "mobile navigation">
					<nav id="mobile-navigation" class="mobile-navigation" role="navigation">
		
						<button class="mobile-main mobile-button align-left" aria-controls="menu" aria-expanded="false"><?php _e( '<div class = "menu-icon"></div><div class = "menu-icon"></div><div class = "menu-icon"></div>', 'elearning' ); ?></button>
						
						<button class="mobile-filter mobile-button align-none right-padding" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body">
	    					<span>Filter Materials</span>
	    
	  					</button>

						<br/>

						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'left-padding', 'container_class' => 'menu-mobile-container', 'before' => '<span class = "menu-item-wrapper-mobile">', 'after' => '</span>') ); ?>

					</nav><!-- #site-navigation --> 
				</div>
			</div>
		</div>
		<div class="site-branding left-padding row">
			<div class = "col-lg-6 cyno-logo"><img src = "<?= get_template_directory_uri() . '/images/logo-cynosure2.png'; ?>"></div>
			<div class = "col-lg-6 secondary-logo"><img src = "<?= get_template_directory_uri() . '/images/Amps-GUI-header1.png'; ?>"></div>				
		</div><!-- .site-branding -->

		<div class = "desktop-menu left-padding row">
			<div class = "col-lg-12">
				<nav id="desktop-site-navigation" class="desktop-navigation" role="navigation">
			
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container_class' => 'menu-desktop-container', 'menu_class' => 'desktop-menu' ) ); ?>
				</nav>
			</div>
		</div>

		

				

	</header><!-- #masthead -->

  

	<div id="content" class="site-content left-padding right-padding">
		

