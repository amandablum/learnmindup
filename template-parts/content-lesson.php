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
		$our_parent_id = wp_get_post_parent_id( $post->ID );

		// devnote
		echo '<p class="devnote"> this is a child post of ' . $our_parent_id;





		/*
		 * run the content_type hyperloop
		 */
		#do_action( 'mindup_hyperloop_pagebuilder' );









		/**
		 * Gets next / prev steps ids and links and makes all that magic happen
		 */
		$lmnd_get_prev_step_id = lmnd_get_prev_step( $post->ID, $our_parent_id );
		$lmnd_get_next_step_id = lmnd_get_next_step( $post->ID, $our_parent_id );

		if ( $lmnd_get_prev_step_id !== false ) {

			$prev_lesson_step_permalink = get_permalink( $lmnd_get_prev_step_id );
			echo '<div class="step-link-prev"><a href="' . $prev_lesson_step_permalink . '">Previous</a></div>';

		}

		if ( $lmnd_get_next_step_id !== false ) {

			$next_lesson_step_permalink = get_permalink( $lmnd_get_next_step_id );
			echo '<div class="step-link-next"><a href="' . $next_lesson_step_permalink . '">Next</a></div>';

		}










		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php mindup_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
