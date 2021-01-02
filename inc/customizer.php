<?php
/**
 * my-blog Theme Customizer
 *
 * @package my-blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function my-blog_customize_register( $wp_customize ) {
	$wp_customize->getmy-blogetting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->getmy-blogetting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->getmy-blogetting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'my-blog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'my-blog_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'my-blog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function my-blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function my-blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function my-blog_customize_preview_js() {
	wp_enqueuemy-blogcript( 'my-blog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), MY_BLOG_VERSION, true );
}
add_action( 'customize_preview_init', 'my-blog_customize_preview_js' );
