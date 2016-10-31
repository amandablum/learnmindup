<?php
/**
 * Activity Archive 
 * 
 * @package mindup
 * @css AHawkins
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
<h3> Step 4:Integrate the Lesson </h3>

<div id="actarch"><!-- begin activity archive -->
	<div id="archfilt"><!-- begin activity filters -->
	</div><!-- end activity filters -->
			<div class="row">
   				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				?>

				<?php get_template_part( 'template-parts', 'content-activity' ); ?>

				<?php endwhile; ?>

			</div>
</div>
</div>	
</div><!-- end activity archive -->
</div><!-- end activity archive -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
