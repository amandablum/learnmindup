<?php
/**
 * Activity Display on Archive
 *
 * @package mindup
 */

if ( empty( $activity_args ) ) {
	$activity_args = array( 'post_type' => 'activity', 'nopaging' => true );
}

$activity_query = new WP_Query( $activity_args );

if ( $activity_query->have_posts() ) {

	while ( $activity_query->have_posts() ) {
		$activity_query->the_post();

		$terms_age_group = get_terms( 'age-group' );
		$terms_subject   = get_terms( 'subject' );
		$terms_needs     = get_terms( 'needs' );
		?>
		<div class="row-item <?php echo 'author-' . get_the_author_meta( 'login' ); ?>">
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

} // endif $activity_query