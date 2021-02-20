<?php

use MyBlogTheme\AutoLoader;
use MyBlogTheme\View;
/*
 * Set up our auto loading class and mapping our namespace to the app directory.
 *
 * The autoloader follows PSR4 autoloading standards so, provided StudlyCaps are used for class, file, and directory
 * names, any class placed within the app directory will be autoloaded.
 *
 * i.e; If a class named SomeClass is stored in app/SomeDir/SomeClass.php, there is no need to include/require that file
 * as the autoloader will handle that for you.
 */
require get_stylesheet_directory() . '/app/AutoLoader.php';
$loader = new AutoLoader();
$loader->register();
$loader->addNamespace( 'MyBlogTheme', get_stylesheet_directory() . '/app' );

View::$view_dir = get_stylesheet_directory() . '/templates/views';

require get_stylesheet_directory() . '/includes/scripts-and-styles.php';

?>

<?php

  // 文章預覽文字
  function custom_excerpt_length( $length ) {
    return 100;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

  function wpdocs_excerpt_more( $more ) {
    return '...';
  } 
  add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

  // 文章精選圖片
  add_theme_support('post-thumbnails');

  // 小工具
  add_theme_support( 'widgets' );
  function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( '側邊欄', 'theme-slug' ),
        'id' => 'sidebar',
        'title' => 'sidebar',
        'description' => __( '預設側邊欄', 'theme-slug' ),
        'before_widget' => '<div id="%1$s" class="custom_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="custom_widget__title">',
        'after_title'   => '</h3>',
      ) );
  }
  add_action( 'widgets_init', 'theme_slug_widgets_init' );
  
  add_filter('get_the_archive_title', function ($title) {
    if ( is_year() ) {
      $title = get_the_date( _x( 'Y', '' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'm/Y', '' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'd/m/Y', '' ) );
    }
    return $title;
  });

  // navbar
  function myMenus() {
    $locations = array (
      'navigation' => 'Navigation Bar',
      'footer_menu' => 'Footer menu',
      'footer_contact' => 'Footer Contact'
    );
    register_nav_menus($locations);
  }
  add_action( 'init','myMenus' );

?>