import Swiper from 'swiper/bundle';

$(function() {

  if ($('body').hasClass('single-spa')) {
    var spaGallerySwiper = new Swiper(".spa-gallery-swiper", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    var relatedOffersSwiper = new Swiper(".related-offers-swiper", {
      breakpoints: {
        576: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        992: {
          slidesPerView: auto,
          spaceBetween: 30,
        },
        1200: {
          slidesPerView: auto,
          spaceBetween: 30,
        },
      },
      slidesPerView: 1,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }

  if ($('body').hasClass('single-property')) {
    var propertyGallerySwiper = new Swiper(".property-gallery-swiper", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  }

});