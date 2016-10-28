<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mindup
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mindup_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'mindup_body_classes' );

/*
 * tiny mce custom mods
 */
function mindup_mce_mod( $init ) {

	$style_formats = array (
		array( 'title' => 'Heading over image', 'block' => 'h1', 'classes' => 'hero' ),
		array( 'title' => 'blockquote', 'block' => 'blockquote' ),
		array( 'title' => 'pullquote', 'block' => 'blockquote', 'classes' => 'pullquote' ),
		array( 'title' => 'button link', 'inline' => 'a', 'classes' => 'btn' ),
	);

	$init['style_formats'] = json_encode( $style_formats );

	$init['style_formats_merge'] = false;

	return $init;

}
add_filter( 'tiny_mce_before_init', 'mindup_mce_mod' );

/*
 * tiny mce custom mods
 */
function mindup_mce_add_buttons( $buttons ) {

	array_splice( $buttons, 1, 0, 'styleselect' );

	return $buttons;

}
add_filter( 'mce_buttons_2', 'mindup_mce_add_buttons' );

/*
 * changes to the video embed container
 */
function mindup_video_embed_container( $html ) {

	return '<div class="video-container">' . $html . '</div>';

}
add_filter( 'embed_oembed_html', 'mindup_video_embed_container', 10 );

/**
 * Add SVG support
 *
 * @link https://www.leighton.com/blog/enable-upload-of-svg-to-wordpress-media-library
 */
function mindup_custom_mimetypes( $m ) {

	$m['svg']  = 'image/svg+xml';
	$m['svgz'] = 'image/svg+xml';
	return $m;

}
add_filter( 'upload_mimes', 'mindup_custom_mimetypes' );

/*
 * limit the length of the post excerpt
 */
function mindup_custom_excerpt_length( $length ) {

	return 25;

}
add_filter( 'excerpt_length', 'mindup_custom_excerpt_length', 999 );

/*
 * change the excerpt read more thing
 */
function mindup_excerpt_more( $more ) {

	return '&hellip;';

}
add_filter( 'excerpt_more', 'mindup_excerpt_more' );

/**
 * Removes update notifications for everybody except admin users
 */
function mindup_tame_update_notifications() {

	if ( ! current_user_can( 'update_core' ) ) {

		remove_action( 'admin_notices', 'update_nag', 3 );

	}

}
add_action( 'admin_head', 'mindup_tame_update_notifications', 1 );

/**
 * Remove the admin bar and its padding from everybody but admins
 */
function mindup_remove_admin_bar() {

	if ( ! current_user_can( 'administrator' ) && ! is_admin() ) {

		show_admin_bar( false );

	}

}
add_action( 'after_setup_theme', 'mindup_remove_admin_bar' );