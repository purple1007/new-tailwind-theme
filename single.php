<?php get_header(); ?>

  <main class="custom_layout custom_single_post">
    
      <?php if (have_posts()) : 
          while (have_posts()) : 
          the_post(); 
          get_template_part ("templates/pages/single-post")
      ?>
        
      <?php endwhile; endif; ?>
      
    <?php get_sidebar('sidebar', $args); ?>
    <?php get_template_part ("templates/partials/single-post/post-footer")?>
  </main>
  
<?php get_footer();?>