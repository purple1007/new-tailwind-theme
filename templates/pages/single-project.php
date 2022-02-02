<article class="project container">
  <h1 class="post__title">
    <?php the_title(); ?>
  </h1>
  <?php if ( has_post_thumbnail()) : ?>
    <figure class="post__thumbnail">
      <?php the_post_thumbnail(); ?>
    </figure>
  <?php endif; ?>
  <section class="post__content">
    <?php the_content(); ?>
  </section>
  <?php get_template_part ("templates/partials/single-project/project-footer"); ?>
</article>

