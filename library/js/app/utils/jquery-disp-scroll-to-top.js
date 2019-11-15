function dispScrollToTop() {
    if (!$('.scroll-to-top').is(':visible') && $(window).scrollTop() > 100) {
        $('.scroll-to-top').fadeIn(250);
    }
    if (!$('.scroll-to-top').is(':visible') && $(window).scrollTop() < 1) {
      $('.scroll-to-top').fadeOut(250);
  }
}