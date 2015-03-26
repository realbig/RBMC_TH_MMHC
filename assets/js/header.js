/**
 Site header functionality.

 @since 1.0.0
 @package MMHC
 */
(function ($) {
    'use strict';

    $(function () {

        var $site_header = $('#site-header');

        // Toggle mobile nav
        $site_header.find('.site-nav-toggle').click(function () {
            $(this).closest('#site-nav').toggleClass('active');
        });

        // Search
        $site_header.find('.search-form input[type="text"]').on('focus', function () {

            if ($(this).val() == 'Search this site') {
                $(this).val('');
            }
        });

        $site_header.find('.search-form input[type="text"]').on('blur', function () {

            if (!$(this).val()) {
                $(this).val('Search this site');
            }
        });
    });

})(jQuery);