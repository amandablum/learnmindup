<?php
/**
 * 'Default' ACF Pagebuilder Template
 *
 * Template Name: flintpassword
 *
 * @package mindup
 * @author ChuckReynolds <chuck@vuurr.com>
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		/*
		 * run the content_type hyperloop
		 */
				while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		wc_get_template( 'myaccount/flint-form-lost-password.php', array( 'form' => 'lost_password' ) ); ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
