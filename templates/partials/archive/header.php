<header class="archive-header w-full">
  <h1 class="page-title">
    <?php
      if (is_category()) {
        $category = get_the_category(); 
        echo $category[0]->cat_name;;

      } elseif (function_exists('is_tag') && is_tag()) {
        single_tag_title('Tag : '); 
        
      } elseif (is_archive()) {
        echo '彙整：'; echo get_the_archive_title('') ; 

      } elseif (is_page()) {
        echo wp_title(''); 

      } elseif (is_search()) {
        echo '搜尋結果：'.wp_specialchars($s);

      } elseif (!(is_404()) && (is_single()) || (is_page())) {
        echo get_the_title(); 

      } elseif (is_404()) {
        echo 'Not Found';
      }
    ?>
  </h1>
</header>

