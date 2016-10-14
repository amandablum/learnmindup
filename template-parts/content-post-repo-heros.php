<?php
/**
* Template part for displaying single large post content partial in tpl-repo page template.
*
* @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#content-slug-php
*
* @package mindup
*/

/*
 * Set the default class name and thumbnail size for our micro loop
 */
$repo_class = '';
$repo_thumb = '';

if ( $posts_count == 1 ) :

	$repo_class = "hero-one";
	$repo_thumb = "large";

elseif ( $posts_count == 2 ) :

	$repo_class = "hero-two";
	$repo_thumb = "medium";

elseif ( $posts_count == 3 ) :

	$repo_class = "hero-three";
	$repo_thumb = "medium";

endif;

/*
 * Need to drop this in before the 3-pack
 */
if ( $posts_count == 1 ) : ?>
<div class="three-hero-posts">
<?php
endif;
?>

	<article id="post-<?php the_ID(); ?>" class="<?php echo $repo_class ?>">
		<a href="<?php echo the_permalink(); ?>">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $repo_thumb );
		}
		?>
		</a>
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		/*
		 * These were being hidden in css so no reason to output them
		 */
		if ( $posts_count == 1 ) : ?>

			<div class="entry-meta">
				<?php mindup_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php mindup_entry_footer(); ?>
			</footer><!-- .entry-footer -->

		<?php
		endif;
		?>
	</article><!-- #post-## .<?php echo $repo_class ?> -->

<?php
/*
 * Need to drop this in after the 3-pack
 */
if ( $posts_count == 3 ) : ?>
</div><!-- /three hero posts -->
<?php
endif;
?>