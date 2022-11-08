$(function() {

  $('.navbar-toggler').on( 'click', function(e) {
    $('.navbar').toggleClass('nav-open');
  });

  let header = $('#main-header');
  let lastScroll = 0;

  $(window).on( 'scroll', function() {
    const currentScroll = window.pageYOffset;
    if ( currentScroll <= 0 ) {
      //console.log('current scroll is ' + currentScroll);
      header.removeClass( 'sticky' );
      return;
    } 
    if ( currentScroll > lastScroll && currentScroll > 0 && ! header.hasClass('sticky') ) {
      //down
      header.removeClass( 'sticky' );
      header.addClass( 'sticky' );
    } 
    lastScroll = currentScroll;
  });

});