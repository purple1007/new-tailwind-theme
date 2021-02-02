<?php get_header(); ?>

  <main class="custom_layout archive">
  <?php 
    // Check if there are any posts to display
    if ( have_posts() ) : ?>
    
    <header class="archive-header">
    <?php get_template_part( 'templates/partials/replace-page-title' ); ?>
      <?php
        // Display optional category description
        if ( category_description() ) : ?>
        <div class="archive-meta">
          <?php echo category_description(); ?>
        </div>
      <?php endif; ?>
    </header>
    
    <?php
    // The Loop
    while ( have_posts() ) : the_post(); 
      get_template_part( 'templates/partials/post-preview' );
    ?>
    
    <?php endwhile; else: ?>
      <?php get_template_part( 'templates/partials/replace-page-title' ); ?>
      <p>目前尚無文章</p>
    <?php endif; ?>
    </div>
    </section>
 
   <!-- 分頁 -->
   <?php get_template_part( 'templates/partials/posts-pagination' );?>
   
  </main>



<?
// get_sidebar();
get_footer();?>