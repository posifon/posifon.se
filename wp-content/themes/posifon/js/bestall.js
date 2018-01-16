jQuery(document).ready(function ($) {
  // Inside of this function, $() will work as an alias for jQuery()
  // and other libraries also using $ will not be accessible under this shortcut 
  
  $('#popup').bPopup();
  
  // Toggles for forms and price list
  $('#privat').on('click', function () {
    $('.privat-toggle').show();
    $('.omsorg-toggle').hide();
  });
  
  $('#omsorg').on('click', function () {
    $('.privat-toggle').hide();
    $('.omsorg-toggle').show();
  });
  
  // Function which looks for the currently choosen unit and hides subscription periods not available.
  function hideInput(enhet, value) {
    var id = $('input[name=enhet]:checked').val().toLowerCase();
    if (id == enhet) {
      $("input[value='" + value + "']").parent().hide();
    } else {
      $('#abonnemang').find('label').show();
    }
  }
  
  hideInput('smartsole', 'Bundet 24 mån');
  
  // Function which looks for the currently choosen unit and shows the corresponding options (while hiding the others).
  function showOptions() {
    var id = $('input[name=enhet]:checked').val().toLowerCase();
    $('.alternativ').hide();
    $('#alternativ_' + id).show();
  }
  showOptions();
  
  $('input[name=enhet]').on('change', function () {
    showOptions();
    hideInput('smartsole', 'Bundet 24 mån');
  });

  // Index for keeping track of all units' options
  var index = {
    smartsole: 1,
    keruve: 1,
    geoskeeper: 1,
    posifonactive: 1
  };

  function replace(enhet, index) {
    var name = "undefined";
    $("#clone_" + enhet + index).find("select, input").each(function () {
      name = $(this).attr("name");
      name = name.replace(/\d+$/, "");
      $(this).attr("name", name + index);
    });
    return false;
  }

  function clone(enhet, cloneIndex) {
    var enhetIndex = $(this).prev("#clone_" + enhet + cloneIndex).attr("id").match(/\d+$/);
    cloneIndex = parseInt(enhetIndex, 10);
    $(this).prev("#clone_" + enhet + cloneIndex).clone()
      .insertBefore(this)
      .attr("id", "clone_" + enhet + (cloneIndex + 1))
      .children(".clonetext").text(enhet + " " + (cloneIndex + 1));
    cloneIndex += 1;
    replace(enhet, cloneIndex);
    return cloneIndex;
  }

  function remove(enhet, cloneIndex) {
    $(this).siblings("#clone_" + enhet + cloneIndex).remove();
    cloneIndex -= 1;
    return cloneIndex;
  }

  // Function which takes all options and puts them in a nice list in a hidden field to be able to email it all.
  function conclude() {
    var order = [],
      enhet = $("input:radio[name=enhet]:checked").val().toLowerCase(),
      i;
    for (i = 1; i <= index[enhet]; i += 1) {
      order[order.length] = (enhet + " " + i);
      $("#clone_" + enhet + i).find("select, input:checked").each(function () {
        var name = $(this).attr("name"),
          val = $(this).val();
        order[order.length] = (val);
      });
    }
    $("input[name=sammanfattning]").val(order.toString().replace(/,(?=\S)/g, "\n"));
  }

  $("input[type=submit]").on("click", conclude);

  $("button[name=clone]").on("click", function () {
    var enhet = $(this).val();
    index[enhet] = clone.call(this, enhet, index[enhet]);
  });
  $("button[name=remove]").on("click", function () {
    var enhet = $(this).val();
    if (index[enhet] > 1) {
      index[enhet] = remove.call(this, enhet, index[enhet]);
    }
  });
});
