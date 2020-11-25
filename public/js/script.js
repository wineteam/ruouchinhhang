/*SEARCHING*/
$(document).ready(function(){
  $(".btnSearch").click(function(){
    $(".fixed-input-search").toggleClass("active").focus();
    $(".btnSearch").toggleClass("fa-window-close").focus();
  });
  function checkForInput(element) {
    // element is passed to the function ^

    const $button = $(element).siblings('#ButtonSearch');

    if ($(element).val().length > 0) {
      $button.addClass('input-has-value');
      $(".btnSearch").addClass("Display-None-Sr").focus();
    } else {
      $button.removeClass('input-has-value');
      $(".btnSearch").removeClass("Display-None-Sr").focus();
    }
  }

  // The lines below are executed on page load
  $('input.search').each(function() {
    checkForInput(this);
  });

  // The lines below (inside) are executed on change & keyup
  $('input.search').on('change keyup', function() {
    checkForInput(this);
  });

});
/* END SEARCHING*/
/* MENU DROPDOWN */
$(document).ready(function(){
  $("#btnMenuDropdown").click(function(){
    $(".sidenav-Moblie").toggleClass("active");
    $(".sidenav-Moblie").removeClass("icon-close-menu");
  });
  $("#btnCloseMenu").click(function(){
    $(".sidenav-Moblie").removeClass("active");
    $(".sidenav-Moblie").addClass("icon-close-menu");
  });
});
/* END MENU DROPDOWN */
/*CART*/
$(document).ready(function(){

  $(".cart-open").click(function(){
    $(".Cart-list").toggleClass("active").focus();
  });

});
/* END CART*/


/* CATALOG FILTER */
filterSelection("all");
function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
    FilterRemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) FilterAddClass(x[i], "show");
    }
}

function FilterAddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
}

function FilterRemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
    }
    element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btnfilter");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
    });
}
/* END CATALOG FILTER */


function scroll_to(clicked_link, nav_height) {
	var element_class = clicked_link.attr('href').replace('#', '.');
	var scroll_to = 0;
	if(element_class != '.top-content') {
		element_class += '-container';
		scroll_to = $(element_class).offset().top - nav_height;
	}
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 1000);
	}
}

