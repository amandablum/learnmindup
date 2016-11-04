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
			echo '<a href="' . $lmnd_parent_permalink . '"><h1 class="entry-title">' . $lmnd_parent_title . '</h1></a>';
			// Display child (step) title
			the_title( '<h2 class="entry-title entry-title-step">', '</h2>' );

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
		$our_parent_id    = wp_get_post_parent_id( $post->ID );

		// Get the current step int.
		$our_current_step = get_post_field( 'menu_order', $post->ID, 'raw' );

		// devnote
		echo '<p class="devnote">[devnote] This is Step ' . absint( $our_current_step ) . ' of parent lesson ' . $our_parent_id;


		// Build Switch to decide what stuff to show on which steps
		switch ( absint( $our_current_step ) ) {
			case 1:
				echo '<p>[devnote][switch] Step 2: copyblock, and ages dropdown select.</p>';
				echo '<p class="copyblock-step-2">This is the hardcopy for step 2. Lorem ipsum dolor sit amet, id autem consequat nec, ea esse quando vim. Tale meis essent eum ea, usu ut possim audire aliquid. Dolor incorrupte ei mel, appetere electram constituam has ad.</p>';
				break;
			case 2:
				echo '<p>[devnote][switch] Step 3: load activities `classroom` archive.</p>';
				break;
			case 3:
				echo '<p>[devnote][switch] Step 4: load activities `interdiscipline` archive.</p>';
				break;
			case 4:
				echo '<p>[devnote][switch] Step 5: load activities `life` archive.</p>';
				break;
			case 0:
			case 5:
				echo '<p>[devnote][switch] Step 1, 6: content_type hyperloop pagebuilder</p>';

				/*
				 * run the content_type hyperloop
				 */
				do_action( 'mindup_hyperloop_pagebuilder' );

				break;
			default:
				echo '<p>[devnote][switch] fail - nothing here.</p>';
		}



		/**
		 * Gets next / prev steps ids and links and makes all that magic happen
		 */
		$lmnd_get_prev_step_id = lmnd_get_prev_step( $post->ID, $our_parent_id );
		$lmnd_get_next_step_id = lmnd_get_next_step( $post->ID, $our_parent_id );

		if ( $lmnd_get_prev_step_id !== false ) {

			$prev_lesson_step_permalink = get_permalink( $lmnd_get_prev_step_id );
			echo '<div class="step-link-prev"><a href="' . $prev_lesson_step_permalink . '" class="btn">Previous</a></div>';

		}

		if ( $lmnd_get_next_step_id !== false ) {

			$next_lesson_step_permalink = get_permalink( $lmnd_get_next_step_id );
			echo '<div class="step-link-next"><a href="' . $next_lesson_step_permalink . '" class="btn">Next</a></div>';

		}


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
