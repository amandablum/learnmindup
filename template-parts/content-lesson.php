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
			echo '<p class="devnote">[devnote] This parent lesson post has no steps yet to redirect to.</p>';

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
		$our_current_step_raw = get_post_field( 'menu_order', $post->ID, 'raw' );
		$our_current_step     = $our_current_step_raw + 1; // normalize this so less confusing to humans

		// devnote
		echo '<p class="devnote">[devnote] This is Step ' . absint( $our_current_step ) . ' of parent lesson ' . $our_parent_id;


		// Build Switch to decide what stuff to show on which steps
		switch ( absint( $our_current_step ) ) {
			case 2:
				echo '<h2>Select Your Students Average Age </h2>' . PHP_EOL;
				echo '<p class="copyblock-step-2">Don’t be overly concerned about being exact. We use this information to give you more specific language appropriate to this age range and age appropriate activities. You will always have the opportunity to see information for younger and older children, because we know age is just a number and your children are unique. Some may be an older 9 years, or a younger 17. We’ll also have the opportunity to choose activities for a wide range of special needs. </p>' . PHP_EOL;
				echo lmnd_step_two_dropdown( $post->ID, false );
				echo '<div class="step-two-content-holder"></div>';
				break;
			case 3:

				// this gets ugly real quick
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

				// this gets ugly real quick
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

				// this gets ugly real quick
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
		 * Gets current user info
		 * @var int user id
		 */
		$current_user       = wp_get_current_user();
		$current_user_id    = $current_user->ID;

		/**
		 * Get current user progression
		 * @var int progress percentage
		 */
		$current_user_steps = LearnMindUp_Queries::get_lesson_steps_for_user( $current_user_id, $post->post_parent );
		#var_dump( $current_user_steps );
		$current_user_steps_progress = $current_user_steps['progress'];
		echo '<progress class="progress" max="100" value="' . $current_user_steps_progress . '"></progress>';



		?>
	</div><!-- .entry-content -->
	<?php /*
	<footer class="entry-footer">
		<?php #mindup_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	*/ ?>
</article><!-- #post-## -->
