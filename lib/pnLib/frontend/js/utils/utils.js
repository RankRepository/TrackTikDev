
//namespace
this.Utils = this.Utils || {};
(function($) {

    'use strict';

    /**
     * Set equal height for all elements passed in parameters
     * @param {jQuery list} $col
     */
    Utils.setEqualHeight = function($col) {
      // Find max height
      var maxHeight = 0;
      $col.each(function() {
        var $this = $(this);
        $this.removeAttr('style');              // Remove previously set height for responsive behavior

        var $height = $this.innerHeight();

        if ($height > maxHeight) {
          maxHeight = $height;
        }
      });

      // Set height
      $col.each(function() {
        $(this).css('height', maxHeight);
      });
    };

    /**
     * Remove equal height for all elements passed in parameters
     * @param {jQuery list} $col
     */
    Utils.removeEqualHeight = function($col) {
      $col.each(function() {
        $(this).removeAttr('style');
      });
    };

}(jQuery));
