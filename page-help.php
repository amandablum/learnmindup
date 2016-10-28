<?php
/**
 * Full width page for Zendesk help/support
 *
 * @package mindup
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.

		if ( function_exists( 'the_zendesk_webwidget' ) )
			the_zendesk_webwidget();
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();