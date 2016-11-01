<?php
/**
 * ACF Hyperloop Layout Builder for all flexible content types
 *
 * @package mindup
 * @author ChuckReynolds <chuck@vuurr.com>
 */

/**
 * to init: do_action( 'mindup_hyperloop_pagebuilder' );
 */
function acf_mindup_hyperloop_pagebuilder() {

	// if we have flexible content_type
	if ( have_rows( 'content_type' ) ) :

		// start the hyperloop through the flexible content_type layouts
		while ( have_rows( 'content_type' ) ) : the_row();

			/**
			 * Content Type : 1_column_hero
			 */
			if ( get_row_layout() == '1_column_hero' ) :

				// pull and sanitize vars
				$hero_videoorimage = get_sub_field( 'hero_videoorimage' );                    // Radio - image || video
				$hero_video        = get_sub_field( 'hero_video' );                           // oEmbed
				$hero_image        = get_sub_field( 'hero_image' );                           // Image
				$hero_headline     = sanitize_text_field( get_sub_field( 'hero_headline' ) ); // Text
				$hero_copy         = get_sub_field( 'hero_copy' );                            // Text
				$hero_cta_copy     = sanitize_text_field( get_sub_field( 'hero_cta_copy' ) ); // Text
				$hero_cta_link     = esc_url( get_sub_field( 'hero_cta_link' ) );             // Url

				// load the layout view
				require get_template_directory() . '/template-parts/acf-1columnhero.php';

			endif; // get_row_layout : 1_column_hero


			/**
			 * Content Type : 2_column_
			 */
			if ( get_row_layout() == '2_column_' ) :

				// pull and sanitize vars
				$two_col_video_or_imageleft = get_sub_field( '2col_video_or_imageleft' );                         // Radio - image || video
				$two_col_videoleft          = get_sub_field( '2col_videoleft' );                                  // oEmbed
				$two_col_imageleft          = get_sub_field( '2col_imageleft' );                                  // Image
				$two_col_headlineright      = sanitize_text_field( get_sub_field( '2col_headlineright' ) );       // Text
				$two_col_copyright          = apply_filters( 'the_content' , get_sub_field( '2col_copyright' ) ); // Text Area
				$two_col_ctacopyright       = sanitize_text_field( get_sub_field( '2col_ctacopyright' ) );        // Text
				$two_col_ctalinkright       = esc_url( get_sub_field( '2col_ctalinkright' ) );                    // Url

				// load the layout view
				require get_template_directory() . '/template-parts/acf-2column-leftmedia-rightcopy.php';

			endif; // get_row_layout : 2_column_


			/**
			 * Content Type : 2_column_copy_left_imagevideo_right
			 */
			if ( get_row_layout() == '2_column_copy_left_imagevideo_right' ) :

				// pull and sanitize vars
				$two_col_headlineleft        = sanitize_text_field( get_sub_field( '2col_headlineleft' ) );       // Text
				$two_col_copyleft            = apply_filters( 'the_content' , get_sub_field( '2col_copyleft' ) ); // Text Area
				$two_col_ctacopyleft         = sanitize_text_field( get_sub_field( '2col_ctacopyleft' ) );        // Text
				$two_col_ctalinkleft         = esc_url( get_sub_field( '2col_ctalinkleft' ) );                    // Url
				$two_col_video_or_imageright = get_sub_field( '2col_video_or_imageright' );                       // Radio - image || video
				$two_col_videoright          = get_sub_field( '2col_videoright' );                                // oEmbed
				$two_col_imageright          = get_sub_field( '2col_imageright' );                                // Image

				// load the layout view
				require get_template_directory() . '/template-parts/acf-2column-leftcopy-rightmedia.php';

			endif; // get_row_layout : 2_column_copy_left_imagevideo_right


			/**
			 * Content Type : 3_column
			 */
			if ( get_row_layout() == '3_column' ) :

				// pull and sanitize vars
				// moved into layout view in order to handle vars in loops

				// load the layout view
				require get_template_directory() . '/template-parts/acf-3column.php';

			endif; // get_row_layout : 3_column


			/**
			 * Content Type : centered_copy
			 */
			if ( get_row_layout() == 'centered_copy' ) :

				// pull and sanitize vars
				$centered_headline = sanitize_text_field( get_sub_field( 'centered_headline' ) );       // Text
				$centered_copy     = get_sub_field( 'centered_copy' );
				$centered_cta_copy = sanitize_text_field( get_sub_field( 'centered_cta_copy' ) );       // Text
				$centered_cta_link = esc_url( get_sub_field( 'centered_cta_link' ) );                   // Url

				// load the layout view
				require get_template_directory() . '/template-parts/acf-centeredcopy.php';

			endif; // get_row_layout : centered_copy


			/**
			 * Content Type : call_out
			 */
			if ( get_row_layout() == 'call_out' ) :

				// pull and sanitize vars
				$callout_headline = sanitize_text_field( get_sub_field( 'callout_headline' ) ); // Text
				$call_out_copy    = sanitize_text_field( get_sub_field( 'call_out_copy' ) );    // Text

				// load the layout view
				require get_template_directory() . '/template-parts/acf-callout.php';

			endif; // get_row_layout : call_out


			/**
			 * Content Type : constellation
			 */
			if ( get_row_layout() == 'constellation' ) :

				// pull and sanitize vars
				// moved into layout view in order to handle vars in loops

				// load the layout view
				require get_template_directory() . '/template-parts/acf-constellation.php';

			endif; // get_row_layout : constellation


		endwhile; // end while have_rows content_type

	else :
		echo '<p>Sorry, we can\'t find any content</p>';

	endif; // end if have_rows content_type

}
add_action( 'mindup_hyperloop_pagebuilder', 'acf_mindup_hyperloop_pagebuilder' );


/**
 * to init: do_action( 'mindup_hyperloop_activities' );
 */
function acf_mindup_hyperloop_activities() {

	// if we have flexible content_type
	if ( have_rows( 'content_type' ) ) :

		// start the hyperloop through the flexible content_type layouts
		while ( have_rows( 'content_type' ) ) : the_row();


			///////////////////////


		endwhile; // end while have_rows content_type

	else :
		echo '<p>Sorry, we can\'t find any content</p>';

	endif; // end if have_rows content_type

}
add_action( 'mindup_hyperloop_activities', 'acf_mindup_hyperloop_activities' );
