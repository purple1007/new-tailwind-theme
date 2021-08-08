<section class="home__section recent_works">
    <h3>Works</h3>
    <h2>近期作品＿＿</h2>
    <?php if ( function_exists( 'rl_gallery' ) ) { rl_gallery( ['id' => '409'] ); }
    ?>
    <div class="recent_works__goWorks">
      <a class="button__link" href="/works" 
        data-event-category="HomeRecentWorks" 
        data-event-action="Click"
        data-event-label="更多作品"
      >
        更多作品
      </a>
    </div>
  </section>