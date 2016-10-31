<?php
/**
 * Lesson Activity LAYOUT
 * 
 * @package mindup
 * @css AHawkins
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content lesson-activity">
		
<!-- this html block displays the small thumbnail to the left of lesson details (top of page 20 in mock-up)
	<span class="activity-details">
		<img src="." /> 
		Age: 3,4,5,6 <br />
		Subject: English <br />
		ADHD, Hearing Impairment
	</span>
-->

		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mindup' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'mindup' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
