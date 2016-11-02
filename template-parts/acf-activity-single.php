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
	</header><!-- .entry-header -->

	<div class="entry-content lesson-activity">

<?php
// echo '<pre>';
// var_dump( $activity_downloads );
// echo '</pre>';
?>
		<span class="activity-details">
			<img src="." />
			Age: <?php the_terms( get_the_ID(), 'age-group' ); ?><br>
			Subject: <?php the_terms( get_the_ID(), 'subject' ); ?><br>
			<?php the_terms( get_the_ID(), 'needs' ); ?><br>
			Time Commitment: <?php echo $time_commit; ?>
		</span>

		<?php
		if ( $activity_materials ) {
			echo '<h3>Materials</h3>';
			echo '<ul>';
			foreach( $activity_materials as $activity_materials ) {
				echo '<li>' . $activity_materials['activity_mats'] . '</li>';
			}
			echo '</ul>';
		}

		if ( $activity_downloads ) {
			echo '<h3>Downloads</h3>';
			echo '<ul>';
			foreach( $activity_downloads as $activity_downloads ) {
				echo '<li>' . $activity_downloads['activity_dl'] . '</li>';
			}
			echo '</ul>';
		}

		the_content();

		if ( $activity_checklist ) {
			echo '<h3>Checklist</h3>';
			echo '<ul>';
			foreach( $activity_checklist as $activity_checklist ) {
				echo '<li>' . $activity_checklist['activity_listitems'] . '</li>';
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