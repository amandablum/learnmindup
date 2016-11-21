<?php
/**
 * Lesson Activity LAYOUT
 *
 * @package mindup
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<h3><?php the_field('activity_sum'); ?></h3>
		</header><!-- .entry-header -->

	<div class="entry-content lesson-activity">

		<div class="activity-details">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( array( 100, 100 ), array( 'class' => 'alignleft' ) );
			}
				lmnd_term_list( get_the_ID(), 'age-group', 'Age' );
				lmnd_term_list( get_the_ID(), 'subject', 'Subject' );
				lmnd_term_list( get_the_ID(), 'needs', 'Needs' );
			?>
			<p><span class="activity-term-list-label">Time Commitment:</span> <?php echo $time_commit; ?></p>
		</div>

		<?php
		// if ( $activity_materials ) {
		if ( false !== $check = LearnMindUp_Helper::if_serialized_has_data( $activity_materials ) ) {
			echo '<h3>Materials</h3>';
			echo '<ul>';
			foreach( $activity_materials as $materials ) {
				echo ! empty( $materials['activity_mats'] ) ? '<li>' . $materials['activity_mats'] . '</li>' : '';
			}
			echo '</ul>';
		}

		// if ( $activity_downloads ) {
		if ( false !== $check = LearnMindUp_Helper::if_serialized_has_data( $activity_downloads ) ) {
			echo '<h3>Downloads</h3>';
			echo '<ul class="activity-downloads">';
			foreach( $activity_downloads as $downloads ) {

				if ( ! empty( $downloads['activity_dl'] ) ) {

					echo '<li><a href="' . $downloads['activity_dl'] . '" target="_blank" rel="noopener">';
					echo ! empty( $downloads['activity_dl_name'] ) ? $downloads['activity_dl_name'] : 'Activity Download';
					echo '</a></li>';

				}

			}
			echo '</ul>';
		}

		the_content();

		// if ( $activity_checklist ) {
		if ( false !== $check = LearnMindUp_Helper::if_serialized_has_data( $activity_checklist ) ) {
			echo '<h3>Checklist</h3>';
			echo '<ul>';
			foreach( $activity_checklist as $checklist ) {
				echo ! empty( $checklist['activity_listitems'] ) ? '<li>' . $checklist['activity_listitems'] . '</li>' : '';
			}
			echo '</ul>';
		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mindup' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
