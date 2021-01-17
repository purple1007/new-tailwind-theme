<?php get_header(); ?>

  <main class="custom_layout">
  <?php if (have_posts()) : 
        while (have_posts()) : 
        the_post(); 
        get_template_part( 'templates/partials/post-preview' );
    ?>
    <?php endwhile; endif; ?>
  </main>

<?
// get_sidebar();
get_footer();?>