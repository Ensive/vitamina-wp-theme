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
    moveCard($projectCard);
    animateCard($projectCard);
  }

  function resetCards() {
    $allCards
      .removeClass(VI_CONSTANTS.IS_OPEN_CSS_STATE_CLASS)
      .find('.js-project-card')
      .removeClass(VI_CONSTANTS.IS_OPEN_CSS_STATE_CLASS);
  }

  function getFirstCard() {
    return $allCards.find('.js-project-card').first();
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
