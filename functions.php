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
        'name' => __( '文章側邊欄', 'theme-slug' ),
        'id' => 'sidebar',
        'title' => 'sidebar',
        'description' => __( '文章側邊欄', 'theme-slug' ),
        'before_widget' => '<div id="%1$s" class="custom_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="custom_widget__title">',
        'after_title'   => '</h3>',
      ) );
  }
  add_action( 'widgets_init', 'theme_slug_widgets_init' );

  function home_title_widget() {
    register_sidebar( array(
        'name' => __( '首頁標題' ),
        'id' => 'home_title_widget',
        'title' => 'home_title_widget',
        'description' => __( '將會放在標題底下，建議使用文字小工具。將不會顯示小工具標題，僅會顯示內文。' ),
        'before_widget' => '<div id="%1$s" class="home__title %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="custom_widget__title">',
        'after_title'   => '</h3>',
      ) );
  }
  add_action( 'widgets_init', 'home_title_widget' );

  function home_description_widget() {
    register_sidebar( array(
        'name' => __( '首頁簡介區塊'),
        'id' => 'home_description_widget',
        'title' => 'home_description_widget',
        'description' => __( '將會放在標題底下，建議使用文字小工具。將不會顯示小工具標題，僅會顯示內文。'),
        'before_widget' => '<div id="%1$s" class="home__description %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="custom_widget__title">',
        'after_title'   => '</h3>',
      ) );
  }
  add_action( 'widgets_init', 'home_description_widget' );

  

  
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

  add_filter( 'wp_generate_tag_cloud_data', 'my_tag_cloud_data', 10, 1 );

  function my_tag_cloud_data( $tags_data ) {
  
      foreach ( $tags_data as $key => $tag ) {
          $tags_data [ $key ] ['aria_label'] .=  '
          data-event-category="SideBarWidgetTags"
          data-event-action="Click" 
          data-event-label="Tag/' . esc_attr( $tag['name'] ) . '" ';
      }
  
      // return adjusted data
      return $tags_data;
  }

  // navbar
  function menus() {
    $locations = array (
      'navigation' => 'Navigation Bar',
      'footer_menu' => 'Footer menu',
      'footer_contact' => 'Footer Contact'
    );
    register_nav_menus($locations);
  }
  add_action( 'init','menus' );

  function menus_atts( $atts, $item, $args ) {

    if( $args->theme_location == 'navigation' ) {
      $atts['data-event-category'] = 'Navigation';
    } 
    elseif ( $args->theme_location == 'footer_menu' ) {
      $atts['data-event-category'] = 'FooterMenu';
    } 
    elseif ( $args->theme_location == 'footer_contact' ) {
      $atts['data-event-category'] = 'FooterContact';
    }
    $atts['data-event-action'] = 'Click';
    $atts['data-event-label'] = $atts['title'];
    
    return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'menus_atts', 10, 3 );

  // 排除 Projects 文章在 Blog
  function exclude_category($query) {
    if ( $query->is_home() ) {
      $query->set('cat', '-29 -27');
    }
    return $query;
    }
  add_filter('pre_get_posts', 'exclude_category');
?>

<?php
  /**
   * Plugin Name:   Enhance the wp_get_archive() function.
   * Description:   Support the '_exclude_terms' parameter.
   * Plugin URI:    https://wordpress.stackexchange.com/a/170535/26350
   * Plugin Author: birgire
   * Version:       0.0.1
   */

  add_action( 'init', function() {
    $o = new WPSE_Archive_With_Exclude;
    $o->init( $GLOBALS['wpdb'] );
  });

  class WPSE_Archive_With_Exclude
  {
    private $db = null;

    public function init( wpdb $db )
    {
      if( ( $this->db = $db ) instanceof wpdb )
        add_filter( 'getarchives_where', 
        array( $this, 'getarchives_where' ), 10, 2 );
    }

    public function getarchives_where( $where, $r )
    {
      if( isset( $r['_exclude_terms'] ) )
      {   
        $_exclude_terms = $r['_exclude_terms'];
        if( is_string( $_exclude_terms ) )
          $_exclude_terms = explode( ',', $_exclude_terms );

        if( is_array( $_exclude_terms ) )
          $where .= $this->get_excluding_sql( $_exclude_terms );   
      }
      return $where;
    }

    private function get_excluding_sql( Array $terms )
    {
      $terms_csv = join( ',', array_map( 'absint', $terms ) );

      return " AND ( {$this->db->posts}.ID NOT IN 
        ( SELECT object_id FROM {$this->db->term_relationships} 
        WHERE term_taxonomy_id IN ( $terms_csv ) ) )";
    }

  } // end class
?>