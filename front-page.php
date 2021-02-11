<?php get_header(); ?>

  <main class="custom_layout front_page">
    <?php if (have_posts()) : 
        while (have_posts()) : 
        the_post(); 
        get_template_part( 'templates/partials/content/home' );
    ?>
      
    <?php endwhile; endif; ?>
    <?php get_template_part( 'templates/partials/recent-posts' );?>
  </main>

<?
// get_sidebar();
get_footer();?>