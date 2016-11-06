<?php
/**
 * The template for displaying CPT:Activity archive pages.
 *
 * @package mindup
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-content">

			<!--
			<h3 class="lesson-step">Step 4: Integrate the Lesson</h3>
			-->

			<div id="actarch"><!-- begin activity archive -->
				<!--
				<div id="archfilt">
					<form method="post" action="<?php echo esc_url( home_url( '/activities/' ) ); ?>">

						<?php // lmnd_get_activity_arg_dropdown( 'age-group', 'Age', 'Select ages' ); ?>
						<?php // lmnd_get_activity_arg_dropdown( 'subject', 'Subject', 'Select subject' ); ?>
						<?php // lmnd_get_activity_arg_dropdown( 'needs', 'Special<br /> Needs', 'Select a need' ); ?>

						<div class="activity-select-filter">
							<label>Age:</label>
							<select>
								<option>Select ages</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>

						<div class="activity-select-filter">
							<label>Author:</label>
							<select name="author">
								<option>Select author</option>
								<option>me</option>
								<option>you</option>
							</select>
						</div>

						<div class="activity-select-filter">
							<label>Subject:</label>
							<select>
								<option>Select subject</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>

						<div class="activity-select-filter">
							<label>Special<br /> Needs:</label>
							<select>
								<option>Select a need</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>

						<input type="submit" class="button" name="apply_filter" value="Apply Filter"/>
					</form>
				</div>
				-->

				<div class="row">
					<?php
				//	while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'activity-entry' );

				//	endwhile; // End of the loop.
					?>
				</div><!-- end row -->

				<div class="arch-pagination">
					<span class='page-numbers current'>1</span>
					<a class='page-numbers' href='#'>2</a>
					<a class='page-numbers' href='#'>3</a>
					<a class='page-numbers' href='#'>4</a>
					<a class='page-numbers' href='#'>5</a>
					<a class='page-numbers' href='#'>6</a>
					<a class='page-numbers' href='#'>7</a>
					<a class='page-numbers' href='#'>8</a>
					<a class="next page-numbers" href="#">&raquo;</a>
				</div><!-- end pagination -->

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
