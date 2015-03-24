<?php
/**
 * The theme's single file use for displaying single posts.
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

<!-- Single HTML -->

<?php
get_footer();