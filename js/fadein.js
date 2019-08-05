$('head').append(
  '<style type="text/css">.is-hide{display:none;}</style>'
);

$(window).on("load",function() {
  $('body').fadeIn(2000).removeClass("is-hide");
});