
if($(window).width()<='991'){
$('.dropdown .nav-link').on('click', function(){
	$(this).toggleClass('active');
	$(this).next('.dropdown-menu').slideToggle();
	 return false;

});
};
/*$(document).ready(function(){
		$('ul.header_navbar').superfish();

	});*/


if($(window).width()<='991'){
		
	}else{
		$('ul.header_navbar').superfish({
			delay: 600,
			popUpSelector: '.dropdown-menu',
		});
	}




$('.one-time').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true
});

$('.responsive').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});


function setMenuWidth() {
var windowWidth = $(window).width();
$('.dropdown__toggle_catalog').width(windowWidth);
}
$(window).resize(function(){
setMenuWidth();
});
setMenuWidth();


$('.zakaz_btn').click(function() {
 
  $('html, body').animate({
  scrollTop: $('.mine_form').offset().top
  }, 1000);
  return false;

});


  ymaps.ready(init); // карта соберется после загрузки скрипта и элементов
   var myMap; 
   function init () {

      myMap = new ymaps.Map("map", {
            center: [56.33, 43.80], 
            behaviors: ['default', 'scrollZoom'], 
            zoom: 6 

       });
     
        myPlacemark0 = new ymaps.Placemark([56.339043068382544,43.808932], { 
        balloonContent: '<span class="close" onclick="myMap.balloon.close()">&times;</span><div class="info">Нижний Новгород, ул. Федосеенко д.55"А" </div>' 

      }, {
        iconLayout: 'default#image',
        iconImageHref: 'image/icons-marker-filled.png', // картинка иконки
        iconImageSize: [50, 50], 
        iconImageOffset: [-10, -60], // позиция иконки
        balloonContentSize: [240, 80], // размер нашего кастомного балуна в пикселях
        balloonLayout: "default#imageWithContent", 
        balloonImageHref: 'image/Blue_txt_bub.png', // Картинка заднего фона балуна
        balloonImageOffset: [-205, -92], // смещание балуна, надо подогнать под стрелочку
        balloonImageSize: [240, 80], // размер картинки-бэкграунда балуна
        balloonShadow: false
      });
        myPlacemark1 = new ymaps.Placemark([56.24540506850175,43.49212299999999], { 
        balloonContent: '<span class="close" onclick="myMap.balloon.close()">&times;</span><div class="info">Дзержинск, ул. Студенческая д. 34"В"</div>' 

      }, {
        iconLayout: 'default#image',
        iconImageHref: 'image/icons-marker-filled.png', // картинка иконки
        iconImageSize: [50, 50], 
        iconImageOffset: [-10, -60], // позиция иконки
        balloonContentSize: [240, 80], // размер нашего кастомного балуна в пикселях
        balloonLayout: "default#imageWithContent", 
        balloonImageHref: 'image/Blue_txt_bub.png', // Картинка заднего фона балуна
        balloonImageOffset: [-205, -92], // смещание балуна, надо подогнать под стрелочку
        balloonImageSize: [240, 80], // размер картинки-бэкграунда балуна
        balloonShadow: false
      });
        myPlacemark2 = new ymaps.Placemark([45.04235557458755,39.04884899999992], { 
        balloonContent: '<span class="close" onclick="myMap.balloon.close()">&times;</span><div class="info">Краснодар, 3-й Тихорецкий проезд, д.22</div>' 

      }, {
        iconLayout: 'default#image',
        iconImageHref: 'image/icons-marker-filled.png', // картинка иконки
        iconImageSize: [50, 50], 
        iconImageOffset: [-10, -60], // позиция иконки
        balloonContentSize: [240, 80], // размер нашего кастомного балуна в пикселях
        balloonLayout: "default#imageWithContent", 
        balloonImageHref: 'image/Blue_txt_bub.png', // Картинка заднего фона балуна
        balloonImageOffset: [-205, -92], // смещание балуна, надо подогнать под стрелочку
        balloonImageSize: [240, 80], // размер картинки-бэкграунда балуна
        balloonShadow: false
      });
        myPlacemark3 = new ymaps.Placemark([50.624366572920856,36.558027500000016], { 
        balloonContent: '<span class="close" onclick="myMap.balloon.close()">&times;</span><div class="info">Белгород, Промышленный проезд, д.7</div>' 

      }, {
        iconLayout: 'default#image',
        iconImageHref: 'image/icons-marker-filled.png', // картинка иконки
        iconImageSize: [50, 50], 
        iconImageOffset: [-10, -60], // позиция иконки
        balloonContentSize: [240, 80], // размер нашего кастомного балуна в пикселях
        balloonLayout: "default#imageWithContent", 
        balloonImageHref: 'image/Blue_txt_bub.png', // Картинка заднего фона балуна
        balloonImageOffset: [-205, -92], // смещание балуна, надо подогнать под стрелочку
        balloonImageSize: [240, 80], // размер картинки-бэкграунда балуна
        balloonShadow: false
      });
        myPlacemark4 = new ymaps.Placemark([56.08312956865357,92.94289749999999], { 
        balloonContent: '<span class="close" onclick="myMap.balloon.close()">&times;</span><div class="info">Красноярск, Северное шоссе, д.7</div>' 

      }, {
        iconLayout: 'default#image',
        iconImageHref: 'image/icons-marker-filled.png', // картинка иконки
        iconImageSize: [50, 50], 
        iconImageOffset: [-10, -60], // позиция иконки
        balloonContentSize: [240, 80], // размер нашего кастомного балуна в пикселях
        balloonLayout: "default#imageWithContent", 
        balloonImageHref: 'image/Blue_txt_bub.png', // Картинка заднего фона балуна
        balloonImageOffset: [-205, -92], // смещание балуна, надо подогнать под стрелочку
        balloonImageSize: [240, 80], // размер картинки-бэкграунда балуна
        balloonShadow: false
      });
        myPlacemark5 = new ymaps.Placemark([51.7873960722234,55.04177149999998], { 
        balloonContent: '<span class="close" onclick="myMap.balloon.close()">&times;</span><div class="info">Оренбург, ул.Магистральная, д.3</div>' 

      }, {
        iconLayout: 'default#image',
        iconImageHref: 'image/icons-marker-filled.png', // картинка иконки
        iconImageSize: [50, 50], 
        iconImageOffset: [-10, -60], // позиция иконки
        balloonContentSize: [240, 80], // размер нашего кастомного балуна в пикселях
        balloonLayout: "default#imageWithContent", 
        balloonImageHref: 'image/Blue_txt_bub.png', // Картинка заднего фона балуна
        balloonImageOffset: [-205, -92], // смещание балуна, надо подогнать под стрелочку
        balloonImageSize: [240, 80], // размер картинки-бэкграунда балуна
        balloonShadow: false
      });
        myPlacemark6 = new ymaps.Placemark([57.982899566582326,56.241445], { 
        balloonContent: '<span class="close" onclick="myMap.balloon.close()">&times;</span><div class="info">Пермь, ул.Маршрутная, д.10</div>' 

      }, {
        iconLayout: 'default#image',
        iconImageHref: 'image/icons-marker-filled.png', // картинка иконки
        iconImageSize: [50, 50], 
        iconImageOffset: [-10, -60], // позиция иконки
        balloonContentSize: [240, 80], // размер нашего кастомного балуна в пикселях
        balloonLayout: "default#imageWithContent", 
        balloonImageHref: 'image/Blue_txt_bub.png', // Картинка заднего фона балуна
        balloonImageOffset: [-205, -92], // смещание балуна, надо подогнать под стрелочку
        balloonImageSize: [240, 80], // размер картинки-бэкграунда балуна
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
    .add(myPlacemark6);


// Фикс кривого выравнивания кастомных балунов 
    myMap.geoObjects.events.add([
      'balloonopen'
      ], function (e) {
      var geoObject = e.get('target');
      myMap.panTo(geoObject.geometry.getCoordinates(), {
        delay: 0
      });

    });
    
  
   }


   $(".contacts a.adrs").click(function () {
$(this).toggleClass('active');
main_coords = $(this).data('coords');
arrey_coords=main_coords.split(',');

 myMap.setZoom(8);
 myMap.panTo([arrey_coords], {
  duration: 500
 });

});



$("[data-fancybox]").fancybox({
		// Options will go here
	});