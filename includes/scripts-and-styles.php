<?php


use MyBlogTheme\AssetResolver;


add_action( 'wp_enqueue_scripts', function () {
	$theme_dir = get_stylesheet_directory();
	$css_path  = $theme_dir . '/build/css/app.css';
	$js_path   = $theme_dir . '/build/js/app.js';
	// 開發時用檔案修改時間當版本，避免瀏覽器快取舊樣式
	$css_ver = ( defined( 'WP_DEBUG' ) && WP_DEBUG && file_exists( $css_path ) ) ? filemtime( $css_path ) : false;
	$js_ver  = ( defined( 'WP_DEBUG' ) && WP_DEBUG && file_exists( $js_path ) ) ? filemtime( $js_path ) : false;

	wp_register_style( 'app', AssetResolver::resolve( 'css/app.css' ), [], $css_ver );
	wp_register_script( 'app', AssetResolver::resolve( 'js/app.js' ), [], $js_ver, true );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_style( 'app' );
	wp_enqueue_script( 'app' );

} );