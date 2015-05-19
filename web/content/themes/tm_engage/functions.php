<?php
/**
 * tm_engage functions and definitions
 *
 * @package tm_engage
 */

if ( ! function_exists( 'tm_engage_setup' ) ) :
	/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
	function tm_engage_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'tm_engage', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		//add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'tm_engage' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'tm_engage_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}
endif; // tm_engage_setup
add_action( 'after_setup_theme', 'tm_engage_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tm_engage_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tm_engage_content_width', 640 );
}
add_action( 'after_setup_theme', 'tm_engage_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tm_engage_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tm_engage' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'tm_engage_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tm_engage_scripts() {

	// Load themes stylesheet
	wp_enqueue_style( 'tm_engage-style', get_stylesheet_uri() );

	// Load Font Awesome
	wp_enqueue_style( 'tm_engage-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );

	// Load custom web fonts
	wp_enqueue_style( 'tm_engage-fonts', '//fast.fonts.net/cssapi/1bdbf233-71a9-42c6-bfae-07e7f8a658a9.css' );

	wp_enqueue_script( 'tm_engage-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'tm_engage-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Load custom scripts
	wp_enqueue_script( 'tm_engage-modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', '20150519', false );
	wp_enqueue_script( 'tm_engage-lazy-load', get_template_directory_uri() . '/js/jquery.lazyload.min.js', array( 'jquery' ), '1.9.5', true );
	wp_enqueue_script( 'tm_engage-mobile-custom', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', array( 'jquery' ), '20150519', true );
	wp_enqueue_script( 'tm_engage-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), '1.3', true );
	wp_enqueue_script( 'tm_engage-camera', get_template_directory_uri() . '/js/camera.js', array( 'jquery' ), '1.3.3', true );
	wp_enqueue_script( 'tm_engage-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '2.0.3', true );
	wp_enqueue_script( 'tm_engage-classie', get_template_directory_uri() . '/js/classie.js', '20150519', true );
	wp_enqueue_script( 'tm_engage-stepsform', get_template_directory_uri() . '/js/stepsForm.js', '1.0.0', true );
	wp_enqueue_script( 'tm_engage-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.1.1', true );
	wp_enqueue_script( 'tm_engage-flexslider', get_template_directory_uri() . '/js/flexslider.min.js', '20150519', true );
	wp_enqueue_script( 'tm_engage-parallax', get_template_directory_uri() . '/js/parallax.min.js', '20150519', true );
	wp_enqueue_script( 'tm_engage-scripts', get_template_directory_uri() . '/js/scripts.min.js', array( 'jquery' ), '20150519', true );

}
add_action( 'wp_enqueue_scripts', 'tm_engage_scripts' );

/**
 * HTML5 Shiv
 * Enables use of HTML5 sectioning elements in legacy Internet
 * Explorer and provides basic HTML5 styling for Internet Explorer 6-9
 */
// add ie conditional html5 shim to header
function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');
/**
 * Respond
 * A fast & lightweight polyfill for min/max-width CSS3 Media Queries
 * (for IE 6-8, and more).
 */
// add ie conditional respond to header
function add_ie_respond () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_respond');

/**
 * Favicons
 */
function kia_add_favicon(){ ?>
    <!-- Custom Favicons -->
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/gui/apple-touch-icon.png">
    <?php }
add_action('wp_head','kia_add_favicon');

/**
 * Module
 * Render the selected Module to the page
 */
function module($module, $options = null){
	include "modules/{$module}.php";
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
