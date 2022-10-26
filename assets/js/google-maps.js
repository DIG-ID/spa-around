(function( $ ) {
    /**
 initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */
 function initMap( $el ) {

  // Find marker elements within map.
  var $markers = $el.find('.marker');

  var styles = [
    {
      "featureType":"all",
      "elementType":"all",
      "stylers": [
        {"visibility":"on"}
      ]
    },
    {
      "featureType":"all",
      "elementType":"labels",
      "stylers": [
        {"visibility":"on"},
        {"saturation":"-100"}
      ]
    },
    {
      "featureType":"all",
      "elementType":"labels.text.fill",
      "stylers": [
        {"saturation":36},
        {"color":"#000000"},
        {"lightness":40},
        {"visibility":"off"}
      ]
    },
    {
      "featureType":"all",
      "elementType":"labels.text.stroke",
      "stylers": [
        {"visibility":"on"},
        {"color":"#000000"},
        {"lightness":16}
      ]
    },
    {
      "featureType":"all",
      "elementType":"labels.icon",
      "stylers": [
        {"visibility":"off"}
      ]
      },
      {
        "featureType":"administrative",
        "elementType":"geometry.fill",
        "stylers": [
          {"color":"#000000"},
          {"lightness":20}
        ]
      },
      {
        "featureType":"administrative",
        "elementType":"geometry.stroke",
        "stylers": [
          {"color":"#000000"},
          {"lightness":17},
          {"weight":1.2}
        ]
      },
      {
        "featureType":"landscape",
        "elementType":"geometry",
        "stylers": [
          {"color":"#000000"},
          {"lightness":20}
        ]
      },
      {
        "featureType":"landscape",
        "elementType":"geometry.fill",
        "stylers": [
          {"color":"#4d6059"}
        ]
      },
      {
        "featureType":"landscape",
        "elementType":"geometry.stroke",
        "stylers": [
          {"color":"#4d6059"}
        ]
      },
      {
        "featureType":"landscape.natural",
        "elementType":"geometry.fill",
        "stylers": [
          {"color":"#4d6059"}
        ]
      },
      {
        "featureType":"poi",
        "elementType":"geometry",
        "stylers": [
          {"lightness":21}
          ]
        },
        {
          "featureType":"poi",
          "elementType":"geometry.fill",
          "stylers": [
            {"color":"#4d6059"}
          ]
        },
        {
          "featureType":"poi",
          "elementType":"geometry.stroke",
          "stylers": [
            {"color":"#4d6059"}
          ]
        },
        {
          "featureType":"road",
          "elementType":"geometry",
          "stylers": [
            {"visibility":"on"},
            {"color":"#7f8d89"}
          ]
        },
        {
          "featureType":"road",
          "elementType":"geometry.fill",
          "stylers": [
            {"color":"#7f8d89"}
          ]
        },
        {
          "featureType":"road.highway",
          "elementType":"geometry.fill",
          "stylers": [
            {"color":"#7f8d89"},
            {"lightness":17}
          ]
        },
        {
          "featureType":"road.highway",
          "elementType":"geometry.stroke",
          "stylers": [
            {"color":"#7f8d89"},
            {"lightness":29},
            {"weight":0.2}
          ]
        },
        {
          "featureType":"road.arterial",
          "elementType":"geometry",
          "stylers": [
            {"color":"#000000"},
            {"lightness":18}
          ]
        },
        {
          "featureType":"road.arterial",
          "elementType":"geometry.fill",
          "stylers": [
            {"color":"#7f8d89"}
          ]
        },
        {
          "featureType":"road.arterial",
          "elementType":"geometry.stroke",
          "stylers": [
            {"color":"#7f8d89"}
          ]
        },
        {
          "featureType":"road.local",
          "elementType":"geometry",
          "stylers": [
            {"color":"#000000"},
            {"lightness":16}
          ]
        },
        {
          "featureType":"road.local",
          "elementType":"geometry.fill",
          "stylers": [
            {"color":"#7f8d89"}
          ]
        },
        {
          "featureType":"road.local",
          "elementType":"geometry.stroke",
          "stylers": [
            {"color":"#7f8d89"}
          ]
        },
        {
          "featureType":"transit",
          "elementType":"geometry",
          "stylers": [
            {"color":"#000000"},
            {"lightness":19}
          ]
        },
        {
          "featureType":"water",
          "elementType":"all",
          "stylers": [
            {"color":"#2b3638"},
            {"visibility":"on"}
          ]
        },
        {
          "featureType":"water",
          "elementType":"geometry",
          "stylers": [
            {"color":"#2b3638"},
            {"lightness":17}
          ]
        },
        {
          "featureType":"water",
          "elementType":"geometry.fill",
          "stylers": [
            {"color":"#24282b"}
          ]
        },
        {
          "featureType":"water",
          "elementType":"geometry.stroke",
          "stylers": [
            {"color":"#24282b"}
          ]
        },
        {
          "featureType":"water",
          "elementType":"labels",
          "stylers": [
            {"visibility":"on"}
          ]
        },
        {
          "featureType":"water",
          "elementType":"labels.text",
          "stylers": [
            {"visibility":"on"}
          ]
        },
        {
          "featureType":"water",
          "elementType":"labels.text.fill",
          "stylers": [
            {"visibility":"on"}
          ]
        },
        {
          "featureType":"water",
          "elementType":"labels.text.stroke",
          "stylers": [
            {"visibility":"on"}
          ]
        },
        {
          "featureType":"water",
          "elementType":"labels.icon",
          "stylers": [
            {"visibility":"on"}
          ]
        }
      ]
  
  // Create gerenic map.
  var mapArgs = {
      zoom        : $el.data('zoom') || 13,
      styles: styles,
      mapTypeId   : google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map( $el[0], mapArgs );

  // Add markers.
  map.markers = [];
  $markers.each(function(){
      initMarker( $(this), map );
  });

  // Center map based on markers.
  centerMap( map );

  // Return map instance.
  return map;
}

/**
* initMarker
*
* Creates a marker for the given jQuery element and map.
*
* @date    22/10/19
* @since   5.8.6
*
* @param   jQuery $el The jQuery element.
* @param   object The map instance.
* @return  object The marker instance.
*/
function initMarker( $marker, map ) {

  // Get position from marker.
  var lat = $marker.data('lat');
  var lng = $marker.data('lng');
  var latLng = {
      lat: parseFloat( lat ),
      lng: parseFloat( lng )
  };

  // Create marker instance.
  var marker = new google.maps.Marker({
    position : latLng,
    map: map,
    icon: {
      path: 'M11 2c-3.9 0-7 3.1-7 7 0 5.3 7 13 7 13 0 0 7-7.7 7-13 0-3.9-3.1-7-7-7Zm0 9.5c-1.4 0-2.5-1.1-2.5-2.5 0-1.4 1.1-2.5 2.5-2.5 1.4 0 2.5 1.1 2.5 2.5 0 1.4-1.1 2.5-2.5 2.5Z',
      scale: 2.7272727272727272727272727273,
      anchor: new google.maps.Point(11, 22),
      fillOpacity: 1,
      fillColor: '#00bb00',
      strokeOpacity: 0
    }
  });

  // Append to reference for later use.
  map.markers.push( marker );

  // If marker contains HTML, add it to an infoWindow.
  if( $marker.html() ){

      // Create info window.
      var infowindow = new google.maps.InfoWindow({
          content: $marker.html()
      });

      // Show info window when marker is clicked.
      google.maps.event.addListener(marker, 'click', function() {
          infowindow.open( map, marker );
      });
  }
}

/**
* centerMap
*
* Centers the map showing all markers in view.
*
* @date    22/10/19
* @since   5.8.6
*
* @param   object The map instance.
* @return  void
*/
function centerMap( map ) {

  // Create map boundaries from all map markers.
  var bounds = new google.maps.LatLngBounds();
  map.markers.forEach(function( marker ){
      bounds.extend({
          lat: marker.position.lat(),
          lng: marker.position.lng()
      });
  });

  // Case: Single marker.
  if( map.markers.length == 1 ){
      map.setCenter( bounds.getCenter() );

  // Case: Multiple markers.
  } else{
      map.fitBounds( bounds );
  }
}

// Render maps on page load.
$(document).ready(function(){
  $('.acf-map').each(function(){
      var map = initMap( $(this) );
  });
});
  
  
  })(jQuery);