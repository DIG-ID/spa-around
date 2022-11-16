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
      slidesPerView: "auto",
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }

});