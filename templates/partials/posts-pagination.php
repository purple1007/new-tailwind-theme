<div class="custom_posts_pagination">
  <?php the_posts_pagination(array(
      'type'=>'list',
      'mid_size'  => 2,
      'prev_text' => __( '<', 'textdomain' ),
      'next_text' => __( '>', 'textdomain' ),
    )) ?>
</div>