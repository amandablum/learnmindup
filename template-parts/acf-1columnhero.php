<?php
/**
 * ACF Content Type View : 1_column_hero
 *
 * @package mindup
 * @author ChuckReynolds <chuck@vuurr.com>
 */
?>

<section class="acf onecolumnhero">

	<?php
	if ( $hero_videoorimage == 'video' ) : ?>
		<div class="container video">
			<div class="embed-container">
				<?php echo $hero_video; ?>
			</div>
		</div>

	<?php
	elseif ( $hero_videoorimage == 'image' ) : ?>
		<div class="container image" style="background-image: url(<?php echo $hero_image['url']; ?>);">
			<!-- <img class="image-responsive" src="<?php echo $hero_image['url']; ?>" alt=""> -->

			<h1><?php echo $hero_headline; ?></h1>

			<p><?php echo $hero_copy; ?></p>

			<?php
			if ( $hero_cta_copy && $hero_cta_link ) : ?>

				<p><a href="<?php echo $hero_cta_link; ?>" class="btn"><?php echo $hero_cta_copy; ?></a></p>

			<?php 
			endif; ?>
		</div>
	<?php 
	endif; ?>

</section>
