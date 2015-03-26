<?php
/**
 * The theme's footer file that appears on EVERY page.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<?php // #site-content ?>
</section>

<footer id="site-footer">

	<div class="footer-upper row small-only-text-center">
		<div class="columns small-12 medium-6">
			&copy; <?php echo date( 'Y' ); ?> Mid-Michigan Health Center
		</div>

		<div class="columns small-12 medium-6 medium-text-right">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => false,
			) );
			?>
		</div>
	</div>

	<div class="footer-lower">
		<div class="row">
			<div class="text-center columns small-12">
				Built by <a href="http://realbigmarketing.com" rel="nofollow">Real Big Marketing</a>

				<!-- Required for icon use -->
				<div>Icons made by <a href="http://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a>, <a
						href="http://www.flaticon.com/authors/yannick" title="Yannick">Yannick</a>, <a
						href="http://www.flaticon.com/authors/simpleicon" title="SimpleIcon">SimpleIcon</a> from <a
						href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a
						href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>
				</div>
			</div>
		</div>
	</div>

</footer>

<?php // #wrapper ?>
</div>

<?php wp_footer(); ?>

</body>
</html>