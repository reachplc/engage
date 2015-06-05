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

<div class="topnavbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="engage-logo"><?php bloginfo( 'name' ); ?></div>
        <div id="tmlogo" class="header-logo"><a href="http://www.trinitymirror.com"><img src="<?php echo get_template_directory_uri(); ?>/gui/tm_header_logo.png" alt="Trinity Mirror plc"></a></div>
        <div id="social-nav" class="nav-social"><ul class="social-buttons">
          <li><a href="https://www.linkedin.com/company/engage-trinity" target="_blank" class="nav-social-btn"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="https://www.facebook.com/pages/Engage-Trinity/290229891101088?skip_nax_wizard=true&ref_type=logout_gear" class="nav-social-btn" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://twitter.com/EngageTrinity" class="nav-social-btn" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="mailto:engage@trinitymirror.com" target="_top" class="nav-social-btn"><i class="fa fa-envelope"></i></a></li>
          <li><a href="<?php echo get_home_url(); ?>/#blog">Our blog</i></a></li>
        </ul></div>
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
						'link_after'      => ' <span class="indicator"><i class="fa fa-angle-right"></i></span>'
					) );
				?>
			</nav><!-- .main-navigation -->
		<?php endif; ?>

      </div>
    </div>
  </div>
</header><!-- #masthead -->

	<div id="content" class="site-content">
