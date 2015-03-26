/**
 Main functions file.

 @since 1.0.0
 @package MMHC
 */
(function ($) {
    'use strict';

    $(document).foundation();

    // Account for no transforms
    if (!Modernizr.csstransforms) {

        // Vertically centered items
        $('.vertical-center').children().each(function () {
            $(this).css({
                marginTop: $(this).height() / 2 * -1
            });
        });
    }

    // Parallax images
    $('.img-holder').imageScroll();

})(jQuery);