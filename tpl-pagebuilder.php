<?php
/**
 * 'Default' ACF Pagebuilder Template
 *
 * Template Name: ACF Pagebuilder
 *
 * @package mindup
 * @author ChuckReynolds <chuck@vuurr.com>
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		/*
		 * run the content types hyperloop
		 */
		do_action( 'mindup_hyperloop' ); ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
