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
$activity_query = new WP_Query( $activity_args );

if ( $activity_query->have_posts() ) {
	while ( $activity_query->have_posts() ) {
		$activity_query->the_post();

		$terms_age_group = get_terms( 'age-group' );
		$terms_subject   = get_terms( 'subject' );
		$terms_needs     = get_terms( 'needs' );
		?>
		<div class="row-item">
			<a href="<?php echo get_permalink(); ?>">

				<?php the_title( '<h4>', '</h4>' ); ?>

				<div class="entry-preview">
					<p><?php the_excerpt(); ?></p>
				</div><!-- end entry-preview -->

				<span class="activity-details">
					<img src="http://lorempixel.com/100/100/" width="100" height="100" class="alignleft" />
					<div class="activity-meta">
						<?php
						// Tax: age-group
						if ( $terms_age_group && ! is_wp_error( $terms_age_group ) ) {
							foreach ( $terms_age_group as $term ) {
								#$term_link = get_term_link( $term );
								echo 'Age: ' . $term->name;
							}

						}
						// Tax: subject
						if ( $terms_subject && ! is_wp_error( $terms_subject ) ) {
							echo "\n";
							foreach ( $terms_subject as $term ) {
								echo 'Subject: ' . $term->name;
							}

						}
						// Tax: needs
						if ( $terms_needs && ! is_wp_error( $terms_needs ) ) {
							echo "\n";
							foreach ( $terms_needs as $term ) {
								echo $term->name;
							}

						}
						?>
					</div><!-- end activity-meta -->
				</span><!-- end activity-details -->

				<span class="right-arrow">&#x2192;</span>
			</a><!-- end full box link -->
		</div><!-- end row-item -->
		<?php

	}

	wp_reset_postdata();

} // endif $activity_query