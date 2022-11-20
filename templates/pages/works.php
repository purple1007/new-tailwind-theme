<article class="custom_page works custom_single_post">
  <h1><?php the_title(); ?></h1>
  <div class="post__content">
    <?php the_content(); ?>
  </div>
  <div class="works__goHome">
    <a class="button__link" href="/category/projects" 
      data-event-category="Works" 
      data-event-action="Click"
      data-event-label="Projects"
    >
      查看專案
    </a>
    <a class="button__link_outline" href="/" 
      data-event-category="Works" 
      data-event-action="Click"
      data-event-label="回首頁"
    >
      回首頁
    </a>
  </div>
</article>