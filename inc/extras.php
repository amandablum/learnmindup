<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mindup
 */


/**
 * We need to check if this is a Lesson post, if it's a parent, and if it has children.
 * If all that is true, then we need to redirect the main parent (lesson) to first child (step).
 */
function lmnd_parent_lesson_redirect() {

	// If this is not lesson post type, bail.
	if ( ! is_singular( 'lesson' ) ) return;

	// Now pull the global $post object so we can map it.
	global $post;

	// If this is not a parent lesson, bail.
	if ( ! empty( $post->post_parent ) ) return;

	// If post parent does not have children, bail.
	$lmnd_parent_child_count = count( get_posts( array( 'post_parent' => $post->ID, 'post_type' => $post->post_type ) ) );
	if ( ! $lmnd_parent_child_count ) return;

	// Gets the first child step and redirects to it
	$first_lesson_step_id  = key( LearnMindUp_Queries::get_single_lesson_steps( get_the_ID() ) );
	$first_lesson_step_url = get_permalink( $first_lesson_step_id );

	// Finally, redirect.
	wp_redirect( $first_lesson_step_url ); exit();

}
add_action( 'template_redirect', 'lmnd_parent_lesson_redirect' );


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
 * Remove the admin bar and its padding from everybody but admins
 */
function mindup_rm_admin_bar() {

	if ( ! current_user_can( 'administrator' ) && ! is_admin() ) {

		show_admin_bar( false );

	}

}
add_action( 'after_setup_theme', 'mindup_rm_admin_bar' );

/**
 * Admin only functions
 */
if ( is_admin() ) :

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) return;
	if ( defined( 'DOING_CRON' ) && DOING_CRON ) return;

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
	 * Remove admin menu objects
	 */
	function mindup_rm_admin_menus() {

		remove_menu_page( 'edit.php' );          // Posts
		remove_menu_page( 'edit-comments.php' ); // Comments
		remove_submenu_page( 'options-general.php', 'options-discussion.php' );

	}
	add_action( 'admin_menu', 'mindup_rm_admin_menus' );

	/**
	 * Removes some meta boxes from default pages screen
	 */
	function mindup_rm_page_metaboxes() {

		remove_meta_box( 'commentstatusdiv', 'page', 'normal' ); // discussion metabox
		remove_meta_box( 'commentsdiv',      'page', 'normal' ); // comments metabox

	}
	add_action( 'admin_menu', 'mindup_rm_page_metaboxes' );

	/**
	 * Removes some dashboard widgets
	 */
	function mindup_rm_dashboard_metaboxes() {

		remove_action(   'welcome_panel',         'wp_welcome_panel'  ); // wordpress welcome box
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); // quick draft box
		remove_meta_box( 'dashboard_primary',     'dashboard', 'side' ); // wordpress news blog box

	}
	add_action( 'wp_dashboard_setup', 'mindup_rm_dashboard_metaboxes' );

endif; // end admin only funcs
