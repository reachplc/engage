<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package tm_engage
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function tm_engage_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'tm_engage_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function _s_jetpack_setup
add_action( 'after_setup_theme', 'tm_engage_jetpack_setup' );

function tm_engage_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function tm_engage_infinite_scroll_render
