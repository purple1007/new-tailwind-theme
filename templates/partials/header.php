<header id="masthead" class="header">
  <nav id="site-navigation" class="header__navigation">
    <h1 class="header__navigation__site-name">
      <a href="/">
        <?php bloginfo( 'name' ); ?>
      </a>
    </h1>
    <?php if ( has_nav_menu( 'navigation' ) ) : ?>
      <?php
        wp_nav_menu(
          array(
            'theme_location'  => 'navigation',
            'container_class' => 'header__navigation__container',
            'menu_class'      => 'header__navigation__links',
            'fallback_cb'     => false,
          )
        );
      ?>
    <?php endif; ?>
    <a class="header__navigation__close" id="closeBtn">
      <span class="line"></span>
      <span class="line"></span>
      <span class="line"></span>
    </a>
  </nav><!-- #site-navigation -->
</header>
