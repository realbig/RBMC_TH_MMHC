/**
 Home page functionality.

 @since 1.0.0
 @package MMHC
 */
(function ($) {
    'use strict';

    $(function () {
        var $blurb = $('.home-welcome-blurb');

        $blurb.css({
            top: ($blurb.closest('.home-welcome').height() / 2) - ($blurb.height() / 2)
        });
    });

})(jQuery);