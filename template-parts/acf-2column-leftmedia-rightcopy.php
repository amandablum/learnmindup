<?php
/**
 * ACF Content Type View : 2_column_
 *
 * @package mindup
 * @author ChuckReynolds <chuck@vuurr.com>
 */
?>

<section class="acf twocolumn-leftmedia-rightcopy">
	<div class="container">

		<div class="twocolumn-leftmedia">
			<?php
			if ( $two_col_video_or_imageleft == 'video' ) : ?>

				<div class="embed-container">
					<?php echo $two_col_videoleft; ?>
				</div>

			<?php
			elseif ( $two_col_video_or_imageleft == 'image' ) : ?>

				<img class="image-responsive" src="<?php echo $two_col_imageleft['url']; ?>" alt="">

			<?php
			endif; ?>
		</div>
		<div class="twocolumn-rightcopy">

			<h2><?php echo $two_col_headlineright; ?></h2>

			<p><?php echo $two_col_copyright; ?></p>

			<?php
			if ( $two_col_ctacopyright && $two_col_ctalinkright ) : ?>

				<p><a href="<?php echo $two_col_ctalinkright; ?>" class="btn"><?php echo $two_col_ctacopyright; ?></a></p>

			<?php
			endif; ?>
		</div>

	</div>
</section>
