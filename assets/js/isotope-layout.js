var Isotope = require('isotope-layout');

$(function() {

  var iso = new Isotope( '.grid-spa', {
    itemSelector: '.grid-spa-item',
    layoutMode: 'fitRows'
  });

});