<?php
/**
 * Repo Template - Archive of everything but News
 *
 * Template Name: All But News Archive
 *
 * @package mindup
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div id="tag-cloud">
			<?php
			/*
			 * Display tag cloud from plugin, but check to see if it's on first
			 */
			if ( class_exists( 'WordPress_Category_Tag_Cloud' ) ) {

				show_tag_cloud( array(
					'taxonomy'   => 'category',
					'order_by'   => 'name',
					'order'      => 'ASC',
					'smallest'   => '75',
					'largest'    => '75',
					'format'     => 'rounded',
					'color'      => '#ffffff',
					'background' => '#12A79E',
					'border'     => '#ffffff'
					)
				);
			}
			?>
		</div>

		<?php
		/*
		 * mobile only search
		 */
		get_template_part( 'template-parts/mobile', 'search' );

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$repo_args = array(
			'post_type'           => 'post',
			'category__not_in'    => 1,
			'posts_per_page'      => 5,
			'paged'               => $paged,
			'ignore_sticky_posts' => true
		);

		$repo_query = new WP_Query( $repo_args );

		if ( $repo_query->have_posts() ) :

			$posts_count = 0;                              // set posts at zed

			while ( $repo_query->have_posts() ) : $repo_query->the_post();

				++$posts_count;                            // increase post count +1

				if ( $posts_count <= 3 && ! is_paged() ) : // if first, second, or third post on first page then do magic

						/*
						 * Doing require here so we can do proper conditionals that get_template_part doesn't allow
						 */
						require get_template_directory() . '/template-parts/content-post-repo-heros.php';

				else :

					get_template_part( 'template-parts/content', 'post' );

				endif;

			endwhile;

		wp_reset_postdata();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		?>
		<div id="pagination">
		<?php
		if ( function_exists( mindup_pagination_tplrepo() ) )
			mindup_pagination_tplrepo();
		?>
		</div><!-- end pagination -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
