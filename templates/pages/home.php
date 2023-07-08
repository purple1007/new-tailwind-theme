<article class="custom_home">
  <section class="home__section">
    <?php dynamic_sidebar( 'home_title_widget' ); ?>
    <?php dynamic_sidebar( 'home_description_widget' ); ?>
  </section>
  
  <?php get_template_part( 'templates/partials/home/recent-projects' ); ?>
  <?php get_template_part( 'templates/partials/home/recent-posts' ); ?>
  <?php get_template_part( 'templates/partials/home/recent-works' ); ?>
  
</article>