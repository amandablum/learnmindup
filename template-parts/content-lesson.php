<?php
/**
 * Template part for displaying lesson posts content.
 *
 * @package mindup
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		/**
		 * Check if parent or child.
		 * If it's a parent, and it has no children, meaning it wasn't redirected
		 * via lmnd_parent_lesson_redirect(), then we need a fallback message for admins.
		 *
		 * If child (step) then display parent title and step title under it.
		 */
		if ( empty( $post->post_parent ) ) {

			the_title( '<h1 class="entry-title">', '</h1>' );

		} else {

			// Get the parent post title
			$lmnd_parent_title     = get_the_title( $post->post_parent );
			// Get the parent post permalink
			$lmnd_parent_permalink = get_permalink( $post->post_parent );
			// Display parent title and link
			echo '<a href="' . $lmnd_parent_permalink . '"><h1 class="entry-title">' . $lmnd_parent_title . '</h1></a>' . PHP_EOL;
			// Display child (step) title
			the_title( '<h3 class="lesson-step">', '</h3>' );

		}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

		// If this is a parent lesson, don't do anything further, bail.
		if ( empty( $post->post_parent ) ) return;

		/**
		 * At this point we know we're on a child lesson (step) post
		 */

		// set var for parent id because we need it a lot
		$our_parent_id        = wp_get_post_parent_id( $post->ID );

		// Get the current step int.
		$our_current_step     = LearnMindUp_Helper::get_normal_step_count( $post->ID );

		// Build Switch to decide what stuff to show on which steps
		switch ( absint( $our_current_step ) ) {
			case 3:

				// Get our course copy.
				if ( false !== $copy = LearnMindUp_Helper::get_course_step_copy( $our_parent_id, 3 ) ) {
					echo wpautop( $copy );
				}

				// look at all this beautiful code
				/*
				echo '<p class="copyblock-step-2">The best way to really learn the MindUP lessons is to practice them. These activities are for your <b>classroom</b>- they will help your students really understand the lesson. Choose atleast 2 activities, but you can choose as many as you like. Click on any of them to open them in a new tab and learn more about them, and hit "Save" on the ones you like to keep them in <a href="http://learn.mindup.org/my-account/members-area/118/my-membership-content/" target="_blank">Your Library</a>. You can even develop your own, and submit them back to us at the end of the lesson so other educators can use them.  </p>' . PHP_EOL;
				*/

				echo '<div id="actarch"><!-- begin activity archive -->' . PHP_EOL;
				echo '<div class="row">' . PHP_EOL;

				$activity_args = array(
					'post_type'      => 'activity',
					'posts_per_page' => 100,
					'no_found_rows'  => true,
					'meta_query'     => array(
						array(
							'key'     => '_activity_type',
							'value'   => 'classroom',
						),
						array(
							'key'     => '_mapped_lesson',
							'value'   => $our_parent_id,
							'type'    => 'numeric',
						),
					),
				);

				require_once( get_template_directory() . '/template-parts/content-activity-entry.php' );

				echo '</div><!-- end row -->' . PHP_EOL;
				echo '</div><!-- end activity archive -->' . PHP_EOL;

				break;
			case 4:

				// Get our course copy.
				if ( false !== $copy = LearnMindUp_Helper::get_course_step_copy( $our_parent_id, 4 ) ) {
					echo wpautop( $copy );
				}

				/*
				// look at all this beautiful code
				echo '<p class="copyblock-step-2">Now we expand beyond your classroom to <b>interdiscipline</b> activities that involve other subject matter, like art, science, math and physical education. Choose atleast 2 activities, but you can choose as many as you like. Click on any of them to open them in a new tab and learn more about them, and hit "Save" on the ones you like to keep them in <a href="http://learn.mindup.org/my-account/members-area/118/my-membership-content/ target="_blank">Your Library</a>. You can even develop your own, and submit them back to us at the end of the lesson so other educators can use them. </p>' . PHP_EOL;
				*/

				echo '<div id="actarch"><!-- begin activity archive -->' . PHP_EOL;
				echo '<div class="row">' . PHP_EOL;

				$activity_args = array(
					'post_type'      => 'activity',
					'posts_per_page' => 100,
					'no_found_rows'  => true,
					'meta_query'     => array(
						array(
							'key'     => '_activity_type',
							'value'   => 'interdiscipline',
						),
						array(
							'key'     => '_mapped_lesson',
							'value'   => $our_parent_id,
							'type'    => 'numeric',
						),
					),
				);

				require_once( get_template_directory() . '/template-parts/content-activity-entry.php' );

				echo '</div><!-- end row -->' . PHP_EOL;
				echo '</div><!-- end activity archive -->' . PHP_EOL;

				break;
			case 5:

				// Get our course copy.
				if ( false !== $copy = LearnMindUp_Helper::get_course_step_copy( $our_parent_id, 5 ) ) {
					echo wpautop( $copy );
				}

				/*
				// look at all this beautiful code
				echo '<p class="copyblock-step-2">Finally, we let your students bring what they have learned into the rest of their day, with <b>life</b> activities. Completing these activities means your students have had a real opportunity to comprehend and practice the lesson and are ready to move onto the next lesson. Choose atleast 2 activities, but you can choose as many as you like. Click on any of them to open them in a new tab and learn more about them, and hit "Save" on the ones you like to keep them in <a href="http://learn.mindup.org/my-account/members-area/118/my-membership-content/ target="_blank">Your Library</a>. You can even develop your own, in the next step, submit them back to us so other educators can use them.</p>' . PHP_EOL;
				*/

				echo '<div id="actarch"><!-- begin activity archive -->' . PHP_EOL;
				echo '<div class="row">' . PHP_EOL;

				$activity_args = array(
					'post_type'      => 'activity',
					'posts_per_page' => 100,
					'no_found_rows'  => true,
					'meta_query'     => array(
						array(
							'key'     => '_activity_type',
							'value'   => 'life',
						),
						array(
							'key'     => '_mapped_lesson',
							'value'   => $our_parent_id,
							'type'    => 'numeric',
						),
					),
				);

				require_once( get_template_directory() . '/template-parts/content-activity-entry.php' );

				echo '</div><!-- end row -->' . PHP_EOL;
				echo '</div><!-- end activity archive -->' . PHP_EOL;

				break;
			case 1:
			case 2:
			case 6:
				/*
				 * run the content_type hyperloop
				 */
				do_action( 'mindup_hyperloop_pagebuilder' );

				break;
			default:
		}


		/**
		 * Gets all the markup for next / prev step buttons.
		 */
		lmnd_get_step_links( $post->ID, $our_parent_id );


		/**
		 * Get current user progression
		 * @var int progress percentage
		 */
		lmnd_get_lesson_progress_bar( $post->ID, $our_parent_id, $our_current_step );


		?>
	</div><!-- .entry-content -->
	<?php /*
	<footer class="entry-footer">
		<?php #mindup_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	*/ ?>
</article><!-- #post-## -->
