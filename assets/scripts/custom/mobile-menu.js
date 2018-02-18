(($) => {
  const $mobileMenuToggle = $('.js-mobile-menu-toggle');
  const $menu = $('.js-menu');

  init();

  function init() {
    $mobileMenuToggle.on('click', toggleMenu);
  }

  function toggleMenu(e) {
    e.preventDefault();
    $(this).toggleClass('is-open');
    $menu.slideToggle(400);
  }

})(jQuery);
