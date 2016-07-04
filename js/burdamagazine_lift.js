var lift_init = Drupal.acquia_lift.initialize.bind({});

(function ($, Drupal, settings) {
  'use strict';

  Drupal.acquia_lift.initialize = function () {

    var ref = document.referrer;

    if (!settings.enable_search_engine_filter || !ref.match(/^https?:\/\/(www\.)?google\.(([a-z]{2,3})|(com?\.[a-z]{2,3}))(\/|$)/i)) {

      lift_init();
    }
  };


})(jQuery, Drupal, drupalSettings.burdamagazine_lift);
