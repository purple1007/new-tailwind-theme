<section class="project___footer">
  <h3>More projects</h3>
  <div class="project___footer___container">
    <?php 
      $prev_post = get_adjacent_post(false, '11,1,2,4', true,);
      if(!empty($prev_post)) {
      echo '<div class="project___footer__item"><a href="' . get_permalink($prev_post->ID) . '"
                data-event-category="SinglePostFooter" 
                data-event-action="PerviousNext"
                data-event-label="' . $prev_post->post_title . '">
              ' . get_the_post_thumbnail($prev_post->ID) . '
            </a></div>'; } 
    ?>
    <?php 
      $next_post = get_adjacent_post(false, '11,1,2,4', false,);
      if(!empty($next_post)) {
      echo '<div class="project___footer__item"><a href="' . get_permalink($next_post->ID) . '"
                data-event-category="SinglePostFooter" 
                data-event-action="PerviousNext"
                data-event-label="NextPost/' . $next_post->post_title . '">
              ' . get_the_post_thumbnail($next_post->ID) . '
            </a></div>'; } 
      ?>
  </div>

  <div class="post__back_btn">
    <a class="button__link" href="/category/projects"
       data-event-category="SingleProjectFooter" 
       data-event-action="Click"
       data-event-label="Link/回到專案列表"
    >
      Go back projects
    </a>
  </div>
</section>