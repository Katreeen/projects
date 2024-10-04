window.addEventListener("DOMContentLoaded", (event) => {

  const productSliderThumbs = new Swiper('.js-thumbs-slider', {
    spaceBetween: 10,
    freeMode: true,
    slidesPerView: 3.5,
    watchSlidesProgress: true,
  });

  const productSliderTop = new Swiper('.js-product-slider', {
    slidesPerView: 1,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: productSliderThumbs,
    
    }
     
  });

  // productSliderTop.controller.control = productSliderThumbs;
  // productSliderThumbs.controller.control = productSliderTop;



//search

const searchTrigger = document.querySelector('.btn-search');
const searchPanel = document.querySelector('.search-panel');

searchTrigger.addEventListener('click', () => {
  if (searchPanel.classList.contains('active')) {
    searchPanel.classList.remove('active');
  } else {
    searchPanel.classList.add('active');
  }
});

// mobil menu

const menuTrigger = document.querySelector('.js-show-menu'),
  menuClose = document.querySelectorAll('.js-menu-close'),
  mobileModal = document.querySelector('.mobile-modal'),
  body = document.querySelector('body');



menuTrigger.addEventListener('click', (function () {
  mobileModal.classList.add('mobile-modal--show');
  body.classList.add('no-scroll');
}));

menuClose.forEach(function (close) {
  close.addEventListener('click', (function () {
    if(mobileModal.classList.contains('mobile-modal--show')){
      mobileModal.classList.remove('mobile-modal--show', 'mobile-modal--show-screen');
      body.classList.remove('no-scroll');
    }
  }));
});
  
// mobil filter
  
  
  const filterBtn = document.querySelector('.js-show-filter'),
    filter = document.querySelector('.smart-filter'),
    filterModal = document.querySelector('.filter-modal'),
    filterItemTitle = document.querySelectorAll('.common__sidebar-title'),
    filterClose = document.querySelectorAll('.js-filter-close');
  
  
  
  function filterItemShow() {
    filterItemTitle.forEach(function (e) {
      e.addEventListener('click', (function () {
        if (e.nextElementSibling.classList.contains('common__sidebar-list--show')) {
          e.nextElementSibling.classList.remove('common__sidebar-list--show');
        } else {
          e.nextElementSibling.classList.add('common__sidebar-list--show');
        }
      }));
      
    });
  }

  if (window.innerWidth <= 991) {
    filterModal.querySelector('.filter-modal__inner').append(filter);
    filterItemShow();
  }
  window.addEventListener("resize", function() {
    if (window.innerWidth <= 991) {
      filterModal.querySelector('.filter-modal__inner').append(filter);
      filterItemShow();
    } else {
      document.querySelector('.common__sidebar').append(filter);
      filterItemShow();
  }
  
});


  filterBtn.addEventListener('click', (function () {
    filterModal.classList.add('filter-modal--show');
    body.classList.add('no-scroll');
  }));
  
  filterClose.forEach(function (close) {
    close.addEventListener('click', (function () {
      if(filterModal.classList.contains('filter-modal--show')){
        filterModal.classList.remove('filter-modal--show', 'filter-modal--show-screen');
        body.classList.remove('no-scroll');
      }
    }));
  });


  
  

//таблица Менделеева



/*
const btnElements = document.querySelectorAll('.js-tooltip');

btnElements.forEach(function (item) {
  let id = item.getAttribute('data-template');
  let tooltip = document.getElementById(id);
  console.log(tooltip);

  tippy(item, {
    theme: 'white',
    placement: 'bottom-start',
    content: tooltip,
    allowHTML: true,
    maxWidth: 600,
  });
  
});
*/
document.querySelector(".common__sidebar").addEventListener("click", function(event) {
  if (event.target.classList.contains("common__sidebar-title")) {
    event.target.classList.toggle('common__title--open');
    event.target.nextElementSibling.classList.toggle('common__sidebar-list--show');
  }
});

document.querySelector(".catalog-list").addEventListener("click", function(event) {
  if (event.target.classList.contains("offer-card__more")) {
    let offerCard = event.target.closest('.offer-card');
    let offerCount = event.target.dataset.count;
    if (offerCard && offerCard.classList.contains('offer-card--open')) {
      event.target.textContent = "Show offers ("+offerCount+")";
      offerCard.classList.remove('offer-card--open');
    } else if (offerCard) {
      event.target.textContent = "Hide Offers";
      offerCard.classList.add('offer-card--open');
    }
  }
});
  
  const payBlock = document.querySelector(".product-item-detail-pay-block");
  const payLinks = document.querySelectorAll(".table-detail__add");
  const scuContainer = document.querySelectorAll('.product-item-scu-item-text-container');

if (document.querySelector(".bx-catalog-element .table-detail")) {

  payBlock.style.display = "none";

  document.querySelectorAll(".js-link-add").forEach(function (t) {
    t.addEventListener("click", function (event) {
      event.preventDefault();
      
      payLinks.forEach(function (item) {
        item.classList.remove("table-detail__add--hidden");
      });
      scuContainer.forEach(function (item) {
        item.classList.remove("selected");
      });

      this.classList.add("table-detail__add--hidden");
      this.parentNode.append(payBlock);
      payBlock.style.display = "block";
     // this.parentNode.parentNode.classList.add("selected");
      document.querySelector(".table-detail__number").classList.add("table-detail__number--show");
    });
  });
}


document.querySelector(".catalog-list").addEventListener("click", function(event) {
  if (event.target.classList.contains("js-link-add")) {
    event.preventDefault();

    payLinks.forEach(function (item) {
      item.classList.remove("table-detail__add--hidden");
    });

    const productBlock = event.target.closest(".product-item-container");
    const payItemBlock = productBlock.querySelector('.product-item-pay-block');

    payItemBlock.style.display = "block";
    event.target.classList.add("table-detail__add--hidden");
    event.target.parentNode.appendChild(payItemBlock);
    productBlock.querySelector(".table-detail__number").classList.add("table-detail__number--show");
  }
});






});