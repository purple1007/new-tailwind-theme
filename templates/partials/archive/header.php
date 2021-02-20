<header class="archive-header">
  <!-- 分類 -->
  <?php
    if ( is_category() ) : ?>
    <h1 class="page-title">
      <?php $category = get_the_category(); 
        echo $category[0]->cat_name; ?>
    </h1>
  <?php endif; ?>

  <!-- 標籤 -->
  <?php
    if ( is_tag() ) : ?>
    <h1 class="page-title">
      Tag: <?php wp_title('');?>
    </h1>
  <?php endif; ?>
</header>