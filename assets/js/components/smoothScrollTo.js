const $ = window.jQuery;
const $window = window.$window || $(window);

const SmoothScrollTo = {
  init () {
    $('a[href*="#"]:not([href="#"])').click(function () {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        let target = $(this.hash);
        target = target.length ? target : $(`[name=${this.hash.slice(1)}]`);
        if (target.length) {
          $('html, body').stop(0, 1).animate({
            scrollTop: target.offset().top-80
          }, 800);
        }
      }
    });
  }
}

export default SmoothScrollTo;