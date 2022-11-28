function windowSize(){
  if ($(window).width() <= '991'){
      $('.card_right_info .section_title').after($('.card_left_photolist'));
      //$('.card_left_photolist').after('.section_title');
  } else {
    $('.card_left_photolist').prependTo('.card_left_photolist_col .card_left');
  }
}
//$(window).load(windowSize); // при загрузке
//$(window).resize(windowSize); // при изменении размеров
// // или "два-в-одном", вместо двух последних строк:
$(window).on('load resize',windowSize);


$(document).ready(function(){



$('.item_more_link').click(function(){
  if($(this).hasClass('-open')){
    $(this).parents('.review_item').find('.review_item_more_text').slideUp();
    $(this).removeClass('-open');
    $(this).text('Раскрыть');
  }else{
    $(this).parents('.review_item').find('.review_item_more_text').slideDown();
    $(this).addClass('-open');
    $(this).text('Скрыть');
  }
  return false;
})

$('.top_slider').slick({
  dots: true,
  speed: 1000,
  responsive: [
    {
      breakpoint: 767,
      settings: {
        arrows: false,

      }
    },
  ]
});
$('.about_slider').slick({
  dots: true,
  speed: 1000,
  responsive: [
    {
      breakpoint: 767,
      settings: {
        arrows: false,

      }
    },
  ]
});

$('.partners_slider').slick({
  dots: true,
  speed: 1000,
  appendDots:'.slide-control',
  responsive: [
    {
      breakpoint: 767,
      settings: {
        arrows: false,

      }
    },
  ]
});
$('.sale_carousel').slick({
  dots: true,
  speed: 1000,
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 767,
      settings: {
        arrows: false,
        // centerPadding: '40px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    }
  ]
});

$('.certificate_slider').slick({
  dots: true,
  speed: 1000,
  slidesToShow: 2,
  arrows: false,
  responsive: [
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    }
  ]
});

$('.related_carousel').slick({
  dots: true,
  speed: 1000,
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 767,
      settings: {
        arrows: false,
        // centerPadding: '40px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    }
  ]
});

$('.partners_carousel').slick({
  speed: 1000,
  slidesToShow: 6,
  responsive: [
    {
      breakpoint: 767,
      settings: {
        arrows: false,
        slidesToShow: 4
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        slidesToShow: 2
      }
    }
  ]
});

$('.review_carousel').slick({
  speed: 1000,
  slidesToShow: 2,
  responsive: [
    {
      breakpoint: 767,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    },

  ]
});

$('.slider-for').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   arrows: true,
   fade: true,
   asNavFor: '.slider-nav'
 });
 $('.slider-nav').slick({
   slidesToShow: 4,
   arrows: false,
   slidesToScroll: 1,
   asNavFor: '.slider-for',
   dots: false,
   focusOnSelect: true,
   responsive: [
    {
      breakpoint: 575,
      settings: {
        arrows: false,
        slidesToShow: 3
      }
    },

  ]
 });
//  $('a[data-slide]').click(function(e) {
//    e.preventDefault();
//    var slideno = $(this).data('slide');
//    $('.slider-nav').slick('slickGoTo', slideno - 1);
//   });

$('.file').change(function() {
    if ($(this).val() != '') $(this).prev().text('Выбрано файлов: ' + $(this)[0].files.length);
    else $(this).prev().text('Выберите файлы');
});

 $(function(){
   $("#phone").mask("+7 (999) 999-99-99");
 });





var map;
DG.then(function () {
    map = DG.map('map', {
        center: [53.206978571204374,50.177475499999936],
        zoom: 15
    });
    DG.marker([53.206978571204374,50.177475499999936]).addTo(map).bindPopup('Самара, ул. Революционная, 70');
    DG.marker([53.140379571264276,50.17367549999997]).addTo(map).bindPopup('Самара, Южное шоссе, 5, сек. 2-112');
});






// $('.item_more_link.-closed').click(function(){
//   $(this).hide();
//   $(this).next('.item_more_link.-opened').show();
//   return false;
// });
// $('.item_more_link.-opened').hide();
// $('.item_more_link.-opened').click(function(){
//   $(this).hide();
//   $(this).next('.item_more_link.-closed').show();
//   return false;
// });

// policy checkbox
// $(".policy__checkbox").on("click", function(){
// 	if($(this)[0].checked == true){
// 		$(this).parents('form').find('input[type="submit"]').prop('disabled', false);
// 		$(this).parents('form').find('button[type="button"]').prop('disabled', false);
// 	}else{
// 		$(this).parents('form').find('input[type="submit"]').prop('disabled',true);
// 		$(this).parents('form').find('button[type="button"]').prop('disabled',true);
// 	}
// });

// $('.-menu-toggle').click(function () {
// 	elementClick = $(this).attr("href");
// 	$(elementClick).addClass('active');
// 	return false;
// });

// $('.ipartners_slides').flickity({
//   pageDots: false,
//   cellAlign: 'left',
//   contain: true
// });

// owlCarousel




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
// $(function() {
// 	$(window).scroll(function() {
// 	 if($(this).scrollTop() != 0) {
// 	   $('#toTop').fadeIn();
// 	 } else {
// 	   $('#toTop').fadeOut();
// 	 }
// 	});
// 	$('#toTop').click(function() {
// 	 $('body,html').animate({scrollTop:0},800);
// 	});
// });

// mask
// $(function(){
//   $("#tel").mask("+7(999) 999-9999");
// });

// if($(window).width()<='575'){}


// закрываем pop-up по клику на -close
// $('.-close').click(function () {
// 	if($('.sidebar').hasClass('slide')){
// 		$('.sidebar').removeClass('slide');
// 		$('body').removeClass('hide');
// 		return false;
// 	}
// });
// закрываем pop-up по клику на body
// $('body').on('click', function(){
// 	if($('.section_menu_box:hover').length > 0 || $('#filter:hover').length > 0){
// 	}else{
// 		$('.sidebar').removeClass('slide');
// 		$('.section_menu').removeClass('active');
// 		$('body').removeClass('hide');
// 	}
// })





});//$(document).ready

