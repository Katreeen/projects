function windowSize() {
  if ($(window).width() <= '991' && $(window).width() >= '767'){
    $('#hmenu .dropdown-menu .dropdown-item.dropdown>a.dropdown-link').on('click', function () {
      if ($(this).hasClass('open')) {
        $(this).removeClass('open');
        $(this).next(".dropdown-menu-second").slideUp();
      } else {
        $(this).addClass('open');
        $(this).next(".dropdown-menu-second").slideDown();
     }
      return false;
      });

  } else {
    
  }
  if ($(window).width() <= '767'){
    $('.header__search').appendTo(".-header-menu-col");
    //$('.feedback__manager').prependTo(".feedback__form");
    
  } else {
    $('.header__search').appendTo(".-header-search-col");
   // $('.feedback__manager').appendTo(".-feedback-manager-col");
    
  }
}

$(window).on('load resize', windowSize);
// mask

$(".phone").mask("+7(999) 999-9999");
















$(document).ready(function () {
  

  $('.menu__toggle').on('click', function () {
    $('body').addClass('overlay');
    $('#hmenu').addClass('show');

  });
  $('.menu__close').on('click', function () {
    $('body').removeClass('overlay');
    $(".dropdown .dropdown-toggle").removeClass('open');
    $(".dropdown-menu").slideUp();
    $('#hmenu').removeClass('show');
  });

 
  $('.m-search').on('click', function () {
    $('.header__search').slideToggle();
  });
  $('.m-toggle').on('click', function () {
    //$('body').toggleClass('overlay');
    if ($('#hmenu').hasClass('show')) {
      $('#hmenu').removeClass('show');
      $('.m-toggle').removeClass('close');
      
    } else {
      $('#hmenu').addClass('show');
      $('.m-toggle').addClass('close');
    }
    return false;
    
    

  });
  // $('.menu__close').on('click', function () {
  //   $('body').removeClass('overlay');
  //   $(".dropdown .dropdown-toggle").removeClass('open');
  //   $(".dropdown-menu").slideUp();
  //   $('#hmenu').removeClass('show');
  // });



  $('#hmenu, .menu__toggle, .m-toggle').click(function (e) { e.stopPropagation(); })

  $('body').on('click', function () {

    if (!$(this).hasClass('overlay')) {
      return;
      }

      $('body').removeClass('overlay');
      $(".dropdown .dropdown-toggle").removeClass('open');
      $(".dropdown-menu").slideUp();
      $('#hmenu').removeClass('show');
  
  });






  
  $('.dropdown .dropdown-toggle').on('click', function () {
    if ($(this).hasClass('open')) {
      $(this).removeClass('open');
      $(this).next(".dropdown-menu").slideUp();
    } else {
      $(this).addClass('open');
      $(this).next(".dropdown-menu").slideDown();
   }
    return false;
  });

 $(function(){
   $(".-mask").mask("+7 (999) 999-99-99");
 });
  
 $('.main-slider__wrap').slick({
  dots: true,
  speed: 1000,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: false,

      }
    },
    // {
    //   breakpoint: 575,
    //   settings: {
    //     arrows: true,

    //   }
    // },
  ]
});

$('.partners__carousel').slick({
  dots: false,
  slidesToShow: 6,
  slidesToScroll: 1,
  speed: 1000,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
      }
    },
  ]
});
$('.review__carousel').slick({
  dots: false,
  slidesToShow: 3,
  slidesToScroll: 1,
  speed: 1000,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 992,
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
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
        arrows: false,
        dots: true,

      }
    },
  ]
});
  
$('.certificats-img').slick({
  dots: false,
  slidesToShow: 4,
  slidesToScroll: 1,
  speed: 1000,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,

      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
        arrows: true,
        dots: true,
        swipe: false
       

      }
    },
  ]
});
$('.certificats-text').slick({
  dots: false,
  slidesToShow: 4,
  slidesToScroll: 1,
  speed: 1000,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 992,
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
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
        arrows: false,
        dots: true,
       

      }
    },
  ]
});
  
  $('.city').on('click', function () {
    if (!$(this).hasClass('active')) {
      $('.city').removeClass('active');
      $('.city__desc').slideUp();
      $(this).addClass('active');
      $(this).find('.city__desc').slideDown();
    } else {
      
    }
 
  });


  $(".map__nav").mCustomScrollbar({
      theme:"rounded-dark"
  });



  $(".map__wrap svg g").click(function () {
    $(".map__nav .city").removeClass("active");
    $(".map__wrap svg g").removeAttr("filter");
    var city = $(this).data("id");
    var shadow = $(this).data("filter");
    $(this).attr("filter", shadow);
    var cityArr = city.split(", ");
    console.log(cityArr);
    $(".map__nav").find(`[data-city='${cityArr[0]}']`).addClass("active");
  });

  $(".map__nav .city").click(function () {
    $(".map__nav .city").removeClass("active");
    $(".map__wrap svg g").removeAttr("filter");
    var city = $(this).data("city");
    $(this).addClass("active");
    var map = $(".map__wrap svg").find(`[data-id*='${city}']`);
    var filter = map.data("filter");
    map.attr("filter", filter);
  });




  
});//$(document).ready