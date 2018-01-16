jQuery(document).ready(function ($) {
  // Inside of this function, $() will work as an alias for jQuery()
  // and other libraries also using $ will not be accessible under this shortcut 

  // function cousins() used by tab-box
  (function ($) {
    $.fn.cousins = function (selector) {
      var cousins;
      this.each(function () {
        var auntsAndUncles = $(this).parent().siblings();
        auntsAndUncles.each(function () {
          if (cousins == null) {
            if (selector)
              cousins = auntsAndUncles.children(selector);
            else
              cousins = auntsAndUncles.children();
          } else {
            if (selector)
              cousins.add(auntsAndUncles.children(selector));
            else
              cousins.add(auntsAndUncles.children());
          }
        });
      });
      return cousins;
    }
  })(jQuery);
  
  // tab-box 
  $('.tab-nav').show();
  
  var currentTab = 0; // selects which tab to open by default

  function openTab(clickedTab) {
    var thisTab = $(".tab-nav li a").index(clickedTab); // gets the index of the clicked tab
    clickedTab.cousins().removeClass("active"); // selects the other a-elemnts in the same tab-box
    clickedTab.addClass("active"); // adds active class to clicked tab
    clickedTab.parents(".tab-box").find(".tab-content").hide(); // hides any open content related to the clicked tab
    $(".tab-box .tab-content:eq(" + thisTab + ")").show(); // opens the tab with the correct index
    currentTab = thisTab; // saves open tab index (might be uneeded)
  }
  
  $(".tab-nav li a").on('click', function (e) {
    e.preventDefault(); // prevents following the anchor link.
    openTab($(this)); // calls function openTab with the current tab object as argument. 
  });

  $(".active").each(function () { // loops through all tab-boxes and clicks to open content on page load
    $(this).trigger("click");
  });

});
