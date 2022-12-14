import Swiper from 'swiper/bundle';

$(function() {

  if ($('body').hasClass('single-spa')) {
    var spaGallerySwiper = new Swiper(".spa-gallery-swiper", {
      slidesPerView: 1,
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    var relatedOffersSwiper = new Swiper(".related-offers-swiper", {
      breakpoints: {
        576: {
          slidesPerView: 1.4,
          spaceBetween: 30,
        },
        768: {
          slidesPerView: 2.4,
          spaceBetween: 30,
        },
        992: {
          slidesPerView: 3.4,
          spaceBetween: 30,
        },
        1200: {
          slidesPerView: 5.2,
          spaceBetween: 30,
        },
      },
      slidesPerView: 1.4,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }

  if ($('body').hasClass('single-property')) {
    var propertyGallerySwiper = new Swiper(".property-gallery-swiper", {
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  }

});