<article class="post custom_container">
    <h1 class="post__title">
      <?php the_title(); ?>
    </h1>
    <small class="post__detail">
      <?php the_date() ?> ・
      <?php $category = get_the_category(); 
        echo $category[0]->cat_name; ?>
    </small>
    <?php if ( has_post_thumbnail()) : ?>
      <figure class="post__thumbnail">
        <?php the_post_thumbnail(); ?>
      </figure>
    <?php endif; ?>
    <section class="post__content">
      <?php the_content(); ?>
    </section>
    <?php get_template_part ("templates/partials/single-post/post-tags"); ?>
</article>

