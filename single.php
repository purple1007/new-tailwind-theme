<?php get_header(); ?>

  <main class="custom_layout custom_single_post">
    <div class="custom_layout__container">
      <?php if (have_posts()) : 
          while (have_posts()) : 
          the_post(); 
          get_template_part ("templates/pages/single-post")
      ?>
        
      <?php endwhile; endif; ?>

    </div>
  </main>

<? get_footer();?>