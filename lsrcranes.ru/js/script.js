$('.main_slider.one-time').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true
});

 $('.slider-for').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   arrows: false,
   fade: true,
   asNavFor: '.slider-nav'
 });
 $('.slider-nav').slick({
   slidesToShow: 3,
   slidesToScroll: 1,
   asNavFor: '.slider-for',
   dots: false,
   focusOnSelect: true
 });

 $('a[data-slide]').click(function(e) {
   e.preventDefault();
   var slideno = $(this).data('slide');
   $('.slider-nav').slick('slickGoTo', slideno - 1);
 });


$('.foot_togle').click(function(){
	$(this).parents('.red_line').next('.padding_box').slideToggle();
	return false;
});

$('.dropdown__toggle').on('click', function(){
	$(this).toggleClass('active');
	$(this).parent('.nav-link').next('.dropdown-menu').slideToggle();
	return false;
})

$("[data-fancybox]").fancybox({
		// Options will go here
	});


