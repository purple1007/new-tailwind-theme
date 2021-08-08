<?php get_header(); ?>

<!-- works page -->
<main class="custom_layout">
  <h1 class="page-title">
    <?php the_title(); ?>
  </h1>
  <?php $custom_fields = get_post_custom(); ?>

  <?php get_template_part( 'templates/pages/works' );?>
</main>

<? get_footer();?>