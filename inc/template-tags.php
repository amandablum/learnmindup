<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mindup
 */

if ( ! function_exists( 'mindup_posted_on' ) ) :
/*
 * Prints HTML with meta information for the current post-date/time and author.
 */
function mindup_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'mindup' ),
		#'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		$time_string
	);

	$byline = sprintf(
		esc_html_x( 'BY %s', 'post author', 'mindup' ),
		#'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>  <span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'mindup_entry_footer' ) ) :
/*
 * Prints HTML with meta information for the categories, tags and comments.
 */
function mindup_entry_footer() {

	$tags_list = get_the_tag_list( '', esc_html__( ', ', 'mindup' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( '%1$s', 'mindup' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}

	if ( ! is_single() ) {
		echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">Read More ></a>';
	}

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function mindup_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'mindup_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'mindup_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so mindup_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so mindup_categorized_blog should return false.
		return false;
	}
}

/*
 * Flush out the transients used in mindup_categorized_blog.
 */
function mindup_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'mindup_categories' );
}
add_action( 'edit_category', 'mindup_category_transient_flusher' );
add_action( 'save_post',     'mindup_category_transient_flusher' );
