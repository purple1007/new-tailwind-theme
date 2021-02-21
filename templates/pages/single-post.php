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
      <div class="post__thumbnail">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php endif; ?>
    <div class="post__content">
      <?php the_content(); ?>
    </div>
    <div class="post__tags">
      Tags：<?php the_tags(''); ?>
    </div>
    
</article>
