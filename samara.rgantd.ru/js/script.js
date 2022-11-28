
$('.main_carusel').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true
});
$('.event_carusel').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true
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

$('.footer__buttons__search a').on('click', function(){
  $('body,html').animate({scrollTop:0},800);
  $( ".bg-search .form-control" ).focus();
  return false;
});
// $('.sidebar_nav_toggler .navbar-toggler-icon').on('click', function(){
//   $(".sidebar").slideToggle();
// });

$('.header__menu .navbar-toggler').on('click', function(){
$('.sidebar').slideToggle('fast')
})

$("[data-fancybox]").fancybox({
    // Options will go here
  });