<section class='recent_posts home__section'>
  <h3>Recent articles ＿＿</h3>
  <h2><a href='/blog'>近期的文章＿＿</a></h2>
  
  <div class='recent_posts__container'>
    <?php
    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 4, 
        'post_status' => 'publish'
    ));
    foreach( $recent_posts as $post_item ) : ?>
    <div>
      <a href='<?php echo get_permalink($post_item['ID']) ?>'
         data-event-category='HomeRecentPosts' 
         data-event-action='Click'
         data-event-label='<?php echo $post_item['post_title'] ?>/Title'
      >
        <h3 class='recent_posts__title'>
          <?php echo $post_item['post_title'] ?>
        </h3>
      </a>
      <small><?php echo date('n/j/Y', strtotime($post_item['post_date'])); ?>・<?php $category = get_the_category($post_item['ID']); 
        echo $category[0]->cat_name; ?>
      </small>
        <a href='<?php echo get_permalink($post_item['ID']) ?>'
           data-event-category='HomeRecentPosts' 
           data-event-action='Click'
           data-event-label='<?php echo $post_item['post_title'] ?>/Thumbnail'
        >
        <div class='recent_posts__thumbnail'>
          <?php echo get_the_post_thumbnail($post_item['ID'], ''); ?>
        </div>
      </a>
    </div>
    <?php endforeach; ?>
  </div>
  <div>
  <div class='recent_posts__goBlog'>
    <a class='button__link' href='/blog' 
       data-event-category='HomeRecentPosts' 
       data-event-action='Click'
       data-event-label='閱讀更多文章'
    >
      閱讀更多文章
    </a>
  </div>
  </div>
</section>