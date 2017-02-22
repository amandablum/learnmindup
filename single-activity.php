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
<blockquote><p>SUGGEST YOUR OWN ACTIVITY<br>
You’ve just seen activities from MindUP and many of our teachers. We’d love to hear about an activity you did, so we can share it with others.<br>
<a href="http://learn.mindup.org/submit-an-activity/" target="_blank">Submit Activity</a></p>
</blockquote>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
