var Isotope = require('isotope-layout');
require('isotope-cells-by-row');

var iso = new Isotope( '.grid-spa', {
    itemSelector: '.grid-spa-item',
    layoutMode: 'cellsByRow',
});


/*
$('.grid-spa').isotope({
    itemSelector: '.grid-spa-item',
    percentPosition: true,
    masonry: {
      columnWidth: '.grid-spa-sizer'
    }
  })*/