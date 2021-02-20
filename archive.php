<?php get_header(); ?>

<main class="custom_layout archive">
  <?php get_template_part( 'templates/partials/archive/header' );?>
  <?php get_template_part( 'templates/pages/archive' );?>
  <? get_sidebar('sidebar', $args); ?>
</main>

<?
// get_sidebar();
get_footer();?>