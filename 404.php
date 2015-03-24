<?php
/**
 * The theme's 404 page for showing not found pages.
 *
 * @since 1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();

the_post();
?>

<!-- Page HTML -->

<?php
get_footer();