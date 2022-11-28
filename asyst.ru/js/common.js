// запускаем слайдер 
$(document).ready(function(){
$('.one-time').slick({
dots: true,
infinite: true,
speed: 300,
slidesToShow: 1,
adaptiveHeight: true
});
 

//  открываем и закрываем главное меню  
$('.btn-menu').click(function() {
	$('body').toggleClass('active_menu');
 });

//крестик закрытия
$('.close_block').click(function() {
	$('#navbarNavDropdown').removeClass('show');
	$('body').toggleClass('active_menu');
 });

//форма поиска
$('.btn-search').click(function() {
	$('.search_form').toggleClass('active_form');
	$('.btn-search').toggleClass('active_form_top');
 });


// $('.contacts_city_name').click(function() {
// 	$(this).toggleClass('active');
// 	$(this).next('.contacts_city_item').slideToggle();

// });

$('.list_sity_detal a').click(function() {
	$('.open__box').removeClass('active');
	$('.list_sity_detal a').removeClass('active');
	$(this).toggleClass('active');
	$thsID = $(this).attr('href');
	$('.contacts_city_row .open__info').hide();
	$($thsID).find('.open__info').slideToggle();
	$($thsID).find('.open__box').toggleClass('active');
	$('html, body').animate({
		scrollTop: $($thsID).offset().top
	}, 500);
	return false;
});

$('.open__box').click(function() {
	$(this).toggleClass('active');
	$(this).next('.open__info').slideToggle();

});

$('.list_sity_name').click(function() {
	// $(this).toggleClass('active');
	$('.list_sity_detal').slideToggle();

});


// отправить заявку на вакансию
$('.bth_otclik_box .btn').click(function() {
	$(this).closest('.vacansy_box_item').find('.vacansy_form').removeClass('active_form');
	$(this).closest('.vacansy_box_item').find('.vacansy_form').addClass('active_form');
	$('html, body').animate({
	scrollTop: $('.vacansy_form').offset().top
	}, 500);
	return false;

});





});






 //  кнопка прокрутки вверх
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

$('.category_toggler').on('click', function(){
	$(this).toggleClass('active');
	$(this).parents('.category_title').next('.list-group').slideToggle();
	return false;
})

if($(".content__box__right").length && $(window).width() > 1000) {
		$(".content__box__right").stick_in_parent({
			offset_top:0
		});
		
	
};


if("#map"){
// Карта дилеров
  ymaps.ready(init); // карта соберется после загрузки скрипта и элементов
   var myMap; 
   function init () {
   		myMap = new ymaps.Map("map", {
            center: [55.76, 37.64], 
            behaviors: ['default', 'scrollZoom'], 
            zoom: 3 
       });
       
       
		
        myPlacemark0 = new ymaps.Placemark([55.584466,37.385470], { 
        	balloonContent: '<div class="ballon"><span>Москва (Офис и Склад)</span><br><p>Немного инфы о том, о сем.</p><img class="close" onclick="myMap.balloon.close()" src="img/close.png"></div>' 
		}, {
			iconLayout: 'default#image',
			iconImageHref: 'img/logo_map.png', // картинка иконки
			iconImageSize: [42, 47], 
			iconImageOffset: [-15, -90], // позиция иконки
		  	balloonContentSize: [240, 99], // размер нашего кастомного балуна в пикселях
		  	balloonLayout: "default#imageWithContent", 
			balloonImageHref: 'img/ballon1.png', // Картинка заднего фона балуна
			balloonImageOffset: [-64, -95], // смещание балуна, надо подогнать под стрелочку
			balloonImageSize: [240, 89], // размер картинки-бэкграунда балуна
			balloonShadow: false
		});

 		myPlacemark1 = new ymaps.Placemark([45.06148367173665,38.9622019999999], { 
         	balloonContent: '<div class="ballon"><span>Краснодар (Офис и Склад)</span><br><p>Немного инфы о том, о сем.</p><img class="close" onclick="myMap.balloon.close()" src="img/close.png"></div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'img/logo_map.png', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64], // позиция иконки
		 	balloonContentSize: [240, 99], // размер нашего кастомного балуна в пикселях
		 	balloonLayout: "default#imageWithContent", 
		  	balloonImageHref: 'img/ballon1.png', // Картинка заднего фона балуна
		 	balloonImageOffset: [-64, -95], // смещание балуна, надо подогнать под стрелочку
		 	balloonImageSize: [240, 89], // размер картинки-бэкграунда балуна
		 	balloonShadow: false
 		}); 

 		myPlacemark2 = new ymaps.Placemark([59.91817154482064,30.30557799999997], { 
        	balloonContent: '<div class="ballon"><span>Санкт-Петербург (Офис и Склад)</span><br><p>Немного инфы о том, о сем.</p><img class="close" onclick="myMap.balloon.close()" src="img/close.png"></div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'img/logo_map.png', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64], // позиция иконки
		 	balloonContentSize: [240, 99], // размер нашего кастомного балуна в пикселях
		 	balloonLayout: "default#imageWithContent", 
		  	balloonImageHref: 'img/ballon1.png', // Картинка заднего фона балуна
		 	balloonImageOffset: [-64, -95], // смещание балуна, надо подогнать под стрелочку
		 	balloonImageSize: [240, 89], // размер картинки-бэкграунда балуна
		 	balloonShadow: false
 		});
 		myPlacemark3 = new ymaps.Placemark([56.78886212553732,60.60339449999997], { 
         	balloonContent: '<div class="ballon"><span>Екатеринбург (Офис и Склад)</span><br><p>Немного инфы о том, о сем.</p><img class="close" onclick="myMap.balloon.close()" src="img/close.png"></div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'img/logo_map.png', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64], // позиция иконки
		 	balloonContentSize: [240, 99], // размер нашего кастомного балуна в пикселях
		 	balloonLayout: "default#imageWithContent", 
		  	balloonImageHref: 'img/ballon1.png', // Картинка заднего фона балуна
		 	balloonImageOffset: [-64, -95], // смещание балуна, надо подогнать под стрелочку
		 	balloonImageSize: [240, 89], // размер картинки-бэкграунда балуна
		 	balloonShadow: false
 		});
 		myPlacemark4 = new ymaps.Placemark([51.69427263552066,39.335954999999984], { 
         	balloonContent: '<div class="ballon"><span>Центральный ФО (г. Воронеж)</span><br><p>Немного инфы о том, о сем.</p><img class="close" onclick="myMap.balloon.close()" src="img/close.png"></div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'img/logo_map.png', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64], // позиция иконки
		 	balloonContentSize: [240, 99], // размер нашего кастомного балуна в пикселях
		 	balloonLayout: "default#imageWithContent", 
	  		balloonImageHref: 'img/ballon1.png', // Картинка заднего фона балуна
	 		balloonImageOffset: [-64, -95], // смещание балуна, надо подогнать под стрелочку
	 		balloonImageSize: [240, 89], // размер картинки-бэкграунда балуна
	 		balloonShadow: false
 		});

 		myPlacemark5 = new ymaps.Placemark([55.770258774377524,49.102712999999966], { 
        	balloonContent: '<div class="ballon"><span>Приволжский ФО (г. Казань)</span><br><p>Немного инфы о том, о сем.</p><img class="close" onclick="myMap.balloon.close()" src="img/close.png"></div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'img/logo_map.png', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64], // позиция иконки
		 	balloonContentSize: [240, 99], // размер нашего кастомного балуна в пикселях
		 	balloonLayout: "default#imageWithContent", 
		    balloonImageHref: 'img/ballon1.png', // Картинка заднего фона балуна
		 	balloonImageOffset: [-64, -95], // смещание балуна, надо подогнать под стрелочку
		 	balloonImageSize: [240, 89], // размер картинки-бэкграунда балуна
		 	balloonShadow: false
 		}); 
 		myPlacemark6 = new ymaps.Placemark([53.322060914651416,50.061080499999925], { 
         	balloonContent: '<div class="ballon"><span>Приволжский ФО (г. Самара)</span><br><p>Немного инфы о том, о сем.</p><img class="close" onclick="myMap.balloon.close()" src="img/close.png"></div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'img/logo_map.png', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64], // позиция иконки
		 	balloonContentSize: [240, 99], // размер нашего кастомного балуна в пикселях
		 	balloonLayout: "default#imageWithContent", 
		  	balloonImageHref: 'img/ballon1.png', // Картинка заднего фона балуна
		 	balloonImageOffset: [-64, -95], // смещание балуна, надо подогнать под стрелочку
		 	balloonImageSize: [240, 89], // размер картинки-бэкграунда балуна
		 	balloonShadow: false
 		});
 		myPlacemark7 = new ymaps.Placemark([55.00068342164962,82.95627699999989], { 
        	balloonContent: '<div class="ballon"><span>Сибирский ФО (г. Новосибирск)</span><br><p>Немного инфы о том, о сем.</p><img class="close" onclick="myMap.balloon.close()" src="img/close.png"></div>' 
 		}, {
 			iconLayout: 'default#image',
 			iconImageHref: 'img/logo_map.png', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64], // позиция иконки
		 	balloonContentSize: [240, 99], // размер нашего кастомного балуна в пикселях
		 	balloonLayout: "default#imageWithContent", 
		  	balloonImageHref: 'img/ballon1.png', // Картинка заднего фона балуна
		 	balloonImageOffset: [-64, -95], // смещание балуна, надо подогнать под стрелочку
		 	balloonImageSize: [240, 89], // размер картинки-бэкграунда балуна
		 	balloonShadow: false
 		}); 
 		myPlacemark8 = new ymaps.Placemark([43.173470744969165,132.03963550000003], { 
       		balloonContent: '<div class="ballon"><span>Дальневосточный ФО (г. Владивосток)</span><br><p>Немного инфы о том, о сем.</p><img class="close" onclick="myMap.balloon.close()" src="img/close.png"></div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'img/logo_map.png', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64], // позиция иконки
		 	balloonContentSize: [240, 99], // размер нашего кастомного балуна в пикселях
		 	balloonLayout: "default#imageWithContent", 
		  	balloonImageHref: 'img/ballon1.png', // Картинка заднего фона балуна
		 	balloonImageOffset: [-64, -95], // смещание балуна, надо подогнать под стрелочку
		 	balloonImageSize: [240, 89], // размер картинки-бэкграунда балуна
		 	balloonShadow: false
 		}); 
	 	myPlacemark9 = new ymaps.Placemark([44.98387033593519,34.08193349999999], { 
	         balloonContent: '<div class="ballon"><span>Республика Крым (г. Симферополь)</span><br><p>Немного инфы о том, о сем.</p><img class="close" onclick="myMap.balloon.close()" src="img/close.png"></div>' 
	 	}, {
	 		iconLayout: 'default#image',
		 	iconImageHref: 'img/logo_map.png', 
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64], // позиция иконки
		 	balloonContentSize: [240, 99], // размер нашего кастомного балуна в пикселях
		 	balloonLayout: "default#imageWithContent", 
		  	balloonImageHref: 'img/ballon1.png', // Картинка заднего фона балуна
		 	balloonImageOffset: [-64, -95], // смещание балуна, надо подогнать под стрелочку
			balloonImageSize: [240, 89], // размер картинки-бэкграунда балуна
		 	balloonShadow: false
		 });
	/* Добавляем метки на карту */
	myMap.geoObjects
		.add(myPlacemark0)
		.add(myPlacemark1)
		.add(myPlacemark2)
		.add(myPlacemark3)
		.add(myPlacemark4)
		.add(myPlacemark5)
		.add(myPlacemark6)
		.add(myPlacemark7)
		.add(myPlacemark8)
		.add(myPlacemark9);

/* Фикс кривого выравнивания кастомных балунов */
myMap.geoObjects.events.add([
	'balloonopen'
	], function (e) {
	var geoObject = e.get('target');
	myMap.panTo(geoObject.geometry.getCoordinates(), {
		delay: 0
	});

});
   }

  }


$(".list_sity_detal li a").click(function () {
$(this).toggleClass('active');
main_coords = $(this).data('coords');
arrey_coords=main_coords.split(',');

 myMap.setZoom(8);
 myMap.panTo([arrey_coords], {
 	duration: 500
 });

});


