<div class="post_preview">
<div class="post_preview__content">
    <h2 class="post_preview__title">
      <a 
        href="<?php the_permalink() ?>"
        title="<?php the_title_attribute(); ?>"
        data-event-category="ArchivePost" 
        data-event-action="Click"
        data-event-label="<?php the_title(); ?>/Title"
      >
      <?php the_title(); ?>
      </a>
    </h2>
    <div class="post_preview__excerpt">
      <?php the_excerpt();?>
    </div>
    <small class="post_preview__detail">
      <?php the_date() ?>・<?php $category = get_the_category(); 
        echo $category[0]->cat_name; ?>
    </small>
  </div>
  <?php if ( has_post_thumbnail()) : ?>
    <figure class="post_preview__thumbnail">
      <a 
        href="<?php the_permalink() ?>"
        title="<?php the_title_attribute(); ?>"
        data-event-category="ArchivePost" 
        data-event-action="Click"
        data-event-label="<?php the_title(); ?>/Thumbnail"
      >
      <?php the_post_thumbnail(); ?>
      </a>
    </figure>
  <?php endif; ?>

</div>
