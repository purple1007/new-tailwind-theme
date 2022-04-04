<?php get_header(); ?>

<main class="custom_layout archive">
  <?php get_template_part( 'templates/partials/archive/header' );?>
  <?php get_template_part( 'templates/pages/archive' );?>
  <?php get_sidebar('sidebar'); ?>
</main>

<?php get_footer();?>