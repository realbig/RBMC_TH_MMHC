<?php
/**
 * The theme's primary sidebar.
 *
 * @since 1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<aside id="site-sidebar" class="columns small-12 medium-4">

	<ul class="widgets">
		<?php dynamic_sidebar( 'page' ); ?>
	</ul>

</aside>