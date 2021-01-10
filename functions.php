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

  function custom_excerpt_length( $length ) {
    return 150;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

  function wpdocs_excerpt_more( $more ) {
    return '<a href="'.get_the_permalink().'" class="ml-2" rel="nofollow">Read more...</a>';
  } 
  add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

  add_theme_support('post-thumbnails');

  function myMenus() {
    $locations = array (
      'primary' => 'Navigation Bar',
      'footer' => 'Footer Menu Items'
    );
    register_nav_menus($locations);
  }
  add_action( 'init','myMenus' );

?>