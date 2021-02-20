<?php get_header(); ?>

<!-- Blog page -->
<main class="custom_layout index">
  <h1 class="page-title">
      <?php wp_title('');?>
    </h1>
  <div class="custom_container">
    <?php if (have_posts()) : 
          while (have_posts()) : 
          the_post(); 
          get_template_part( 'templates/partials/post-preview' );
      ?>
    <?php endwhile; endif; ?>
  
    <!-- 分頁 -->
    <?php get_template_part( 'templates/partials/posts-pagination' );?>
  </div>
  <? get_sidebar('sidebar', $args); ?>
</main>

<? get_footer();?>