<?php
/**
 * Activity Display on Archive
 *
 * @package mindup
 */

/*
 * Still static. dumped into template-parts/content-lesson.php switchcase for now
 *
 * row-item has default white bg add darkbg to change to blue bg
 * <div class="row-item darkbg">
 *
<div class="row-item">
	<a href="<?php echo get_permalink(); ?>">

	<!-- Title length limited at 3 lines, full screen -->
		<h4>Stomp the brain with language or a really long title even yikes!</h4>

	<!-- Excerpt length needs to be limited at 3 lines, full screen -->
		<div class="entry-preview">
			<p>Use English flashcards to describe how you're feeling. Use English flashcards to describe how you're.</p>
		</div><!-- end entry-preview -->

		<span class="activity-details">
			<img src="http://localhost:8888/mindup/wp-content/uploads/2016/10/28-square.jpg" width="100" height="100" class="alignleft" />
			<div class="activity-meta">
				Age: 3,4,5,6 <br />
				Subject: English <br />
				ADHD, Hearing Impairment
			</div><!-- end activity-meta -->
		</span><!-- end activity-details -->

		<span class="right-arrow">&#x2192;</span>
	</a><!-- end full box link -->
</div><!-- end row-item -->

*/

if ( empty( $activity_args ) ) {
	$activity_args = array( 'post_type' => 'activity', 'nopaging' => true );
}

$activity_args  = LearnMindUp_Queries::get_activity_list();

$activity_query = new WP_Query( $activity_args );

if ( $activity_query->have_posts() ) {

	while ( $activity_query->have_posts() ) {
		$activity_query->the_post();

		$terms_age_group = get_terms( 'age-group' );
		$terms_subject   = get_terms( 'subject' );
		$terms_needs     = get_terms( 'needs' );
		?>
		<div class="row-item">
			<a href="<?php echo get_permalink(); ?>" target="_blank">

				<?php the_title( '<h4>', '</h4>' ); ?>
				</a><!-- end full box link -->

				<div class="entry-preview">
					<p><?php the_field('activity_sum'); ?></p>
				</div><!-- end entry-preview -->

				<span class="activity-details">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( array( 100, 100 ), array( 'class' => 'alignleft' ) );
					}
					?>
					<div class="activity-meta">
						<?php
							lmnd_age_range_list( get_the_ID() );
							lmnd_term_list( get_the_ID(), 'subject', 'Subject' );
							lmnd_term_list( get_the_ID(), 'needs', 'Special Needs' );
						?>
					</div><!-- end activity-meta -->
				</span><!-- end activity-details -->
				<a href="<?php echo get_permalink(); ?>" target="_blank">
				<span class="right-arrow">&#x2192;</span>
				</a>

		</div><!-- end row-item -->
		<?php

	}

	wp_reset_postdata();

} else {

	// Some basic content to handle "none found".

	echo '<p>There were no activities matching your criteria. Please try again.</p>';

} // endif $activity_query