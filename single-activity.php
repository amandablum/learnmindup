<?php
/**
 * The template for displaying all single activity posts.
 *
 * @package mindup
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) : the_post();

		#get_template_part( 'template-parts/content', 'activity' );

		/*
		 * run the activities hyperloop
		 */
		do_action( 'mindup_hyperloop_activities' );

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
