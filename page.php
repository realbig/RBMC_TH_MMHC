<?php
/**
 * The theme's page file use for displaying pages.
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

<div class="row">

	<article id="page-<?php get_the_ID(); ?>" <?php post_class( array( 'columns', 'small-12', 'medium-8' ) ); ?>>

		<h1 class="page-title">
			<?php the_title(); ?>
		</h1>

		<div class="page-content">
			<?php the_content(); ?>
		</div>

	</article>

	<?php get_sidebar(); ?>

</div>

<?php
get_footer();