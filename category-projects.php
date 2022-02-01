<?php get_header(); ?>
<!-- projects page -->
<main class="custom_layout projects">
  <?php get_template_part( 'templates/partials/archive/header' );?>
  <div class="summary"><?php echo category_description()?></div>
  <div class="custom_container">
    <?php if ( have_posts() ) : ?>
      <?php
        // The Loop
        while ( have_posts() ) : the_post(); 
          get_template_part( 'templates/partials/project-preview' );
      ?>

    <?php endwhile; else: ?>
      <?php get_template_part( 'templates/partials/archive/header' );?>
      <p>目前尚無文章</p>
    <?php endif; ?>
  </div>
  
</main>

<?php get_footer();?>