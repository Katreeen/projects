"use strict";



document.addEventListener("DOMContentLoaded", () => {

  const igallery = new Swiper('.igallery__slider', {
    speed: 400,
    spaceBetween: 20,
    centeredSlides: true,
    centeredSlidesBounds: true,
    slidesPerView: 'auto'
  });
// -----------------------------------------


  const benefitsInfo = new Swiper('.benefits__info', {
    spaceBetween: 40,
    slidesPerView: 1,
    effect: 'flip',
    flipEffect: {
      slideShadows: false,
    },
    breakpoints: {
      320: {
        effect: 'creative',
        spaceBetween: 0,
      },
      768: {
        
      },
    }
  });

  const benefitsImg = new Swiper('.benefits__img', {
    spaceBetween: 8,
    centeredSlides: true,
    centeredSlidesBounds: true,
    slidesPerView: 'auto',
    navigation: {
      nextEl: '.benefits__buttons .swiper-button-next',
      prevEl: '.benefits__buttons .swiper-button-prev',
    },

  });

  benefitsInfo.controller.control = benefitsImg;
  benefitsImg.controller.control = benefitsInfo;
// -----------------------------------------

const reviews = new Swiper('.reviews__slider', {
  speed: 400,
  spaceBetween: 120,
  // centeredSlides: true,
  // centeredSlidesBounds: true,
  slidesPerView: 'auto',
  simulateTouch: true,
  grabCursor: true,
  pagination: {
    el: ".reviews .swiper-pagination",
    type: "fraction",
    formatFractionCurrent: function (number) {
      return number;
    },
    formatFractionTotal: function (number) {
        return ('0' + number).slice(-2);
    },
    renderFraction: function (currentClass, totalClass) {
        return '<span class="' + currentClass + '"></span>' +
              ' &#92; ' +
              '<span class="' + totalClass + '"></span>';
    }
  },
  
});
  if (document.documentElement.clientWidth < 576) {
    const pagen = document.querySelector(".reviews .swiper-pagination");
    document.querySelector('.reviews .section__title').after(pagen);
  }
  
// ---------------------------------------------------------
  try {
    const circleBtn = document.querySelector('.btn-circle'),
      stick = document.querySelector('.serv__stick');
    circleBtn.addEventListener('mouseover', () => {
      stick.classList.add('go');
    });
    circleBtn.addEventListener('mouseout', () => {
      stick.classList.remove('go');
    });
  }
  catch (e) { }
// -------------------------------------

  customSelect('#ivacancy-select'); //доки https://github.com/custom-select/custom-select

// ---------------------------------------
  try {
    const menuBtn = document.querySelector('.drop-menu'),
      dropMenu = document.querySelector('.header__menu'),
      closeBtn = document.querySelector('.drop-arrow');
    

    menuBtn.addEventListener('click', (e) => {
      openMenu();
    });
    closeBtn.addEventListener('click', (e) => {
      closeMenu();
    });

    function openMenu() {
      dropMenu.classList.add('active');
    }

    function closeMenu() {
      dropMenu.classList.remove('active');
    }
  }
  catch (e) { }
// -------------------------------------------
try {
  const tableRow = document.querySelectorAll('.tourney__table .table-row'),
  tableBtn = document.querySelector('.tourney__table .show-more');

  tableRow.forEach((item, i) => {
    console.log(i);
    if (i > 2) {
      item.classList.add('hide');
    }
  });
  tableBtn.addEventListener('click', (e) => {
    e.preventDefault();

    if (tableBtn.classList.contains('show')) {
      tableRow.forEach((item) => {
        if (item.classList.contains('show')) {
          item.classList.remove('show');
          item.classList.add('hide');
        }
      });
      tableBtn.classList.remove('show');
      tableBtn.textContent = "Загрузить еще";
      
    } else {
      tableRow.forEach((item) => {
        if (item.classList.contains('hide')) {
          item.classList.remove('hide');
          item.classList.add('show');
        }
      });
      tableBtn.classList.add('show');
      tableBtn.textContent = "Скрыть";
      
    }
    
  });
}
catch (e) { }
// ---------------------------------------









  //const map = document.querySelector('#map');


  mapboxgl.accessToken = 'pk.eyJ1IjoiZWthdGVyZWVlbmEiLCJhIjoiY2wxbTJ4YnJnMGJ4djNscG41bzM0aG5uciJ9.m1nS4hgSCZJMdY0knjNb2A';
  
    const map = new mapboxgl.Map({
      attributionControl: false,
      container: 'map',
      style: 'mapbox://styles/ekatereeena/cl1m3009d008o15mq1ey11ojj',
      
      //style: 'mapbox://styles/mapbox/light-v10',
      center: [60.656212,56.8342767],
      zoom: 5,
      antialias: true
    });
    map.addControl(new mapboxgl.NavigationControl());
    // .addControl(new mapboxgl.AttributionControl({
    //   compact: true
    //   }));
  
    //map.setLayoutProperty('country-label', 'text-field', ['get','name_ru']);

    // Create a default Marker and add it to the map.
  var marker = new mapboxgl.Marker({
    color: '#404B5C'
    })
      .setLngLat([60.656212,56.8342767])
      .addTo(map);
  
  



  //btn scroll to top
  // const toTop = document.querySelector('.totop');
  // toTop.addEventListener('click', (e) => {
  //   e.preventDefault;
  //   window.scrollBy({
  //     top: 0,
  //     behavior: 'smooth'
  //   });
    
  // });

  // service
  // const services = document.querySelectorAll('.iservice-item'),
  //   servicesWrap = document.querySelector('.iservice__wrap'),
  //   servicesColor = document.querySelectorAll('.iservice-bg');
  
  // services.forEach(item => {
  //   item.addEventListener('mouseenter', (e) => {
  //     for (let i = 0; i < services.length; i++){
  //       services[i].classList.remove('active');
  //     }
  //     for (let i = 0; i < servicesColor.length; i++) {
  //       servicesColor[i].style.width = `100%`;
  //       setTimeout(() => {
  //         servicesColor[i].style.width = `0`;
  //       }, 600);
  //     }

  //     const bg = item.getAttribute('data-bg');
  //     servicesWrap.style.background = `url(${bg})no-repeat`;
  //     servicesWrap.classList.remove('-overlay');
  //     item.classList.add('active');
  //   });
  // });

  // map
  // ymaps.ready(function () {
  //   const myMap = new ymaps.Map("map", {
  //     center: [47.18551107429099, 39.6564245],
  //     zoom: 8
  //   });
  //   const myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
  //     balloonContent: 'г. Ростов-на-Дону, ул. 1-я Луговая, 42Я'
  //   }, {
  //     iconLayout: 'default#image',
  //     iconImageHref: 'i/myIcon.svg',
  //     // iconImageSize: [63, 63],
  //     // iconImageOffset: [-5, -38]
  //   }),
  //   myPlacemark2 = new ymaps.Placemark([47.76768907413668, 39.94057949999997], {
  //       balloonContent: 'г. Новошахтинск, ул. Харьковская, 4'
  //     }, {
  //       iconLayout: 'default#image',
  //       iconImageHref: 'i/myIcon.svg',
  //       // iconImageSize: [63, 63],
  //       // iconImageOffset: [-5, -38]
  //     }),
  //     myPlacemark3 = new ymaps.Placemark([47.528464574189286, 42.13425649999997], {
  //       balloonContent: 'г. Волгодонск, ул. Волгодонская, 2в'
  //     }, {
  //       iconLayout: 'default#image',
  //       iconImageHref: 'i/myIcon.svg',
  //       // iconImageSize: [63, 63],
  //       // iconImageOffset: [-5, -38]
  //     });
  //   myMap.geoObjects
  //     .add(myPlacemark)
  //     .add(myPlacemark2)
  //     .add(myPlacemark3);
  // });
});