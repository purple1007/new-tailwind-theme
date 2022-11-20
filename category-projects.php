<?php get_header(); ?>
<!-- projects page -->
<main class="custom_layout projects">
  <header class="archive-header w-full">
    <h1 class="page-title">Projects</h1>
  </header>
  <div class="summary"><?php echo category_description()?></div>
  <div class="custom_container">
    <?php if ( have_posts() ) : ?>
      <?php
        // The Loop
        while ( have_posts() ) : the_post(); 
          get_template_part( 'templates/partials/project-preview' );
      ?>

    <?php endwhile; else: ?>
      <p>目前尚無文章</p>
    <?php endif; ?>
  </div>
  <div class="go_works">
    <a class="button__link" href="/works" 
      data-event-category="Works" 
      data-event-action="Click"
      data-event-label="Works"
    >
      Works
    </a>
  </div>
</main>

<?php get_footer();?>