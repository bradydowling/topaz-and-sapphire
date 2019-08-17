(function($) {
    'use strict';

    // nProgress loading bar
    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);

    // Flexslider
    $('#slider-header').flexslider({
        animation: 'slide',
        animationLoop: false,
        itemWidth: 200,
        maxItems: 7,
        slideshow: false,
        controlNav: true
    });

    // FitVids
    $('#primary article.hentry .embed-player').fitVids();

    // Back to top
    $('#backtotop').each(function(){
        $(this).click(function(){ 
            $('html,body').animate({ scrollTop: 0 }, 'slow');
            return false; 
        });
    });

    // Mobile menu
    $('#main-menu ul.main-menu').mobileMenu();
    
    $( '.float-label input, .float-label textarea' ).floatingPlaceholder({
      placeholderActiveColor: "#000",
      placeholderIdleColor : "#aaa"
    });

    // Wow
    var wow = new WOW(
      {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       20,          // distance to the element when triggering the animation (default is 0)
        mobile:       true        // trigger animations on mobile devices (true is default)
      }
    );
    wow.init();

    // Remove text label search widget
    $( "label.screen-reader-text" ).empty();

    // Instagram Feed
    $('#sbi_load').each(function() {
      if ($(this).html())
          $(this).css('margin', '20px 0 50px 0');
    });

    // justifiedGallery
    $(window).load(function() {
      var hentryWidth = $('.inner .entry-content').outerWidth();
      $('.warrior-gallery').justifiedGallery({
          rowHeight: 150,
          maxRowHeight: 0,
          lastRow : 'justify'
      });
      $('.justified-gallery').css('width', hentryWidth);
      $('.justified-gallery a').addClass('thickbox');
    })
    
})(jQuery);