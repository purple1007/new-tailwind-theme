<?php get_header(); ?>

  <main class="custom_layout">
  <?php 
    // Check if there are any posts to display
    if ( have_posts() ) : ?>
    
    <header class="archive-header">
      <h1 class="archive-title">Category: <?php single_cat_title( '', false ); ?></h1>
    
    
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
      <p>Sorry, no posts matched your criteria.</p>
    <?php endif; ?>
    </div>
    </section>
 
  </main>

<?
// get_sidebar();
get_footer();?>