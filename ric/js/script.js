 $('.search').click(function() {
   $('.header__bottom').toggleClass('active_form');
 });

$(function() {
   $(window).scroll(function() {
     if($(this).scrollTop() != 0) {
       $('#toTop').fadeIn();
     } else {
       $('#toTop').fadeOut();
     }
   });
   $('#toTop').click(function() {
     $('body,html').animate({scrollTop:0},800);
   });
});

$(".navbar-toggler").click(function() {

$(".navbar-collapse").slideToggle(1000);
});