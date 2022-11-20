<section class="home__section recent_works">
    <h2>
      <a href="/works"
        data-event-category="HomeRecentWorks" 
        data-event-action="Click"
        data-event-label="Works"
      >
        Works
      </a>
    </h2>
    <div>
      <?php if ( function_exists( 'rl_gallery' ) ) { rl_gallery( ['id' => '409'] ); }
      ?>
    </div>
  </section>