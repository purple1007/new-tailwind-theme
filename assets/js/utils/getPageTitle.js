const $ = window.jQuery;
const $window = window.$window || $(window);

const getPageTitle = {
  init () {
    const str = $('#pageTitle')[0].innerHTML.slice(2)
    $('#innerTitle').text(str)
  }
}

export default getPageTitle;