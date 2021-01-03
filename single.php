<?php get_header(); ?>

  <main class="SiteMain SiglePost">
    <?php if (have_posts()) : 
        while (have_posts()) : 
        the_post(); 
        get_template_part ("templates/partials/content/post")
    ?>
      
    <?php endwhile; endif; ?>
  </main>

<?
get_footer();