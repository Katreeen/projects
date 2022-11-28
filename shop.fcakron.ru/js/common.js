"use strict";

document.addEventListener("DOMContentLoaded", () => {
  const wrapper = document.querySelector('.wrapper');
  const header = document.querySelector('.header');
  const headerHeight = header.offsetHeight;
  //main.style.paddingTop = `${headerHeight}px`;
  let lastScrollTop = 0;
  
  
  
  

  const menuBtn = document.querySelector('.navbar-toggler'),
        drop = document.querySelector('.drop__menu'),
        menu  = document.querySelector('.drop__wrap'),
        closeBtn = document.querySelector('.navbar-close');

    menuBtn.addEventListener('click', (e) => {
      e.preventDefault();
      drop.classList.add('active');
      document.body.classList.add('hide');
      document.querySelector('.-open-menu').style.opacity = 0;
     
    });
  
    closeBtn.addEventListener('click', (e) => {
      e.preventDefault();
      closeMenu();
    });
    
    drop.addEventListener('click', (e) => {
      e.preventDefault();
      if (drop.classList.contains('active')) {
        console.log(drop);
        const withinBoundaries = e.composedPath().includes(menu);
        if ( ! withinBoundaries ) {
          closeMenu();
        }
        
      }
    });
  

    function closeMenu() {
      drop.classList.remove('active');
      document.body.classList.remove('hide');
      document.querySelector('.-open-menu').style.opacity = 1;
    }
  
  const searchBtn = document.querySelector('.header__search .search-link');
  const searchForm = document.querySelector('.header__search .search-form');
  const searchFormClose = document.querySelector('.header__search .btn-close');  
  const searchMobilForm = document.querySelector('.drop__search .search-wrap');
  const searchMobilBtn = document.querySelector('.drop__search .search-link');

  searchBtn.addEventListener('click', (e) => {
    e.preventDefault();
    searchForm.classList.add('active');
    searchBtn.style.opacity = 0;
    
  });
  searchFormClose.addEventListener('click', (e) => {
    e.preventDefault();
    searchForm.classList.remove('active');
    searchBtn.style.opacity = 1;
    
  });
  searchMobilBtn.addEventListener('click', (e) => {
    e.preventDefault();
    searchMobilForm.classList.toggle('active');
    
  });
  
  

  customSelect('.custom-select');
  try{
  
    if (window.innerWidth < 768) {
      

      const thumbs = document.querySelector('.product-thumbs.mobil-swiper');
      document.querySelector('.-col-product-img').append(thumbs);

      const productThumbs = new Swiper('.product-thumbs.mobil-swiper', {
        spaceBetween: 17,
        slidesPerView: 3,
        slideToClickedSlide: true,
      });


      const productSlider = new Swiper(".product-slider.mobil-swiper", {
        spaceBetween: 0,
        speed: 800,
        mousewheel: true,
        thumbs: {
          swiper: productThumbs
        }
      });

      productSlider[0].controller.control = productThumbs;
      productThumbs[0].controller.control = productSlider;
      
      
    }
  }
  catch{}
  if (window.innerWidth >= 768) {
    try{
    const slideCard = document.querySelectorAll('.product-slider .product-slide'),
      slideThumb = document.querySelectorAll('.product-thumbs .product-thumb');
  
    slideThumb.forEach((thumb, i) => {
      thumb.addEventListener('click', () => {

        slideThumb.forEach(el => {
          el.classList.remove('active');
        });
        
        console.log(slideCard[i]);
        slideCard[i].scrollIntoView({ behavior: "smooth" });
        thumb.classList.add('active');
      });
    });
  }
  catch{}
  }

  function scrollTrigger() {
    console.log('Scrolling...');
    // функционал переключения слайдов в товаре
    try{
      slideCard.forEach((slide, i) => {
        var posTop = slide.getBoundingClientRect().top;
        if (posTop <= 0) {
          slideThumb.forEach(el => {
            el.classList.remove('active');
          });
          slideThumb[i].classList.add('active');
        }
      });
    }
    catch{}
    
      // фиксируем шапку при прокрутке
     
    let scrollDistance = this.scrollTop;
    
    if (scrollDistance > 1) {
      header.classList.add('header_fixed');
      wrapper.style.paddingTop = `${headerHeight}px`;
    } else {
      header.classList.remove('header_fixed');
      wrapper.style.paddingTop = '0';
    }
    lastScrollTop = scrollDistance;

    // кнопка "вверх"
    
    
    let coords = document.body.clientHeight/3;
    //console.log(scrollDistance);
    if (scrollDistance > coords) {
      goTopBtn.classList.add('-show');
    }
    if (scrollDistance < coords) {
      goTopBtn.classList.remove('-show');
    }
    
  }
  function backToTop() {
      wrapper.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
  }
  const goTopBtn = document.querySelector('.btn-top');

  document.body.addEventListener("scroll", scrollTrigger);
  goTopBtn.addEventListener('click', backToTop);


});