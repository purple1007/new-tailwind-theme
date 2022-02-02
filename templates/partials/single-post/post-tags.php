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