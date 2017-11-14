(function($) {

  'use strict';

  function Breakpoint() {

    var self = this,
        value = null,
        lastValue = null,
        messages = {
          noCSS: 'BREAKPOINT: Warning no breakpoint set with CSS inside body:after',
          noSetup: 'BREAKPOINT: Warning no breakpoint set with CSS inside body:after or Breakpoint.setup() not called',
        },
        options = {
        };

    /**
     * Resize handler
    */
    function onResize() {
      // Save last breakpoint value
      lastValue = value;

      // Refresh breakpoint active value
      value = window.getComputedStyle(document.querySelector('body'), ':before').getPropertyValue('content').replace(/\"/g, '');
    }

    /**
     * Get active value
     * @return {String}
    */
    self.getValue = function() {
        if (value === null) {
            console.info(messages.noSetup);
        } else {
            return value;
        }
    };

    /**
     * Get last active value
     * @return {String}
    */
    self.getLastValue = function() {
        return lastValue;
    };


    /**
     * Public constructor
     * @param  {Object} opts Options
     */
    self.initialize = function(opts) {
      //extends options
      for (var i in opts) { options[i] = opts[i]; }

      $(window).resize(onResize);
      onResize();

      // Check if values has been set inside CSS
      if (value === '') {
        throw(messages.noCSS);
      }
    };

    self.initialize.apply(self, arguments);
    return self;
  }

  /* Namespace declaration */
  window.Breakpoint = Breakpoint;

}(jQuery));



// Utilisation

/*var bp = new Breakpoint();

// Execute only when website state change instead of at each resize event trigger
if (bp.getLastValue !== bp.getValue) {
    if (bp.getValue === 'tablet' || bp.getLastValue === 'mobile') {
    } else {
    }
}*/


// Dans le CSS
/* body:before {
    content: "desktop";
    display: none; // Prevent from displaying.

    @media (max-width: $screen-lg-min) {
        content: "tablet";
    }
    @media (max-width: $screen-xs-max) {
        content: "mobile";
    }
}*/