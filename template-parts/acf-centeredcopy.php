<?php
/**
 * ACF Content Type View : centered_copy
 *
 * @package mindup
 * @author ChuckReynolds <chuck@vuurr.com>
 */
?>

<section class="acf centeredcopy">
	<div class="container">

		<h2><?php echo $centered_headline; ?></h2>

		<p><?php echo $centered_copy; ?></p>

		<?php
		if ( $centered_cta_copy && $centered_cta_link ) : ?>

			<a href="<?php echo $centered_cta_link; ?>" class="btn"><?php echo $centered_cta_copy; ?></a>

		<?php
		endif; ?>

	</div>
</section>
