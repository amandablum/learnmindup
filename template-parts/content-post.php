<?php
/**
* Template part for displaying post content in archive.php and custom page template archives.
*
* @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#content-slug-php
*
* @package mindup
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="thumbnail">
		<a href="<?php echo the_permalink(); ?>">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'medium' );
		}
		?>
		</a>
	</div>
	<div class="content">
		<header class="entry-header">
			<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>

			<div class="entry-meta">
				<?php mindup_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php mindup_posted_on(); ?><?php mindup_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- content -->
</article><!-- #post-## -->
