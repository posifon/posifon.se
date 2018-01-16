jQuery(document).ready(function ($) {
  // Inside of this function, $() will work as an alias for jQuery()
  // and other libraries also using $ will not be accessible under this shortcut

  
  var jsSrc = $('script[src*=main]').attr('src');  // the js file path
  jsSrc = jsSrc.replace(/main\.js.*$/, ''); // the js folder path
  
  // Smooth scrolling to anchor
  $('a[href*=#]:not([href=#])').click(function () {
    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') || location.hostname === this.hostname) {

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 600);
        return false;
      }
    }
  });
  
  $('#nav-button').on('click', function () {
    $('#nav').slideToggle();
  });
  
  // Flexbox polyfill
  (function ($, window, document, undefined) {
    'use strict';

    var s = document.body || document.documentElement,
      s = s.style;
    if (s.webkitFlexWrap === '' || s.msFlexWrap === '' || s.flexWrap === '') return true;

    var $list = $('.row'),
      $items = $list.find('.flexbox'),
      setHeights = function () {
        $items.css('height', 'auto');

        var perRow = Math.floor($list.width() / $items.width());
        if (perRow === null || perRow < 2) return true;
        var i,
          j;
        for (i = 0, j = $items.length; i < j; i += perRow) {
          var maxHeight = 0,
            $row = $items.slice(i, i + perRow);

          $row.each(function () {
            var itemHeight = parseInt($(this).outerHeight());
            if (itemHeight > maxHeight) maxHeight = itemHeight;
          });
          $row.css('height', maxHeight);
        }
      };

    setHeights();
    $(window).on('resize', setHeights);
    $list.find('img').on('load', setHeights);

  })(jQuery, window, document);
  // end Flexbox polyfill

  Modernizr.load({
    test: Modernizr.cssremunit,
    nope: (jsSrc + '/rem.min.js')
  });

});
