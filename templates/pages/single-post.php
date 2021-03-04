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
      Tags: 
      <?php
          $post_tags = get_the_tags();
          if ( $post_tags ) {
            foreach( $post_tags as $tag ) {
              echo '
                <a data-event-category="PostTags"
                  data-event-action="Click"
                  data-event-label="Tag/' . $tag->name . '" 
                  href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>' . ',' . ' 
              '; 
            }
          }
        ?>
    </div>
    
</article>

