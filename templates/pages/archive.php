<div class="custom_container">
  <?php if ( have_posts() ) : ?>
    <?php
      // The Loop
      while ( have_posts() ) : the_post(); 
        get_template_part( 'templates/partials/post-preview' );
    ?>

  <?php endwhile; else: ?>
    <?php get_template_part( 'templates/partials/archive/header' );?>
    <p>目前尚無文章</p>
  <?php endif; ?>
  
  <!-- 分頁 -->
  <?php get_template_part( 'templates/partials/posts-pagination' );?>
</div>


