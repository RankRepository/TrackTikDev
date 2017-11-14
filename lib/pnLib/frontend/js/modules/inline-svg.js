(function($) {

  'use strict';

  function InlineSVG() {

    var self = this,

        options = {
          el: null
        };



    /**
     * Public constructor
     * @param  {Object} opts Options
     */
    self.initialize = function(opts) {
      // Extends options
      for (var i in opts) { options[i] = opts[i]; }

      // http://stackoverflow.com/questions/24933430/img-src-svg-changing-the-fill-color
      $(options.selector).each(function() {

        var $img = $(this),
          imgID = $img.attr('id'),
          imgClass = $img.attr('class'),
          imgURL = $img.attr('src');

        $.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = $(data).find('svg');

          // Add old image's attributes to the new SVG
          if (typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
          }

          if (typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass + ' replaced-svg');
          }

          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');

          // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
          if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
          }

          // Replace image with new SVG
          $img.replaceWith($svg);

        }, 'xml');

      });
    };

    self.initialize.apply(self, arguments);
    return self;
  }

  /* Namespace declaration */
  window.InlineSVG = InlineSVG;

}(jQuery));
