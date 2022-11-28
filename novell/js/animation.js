function startAnimate() {
	const wow = new WOW(
		{
		  boxClass:     'wow',
		  animateClass: 'animate__animated',
		  offset:       0, 
		  mobile:       true,
		  live:         true,
		  callback:     function(box) {},
		  scrollContainer: null, 
		  resetAnimation: true,
		}
	 );
	wow.init();
}

$(document).ready(function () {
	$(this).scrollTop(0);

	Splitting({
		/* target: String selector, Element, Array of Elements, or NodeList */
		target: "[data-splitting]",
		/* by: String of the plugin name */
		by: "chars",
		/* key: Optional String to prefix the CSS variables */
		key: null
	});
	


	

	//$(window).on("mousewheel DOMMouseScroll", SmoothScroll());

// 	$("body").mCustomScrollbar({
// 		theme:"minimal-dark"
//   });

	SmoothScroll({
		// Время скролла 400 = 0.4 секунды
		animationTime: 1000,
		// Размер шага в пикселях 
		stepSize: 75,

		// Дополнительные настройки:

		// Ускорение 
		accelerationDelta: 30,
		// Максимальное ускорение
		accelerationMax: 2,

		// Поддержка клавиатуры
		keyboardSupport: true,
		// Шаг скролла стрелками на клавиатуре в пикселях
		arrowScroll: 50,

		// Pulse (less tweakable)
		// ratio of "tail" to "acceleration"
		pulseAlgorithm: true,
		pulseScale: 4,
		pulseNormalize: 1,

		// Поддержка тачпада
		touchpadSupport: true,
	});





gsap.fromTo($('.carousel_item_img'), {duration: 3, y: 0, x: "100%", opacity: 0}, {duration: 3, ease: "expo.out", x: 0, opacity: 1});
$('.main_carousel').on('beforeChange', function(event, slick, currentSlide, nextSlide){
 gsap.fromTo($('.carousel_item_img'), { duration: 3, x: "100%", opacity: 0 }, { duration: 3, ease: "expo.out", x: 0, opacity: 1 });
 Splitting();
});
	
	
// gsap.fromTo($('.main_nav'), { delay: 2, duration: 3, x: -100%, opacity: 0 }, { duration: 3, ease: "expo.out", x: 0, opacity: 1 });

	
	
// main_carousel
	
const mainTl = gsap.timeline();
ScrollTrigger.create({
	animation: mainTl,
	trigger: '.main_carousel',
	start: "top top", 
	end: "bottom top",
	scrub: true,
});

	mainTl.to(".main_carousel .carousel_item_title", { yPercent: -100, duration: 1 })
		//.to(".main_carousel .carousel_item_img", {x: 100, duration:1})
		.to(".bottom_scroll", {yPercent: 50, duration:1});

	
// section_catalog
	
const catalogTl = gsap.timeline();
ScrollTrigger.create({
	animation: catalogTl,
	trigger: '.section_catalog',
	start: "top top", 
	end: "bottom top",
	scrub: true,
});

catalogTl.to(".section_catalog .carousel_item_title", { yPercent: -100})
		.to(".section_catalog .carousel_item_img", {yPercent: 50, duration:0.5});

	
// gsap.from(".catalog_carousel", {
// 	xPercent: 100,
// 	ease: "none",
// 	scrollTrigger: {
// 		trigger: ".section_catalog",
// 		// start: "-=200", 
// 		//  end: "top",
// 		  scrub: true
// 	}, 
// });
	
// section_about
const aboutTl = gsap.timeline();
ScrollTrigger.create({
	animation: aboutTl,
	trigger: '.section_about',
	start: "top top", 
	end: "bottom top",
	scrub: true,
});

aboutTl.to(".about_img", { yPercent: -50, duration: 3})
		.to(".about_text",  { yPercent: -50, duration: 3})
		.to(".about_bottom", { yPercent: -50, duration: 3 });
	
	
// section_service
const serviceTl = gsap.timeline();
ScrollTrigger.create({
	animation: serviceTl,
	trigger: '.section_service',
	start: "top top", 
	end: "bottom top",
	scrub: true,
});
	serviceTl.to(".section_service .section_title", { yPercent: -100, duration: 3 });
	serviceTl.to(".section_service .service_row", { yPercent: -20, duration: 5 });

	

	
	const partnersTl = gsap.timeline();
	var tl = gsap.timeline();
	ScrollTrigger.create({
		animation: partnersTl,
		trigger: '.section_partners',
		start: "-=500", 
		end: "bottom top",
		scrub: true,
		//onEnter: partners,
		
	});

	// function partners() {
	// 	 $('.section_partners .partners_item').each(function (index) {
	// 		tl.from(this, 0.5, { opacity: 0, xPercent: 100, delay: 0.3, duration: 1 });
	// 	});
	// 	}
		
	partnersTl.from(".partners_carousel_wrap", { opacity: 0 })
		//.from(".section_partners .partners_item", { opacity: 0, xPercent: 100, delay: 0.3, duration: 1 })
		.to(".section_partners .section_title", { yPercent: -100 })
		.to(".partners_carousel_wrap", { yPercent: -20 });
		//gsap.from(".partners_carousel_wrap", {duration: 1.5, opacity: 0});

// section_news
	

	
	
	
	
	
	



});