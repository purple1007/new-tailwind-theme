<section class="recent_posts home__section">
  <h2>
    <a href="/category/projects"
      data-event-category="HomeRecentProjects" 
        data-event-action="Click"
        data-event-label="Projects"
    >
      Projects
    </a>
  </h2>
  
  <div class="recent_posts__container">
    <?php
    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 4, 
        'post_status' => 'publish',
        'category' => '29, 27'
    ));
    foreach( $recent_posts as $post_item ) : ?>
    <div>
      <figure   class="recent_posts__thumbnail">
        <a href="<?php echo get_permalink($post_item['ID']) ?>"
            data-event-category="HomeRecentProjects" 
            data-event-action="Click"
            data-event-label="<?php echo $post_item['post_title'] ?>/Thumbnail"
        >
          <?php echo get_the_post_thumbnail($post_item['ID'], ''); ?>
        </a>
      </figure>
      
      <h3 class="recent_posts__title">
        <a href="<?php echo get_permalink($post_item['ID']) ?>"
          data-event-category="HomeRecentProjects" 
          data-event-action="Click"
          data-event-label="<?php echo $post_item['post_title'] ?>/Title"
        >
          <?php echo $post_item['post_title'] ?>
        </a>
      </h3>
    </div>
    <?php endforeach; ?>
  </div>
</section>