<?php get_header(); ?>

  <main class="custom_layout custom_single_post">
    <!-- 判斷是否為專案文章 -->
    <?php if ( in_category('projects') ) {
      get_template_part ("templates/pages/single-project");
    } else {
      get_template_part ("templates/pages/single-post");
      get_sidebar('sidebar'); 
      get_template_part ("templates/partials/single-post/post-footer");
    } ?>
  </main>

<?php get_footer();?>