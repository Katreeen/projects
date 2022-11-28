$(document).ready(function () {
	$('.main_carousel').slick({
		dots: true,
		//arrows: false,
		prevArrow: $('.main_carousel_wrap .s-prev'),
   	nextArrow: $('.main_carousel_wrap .s-next'),
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		slidesToShow: 1
		//adaptiveHeight: true
	});
	

	


	$('.catalog_carousel').slick({
		dots: false,
		arrows: false,
		infinite: true,
		speed: 1000,
		slidesToShow: 1,
		responsive: [
			{
			  breakpoint: 1920,
			  settings: {
					variableWidth: true,
			  }
			},
			{
			  breakpoint: 575,
			  settings: {
					variableWidth: false,
				 
			  }
			}
		 ]
	});
	$('.catalog_image_carousel').slick({
		dots: false,
		//arrows: false,
		prevArrow: $('.catalog_image_carousel_nav .s-prev'),
   	nextArrow: $('.catalog_image_carousel_nav .s-next'),
		infinite: true,
		speed: 1000,
		fade: true,
		slidesToShow: 1,
		//adaptiveHeight: true
	});
	$('.catalog_image_carousel').on('afterChange', function (event, slick, currentSlide, nextSlide) {
		$('.catalog_info .catalog_items .catalog_item_title').removeClass('active');
		console.log(currentSlide);
		if (currentSlide == '0') {
			$('.catalog_info .catalog_items .catalog_item_title').first().addClass('active');
		} else {
			$('.catalog_info .catalog_items .catalog_item_title').last().addClass('active');
		}
		
	});
	



	$('.partners_carousel').slick({
		dots: false,
		prevArrow: $('.partners_carousel_nav .s-prev'),
   	nextArrow: $('.partners_carousel_nav .s-next'),
		infinite: false,
		speed: 800,
		variableWidth: true,
		responsive: [
			{
			  breakpoint: 1920,
			  settings: {
					variableWidth: true,
					slidesToShow: 4,
			  }
			},
			{
			  breakpoint: 1199,
			  settings: {
					variableWidth: false,
					slidesToShow: 4,
				 
			  }
			},
			{
			  breakpoint: 767,
			  settings: {
					variableWidth: false,
					slidesToShow: 3,
				 
			  }
			},
			{
			  breakpoint: 575,
			  settings: {
					variableWidth: true,
					slidesToShow: 1,
					//centerMode: true,
				 
			  }
			}
		 ]
	});

	$('.partners_item.slick-active').first().find('.partners_item_info').css({"opacity" : "1"});
	$('.partners_carousel').on('afterChange', function(){
		$('.partners_item').find('.partners_item_info').css({"opacity" : "0"});
		$('.partners_item.slick-active').first().find('.partners_item_info').css({"opacity" : "1"});
	});
	$('.partners_carousel').on('beforeChange', function(){
		$('.partners_item').find('.partners_item_info').css({"opacity" : "0"});
		
	});

	 $('.recomended_carousel').slick({
		prevArrow: $('.card_recomended_nav .arrow-prev'),
		nextArrow: $('.card_recomended_nav .arrow-next'),
		dots: false,
	
		infinite: false,
		speed: 1000,
		slidesToShow: 2,
		responsive: [
			{
			  breakpoint: 1920,
			  settings: {
				
					slidesToShow: 2,
			  }
			},
			
			{
			  breakpoint: 767,
			  settings: {
				
					slidesToShow: 1,
				 
			  }
			},

		 ]
	 });
	
	 $('.news_carousel').slick({
		prevArrow: $('.news_carousel_nav .arrow-prev'),
		nextArrow: $('.news_carousel_nav .arrow-next'),
		dots: false,
	
		infinite: true,
		speed: 1000,
		slidesToShow: 1,
		variableWidth: true,
		centerMode: true,
		//adaptiveHeight: true
	});
	$('#vacancies_list_name').selectmenu({
		change: function (event, ui) {
			let filter = ui.item.value;
			//console.log(filter);
			if (filter == 'all') {
				$('.vacancies_item').removeClass('hide');	
			} else {
				$('.vacancies_item').addClass('hide');
				$('.vacancies_item[data-name="' + filter + '"]').removeClass('hide');
			}
			
		}
	 });

	if ($('#map').length) {
		mapboxgl.accessToken = 'pk.eyJ1IjoiZWthdGVyZWVlbmEiLCJhIjoiY2tvdTFheDQ1MDJmYjJ2cGYyaXBqdHBieSJ9.XDRLOqrNfGxYgqByJ5zQCg';
		var map = new mapboxgl.Map({
			attributionControl: false,
			container: 'map',
			style: 'mapbox://styles/ekatereeena/ckp2gw6ko6e0517mhs7hqu99u',
			center: [50.12975967591858, 53.09823883237333],
			zoom: 9
		});
		map.addControl(new mapboxgl.NavigationControl());
		// .addControl(new mapboxgl.AttributionControl({
		// 	compact: true
		// 	}));

		// Create a default Marker and add it to the map.
		var marker1 = new mapboxgl.Marker()
			.setLngLat([50.12975967591858, 53.09823883237333])
			.addTo(map);
	
	}

	// CURSOR
var cursor = $(".cursor");

function moveCircle(e) {
	TweenLite.to(cursor, 0.3, {
	  css: {
		left: e.clientX,
		top: e.clientY,
		opacity: 1,
			
	  }
	});
 }

$(".catalog_carousel .slick-list").on("mouseover", function() {
gsap.to(cursor, 0.4, { scale: 1, autoAlpha: 1 });

$(".section_catalog .slick-list").on("mousemove", moveCircle);
});

$(".section_catalog .slick-list").on("mouseout", function() {
gsap.to(cursor, 0.4, { scale: 0.4, autoAlpha: 0 });
});


$(".news_list_item_img").on("mouseover", function () {
	cursor.text('Подробнее');
	gsap.to(cursor, 0.4, { scale: 1, autoAlpha: 1 });
	$(".news_list_item_img").on("mousemove", moveCircle);
	console.log('mouseover');
});
$(".news_list_item_img").on("mouseout", function() {
	gsap.to(cursor, 0.4, { scale: 0.4, autoAlpha: 0 });
});
	
 

	
	
	if ($(window).width() < 576) {
		$('.header_drop_col_search').prependTo($('.header_drop_bottom .container'));
	}
	else {
		$(".header_drop_col_search").insertAfter($(".header_drop_col_logo"));
	}

	window.onresize = function (event) {
		if ($(".pl-js").length){
			var viewportOffset = $('.offset-xxl-2')[0].getBoundingClientRect();
			var left = viewportOffset.left;
			//console.log(left);
			$('.pl-js').css( "padding-left", left);
		}
		if ($(window).width() < 575) {
			$('.header_drop_col_search').prependTo($('.header_drop_bottom .container'));
		}
		else {
			$(".header_drop_col_search").insertAfter($(".header_drop_col_logo"));
		}
	
	};
	if ($(".pl-js").length){
		var viewportOffset = $('.offset-xxl-2')[0].getBoundingClientRect();
		var left = viewportOffset.left;
		//console.log(left);
		$('.pl-js').css( "padding-left", left);
	}
	
	$('.navbar-toggler').click(function () {
		$('.header_drop').slideDown();
	})
	$('.navbar-toggler-close').click(function () {
		$('.header_drop').slideUp();
	})


		
	$("#product_sort").selectmenu();
	
	




	
	
	
	
  });