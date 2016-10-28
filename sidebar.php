<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package mindup
 */

/**
 * Conditional for popular posts sidebar. //removed pop posts
 * Added is_product for woocommerce
 * @see https://docs.woothemes.com/document/conditional-tags/
 */
if ( is_single() || is_page_template( 'tpl-repo.php' ) ) :

	if ( class_exists( 'WooCommerce' ) )
		if ( is_product() ) return; ?>

	<aside id="secondary" class="widget-area" role="complementary">

		<?php get_search_form(); ?>

		<ul class="tabs">
			<li><a href="#tab2">Recent</a></li>
		</ul>
		<div id="tab2">
			<?php
			$recent_args = array (
				'post_type'           => 'post',
				'no_found_rows'       => true,
				'posts_per_page'      => 6,
				'ignore_sticky_posts' => true
			);
			$recent_posts = new WP_Query( $recent_args );

			if ( $recent_posts->have_posts() ) :
				while ( $recent_posts->have_posts() ) : $recent_posts->the_post();

					$post_title = get_the_title();
					$post_title_short = wp_trim_words( $post_title, 10, '&hellip;' ); ?>

					<div class="postList">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php echo get_permalink( get_the_ID() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
						<?php endif; ?>
						<h4><a href="<?php echo get_permalink( get_the_ID() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo $post_title_short; ?></a></h4>
					</div>
				<?php
				endwhile;
			else:
				echo '<p>no recent posts</p>';
			endif;
			wp_reset_postdata(); ?>
		</div>
	</aside><!-- #secondary -->

<?php
elseif ( is_page() && is_active_sidebar( 'fullwidthtemplatesidebar' ) ) : ?>

	<aside id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'fullwidthtemplatesidebar' ); ?>
	</aside><!-- #secondary -->

<?php
endif;
