/**
 * @file
 * Contains definition of the behaviour jsAutoHeight.
 */

(function ($) {
  Drupal.behaviors.jsAutoHeight = {
    attach: function (context, settings) {
      try
      {
        // Check that AutoHeight() exists
        if (typeof $.fn.AutoHeight !== 'undefined') {

          // Check that the settings object exists
          if (typeof settings.autoheight !== 'undefined') {

            // Default settings value
            var selectors = ['.block'];

            // Get settings for this behaviour
            if (typeof settings.autoheight.selectors !== 'undefined') {
              selectors = settings.autoheight.selectors;
            }

			window.onload = Refresh;
            function Refresh() {
            //$('.classname').AutoHeight();
              for (var i = 0; i < selectors.length; i ++) {
              $(selectors[i]).AutoHeight();
              }
			}
          }
        }
      }
      catch (e) {
        // catch errors, if any.
        window.console && console.warn('jQuery Auto Height module stopped working with the exception:');
        window.console && console.error(e);
      }
    }
  };
}(jQuery));
