<?php
/**
 * my-blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package my-blog
 */

if ( ! defined( 'MY_BLOG_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'MY_BLOG_VERSION', '1.0.0' );
}

if ( ! function_exists( 'my-blogmy-blogetup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the aftermy-blogetup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function my-blogmy-blogetup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on my-blog, use a find and replace
		 * to change 'my-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'my-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_thememy-blogupport( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_thememy-blogupport( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_thememy-blogupport( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'my-blog' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_thememy-blogupport(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_thememy-blogupport(
			'custom-background',
			apply_filters(
				'my-blog_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_thememy-blogupport( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_thememy-blogupport(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'aftermy-blogetup_theme', 'my-blogmy-blogetup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function my-blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'my-blog_content_width', 640 );
}
add_action( 'aftermy-blogetup_theme', 'my-blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function my-blog_widgets_init() {
	registermy-blogidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'my-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'my-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'my-blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function my-blogmy-blogcripts() {
	wp_enqueuemy-blogtyle( 'my-blog-style', getmy-blogtylesheet_uri(), array(), MY_BLOG_VERSION );
	wpmy-blogtyle_add_data( 'my-blog-style', 'rtl', 'replace' );

	wp_enqueuemy-blogcript( 'my-blog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), MY_BLOG_VERSION, true );

	if ( ismy-blogingular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueuemy-blogcript( 'comment-reply' );
	}
}
add_action( 'wp_enqueuemy-blogcripts', 'my-blogmy-blogcripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
