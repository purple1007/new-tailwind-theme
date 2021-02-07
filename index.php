<?php get_header(); ?>

  <!-- Blog page -->
  <main class="custom_layout index">
  <?php get_template_part( 'templates/partials/replace-page-title' ); ?>
  <?php if (have_posts()) : 
        while (have_posts()) : 
        the_post(); 
        get_template_part( 'templates/partials/post-preview' );
    ?>
  <?php endwhile; endif; ?>
  
  <!-- 分頁 -->
  <?php get_template_part( 'templates/partials/posts-pagination' );?>

  </main>

<?
// get_sidebar();
get_footer();?>