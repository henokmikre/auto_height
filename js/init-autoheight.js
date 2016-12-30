(function ($, Drupal, drupalSettings) {

  try
  {
    //$('.classname').AutoHeight();
    $(drupalSettings.auto_height.selectors).AutoHeight();
  }
  catch (e) {
    // catch errors, if any.
    window.console && console.warn('jQuery Auto Height module stopped working with the exception:');
    window.console && console.error(e);
  }

})(jQuery, Drupal, drupalSettings);
