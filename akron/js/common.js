"use strict";

document.addEventListener("DOMContentLoaded", () => {

  //btn scroll to top
  const toTop = document.querySelector('.totop');
  toTop.addEventListener('click', (e) => {
    e.preventDefault;
    window.scrollBy({
      top: 0,
      behavior: 'smooth'
    });
    
  });

  // service
  const services = document.querySelectorAll('.iservice-item'),
    servicesWrap = document.querySelector('.iservice__wrap'),
    servicesColor = document.querySelectorAll('.iservice-bg');
  
  services.forEach(item => {
    item.addEventListener('mouseenter', (e) => {
      for (let i = 0; i < services.length; i++){
        services[i].classList.remove('active');
      }
      for (let i = 0; i < servicesColor.length; i++) {
        servicesColor[i].style.width = `100%`;
        setTimeout(() => {
          servicesColor[i].style.width = `0`;
        }, 600);
      }

      const bg = item.getAttribute('data-bg');
      servicesWrap.style.background = `url(${bg})no-repeat`;
      servicesWrap.classList.remove('-overlay');
      item.classList.add('active');
    });
  });

  // map
  ymaps.ready(function () {
    const myMap = new ymaps.Map("map", {
      center: [47.18551107429099, 39.6564245],
      zoom: 8
    });
    const myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
      balloonContent: 'г. Ростов-на-Дону, ул. 1-я Луговая, 42Я'
    }, {
      iconLayout: 'default#image',
      iconImageHref: 'i/myIcon.svg',
      // iconImageSize: [63, 63],
      // iconImageOffset: [-5, -38]
    }),
    myPlacemark2 = new ymaps.Placemark([47.76768907413668, 39.94057949999997], {
        balloonContent: 'г. Новошахтинск, ул. Харьковская, 4'
      }, {
        iconLayout: 'default#image',
        iconImageHref: 'i/myIcon.svg',
        // iconImageSize: [63, 63],
        // iconImageOffset: [-5, -38]
      }),
      myPlacemark3 = new ymaps.Placemark([47.528464574189286, 42.13425649999997], {
        balloonContent: 'г. Волгодонск, ул. Волгодонская, 2в'
      }, {
        iconLayout: 'default#image',
        iconImageHref: 'i/myIcon.svg',
        // iconImageSize: [63, 63],
        // iconImageOffset: [-5, -38]
      });
    myMap.geoObjects
      .add(myPlacemark)
      .add(myPlacemark2)
      .add(myPlacemark3);
  });
});