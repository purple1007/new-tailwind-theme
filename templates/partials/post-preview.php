<div class="post_preview">
  <?php if ( has_post_thumbnail()) : ?>
    <div class="post_preview__thumbnail">
      <?php the_post_thumbnail(); ?>
    </div>
  <?php endif; ?>
  <div class="post_preview__content">
    <small class="post_preview__time">
      <?php the_date() ?>
      
    </small>
    <a 
      href="<?php the_permalink() ?>"
      title="<?php the_title_attribute(); ?>"
    >
      <h2 class="post_preview__title">
        <?php the_title(); ?>
      </h2>
    </a>
    <?php the_excerpt();?>
    <div>
      <a href="<?php get_the_permalink(); ?>" class="post_preview__link" rel="nofollow">Read more</a>
    </div>
  </div>
</div>
