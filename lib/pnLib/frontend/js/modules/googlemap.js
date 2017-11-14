(function($) {

  'use strict';

  function GoogleMap() {

    var self = this,

        map = null,
        center = null,
        bounds = null,
        markers = [],

        options = {};

    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 10,
        draggable: true,
        mapTypeControl: true,
        overviewMapControl: true,
        scrollwheel: false,
        panControl: true,
        zoomControl: true,
        scaleControl: true,
        streetViewControl: true,
        disableDoubleClickZoom: true,

        // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.
        styles: [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]
    };


    /**
     * Resize map trigger
    */
    var onResize = function() {
      if (map) google.maps.event.trigger(map, 'resize');
    };


    /**
     * Calculate new center on resize
     */
    var calculateCenter =  function() {
      if (map) center = map.getCenter();
    };


    /**
     * Offset set center in pixel
     */
    var offsetCenter = function() {
      if (options.centerXOffset || options.centerYOffset) {
        var x = options.centerXOffset || 0,
            y = options.centerYOffset || 0;

        map.panBy(x, y);
      }
    };


    /**
     * Create one maker
     */
    var createMarker = function (item) {
      var markerOptions = {
          position: new google.maps.LatLng(item.lat, item.lng),
          map: map,
          title: item.title || ''
      };

      // Custom marker image
      if (item.icon) {
        var icon = new google.maps.MarkerImage(item.icon.url,
          new google.maps.Size(item.icon.width, item.icon.height)
        );

        markerOptions.icon = icon;
      }

      // Add marker
      var marker = new google.maps.Marker(markerOptions);

      // Add custom window infos
      if (item.info) {
        var infoWindow = new google.maps.InfoWindow({
          content: item.info.text
        });

        if (item.info.onLoad) infoWindow.open(map, marker);

        marker.addListener('click', function() {
          infoWindow.open(map, marker);
        });
      }

      //extend the bounds to include each marker's position
      bounds.extend(marker.position);

      // Save marker
      markers.push(marker);
    };


    /**
     * Public constructor
     * @param  {Object} opts Options
     */
    self.initialize = function(opts) {
      // extends options
      for (var i in opts) { options[i] = opts[i]; }

      // Center map
      // var x = 45.437374,
      //     y = -73.624767;
      //mapOptions.center = new google.maps.LatLng(x, y);
      mapOptions.styles = options.styles;
 
      // When the window has finished loading create our google map below
      google.maps.event.addDomListener(window, 'load');

      // Create map
      var mapElement = document.getElementById(options.id);
      map = new google.maps.Map(mapElement, mapOptions);

      // Create empty LatLngBounds object to center map according to multiple markers
      bounds = new google.maps.LatLngBounds();
      map.fitBounds(bounds);

      // Creates markers
      var markersLength = options.markers.length;
      for (var k = 0; k < markersLength; k++) {
        createMarker(options.markers[k]);
      }

      // Center marker on resize
      var listener = google.maps.event.addDomListener(map, 'idle', function() {
        // Set zoom level once map is centered
        if (options.zoom) map.setZoom(options.zoom);
        if (options.zoomOffset) map.setZoom(map.getZoom() + options.zoomOffset);

        calculateCenter();

        // Initialize callbacks
        if (typeof options.onReady === 'function') {
          options.onReady(map, markers);
        }

        google.maps.event.removeListener(listener);
      });
      google.maps.event.addDomListener(window, 'resize', function() {
        map.setCenter(center);
      });
      $(window).on('resize', onResize);

      // Offset center
      offsetCenter();
    };

    self.initialize.apply(self, arguments);
    return self;
  }

  /* Namespace declaration */
  window.GoogleMap = GoogleMap;

}(jQuery));
