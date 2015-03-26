<?php
/**
 * The theme's index file used for displaying an archive of blog posts.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();
?>

	<div class="search-results row">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>

				<article <?php post_class( array( 'columns', 'small-12' ) ); ?>>

					<h1 class="post-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h1>

					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div>

				</article>

			<?php
			endwhile;
		else: ?>
			<p>
				No search results found.
			</p>
		<?php endif; ?>

	</div>

<?php
get_footer();