<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package my-blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function my-blog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! ismy-blogingular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_activemy-blogidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'my-blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function my-blog_pingback_header() {
	if ( ismy-blogingular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'my-blog_pingback_header' );
