(($) => {
  // DOM elements
  let $allCards;
  let $firstCard;
  let $readMoreButton;

  init();

  function init() {
    cacheDOM();
    $readMoreButton.on('click', openFullPost);
  }

  function cacheDOM() {
    $allCards = $('.js-all-cards');
    $readMoreButton = $allCards.find('.js-read-more');
  }

  function openFullPost(e) {
    e.preventDefault();
    resetCards();

    const $this = $(this);
    const $projectCard = $this.closest('.js-project-card');

    // execute stuff
    $firstCard = getFirstCard();
    // TODO: provide elegant way to animate all that stuff
    scrollToTop();
    hideContent($projectCard);
    showCardExtraContent($projectCard);
    moveCard($projectCard);
    animateCard($projectCard);
  }

  function resetCards() {
    $allCards
      .removeClass(VI_CONSTANTS.IS_OPEN_CSS_STATE_CLASS)
      .find('.js-project-card')
      .removeClass(VI_CONSTANTS.IS_OPEN_CSS_STATE_CLASS);

    resetContent();
  }

  function resetContent() {
    $allCards.find('.js-project-title').removeClass('u-hidden');
    $allCards.find('.js-project-excerpt').removeClass('u-hidden');
    $allCards.find('.js-project-extra-content').addClass('u-hidden');
    $allCards.find('.js-project-tags').removeClass('u-hidden');
  }

  function getFirstCard() {
    return $allCards.find('.js-project-card').first();
  }

  function scrollToTop() {
    window.scrollTo(0, 0);
  }

  function hideContent($card) {
    $card.find('.js-project-excerpt').addClass('u-hidden');
    $card.find('.js-project-tags').addClass('u-hidden');
    $card.find('.js-project-title').addClass('u-hidden');
  }

  function showCardExtraContent($card) {
    $card.find('.js-project-extra-content').removeClass('u-hidden');
  }

  function moveCard($card) {
    const isFirst = $card.is($firstCard);
    return !isFirst ? putAsFirst($card) : null
  }

  function putAsFirst($card) {
    return $card.detach().prependTo($allCards);
  }

  function animateCard($card) {
    $card.addClass(VI_CONSTANTS.IS_OPEN_CSS_STATE_CLASS);
    $allCards.addClass(VI_CONSTANTS.IS_OPEN_CSS_STATE_CLASS);
  }

})(jQuery);
