<div class="postPreview">
  <a href="<?php the_permalink() ?>" 
    rel="bookmark" 
    title="Permanent Link to <?php the_title_attribute(); ?>">
    <h2><?php the_title(); ?></h2>
    <small><?php the_time('F jS, Y') ?></small>
    <?php the_excerpt(150);?>
  </a>
</div>
