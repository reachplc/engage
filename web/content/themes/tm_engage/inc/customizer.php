<?php
/**
 * Theme Customizer
 *
 * @package tm_engage
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tm_engage_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add Social Media Section.
	$wp_customize->add_section( 'social-media' , array(
		'title' => __( 'Social Media', '_tm_engage' ),
		'priority' => 30,
		'description' => __( 'Enter the URL to your account for each service for the icon to appear on the site.', '_tm_engage' ),
	) );

	// Add LinkedIn Setting.
	$wp_customize->add_setting( 'linkedin' ,
		array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin', array(
		'label' => __( 'LinkedIn', '_tm_engage' ),
		'section' => 'social-media',
		'settings' => 'linkedin',
	) ) );

	// Add Facebook Setting.
	$wp_customize->add_setting( 'facebook' ,
		array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
		'label' => __( 'Facebook', '_tm_engage' ),
		'section' => 'social-media',
		'settings' => 'facebook',
	) ) );

	// Add Twitter Setting.
	$wp_customize->add_setting( 'twitter' ,
		array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
		'label' => __( 'Twitter', '_tm_engage' ),
		'section' => 'social-media',
		'settings' => 'twitter',
	) ) );

	// Add Email Setting.
	$wp_customize->add_setting( 'email' ,
		array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email', array(
		'label' => __( 'Email', '_tm_engage' ),
		'section' => 'social-media',
		'settings' => 'email',
	) ) );

}
add_action( 'customize_register', 'tm_engage_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tm_engage_customize_preview_js() {
	wp_enqueue_script( 'tm_engage_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'tm_engage_customize_preview_js' );
