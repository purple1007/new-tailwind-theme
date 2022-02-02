<div class="custom_widget widget_archive">
  <h3 class="custom_widget__title">彙整</h3>
  <ul>
    <?php
      wp_get_archives( 
        array( 
          'type'           => 'monthly', 
          '_exclude_terms' => array( 29, 27 ),
          'show_post_count' => true,
        ) 
      );
    ?>
  </ul>
</div>