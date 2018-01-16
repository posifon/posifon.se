jQuery(document).ready(function ($) {
  // Inside of this function, $() will work as an alias for jQuery()
  // and other libraries also using $ will not be accessible under this shortcut
  var current;
    
  function expanderHide() {
    $('.expander-content').slideUp(200);
    $('.minimized').fadeIn(200);
    $('.expanded').fadeOut(200);
    return false;
  }
  
  $('.expander-container').on('click', function (e) {
    current = $(this);
    expanderHide();
    current.find('.expander-content').slideDown(200);
    current.children('.minimized').fadeOut(200);
    current.children('.expanded').fadeIn(200);
    return false;
  });
  
  $('.expanded').on('click', function () {
    current = $(this).parents('.expander-container');
    expanderHide();
    return false;
  });

  $('.expander-content').on('click', function (e) {
    e.stopPropagation();
  });
  
  $(document).on('click', function () {
    expanderHide();
  });

});