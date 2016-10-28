<?php
/**
 * mindup functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mindup
 */

/*
 * Set theme version for caching.
 * If you remove this the world will implode. dont.
 */
define( 'MINDUP_VERSION', '1.0.0' );


if ( ! function_exists( 'mindup_setup' ) ) :
/*
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mindup_setup() {

	/*
	 * Add default posts and comments RSS feed links to head.
	 */
	#add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Register menus for wp_nav_menu() locations.
	 */
	register_nav_menus( array(
		'primary'      => __( 'Primary', 'mindup' ),
		'header-right' => __( 'Header Right', 'mindup' ),
		'footer-1'     => __( 'Footer 1', 'mindup' ),
		'footer-2'     => __( 'Footer 2', 'mindup' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/**
	 * Enable support for Post Formats.
	 * @see https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	/*
	 * Set up the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'mindup_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * Some head cleanup
	 */
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );

}
add_action( 'after_setup_theme', 'mindup_setup' );
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mindup_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'mindup_content_width', 640 );

}
add_action( 'after_setup_theme', 'mindup_content_width', 0 );

/*
 * Enqueue scripts and styles.
 */
function mindup_scripts() {

	$font_args = array(
		'family' => 'Open+Sans:400,300,600,700,800|Permanent+Marker|Raleway:500'
		#'subset' => 'latin,latin-ext',
	);

	$handle = 'mindup-style';
	$src =  get_template_directory_uri() . '/style.css';
	$deps = '';
	$ver = filemtime( get_template_directory() . '/style.css');
	$media = '';
	wp_enqueue_style( $handle, $src, $deps, $ver, $media );
	wp_enqueue_style(  'google-fonts',               add_query_arg( $font_args, '//fonts.googleapis.com/css' ),   array(), null );
	wp_enqueue_script( 'mindup-navigation',          get_template_directory_uri() . '/js/navigation.js',          array(), MINDUP_VERSION, true );
	wp_enqueue_script( 'mindup-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), MINDUP_VERSION, true );
	wp_enqueue_script( 'mindup-tabs',                get_template_directory_uri() . '/js/tabs.js',                array( 'jquery' ), MINDUP_VERSION, true );
	wp_enqueue_script( 'google-recaptcha',           '//www.google.com/recaptcha/api.js',                         array(), false );

}
add_action( 'wp_enqueue_scripts', 'mindup_scripts' );

/*
 * Some Assembly Required
 */
require get_template_directory() . '/inc/acf-layouts.php';   // ACF functions and layouts for general use
require get_template_directory() . '/inc/custom-header.php'; // Implement the Custom Header feature
require get_template_directory() . '/inc/template-tags.php'; // Custom template tags for this theme
require get_template_directory() . '/inc/extras.php';        // Custom functions that act independently of the theme templates
require get_template_directory() . '/inc/customizer.php';    // Customizer additions
require get_template_directory() . '/inc/jetpack.php';       // Load Jetpack compatibility file
require get_template_directory() . '/inc/pagination.php';    // Custom Paginations


if ( ! function_exists( 'mindup_sidebars' ) ) :
/**
 * Mindup Widget Areas
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mindup_sidebars() {

	$args = array(
		'id'          => 'footercol1',
		'class'       => 'foot1',
		'name'        => __( 'Footer Column 1', 'mindup' ),
		'description' => __( 'The leftmost column in the footer. ', 'mindup' ),
	);
	register_sidebar( $args );

	$args = array(
		'id'          => 'footercol4',
		'class'       => 'foot4',
		'name'        => __( 'Footer Column 4', 'mindup' ),
		'description' => __( 'The rightmost column in the footer. ', 'mindup' ),
	);
	register_sidebar( $args );

	$args = array(
		'id'          => 'footbottom',
		'class'       => 'footbot',
		'name'        => __( 'Footer Bottom', 'mindup' ),
		'description' => __( 'This is the footer at the bottom of the page, containing the 501c3 Disclaimer', 'mindup' ),
	);
	register_sidebar( $args );

	$args = array(
		'id'          => 'fullwidthtemplatesidebar',
		'name'        => __( 'Full Width Template Sidebar', 'mindup' ),
		'description' => __( 'You see this sidebar on pages using the Full Width with Sidebar Page Template.', 'mindup' ),
	);
	register_sidebar( $args );

	$args = array(
		'id'          => '404',
		'name'        => __( '404 Page Visual Editor', 'mindup' ),
		'description' => __( 'Add a Visual Editor Widget to control content on the 404 error page.', 'mindup' ),
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'mindup_sidebars' );
endif;

/**
* Merge Tags as Dynamic Population Parameters
* http://gravitywiz.com/dynamic-products-via-post-meta/
*/
function gw_prepopluate_merge_tags($form) {

	$filter_names = array();

	foreach($form['fields'] as &$field) {

		if(!rgar($field, 'allowsPrepopulate'))
			continue;

		// complex fields store inputName in the "name" property of the inputs array
		if(is_array(rgar($field, 'inputs')) && $field['type'] != 'checkbox') {
			foreach($field['inputs'] as $input) {
				if(rgar($input, 'name'))
					$filter_names[] = array('type' => $field['type'], 'name' => rgar($input, 'name'));
			}
		} else {
			$filter_names[] = array('type' => $field['type'], 'name' => rgar($field, 'inputName'));
		}

	}

	foreach($filter_names as $filter_name) {

		$filtered_name = GFCommon::replace_variables_prepopulate($filter_name['name']);

		if($filter_name['name'] == $filtered_name)
			continue;

		add_filter("gform_field_value_{$filter_name['name']}", create_function("", "return '$filtered_name';"));
	}

	return $form;
}
add_filter( 'gform_pre_render', 'gw_prepopluate_merge_tags' );
