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
?>

	<div class="row">

		<article id="page-404" class="columns small-12 medium-8">

			<h1 class="page-title">
				404 - Not Found
			</h1>

			<div class="page-content">
				<p>
					Shoot, it seems like there is nothing here. Sorry about that.
				</p>

				<p>
					Maybe you meant one of these pages?

					<?php
					wp_nav_menu( array(
						'theme_location' => 'error_404',
						'container' => false,
					));
					?>
				</p>

				<p>
					You could also try a <a href="#" onclick="mmhc_focus_search('header-search-input');" class="button">search</a>.
				</p>

				<p>
					If you are <em>still</em> really confused, you can always give us a call at <?php echo _mmhc_sc_phone(); ?> during our open hours.
				</p>
			</div>

		</article>

		<?php get_sidebar(); ?>

	</div>

<?php
get_footer();