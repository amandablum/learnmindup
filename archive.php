<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mindup
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		/*
		 * mobile only search
		 */
		get_template_part( 'template-parts/mobile', 'search' );

		if ( have_posts() ) :                              // if archive has posts

			$posts_count = 0;                              // set posts at zed

			while ( have_posts() ) : the_post();           // start the loop

				++$posts_count;                            // increase post count +1

				if ( $posts_count == 1 && ! is_paged() ) : // if first post on first page: do custom
				?>

					<article id="post-<?php the_ID(); ?>" class="hero-post">
						<a href="<?php echo the_permalink(); ?>">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'full' );
						}
						?>
						</a>
						<?php
						the_title( '<h2 class="hero-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
						<div class="entry-meta">
							<?php mindup_posted_on(); ?>
						</div><!-- .entry-meta -->

						<div class="entry-content">
							<?php the_excerpt(); ?>
						</div><!-- .entry-content -->

						<footer class="entry-footer">
							<?php mindup_entry_footer(); ?>
						</footer><!-- .entry-footer -->
					</article><!-- /hero post -->

				<?php
				else : // if not first post on first page - do what you normally do

					get_template_part( 'template-parts/content', 'post' );

				endif;

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		<div id="pagination">
		<?php
		if ( function_exists( mindup_pagination_archives() ) )
				mindup_pagination_archives();
		?>
		</div><!-- end pagination -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
