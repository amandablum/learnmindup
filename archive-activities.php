<?php
/**
 * Activity Archive 
 * 
 * Template Name: Activity Archive
 *
 * @package mindup
 * @css AHawkins
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-content">
			
		
			<h3 class="lesson-step">Step 4: Integrate the Lesson</h3>
			
			<div id="actarch"><!-- begin activity archive -->
				<div id="archfilt"><!-- begin activity filters -->
					
				</div><!-- end activity filters -->
			
				<div class="row">
					<?php
					while ( have_posts() ) : the_post();
					
					get_template_part( 'template-parts/content', 'activity-entry' );
					
					endwhile; // End of the loop.
					?>
				</div><!-- end row -->
			</div><!-- end activity archive -->
			</div><!-- end entry-content -->
			
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


	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
