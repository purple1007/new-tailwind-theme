const $ = window.jQuery;
const $window = window.$window || $(window);

const Navbar = {
  init () {
    $('#closeBtn').click(function(){
      $(this).toggleClass('active')
      $('.header__navigation').toggleClass('active')
    })
    $(window).resize(function(){
      const width = $(window).width();
      if (width > 768) {
        $('.header__navigation').removeClass('active')
        $('#closeBtn').removeClass('active')
      }
    })
  }
}

export default Navbar;
