$(document).ready(function () {
	
	$('.header_nav .navbar-toggler').click(function(){
		if ($('.header_menu').hasClass("active")){
		  $('.header_menu').removeClass("active").slideUp();
		} else{
		  $('.header_menu ').addClass("active").slideDown();
		}
		return false;
	});
	// $('.footer_nav .navbar-toggler').click(function(){
	// 	if ($('.footer_menu').hasClass("active")){
	// 	  $('.footer_menu').removeClass("active").slideUp();
	// 	} else{
	// 	  $('.footer_menu ').addClass("active").slideDown();
	// 	}
	// 	return false;
	// });
	


$(function(){
  $('.main_carousel').owlCarousel({
    loop:true,
    nav:true,
    dots:false,
    slideBy:1,
    items:1,
    smartSpeed:1000,
    fluidSpeed:1000,
    mouseDrag:true,
	  touchDrag: true,
	 
    // navContainer:'.clients_carousel__arrows',
  });
});
	
$(function(){
	$('.news_carousel, .articles_carousel').owlCarousel({
	  loop:true,
	  nav:true,
	  dots:false,
	  slideBy:1,
	  items:1,
	  smartSpeed:1000,
	  fluidSpeed:1000,
	  mouseDrag:true,
		touchDrag: true,
	  
	  // navContainer:'.clients_carousel__arrows',
	});
 });

	
	
$(function(){
  var certificate = $('.owl-certificate');
  certificate.owlCarousel({
    loop:true,
    margin:58,
    nav:true,
    dots:true,
    slideBy:1,
    items:5,
    smartSpeed:1000,
    fluidSpeed:1000,
    mouseDrag:true,
    touchDrag:true,
    responsive : {
      0 : {
        items:1,
      },
      576 : {
        items:2,
      },
      768 : {
        items:3,
      },
      962 : {
        items:4,
      },
      1200 : {
        items:5,
      }
    },
    // navContainer:'.certificate_carousel__arrows',
  });
});

$(function(){
  var certificate = $('.owl-certificate-detail');
  certificate.owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    dots:true,
    slideBy:1,
    items:3,
    smartSpeed:1000,
    fluidSpeed:1000,
    mouseDrag:true,
    touchDrag:true,
    responsive : {
      0 : {
        items:1,
      },
      576 : {
        items:2,
      },
      768 : {
        items:2,
      },
      962 : {
        items:3,
      },
      1200 : {
        items:3,
      }
    },
    // navContainer:'.certificate_carousel__arrows',
  });
});


// якори на лендинге
$("#navbarNav").on("click","a", function (event) {
  //отменяем стандартную обработку нажатия по ссылке
  event.preventDefault();
  //забираем идентификатор бока с атрибута href
  var id  = $(this).attr('href'),
  //узнаем высоту от начала страницы до блока на который ссылается якорь
    //top = $(id).offset().top - $('.slide__top').height();
    top = $(id).offset().top;
  //анимируем переход на расстояние - top за 1500 мс
  $('body,html').animate({scrollTop: top}, 1500);
  $('.navbar-toggler').click();
});

// кнопка вверх
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

// mask
$(function(){
  $("#tel").mask("+7(999) 999-9999");
});

if($(window).width()<='575'){}


// закрываем pop-up по клику на -close
$('.-close').click(function () {
	if($('.sidebar').hasClass('slide')){
		$('.sidebar').removeClass('slide');
		$('body').removeClass('hide');
		return false;
	}
});
// закрываем pop-up по клику на body
$('body').on('click', function(){
	if($('.section_menu_box:hover').length > 0 || $('#filter:hover').length > 0){
	}else{
		$('.sidebar').removeClass('slide');
		$('.section_menu').removeClass('active');
		$('body').removeClass('hide');
	}
})



ymaps.ready(init);
var myMap;
function init() {
	myMap = new ymaps.Map("map", {
		center: [55.761315068990974,37.65060349999995],
		zoom: 17
	}),

	

		// Создаем метку с помощью вспомогательного класса.
		myPlacemark1 = new ymaps.Placemark([55.761558068991604,37.647297499999986], {
			// Свойства.
			// Содержимое иконки, балуна и хинта.
			iconContent: '',
			balloonContent: '105062, г. Москва, ул. Макаренко, д.5, стр.1, оф.3',
			hintContent: '105062, г. Москва, ул. Макаренко, д.5, стр.1, оф.3'
		}, {
			// Опции.
			// Стандартная фиолетовая иконка.
			preset: 'islands#blackDotIcon'
		});


    	//myMap.controls.add('smallZoomControl');
    	// Добавляем все метки на карту.
	myMap.geoObjects.add(myPlacemark1);

	if ($(window).width() <= '767') {
		myMap.setCenter([55.761558068991604, 37.647297499999986]);
		//myMap.setCenter([54.704815, 20.466380], 10);
	}

	}

	
	

});//$(document).ready


