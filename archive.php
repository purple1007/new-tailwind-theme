<?php get_header(); ?>

  <main class="custom_layout archive">
  <?php 
    if ( have_posts() ) : ?>
    
    <header class="archive-header">
      <!-- 分類 -->
      <?php
        if ( is_category() ) : ?>
        <h1 class="page-title">
          <?php $category = get_the_category(); 
            echo $category[0]->cat_name; ?>
        </h1>
      <?php endif; ?>

      <!-- 標籤 -->
      <?php
        if ( is_tag() ) : ?>
        <h1 class="page-title">
          Tag: <?php wp_title('');?>
        </h1>
      <?php endif; ?>
    </header>
    
    <?php
      // The Loop
      while ( have_posts() ) : the_post(); 
        get_template_part( 'templates/partials/post-preview' );
    ?>

    <?php endwhile; else: ?>
      <h1 class="page-title">
          <?php $category = get_the_category(); 
              echo $category[0]->cat_name; ?>
      </h1>
      <p>目前尚無文章</p>
    <?php endif; ?>
 
   <!-- 分頁 -->
   <?php get_template_part( 'templates/partials/posts-pagination' );?>
   
  </main>
<?
// get_sidebar();
get_footer();?>