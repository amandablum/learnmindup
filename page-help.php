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
		if ( function_exists( 'the_zendesk_webwidget' ) )
			the_zendesk_webwidget();
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();