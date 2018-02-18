console.log('Hello Vitamin A!');

(($) => {
  setTimeout(init, 0);

  function init() {
    $('.js-project-card').each(function () {
      $(this).addClass('is-loaded');
    });
  }

})(jQuery);
