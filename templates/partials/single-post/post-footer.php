<section class="post___footer">
  <div class="post___footer___container">
    <div>
      <span>上一篇</span>
      <h3>
        <?php previous_post_link('%link', '%title'); ?>
      </h3>
    </div>
    <div>
      <span>下一篇</span>
      <h3>
        <?php next_post_link('%link', '%title'); ?>
      </h3>
    </div>
  </div>

  <div class="post__back_btn">
    <a class="button__link" href="/blog"
       data-event-category="SinglePost" 
       data-event-action="Click"
       data-event-label="回到部落格"
    >
      回到部落格
    </a>
  </div>
</section>
