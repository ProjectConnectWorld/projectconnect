$(document).ready(function(){
  $(".fa-funcl").click(function(){
    $(".left-side").addClass("hide_left");
    $(".togglel").addClass("opacity1");
  });
});
$(document).ready(function(){
  $(".togglel").click(function(){
    $(".left-side").removeClass("hide_left");
    $(".togglel").removeClass("opacity1");
  });
});

$(document).ready(function(){
  $(".fa-funcr").click(function(){
    $(".right-side").addClass("hide_right");
    $(".toggler").addClass("opacity1");
  });
});
$(document).ready(function(){
  $(".toggler").click(function(){
    $(".right-side").removeClass("hide_right");
    $(".toggler").removeClass("opacity1");
  });
});


$(document).ready(function(){
  $(".fa-nav").click(function(){
    $(".navb").addClass("hide_nav");
    $(".down-menu").addClass("opacity1");
  });
});
$(document).ready(function(){
  $(".down-menu").click(function(){
    $(".navb").removeClass("hide_nav");
    $(".down-menu").removeClass("opacity1");
  });
});

// With JQuery
$(document).ready(function() {
  $("#ex2").slider({});


});
