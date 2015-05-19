<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tm_engage
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

<body id="top" <?php body_class(); ?>>
<!-- Preloader -->
<div id="preloader">
  <div id="status"></div>
</div>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tm_engage' ); ?></a>

		<!--<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'tm_engage' ); ?></button>
			<?php #wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>--><!-- #site-navigation -->

<div class="topnavbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="engage-logo"><?php bloginfo( 'name' ); ?></div>
        <div id="tmlogo" class="header-logo"><a href="http://www.trinitymirror.com"><img src="<?php echo bloginfo( 'template_directory' ); ?>/gui/tm_header_logo.png" alt="Trinity Mirror plc"></a></div>
        <div id="social-nav" class="nav-social"><ul class="social-buttons">
          <li><a href="https://www.linkedin.com/company/engage-trinity" target="_blank" class="nav-social-btn"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="https://www.facebook.com/pages/Engage-Trinity/290229891101088?skip_nax_wizard=true&ref_type=logout_gear" class="nav-social-btn" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://twitter.com/EngageTrinity" class="nav-social-btn" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="mailto:engage@trinitymirror.com" target="_top" class="nav-social-btn"><i class="fa fa-envelope"></i></a></li>
        </ul></div>
          <div class="text-right navicon pull">
          <div id="menu-toggle" class="nav_slide_button nav-toggle"><span></span></div></div>
      </div>
    </div>
  </div>
</div>

<header id="masthead" class="site-header home" role="banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
        <nav id="nav-show" class="js-animate pull">
          <ul class="top-nav">
            <li><a href="#intro">Introduction <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
            <li><a href="#portfolio">Our clients <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
            <li><a href="#features">Our philosophy <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
            <li><a href="#responsive">Our portfolio <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>

            <li><a href="#subscribe">Engage with us <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
            <li><a href="#contact">Get in touch <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header><!-- #masthead -->

	<div id="content" class="site-content">
