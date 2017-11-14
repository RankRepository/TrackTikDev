(function($) {

  'use strict';

  function ModuleName() {

    var self = this,
        options = {
          'example': null
        };

    /**
     * Public constructor
     * @param  {Object} opts Options
     */
    self.initialize = function(opts) {
      //extends options
      for (var i in opts) { options[i] = opts[i]; }


    };

    self.initialize.apply(self, arguments);
    return self;
  }

  /* Namespace declaration */
  window.ModuleName = ModuleName;

}(jQuery));



// Utilisation
new ModuleName({
  'example': 'value'
});