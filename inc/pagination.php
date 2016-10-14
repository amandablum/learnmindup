<?php
/**
 * Custom Pagination
 *
 * @package mindup
 */

define( 'BIGEE', 999999999 ); // define a big number for calc

/*
 * Custom Pagination for archives
 */
function mindup_pagination_archives() {

	global $wp_query;

	echo paginate_links( array(
		'base'      => str_replace( BIGEE, '%#%', esc_url( get_pagenum_link( BIGEE ) ) ),
		'format'    => '?paged=%#%',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
		'next_text' => '>>',
		'prev_text' => '',
		'mid_size'  => 3
	) );

}

/*
 * Custom Pagination for Custom Page Template (tpl-repo.php)
 */
function mindup_pagination_tplrepo() {

	global $repo_query;

	echo paginate_links( array(
		'base'      => str_replace( BIGEE, '%#%', esc_url( get_pagenum_link( BIGEE ) ) ),
		'format'    => '?paged=%#%',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $repo_query->max_num_pages,
		'next_text' => '>>',
		'prev_text' => '',
		'mid_size'  => 3
	) );

}
