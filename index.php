<?php get_header(); ?>

<!-- Blog page -->
<main class="custom_layout index">
  <?php get_template_part( 'templates/partials/archive/header' );?>
  <?php get_template_part( 'templates/pages/archive' );?>
  <?php get_sidebar( 'sidebar', $args );?>
</main>

<?php get_footer();?>
