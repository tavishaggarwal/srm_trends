$(document).ready(function() {
 
  $('.img_over').hover(
    function(){
      $(this).find('.caption').slideDown(250);
    },
    function(){
      $(this).find('.caption').slideUp(250);
    }
  );
});

$(window).scroll(function(){
  var sticky = $('.header'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});