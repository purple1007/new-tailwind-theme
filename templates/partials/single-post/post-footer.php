<section class="post___footer">
  <div class="post___footer___container">
    <div>
      <span>Previous post</span>
      <h3>
      <?php 
        $prev_post = get_adjacent_post(false, '29,27', true);
        if(!empty($prev_post)) {
        echo '<a href="' . get_permalink($prev_post->ID) . '"
                 data-event-category="SinglePostFooter" 
                 data-event-action="PerviousNext"
                 data-event-label="' . $prev_post->post_title . '">
                ' . $prev_post->post_title . '
              </a>'; } 
      ?>
      </h3>
    </div>
    <div>
      <span>Next post</span>
      <h3>
        <?php 
          $next_post = get_adjacent_post(false, '29,27', false);
          if(!empty($next_post)) {
          echo '<a href="' . get_permalink($next_post->ID) . '"
                   data-event-category="SinglePostFooter" 
                   data-event-action="PerviousNext"
                   data-event-label="NextPost/' . $next_post->post_title . '">
                  ' . $next_post->post_title . '
                </a>'; } 
        ?>
      </h3>
    </div>
  </div>

  <div class="post__back_btn">
    <a class="button__link" href="/blog"
       data-event-category="SinglePostFooter" 
       data-event-action="Click"
       data-event-label="Link/Go back blog"
    >
      Go back blog
    </a>
  </div>
</section>