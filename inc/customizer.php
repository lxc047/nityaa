<?php
/**
 * Nityaa Theme Customizer
 *
 * @package Nityaa
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nityaa_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->remove_control( 'display_header_text' );
	$wp_customize->get_section( 'title_tagline' )->priority = '9';
    $wp_customize->get_section( 'title_tagline' )->title = __('Site title/Tagline/Logo', 'nityaa');

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'nityaa_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'nityaa_customize_partial_blogdescription',
		) );

		// Load custom controls.
	    require get_template_directory() . '/inc/customizer/control.php';

	    // Load customize helpers.
	    require get_template_directory() . '/inc/customizer/options.php';

	    // Load customize sanitize.
	    require get_template_directory() . '/inc/customizer/sanitize.php';
	}
}
add_action( 'customize_register', 'nityaa_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function nityaa_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function nityaa_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nityaa_customize_preview_js() {
	wp_enqueue_script( 'nityaa-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'nityaa_customize_preview_js' );
