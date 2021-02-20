<?php get_header(); ?>

<!-- Blog page -->
<main class="custom_layout index">
  <div class="custom_layout__container">
    <h1 class="page-title">
        Blog
    </h1>
    <?php if (have_posts()) : 
          while (have_posts()) : 
          the_post(); 
          get_template_part( 'templates/partials/post-preview' );
      ?>
    <?php endwhile; endif; ?>
  
    <!-- 分頁 -->
    <?php get_template_part( 'templates/partials/posts-pagination' );?>
  </div>
</main>

<? get_footer();?>