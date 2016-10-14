<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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


		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			query_posts( 'cat=-1' ); // exclude News category

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'post' );

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
get_sidebar();
get_footer();
