var fadeTime = 2000,
    fadeSelector = 'fadeout';
$(function() {
  $('a.fadelink').on('click', function(e){
    e.preventDefault();
    url = $(this).attr('href');
    if (url !== '') {
      $('body').addClass(fadeSelector);
      setTimeout(function(){
        window.location = url;
      }, fadeTime);
    }
    return false;
  });
});
$(window).on('load', function(){
  $('body').removeClass(fadeSelector);
});