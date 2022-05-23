$(".btn_menu").click(function() {

  var options = {
    direction: "right"
  };
  var effect = 'slide';
  var duration = 800;

  $(".nav-bar").toggle(effect, options, duration);

});

$(".btn_menu").click(function() {
  $(this).toggleClass("active");
});