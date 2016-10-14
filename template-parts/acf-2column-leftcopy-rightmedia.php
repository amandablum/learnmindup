<?php
/**
 * ACF Content Type View : 2_column_copy_left_imagevideo_right
 *
 * @package mindup
 * @author ChuckReynolds <chuck@vuurr.com>
 */
?>

<section class="acf twocolumn-leftcopy-rightmedia">
	<div class="container">

		<div class="twocolumn-rightmedia">
			<?php
			if ( $two_col_video_or_imageright == 'video' ) : ?>

				<div class="embed-container">
						<?php echo $two_col_videoright; ?>
				</div>

			<?php
			elseif ( $two_col_video_or_imageright == 'image' ) : ?>

				<img class="image-responsive" src="<?php echo $two_col_imageright['url']; ?>" alt="">

			<?php
			endif; ?>
		</div>

		<div class="twocolumn-leftcopy">

			<h2><?php echo $two_col_headlineleft; ?></h2>

			<p><?php echo $two_col_copyleft; ?></p>

			<?php
			if ( $two_col_ctacopyleft && $two_col_ctalinkleft ) : ?>

				<p><a href="<?php echo $two_col_ctalinkleft; ?>" class="btn"><?php echo $two_col_ctacopyleft; ?></a></p>

			<?php
			endif; ?>
		</div>

	</div>
</section>
