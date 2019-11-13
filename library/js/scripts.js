/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


// TOGGLE NAV MENU ANIMATION
const menuTrigger = document.querySelector(".menu-trigger");
const headerNav = document.querySelector(".header-nav");

window.onload = () => {
    menuTrigger.addEventListener("click", () => {
        headerNav.classList.toggle("open");
        menuTrigger.classList.toggle("cross");
    });    
}

// HEADER SHRINK ANIMATION
window.onscroll = () => {
    headerShrink();
}
function headerShrink() {
    const pos1 = document.documentElement.scrollTop;
    const pos2 = document.body.scrollTop;
    const header = document.querySelector(".header");
    if( pos1 > (window.innerHeight/2) || pos2 > (window.innerHeight/2) ) {
        header.classList.add("fixed");
    } else {
        header.classList.remove("fixed");
    }
    if( pos1 > (window.innerHeight) || pos2 > (window.innerHeight) ) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
}

/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

    var h = $(window).height(); //ブラウザウィンドウの高さを取得
    $('#body').css('display','none'); //初期状態ではメインコンテンツを非表示
    $('#loader-bg ,#loader').height(h).css('display','block'); //ウィンドウの高さに合わせでローディング画面を表示
    });
    $(window).load(function () {
    $('#loader-bg').delay(2000).fadeOut(800); //$('#loader-bg').fadeOut(800);でも可
    $('#loader').delay(2800).fadeOut(300); //$('#loader').fadeOut(300);でも可
    $('#body').css('display', 'block'); // ページ読み込みが終わったらメインコンテンツを表示する

  // scroll to top button
  dispScrollToTop();

  $(window).scroll(function() {
    dispScrollToTop();
  });
  $(window).resize(function() {
    dispScrollToTop();
  });

  $(document).on('click', '.scroll-to-top', function() {
      
      $('html,body').animate({
          scrollTop: 0,
      }, 250, 'swing');
  });

  function dispScrollToTop() {
      if (!$('.scroll-to-top').is(':visible') && $(window).scrollTop() > 100) {
          $('.scroll-to-top').fadeIn(250);
      }
      if (!$('.scroll-to-top').is(':visible') && $(window).scrollTop() < 1) {
        $('.scroll-to-top').fadeOut(250);
    }
  }

}); /* end of as page load scripts */

