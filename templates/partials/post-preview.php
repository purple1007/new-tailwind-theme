<div class="post_preview">
  <?php if ( has_post_thumbnail()) : ?>
    <div class="post_preview__thumbnail">
      <a 
          href="<?php the_permalink() ?>"
          title="<?php the_title_attribute(); ?>"
        >
      <?php the_post_thumbnail(); ?>
      </a>
    </div>
  <?php endif; ?>
  <div class="post_preview__content">
    <small class="post_preview__detail">
      <?php the_date() ?>・<?php $category = get_the_category(); 
        echo $category[0]->cat_name; ?>
    </small>
    <h2 class="post_preview__title">
      <a 
        href="<?php the_permalink() ?>"
        title="<?php the_title_attribute(); ?>"
      >
      <?php the_title(); ?>
      </a>
    </h2>
    <?php the_excerpt();?>
    <div>
      <a href="<?php get_the_permalink(); ?>" class="post_preview__link" rel="nofollow">Read more</a>
    </div>
  </div>
</div>
