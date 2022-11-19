<section class="recent_posts home__section">
  <h2>
    <a href="/blog"
       data-event-category="HomeRecentPosts" 
       data-event-action="Click"
       data-event-label="Articles"
    >
      Articles</a>
  </h2>
  
  <div class="recent_posts__container">
    <?php
    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 4, 
        'post_status' => 'publish'
    ));
    foreach( $recent_posts as $post_item ) : ?>
    <div>
      <figure   class="recent_posts__thumbnail">
        <a href="<?php echo get_permalink($post_item['ID']) ?>"
            data-event-category="HomeRecentPosts" 
            data-event-action="Click"
            data-event-label="<?php echo $post_item['post_title'] ?>/Thumbnail"
        >
          <?php echo get_the_post_thumbnail($post_item['ID'], ''); ?>
        </a>
      </figure>
      
      <h3 class="recent_posts__title">
        <a href="<?php echo get_permalink($post_item['ID']) ?>"
          data-event-category="HomeRecentPosts" 
          data-event-action="Click"
          data-event-label="<?php echo $post_item['post_title'] ?>/Title"
        >
          <?php echo $post_item['post_title'] ?>
        </a>
      </h3>
      <small><?php echo date('n/j/Y', strtotime($post_item['post_date'])); ?>・<?php $category = get_the_category($post_item['ID']); 
        echo $category[0]->cat_name; ?>
      </small>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="recent_posts__goBlog">
    <a class="button__link" href="/blog" 
       data-event-category="HomeRecentPosts" 
       data-event-action="Click"
       data-event-label="閱讀更多文章"
    >
      閱讀更多文章
    </a>
  </div>
</section>