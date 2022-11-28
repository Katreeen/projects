// $('.content_left').stick_in_parent({
// 	parent: '.content_center_row',
// 	//recalc_every: 100
// });


$(document).ready(function(){
  $('a[href^="#"].-open_section').click(function () {
  	if ($(this).hasClass('-close')){
   		$('.section_menu').removeClass('active');
			$('.section_menu_item').removeClass('active');
			$('body').removeClass('hide');
			return false;
   	}
   	if ($('body').hasClass('hide')){
   		$('.section_menu').removeClass('active');
			$('.section_menu_item').removeClass('active');
			$('body').removeClass('hide');
			elementClick = $(this).attr("href");
		  $(elementClick).addClass('active');
		  $('body').addClass('hide');
			return false;
   	}
   	else{
   		elementClick = $(this).attr("href");
	    $(elementClick).parents('.section_menu').addClass('active');
	    $(elementClick).addClass('active');
	    $('body').addClass('hide');	    
	    $i=$(this).parents('li').index()-1;
	    if($i>=0){
	    	$('.tabs__caption li a').removeClass('active');
	    	$('.tabs__caption li:eq('+$i+') a').addClass('active');
		    $('.tabs').find('.tabs__content').removeClass('active');
		    $('.tabs').find('.tabs__content:eq('+$i+')').addClass('active')
	    } 
	    return false;
   	}
   });

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
	if($('.section_menu_box:hover').length > 0 || $('#filter:hover').length > 0){}else{
		$('.sidebar').removeClass('slide');
		$('.section_menu').removeClass('active');
		$('body').removeClass('hide');
	}
})

// tabs menu pop-up
$(function() {
  $('.tabs__caption').on('click', 'li a:not(.active):not(.-link)', function() {
    $('.tabs__caption li a').removeClass('active');
    $(this).addClass('active');
    $i=$(this).parents('li').index();
    $('.tabs').find('.tabs__content').removeClass('active');
    $('.tabs').find('.tabs__content:eq('+$i+')').addClass('active')
    return false;
  });
 
});


  
 


// header_search
$('.header_search button').click(function(){
	$(this).toggleClass('active');
	$(this).next('input[type="search"]').toggleClass('active');

	return false;
})


// $('.section_menu_box').click(function(e){
// 	e.stopPropagation();
// })

// mobil menu
$('.-toggle').click(function(){
	$(this).parents('.mobil-nav').next('.navbar-nav').slideToggle();
	$('.warehouse_list').slideToggle();

});


if($(window).width()<='991'){
	$('.more').click(function(){
		$('.hide_more').fadeToggle();
	})
}

if($(window).width()<='991'){
			$('a[href^="#filter"]').click(function () {
   		elementClick2 = $(this).attr("href");
	     $(elementClick2).addClass('active');
	     $('.sidebar').addClass('slide');
	     $('body').addClass('hide');
	     return false;

})
}

if($(window).width()<='767'){
	$('.products_table_body').each(function(){
	$(this).find('.btn_box').appendTo($(this).find('.price_col'));
})

}
if($(window).width()<='575'){
	$('#catalog .title_menu').addClass('-link');
	$('#catalog .title_menu').click(function(){
	$(this).next('.flex-column').slideToggle();
	return false;
})
}

// checkboxToggle
$('.toggle').click(function(){
	$(this).parent('.title').next('.checkbox').slideToggle();
});

// scrollTop
 $(function() {
	$(window).scroll(function() {
		console.log('scroll');
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

$('.sidebar .catalog_section_list .nav-item').click(function(){
	$('.sidebar .catalog_section_list .nav-item').removeClass('active');
	$(this).addClass('active');
})

// Select
	// $('.select').each(function(){
	// 	// Variables
	// 	var $this = $(this),
	// 		selectOption = $this.find('option'),
	// 		selectOptionLength = selectOption.length,
	// 		selectedOption = selectOption.filter(':selected'),
	// 		dur = 500;

	// 	$this.hide();
	// 	// Wrap all in select box
	// 	$this.wrap('<div class="select"></div>');
	// 	// Style box
	// 	$('<div>',{
	// 		class: 'select__gap',
	// 		text: 'Please select'
	// 	}).insertAfter($this);
		
	// 	var selectGap = $this.next('.select__gap'),
	// 		caret = selectGap.find('.caret');
	// 	// Add ul list
	// 	$('<ul>',{
	// 		class: 'select__list'
	// 	}).insertAfter(selectGap);		

	// 	var selectList = selectGap.next('.select__list');
	// 	// Add li - option items
	// 	for(var i = 0; i < selectOptionLength; i++){
	// 		$('<li>',{
	// 			class: 'select__item',
	// 			html: $('<span>',{
	// 				text: selectOption.eq(i).text()
	// 			})				
	// 		})
	// 		.attr('data-value', selectOption.eq(i).val())
	// 		.appendTo(selectList);
	// 	}
	// 	// Find all items
	// 	var selectItem = selectList.find('li');

	// 	selectList.slideUp(0);
	// 	selectGap.on('click', function(){
	// 		if(!$(this).hasClass('on')){
	// 			$(this).addClass('on');
	// 			selectList.slideDown(dur);

	// 			selectItem.on('click', function(){
	// 				var chooseItem = $(this).data('value');

	// 				$('select').val(chooseItem).attr('selected', 'selected');
	// 				selectGap.text($(this).find('span').text());

	// 				selectList.slideUp(dur);
	// 				selectGap.removeClass('on');
	// 			});
				
	// 		} else {
	// 			$(this).removeClass('on');
	// 			selectList.slideUp(dur);
	// 		}
	// 	});		

	// });

if($(window).width()<991){
	$('.owl-carousel .item[data-merge="2"]').attr('data-merge',1);
	$('.owl-carousel').owlCarousel({
			    items:4,
			    loop:true,
			    margin:56,
			    merge:false,
			    mergeFit:false,
			    nav:true,
			   responsive:{
		    	320:{
		            mergeFit:true,
		            items:1
		        },
		        678:{
		            items:2,
		            mergeFit:false,
		            merge:false,
		            margin:24
		        },
		        1200:{
		        	mergeFit:false,
		          items:4,
		          margin:56
		        },
		        1920:{
		        	items:4,
		          
		        }
		    }
			});
}else{
	$('.owl-carousel').owlCarousel({
			    items:4,
			    loop:true,
			    margin:56,
			    merge:false,
			    mergeFit:false,
			    nav:true,
			    responsive:{
		    	320:{
		            mergeFit:true,
		            items:1
		        },
		        678:{
		            items:2,
		            mergeFit:false,
		            merge:false
		        },
		        1200:{
		        	mergeFit:false,
		          items:4,
		          margin:24
		        },
		        1920:{
		        	items:4,
		          margin:56
		        }
		    }
			});
}

$(function() {  
    $(".section_menu_box").niceScroll();
});

// Карта 
  ymaps.ready(init); // карта соберется после загрузки скрипта и элементов
   var myMap; 
   function init () {
   		myMap = new ymaps.Map("map", {
            center: [59.62298714144381,30.527809468231183], 
            behaviors: ['default', 'scrollZoom'], 
            zoom: 3 
       });	
    myPlacemark0 = new ymaps.Placemark([59.62298714144381,30.527809468231183], { 
        	 balloonContent: '<div class="ballon">Вертикальный 2-й проезд, дом.9 Федоровское сельское поселение деревня Аннолово, Тосненский район, Ленинградская область, 187000</div>' 
		}, {
			iconLayout: 'default#image',
			iconImageHref: 'images/point.svg', // картинка иконки
			iconImageSize: [42, 47], 
			iconImageOffset: [-15, -90] // позиция иконки
		});
 		myPlacemark1 = new ymaps.Placemark([56.24002306848789,37.99419999999999], { 
         	balloonContent: '<div class="ballon">Московская область, Сергиево-Посадский район, город Хотьково, Художественный проезд, дом 2, литера Е</div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'images/point.svg', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64] // позиция иконки
 		}); 
 		myPlacemark2 = new ymaps.Placemark([56.760159567931126,60.732886499999935], { 
         	balloonContent: '<div class="ballon">г. Екатеринбург ул. Альпинистов, 77</div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'images/point.svg', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64] // позиция иконки
 		});
 		myPlacemark3 = new ymaps.Placemark([47.25347607425355,39.6094695], { 
         	balloonContent: '<div class="ballon">г.Ростов-на-Дону, пер. 1-й Машиностроительный, 3-А</div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'images/point.svg', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64] // позиция иконки
 		});
 		myPlacemark4 = new ymaps.Placemark([54.95129656972737,82.89208749999986], { 
         	balloonContent: '<div class="ballon">Новосибирская область, город Новосибирск, проезд Северный (Кировский район), 3/8</div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'images/point.svg', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64] // позиция иконки
 		});
 		myPlacemark5 = new ymaps.Placemark([56.30223256843794,43.87048449999999], { 
         	balloonContent: '<div class="ballon">г.Нижний Новгород, улица Кузбасская, дом 15, литера А</div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'images/point.svg', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64] // позиция иконки
 		});
 		myPlacemark6 = new ymaps.Placemark([59.62213658591203,30.530835000000003], { 
         	balloonContent: '<div class="ballon">Ленинградская область, Тосненский район, Деревня Аннолово, Фёдоровское сельское поселение, 2-й Вертикальный проезд.</div>' 
 		}, {
 			iconLayout: 'default#image',
		 	iconImageHref: 'images/point.svg', // картинка иконки
		 	iconImageSize: [42, 47], 
		 	iconImageOffset: [-32, -64] // позиция иконки
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

$(".contact_tabs a").click(function () {
$(this).toggleClass('active');
main_coords = $(this).data('coords');
arrey_coords=main_coords.split(',');
 myMap.setZoom(8);
 myMap.panTo([arrey_coords], {
 	duration: 500
 });

$('.contact_tabs a').removeClass('active');
$('.tabs__content').removeClass('active');
$(this).addClass('active');
$i = $(this).attr("href");
$($i).addClass('active');

return false;

});



});//$(document).ready


     

