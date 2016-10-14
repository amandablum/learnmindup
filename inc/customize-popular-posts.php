<?php
/**
 * Filter function for WordPress-Popular-Posts plugin
 *
 * @package mindup
 * @author ChuckReynolds <chuck@vuurr.com>
 */

/*
 * Gets the excerpt using the post ID outside the loop.
 *
 * @author  Withers David
 * @link    http://uplifted.net/programming/wordpress-get-the-excerpt-automatically-using-the-post-id-outside-of-the-loop/
 * @param   int $post_id
 * @return  string
 *
function get_excerpt_by_id($post_id){
	$the_post = get_post($post_id); //Gets post ID
	$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
	$excerpt_length = 35; //Sets excerpt length by word count
	$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
	$words = explode(' ', $the_excerpt, $excerpt_length + 1);

	if (count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '...');
		$the_excerpt = implode(' ', $words);
	endif;

	$the_excerpt = '<p>' . $the_excerpt . '</p>';
	return $the_excerpt;
}

/**
 * Alter WPP's HTML output to fit our theme.
 * This way, the modification is permanent even if the plugin gets updated.
 *
 * @param   array   $mostpopular
 * @param   array   $instance
 * @return  string
 *
 * @see https://github.com/cabrerahector/wordpress-popular-posts/wiki/3.-Filters
 */
function mindup_customize_popular_posts_list( $mostpopular, $instance ) {

	// set blank output to fill
	$output = '';

	/*
	 * Even though this is for popular posts we want to display the most recent
	 * sticky post on top if one exists. So we have a single query here at the top.
	 */
	$sticky = get_option( 'sticky_posts' );
	$stickyargs = array(
		'posts_per_page'      => 1,
		'post__in'            => $sticky,
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => true
	);
	$query = new WP_Query( $stickyargs );

	if ( isset( $sticky[0] ) ) {

		// Inject here your stick post(s).
		if ( $query->have_posts() ) {

			// This is your old, trusty WordPress loop!
			while ( $query->have_posts() ) {

				$query->the_post();

				// get featured image for later
				$thumbnail_image  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );

				// get title and shorten it up
				$post_title       = get_the_title( get_the_ID() ) ;
				$post_title_short = wp_trim_words( $post_title, 10, '&hellip;' );

				$output .= "<div class=\"postList\">" . "\n";
				if ( $thumbnail_image ) :
				$output .= "<a href=\"" . get_the_permalink( get_the_ID() ) . "\"><img src=\"" . $thumbnail_image[0] . "\"></a>" . "\n";
				endif;

				$output .= "<h4 data-wppcount=\"sticky\"><a href=\"" . get_the_permalink( get_the_ID() ) . "\" title=\"" . $post_title_short . "\">" . $post_title_short . "</a></h4>" . "\n";

				$output .= "</div>" . "\n";

			}

		wp_reset_postdata();

		}

	}

	/*
	 * Loop the array of popular posts objects
	 */
	foreach( $mostpopular as $popular ) {

		$stats = array(); // placeholder for the stats tag

		// Comment count option active, display comments
		if ( $instance['stats_tag']['comment_count'] ) {
			// display text in singular or plural, according to comments count
			$stats[] = '<span class="wpp-comments">' . sprintf(
				_n('1 comment', '%s comments', $popular->comment_count, 'wordpress-popular-posts'),
				number_format_i18n($popular->comment_count)
			) . '</span>';
		}

		// Pageviews option checked, display views
		if ( $instance['stats_tag']['views'] ) {

			// If sorting posts by average views
			if ($instance['order_by'] == 'avg') {
				// display text in singular or plural, according to views count
				$stats[] = '<span class="wpp-views">' . sprintf(
					_n('1 view per day', '%s views per day', intval($popular->pageviews), 'wordpress-popular-posts'),
					number_format_i18n($popular->pageviews, 2)
				) . '</span>';
			} else { // Sorting posts by views
				// display text in singular or plural, according to views count
				$stats[] = '<span class="wpp-views">' . sprintf(
					_n('1 view', '%s views', intval($popular->pageviews), 'wordpress-popular-posts'),
					number_format_i18n($popular->pageviews)
				) . '</span>';
			}
		}

		// Author option checked
		if ($instance['stats_tag']['author']) {
			$author = get_the_author_meta('display_name', $popular->uid);
			$display_name = '<a href="' . get_author_posts_url($popular->uid) . '">' . $author . '</a>';
			$stats[] = '<span class="wpp-author">' . sprintf(__('by %s', 'wordpress-popular-posts'), $display_name). '</span>';
		}

		// Date option checked
		if ($instance['stats_tag']['date']['active']) {
			$date = date_i18n($instance['stats_tag']['date']['format'], strtotime($popular->date));
			$stats[] = '<span class="wpp-date">' . sprintf(__('posted on %s', 'wordpress-popular-posts'), $date) . '</span>';
		}

		// Category option checked
		if ($instance['stats_tag']['category']) {
			$post_cat = get_the_category($popular->id);
			$post_cat = (isset($post_cat[0]))
			  ? '<a href="' . get_category_link($post_cat[0]->term_id) . '">' . $post_cat[0]->cat_name . '</a>'
			  : '';

			if ($post_cat != '') {
				$stats[] = '<span class="wpp-category">' . sprintf(__('under %s', 'wordpress-popular-posts'), $post_cat) . '</span>';
			}
		}

		// Build stats tag
		if ( !empty( $stats ) ) {
			$stats = '<div class="wpp-stats">' . join( ' | ', $stats ) . '</div>';
		}

		// Excerpt option checked, build excerpt tag
		/* nooo
		$excerpt = ''; // Excerpt placeholder
		if ($instance['post-excerpt']['active']) {

			$excerpt = get_excerpt_by_id( $popular->id );
			if ( !empty($excerpt) ) {
				$excerpt = '<div class="wpp-excerpt">' . $excerpt . '</div>';
			}
		}
		*/

		// get featured image for later
		$thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( $popular->id ), 'thumbnail' );

		// get title and shorten it up
		$post_title = $popular->title;
		$post_title_short = wp_trim_words( $post_title, 10, '&hellip;' );

		$output .= "<div class=\"postList\">" . "\n";
		if ( $thumbnail_image ) :
		$output .= "<a href=\"" . get_the_permalink( $popular->id ) . "\"><img src=\"" . $thumbnail_image[0] . "\" alt=\"" . $post_title_short . "\"></a>" . "\n";
		endif;

		$output .= "<h4 data-wppcount=\"" . number_format_i18n( $popular->pageviews ) . "\"><a href=\"" . get_the_permalink( $popular->id ) . "\" title=\"" . $post_title_short . "\">" . $post_title_short . "</a></h4>" . "\n";

		$output .= "</div>" . "\n";

	}

	return $output;

}
add_filter( 'wpp_custom_html', 'mindup_customize_popular_posts_list', 10, 2 );
