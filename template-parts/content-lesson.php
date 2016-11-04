<?php
/**
 * Template part for displaying lesson posts content.
 *
 * @package mindup
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

			/**
			 * Checks if this is a parent post or not
			 */
			if ( empty( $post->post_parent ) ) {

				echo '<p class="devnote">[devnote] this is the parent post</p>';

				/**
				 * Checks if parent lesson has child posts
				 *
				 * @return int count
				 */
				function mindup_lesson_has_children() {
					global $post;
					return count( get_posts( array( 'post_parent' => $post->ID, 'post_type' => $post->post_type ) ) );
				}

				/**
				 * Checks to make sure this parent has children before querying one
				 */
				if ( mindup_lesson_has_children() ) {

					// DEV TESTS
					echo '<pre>';
					var_dump( LearnMindUp_Queries::get_single_lesson_steps( get_the_ID() ) );
					echo '</pre>';

					/**
					 * Gets the first child step and queries that to display its content
					 *
					 * @todo need to check if it actually has steps/children. if not don't do this
					 */
					$first_lesson_step  = key( LearnMindUp_Queries::get_single_lesson_steps( get_the_ID() ) );

					$first_lesson_args  = array(
						'post_type'      => 'lesson',
						'p'              => $first_lesson_step,
						'posts_per_page' => 1,
						'no_found_rows'  => true,
					);

					$first_lesson_query = new WP_Query( $first_lesson_args );

					if ( $first_lesson_query->have_posts() ) {

						while ( $first_lesson_query->have_posts() ) {

							$first_lesson_query->the_post();

							the_title( '<h3>', '</h3>' );

							/*
							 * run the content_type hyperloop
							 */
							do_action( 'mindup_hyperloop_pagebuilder' );

						}

						wp_reset_postdata();

					} // endif $first_lesson_query

				} // endif mindup_lesson_has_children()


			} else { // post seems to be a child (step)

				echo '<p class="devnote"> this is a child post of ' . wp_get_post_parent_id( $post->ID );

				/*
				 * run the content_type hyperloop
				 */
				do_action( 'mindup_hyperloop_pagebuilder' );

			} // endif

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php mindup_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
