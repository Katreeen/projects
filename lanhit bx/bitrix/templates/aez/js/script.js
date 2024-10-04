window.addEventListener("DOMContentLoaded", (event) => {


  Fancybox.bind("[data-fancybox]", {
    // Your custom options
  });

  const catalogList = document.querySelector(".catalog-list");
  const payBlock = document.querySelector(".product-item-detail-pay-block");
  const payLinks = document.querySelectorAll(".table-detail__add");
  const scuContainer = document.querySelectorAll('.product-item-scu-item-text-container');
  const searchTrigger = document.querySelector('.btn-search');
  const searchPanel = document.querySelector('.search-panel');
  const sidebar = document.querySelector(".common__sidebar");

  const menuTrigger = document.querySelector('.js-show-menu'),
        menuClose = document.querySelectorAll('.js-menu-close'),
        mobileModal = document.querySelector('.mobile-modal'),
        body = document.querySelector('body');
  
  const filterBtn = document.querySelector('.js-show-filter'),
        filter = document.querySelector('.smart-filter'),
        filterModal = document.querySelector('.filter-modal'),
        filterItemTitle = document.querySelectorAll('.common__sidebar-title'),
        filterClose = document.querySelectorAll('.js-filter-close');
  
  
  
  
  if (catalogList) {

    catalogList.addEventListener("click", function(event) {
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


    catalogList.addEventListener("click", function(event) {
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
    
  }
  



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




  //search
  if (searchTrigger) {
    searchTrigger.addEventListener('click', () => {
      if (searchPanel.classList.contains('active')) {
        searchPanel.classList.remove('active');
      } else {
        searchPanel.classList.add('active');
      }
    });
  }


// mobil menu

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
  if (filter) {
  

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
}

  if (filterBtn) {
  
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
  }


  // const modalOpen = document.querySelectorAll('.js-show-modal');
  // const modalClose = document.querySelectorAll('.js-modal-close');
  // const modal = document.querySelectorAll('.modal');



  // modalOpen.forEach(function (link) {
    
  //   link.addEventListener('click', function (e) {
  //     e.preventDefault();
  //     const data = link.dataset.type;
  //     console.log(data);
      
      
  //     modal.forEach(function (item) {
        
  //       if (item.dataset.type == data) {
  //         console.log(item);
  //         item.classList.add('modal--show');
  //         body.classList.add('no-scroll');

  //       }


  //     });
  //   });
  // });
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
  if (sidebar) {
    sidebar.addEventListener("click", function(event) {
      if (event.target.classList.contains("common__sidebar-title")) {
        event.target.classList.toggle('common__title--open');
        event.target.nextElementSibling.classList.toggle('common__sidebar-list--show');
      }
    });
  }


  

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
  
  
function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
  "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
let cookiecook = getCookie("cookiecook"),
cookiewin = document.getElementById('cookies');    
// проверяем, есть ли у нас cookie, с которой мы не показываем окно и если нет, запускаем показ
if (cookiecook != "no") {
  // показываем    
  cookiewin.style.display="block"; 
  // закрываем по клику
  document.getElementById("cookie_close").addEventListener("click", function(){
      cookiewin.style.display="none";    
      // записываем cookie на 1 день, с которой мы не показываем окно
      let date = new Date;
      date.setDate(date.getDate() + 1);    
      document.cookie = "cookiecook=no; path=/; expires=" + date.toUTCString();               
  });
} 



});

