  <footer class="footer" id="footer">
    <div class="footer__container">
      <div class="footer__contact">
        <h1>Let's talk!</h1>
        <?php if ( has_nav_menu( 'footer_contact' ) ) : ?>
          <?php
            wp_nav_menu(
              array(
                'theme_location'  => 'footer_contact',
                'container_class' => 'footer__contact__container',
                'menu_class'     => 'footer__contact__links',
                'depth'          => 1,
              )
            );
          ?>
        <?php endif; ?>
      </div>
      <div class="footer__menu">
        <h2>Find me on</h2>
        <?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
          <?php
            wp_nav_menu(
              array(
                'theme_location'  => 'footer_menu',
                'container_class' => 'footer__menu__container',
                'menu_class'      => 'footer__menu__links',
                'depth'           => 1,
              )
            );
          ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="footer__copyright">
      <small>Copyright ©<script>document.writeln(new Date().getFullYear());</script> Debby Lin</small>
    </div>
    <a class="scroll_up" href="#">

      <!-- 讓 file_get_contents 取消 ssl  -->
      <?php 
        $stream_opts = [
          "ssl" => [
            "verify_peer"=>false,
            "verify_peer_name"=>false,
          ]
        ]; 
        echo $response = file_get_contents( get_stylesheet_directory_uri() . '/assets/img/materials/chevron-up.svg', false, stream_context_create($stream_opts) );
      ?>
      
    </a>
  </footer><!-- .footer-navigation -->

<?php wp_footer(); ?>
</body>
</html>