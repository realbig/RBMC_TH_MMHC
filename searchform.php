<?php
/**
 * The theme's search form.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<form role="search" method="get" class="search-form" action="<?php bloginfo( 'url' ); ?>">
	<label class="search-field-label row collapse">
		<span class="screen-reader-text">Search for:</span>

		<div class="columns small-9 medium-10">
			<input type="search" class="search-field" placeholder="Search this site" value="" name="s"
			       title="Search for:">
		</div>

		<div class="columns small-3 medium-2">
			<span class="postfix mmhcicon-magnifier13"></span>
		</div>
	</label>
</form>