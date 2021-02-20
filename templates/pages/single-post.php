<section class="post">
  <article class="post__container">
    <h1 class="post__title">
      <?php the_title(); ?>
    </h1>
    <small class="post__detail">
      <?php the_date() ?> ・
      <?php $category = get_the_category(); 
        echo $category[0]->cat_name; ?>
    </small>
    <?php if ( has_post_thumbnail()) : ?>
      <div class="post__thumbnail">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php endif; ?>
    <div class="post__content">
      <?php the_content(); ?>
    </div>
  </article>

  <section class="post___footer">
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
  </section>
  <div class="post__back_btn">
    <a class="button__link" href="/blog" >回到部落格</a>
  </div>

</section>
