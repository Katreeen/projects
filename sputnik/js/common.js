"use strict";
document.addEventListener("DOMContentLoaded", () => {

  const itop = new Swiper('.itop__slider', {
    loop: false,
    speed: 800,
    navigation: {
      nextEl: '.itop .swiper-button-next',
      prevEl: '.itop .swiper-button-prev',
    },
  });
  
  const actual = new Swiper('.iactual__slider', {
    loop: false,
    speed: 800,
    slidesPerView: 4,
    spaceBetween: 20,
    navigation: {
      nextEl: '.iactual__nav .swiper-button-next',
      prevEl: '.iactual__nav .swiper-button-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      575: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 20
      }
    }
  });
  
  const spec = new Swiper('.ispec__slider', {
    loop: false,
    speed: 800,
    slidesPerView: 4,
    spaceBetween: 20,
    navigation: {
      nextEl: '.ispec__nav .swiper-button-next',
      prevEl: '.ispec__nav .swiper-button-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      575: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 20
      }
    }
  });

  const recomend = new Swiper('.recomend__slider', {
    loop: false,
    speed: 800,
    slidesPerView: 4,
    spaceBetween: 20,
    navigation: {
      nextEl: '.recomend__nav .swiper-button-next',
      prevEl: '.recomend__nav .swiper-button-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      575: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 20
      }
    }
  });
  
  const news = new Swiper('.inews__slider', {
    loop: false,
    speed: 800,
    slidesPerView: 5,
    spaceBetween: 34,
    navigation: {
      nextEl: '.inews__nav .swiper-button-next',
      prevEl: '.inews__nav .swiper-button-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      575: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      1200: {
        slidesPerView: 5,
        spaceBetween: 34
      }
    }
  });

  // custom scrollbar
  new SimpleBar(document.querySelector('.nav-box'), {
    autoHide: false
  });
  new SimpleBar(document.querySelector('.tab-content'), {
    autoHide: true
  });
  
  
  // Tabs header menu
  const tabs = document.querySelectorAll('.tabs button'),
        tabsContent = document.querySelectorAll('.tab-content .tab-item'),
        tabsParent = document.querySelector('.tabs');
    
  function hideTabContent() {
    tabsContent.forEach(item => {
      item.classList.remove('show', 'active');
    });
    tabs.forEach(item => {
      item.classList.remove('active');
    });
  }
  
  function showTabContent(i = 0) {
    tabsContent[i].classList.add('show', 'active');
    tabs[i].classList.add('active');
  }

  hideTabContent();
  showTabContent();

  tabsParent.addEventListener('click', (event) => {
    const target = event.target;
    console.log(target);
    if (target && target.classList.contains('nav-link')) {
      tabs.forEach((item, i) => {
        if (target == item) {
          hideTabContent();
          showTabContent(i);
        }
      });
    }
  });


  // tabs product
  const tabsProduct = document.querySelectorAll('.product-tabs .tabs-item'),
  tabsProductContent = document.querySelectorAll('.tabs-content .tab-block'),
  tabsProductParent = document.querySelector('.product-tabs');
  if (tabsProduct.length>0) {
    function hideTabProductContent() {
      tabsProductContent.forEach(item => {
        item.classList.remove('show', 'active');
      });
      tabsProduct.forEach(item => {
        item.classList.remove('active');
      });
    }

    function showTabProductContent(i = 0) {
      tabsProductContent[i].classList.add('show', 'active');
      tabsProduct[i].classList.add('active');
    }

    hideTabProductContent();
    showTabProductContent();

    tabsProductParent.addEventListener('click', (event) => {
      const target = event.target;
      if (target && target.classList.contains('tabs-item')) {
        tabsProduct.forEach((item, i) => {
          if (target == item) {
            hideTabProductContent();
            showTabProductContent(i);
          }
        });
      }
    });
  }






  // header drop menu toggle
  const catalogToggler = document.querySelector('.header__navbar .navbar-toggler');
  const closeMenu = document.querySelector('.mobil-menu-close a');
  let dropMenu;

  if (document.documentElement.clientWidth < 576) {
    dropMenu = document.querySelector('#mobil-menu');
    closeMenu.addEventListener('click', (e) => {
      e.preventDefault();
      closePopupMenu();
    });
  } else {
    dropMenu = document.querySelector('#catalog-menu');
  }
  catalogToggler.addEventListener('click', () => {
    if (dropMenu.classList.contains('show')) {
      closePopupMenu();
    } else {
      dropMenu.classList.add('show');
      dropMenu.style.height = `${dropMenu.scrollHeight}px`;
      document.body.classList.add('show-menu');
    }
  });
  function closePopupMenu() {
    dropMenu.classList.remove('show');
    dropMenu.style.height = 0;
    document.body.classList.remove('show-menu');
  }

  // toggle search
  const togglerSearch = document.querySelector('.toggle-search'),
        searchForm = document.querySelector('.header__search');
  togglerSearch.addEventListener('click', () => {
      searchForm.classList.toggle('show');
  });

  // map tabs
  if (document.querySelector('.city')) {
    const city = document.querySelector('.city'),
      cityItems = city.querySelectorAll('.city-item'),
      cityInfo = document.querySelectorAll('.city-info'),
      closeBtn = document.querySelector('.city-content-close'),
      cityContent = document.querySelector('.city-content');
  
    cityItems.forEach(item => {
      item.addEventListener('click', (e) => {
        e.preventDefault();
        for (let i = 0; i < city.children.length; i++) {
          city.children[i].classList.remove('active');
        }
        cityInfo.forEach(i => {
          i.classList.remove('show');
        });
        cityContent.classList.remove('hidden');
        const cityId = e.target.getAttribute('href');
      
        e.target.classList.add('active');
        document.querySelector(cityId).classList.add('show');

        const coord = e.target.getAttribute('data-coords').split(',');
        myMap.setZoom(10);
        myMap.panTo([coord], {
          duration: 500,
          flying: true
        });
      
      });
    });
    closeBtn.addEventListener('click', () => {
      cityContent.classList.add('hidden');
    });
  } 

  const catalogFilter = document.querySelector('.catalog__filter'),
    filterTitle = document.querySelectorAll('.filter-title');
    filterTitle.forEach(item => {
    item.addEventListener('click', (e) => {
      const drop = item.nextElementSibling;
      if (drop.classList.contains('active')) {
        item.classList.remove('active');
        drop.classList.remove('active');
      } else {
        item.classList.add('active');
        drop.classList.add('active');
      }
      
    });
  });
  

  // Инициализация превью слайдера
const sliderThumbs = new Swiper('.slider__thumbs .swiper-container', { 
	//direction: 'vertical',
	slidesPerView: 4, 
	spaceBetween: 21, 
	navigation: false,
	freeMode: true,
	breakpoints: {
		0: { 
			direction: 'horizontal',
		},
		768: { 
			direction: 'vertical',
		}
	}
});

const sliderImages = new Swiper('.slider__images .swiper-container', { 
	direction: 'horizontal', 
	slidesPerView: 1, 
	spaceBetween: 32, 
	mousewheel: true, 
  navigation: false,
  pagination: {
    el: ".slider__images .swiper-pagination",
    clickable: true
  },
	grabCursor: true, 
	thumbs: { 
		swiper: sliderThumbs 
	},
	
}); 
  
  
  const elems = document.querySelectorAll('.calendar-range');
  elems.forEach(elem => {
    const rangepicker = new DateRangePicker(elem, {
      'format': 'dd.mm.yyyy',
    });
  });


  const dataInfo = document.querySelectorAll('.data-info');
  dataInfo.forEach(item => {
    const dataLink = item.querySelector('.more-info');
    const moreText = item.querySelector('.more-text');
    dataLink.addEventListener('click', (e) => {
      e.preventDefault();
      if (moreText.classList.contains('show')) {
        moreText.classList.remove('show');
        dataLink.textContent = 'Показать реквизиты';
      } else {
        moreText.classList.add('show');
        dataLink.textContent = 'Скрыть реквизиты';
      }
    });
  });


  if(document.querySelector("#map")){
    ymaps.ready(init);
      var myMap; 
      function init () {
      myMap = new ymaps.Map("map", {
          center: [53.2202280712095,50.19448949999988], 
          behaviors: ['default', 'scrollZoom'], 
          zoom: 8 
      });
        
      myMap.geoObjects
        .add(new ymaps.Placemark([53.2202280712095, 50.19448949999988], {
          balloonContent: 'г.Самара, ул. Санфировой, д. 95',
          iconCaption: 'Центральный офис'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }))
        .add(new ymaps.Placemark([53.505201570986415, 49.39027249999998], {
          balloonContent: 'г.Тольятти, ул. Родины, д. 3',
          iconCaption: 'Филиал'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }))
        .add(new ymaps.Placemark([54.716450569949345,55.97831950000001], {
          balloonContent: 'г. Уфа, ул. Айская, д. 37',
          iconCaption: 'Филиал'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }))
        .add(new ymaps.Placemark([51.798798572224264,55.082052000000004], {
          balloonContent: 'г. Оренбург, ул. Юркина, д. 11А, кор. 2',
          iconCaption: 'Филиал'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }))
        .add(new ymaps.Placemark([54.328806070274894,48.3958735], {
          balloonContent: 'г. Ульяновск, ул. Федерации, д. 89а',
          iconCaption: 'Филиал'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }))
        .add(new ymaps.Placemark([56.15244456859227,47.19452049999997], {
          balloonContent: 'г. Чебоксары, Приволжский бульвар, д. 4/1',
          iconCaption: 'Филиал'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }))
        .add(new ymaps.Placemark([45.031432074585005,39.057382999999945], {
          balloonContent: 'г. Краснодар, ул. Лизы Чайкиной, д. 14',
          iconCaption: 'Филиал'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }))
        .add(new ymaps.Placemark([56.84335306787346,60.66437199999993], {
          balloonContent: 'г. Екатеринбург, ул. Малышева, д.145Б',
          iconCaption: 'Филиал'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }))
        .add(new ymaps.Placemark([54.91871556976173,60.334564499999985], {
          balloonContent: 'г. Саратов, 1 Пугачевский поселок, д. Б-2',
          iconCaption: 'Филиал'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }))
        .add(new ymaps.Placemark([56.8352045678827,53.25901099999998], {
          balloonContent: 'г. Ижевск, ул. Орджоникидзе, д. 1А, корп. 6',
          iconCaption: 'Филиал'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }))
        .add(new ymaps.Placemark([44.92278457458647,34.08619599999999], {
          balloonContent: 'г. Симферополь, ул. Миллера д.4',
          iconCaption: 'Филиал'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }))
        .add(new ymaps.Placemark([57.641220566984686,39.81708849999999], {
          balloonContent: 'г. Ярославль, ул. Юности д. 22',
          iconCaption: 'Филиал'
        }, {
          preset: 'islands#icon',
          iconCaptionMaxWidth: '200',
          iconColor: '#2AB346'
        }));
    }
  }













  
  // const ireviews = new Swiper('.ireviews__carousel', {
  //   loop: false,
  //   speed: 800,
    
  //   navigation: {
  //     nextEl: '.ireviews .swiper-button-next',
  //     prevEl: '.ireviews .swiper-button-prev',
  //   },
  // });

  // const inews = new Swiper('.inews__carousel', {
  //   loop: false,
  //   speed: 800,
  //   navigation: {
  //     nextEl: '.inews .swiper-button-next',
  //     prevEl: '.inews .swiper-button-prev',
  //   },
  // });

  // const team = new Swiper('.team__slider', {
  //   loop: false,
  //   speed: 800,
  //   slidesPerView: 4,
  //   spaceBetween: 30,
  //   navigation: {
  //     nextEl: '.team .swiper-button-next',
  //     prevEl: '.team .swiper-button-prev',
  //   },
  //   breakpoints: {
  //     320: {
  //       slidesPerView: 1,
  //       spaceBetween: 20,
  //     },
  //     575: {
  //       slidesPerView: 2,
  //       spaceBetween: 20,
  //     },
  //     768: {
  //       slidesPerView: 3,
  //       spaceBetween: 30
  //     },
  //     992: {
  //       slidesPerView: 4,
  //       spaceBetween: 40
  //     }
  //   }
  // });

  // const cert = new Swiper('.cert__slider', {
  //   loop: false,
  //   speed: 800,
  //   slidesPerView: 4,
  //   spaceBetween: 30,
  //   navigation: {
  //     nextEl: '.cert .swiper-button-next',
  //     prevEl: '.cert .swiper-button-prev',
  //   },
  //   breakpoints: {
  //     320: {
  //       slidesPerView: 1,
  //       spaceBetween: 20,
  //     },
  //     575: {
  //       slidesPerView: 2,
  //       spaceBetween: 20,
  //     },
  //     768: {
  //       slidesPerView: 4,
  //       spaceBetween: 30
  //     },
  //   }
  // });
  // const reviews = new Swiper('.reviews__carousel', {
  //   loop: false,
  //   speed: 800,
  //   // slidesPerView: "auto",
  //   slidesPerView: 3,
  //   spaceBetween: 30,
  //   navigation: {
  //     nextEl: '.reviews .swiper-button-next',
  //     prevEl: '.reviews .swiper-button-prev',
  //   },
  // });
  // const news = new Swiper('.news__carousel', {
  //   loop: false,
  //   speed: 800,
  //   slidesPerView: "auto",
  //   spaceBetween: 30,
  //   navigation: {
  //     nextEl: '.news .swiper-button-next',
  //     prevEl: '.news .swiper-button-prev',
  //   },
  //   breakpoints: {
  //     320: {
  //       slidesPerView: 1,
  //       spaceBetween: 20,
  //     },
  //     400: {
  //       slidesPerView: "auto",
  //     },
  //   }
  // });

  // const getPaddingContainer = () => {
  //   const fullContainer = document.querySelectorAll('.js-pl');
  //   const paddingContainer = document.querySelector('.container').getBoundingClientRect();
  //   console.log(paddingContainer);
  //   fullContainer.forEach(item => {
  //     console.log(item);
  //     item.style.paddingLeft = `${paddingContainer.left+15}px`;
  //   });
  // };
  // getPaddingContainer();
  // window.addEventListener('resize', getPaddingContainer, true);


  // const addPhoto = document.getElementById('r-photo');
  // addPhoto.addEventListener('change', (event) => {
  //   const result = document.querySelector('.filename');
  //   result.textContent = `${event.target.value}`;
  // });
  
  //  // Add event listener
  //  document.addEventListener("mousemove", parallax);
  //  const elems = document.querySelectorAll(".parallax");

  //  // Magic happens here
  //  function parallax(e) {
  //      let _w = window.innerWidth/2;
  //      let _h = window.innerHeight/2;
  //      let _mouseX = e.clientX;
  //      let _mouseY = e.clientY;
  //      let _depth1 = `${50 - (_mouseX - _w) * 0.01}% ${50 - (_mouseY - _h) * 0.01}%`;
  //      let _depth2 = `${50 - (_mouseX - _w) * 0.02}% ${50 - (_mouseY - _h) * 0.02}%`;
  //      let _depth3 = `${50 - (_mouseX - _w) * 0.06}% ${50 - (_mouseY - _h) * 0.06}%`;
  //      let x = `${_depth3}, ${_depth2}, ${_depth1}`;
  //    console.log(x);
  //    elems.forEach(item => {
  //     item.style.backgroundPosition = x;
  //    });
     
  //  }

});