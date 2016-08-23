<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tm_engage
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
<?php if ( function_exists( 'HM_GTM\tag' ) ) { HM_GTM\tag(); } ?>
<!-- Preloader -->
<div id="preloader">
	<div id="status"></div>
</div>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tm_engage' ); ?></a>

<div class="topnavbar">
	<div class="container">
	<div class="row">
	  <div class="col-md-12">
		<div class="engage-logo"><?php bloginfo( 'name' ); ?></div>
		<div id="tmlogo" class="header-logo"><a href="http://www.trinitymirror.com"><img src="<?php echo esc_url( get_template_directory_uri() . '/gui/tm_header_logo.png' ); ?>" alt="Trinity Mirror plc"></a></div>

		<div id="social-nav" class="nav-social">

		<ul class="social-buttons">
			<?php if ( get_theme_mod( 'linkedin' ) ) : ?><li><a href="<?php echo esc_url( get_theme_mod( 'linkedin' ) ); ?>" target="_blank" class="nav-social-btn"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
			<?php if ( get_theme_mod( 'facebook' ) ) : ?><li><a href="<?php echo esc_url( get_theme_mod( 'facebook' ) ); ?>" class="nav-social-btn" target="_blank"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
			<?php if ( get_theme_mod( 'twitter' ) ) : ?><li><a href="<?php echo esc_url( get_theme_mod( 'twitter' ) ); ?>" class="nav-social-btn" target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
			<?php if ( get_theme_mod( 'email' ) ) : ?><li><a href="<?php echo esc_url( get_theme_mod( 'email' ) ); ?>" target="_top" class="nav-social-btn"><i class="fa fa-envelope"></i></a></li><?php endif; ?>
		  <li><a href="<?php echo esc_url( get_home_url() ); ?>/#blog">Our blog</i></a></li>
		</ul>

		</div>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
		  <div class="text-right navicon pull">
	          <div id="menu-toggle" class="nav_slide_button nav-toggle"><span></span></div>
		  </div>
		<?php endif; ?>
	  </div>
	</div>
	</div>
</div>

<header id="masthead" class="site-header home" role="banner">
	<div class="container-fluid">
	<div class="row">
	  <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="nav-show" class="js-animate pull main-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'primary',
						'items_wrap'     => '<ul id="%1$s" class="%2$s top-nav">%3$s</ul>',
						'link_after'      => ' <span class="indicator"><i class="fa fa-angle-right"></i></span>',
					) );
				?>
			</nav><!-- .main-navigation -->
		<?php endif; ?>

	  </div>
	</div>
	</div>
</header><!-- #masthead -->

	<div id="content" class="site-content">
