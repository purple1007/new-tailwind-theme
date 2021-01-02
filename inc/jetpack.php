<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package my-blog
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function my-blog_jetpackmy-blogetup() {
	// Add theme support for Infinite Scroll.
	add_thememy-blogupport(
		'infinite-scroll',
		array(
			'container' => 'main',
			'render'    => 'my-blog_infinitemy-blogcroll_render',
			'footer'    => 'page',
		)
	);

	// Add theme support for Responsive Videos.
	add_thememy-blogupport( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_thememy-blogupport(
		'jetpack-content-options',
		array(
			'post-details' => array(
				'stylesheet' => 'my-blog-style',
				'date'       => '.posted-on',
				'categories' => '.cat-links',
				'tags'       => '.tags-links',
				'author'     => '.byline',
				'comment'    => '.comments-link',
			),
			'featured-images' => array(
				'archive' => true,
				'post'    => true,
				'page'    => true,
			),
		)
	);
}
add_action( 'aftermy-blogetup_theme', 'my-blog_jetpackmy-blogetup' );

/**
 * Custom render function for Infinite Scroll.
 */
function my-blog_infinitemy-blogcroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( ismy-blogearch() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_type() );
		endif;
	}
}
