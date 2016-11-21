<?php
/**
 * ACF Content Type View : reference_list
 *
 * @package mindup
 * @author ChuckReynolds <chuck@vuurr.com>
 */

if ( false !== $check = LearnMindUp_Helper::if_serialized_has_data( $reflis_repeater ) ) {

	foreach( $reflis_repeater as $reference ) {

		// make vars easier to call
		$reflis_image      = $reference['reflis_image'];
		$reflis_refname    = $reference['reflis_refname'];
		$reflis_copy       = $reference['reflis_copy'];
		$reflis_button     = $reference['reflis_button'];
		$reflis_buttonlink = $reference['reflis_buttonlink'];

		?>
		<section class="acf reference-list">
			<div class="container">
				<div class="twocolumn-leftmedia">
					<a href="<?php echo $reflis_image; ?>" target="_blank"><img class="image-responsive" src="<?php echo $reflis_image; ?>" alt=""></a>
				</div>
				<div class="twocolumn-rightcopy">
					<h2><a href="<?php echo $reflis_image; ?>" target="_blank"><?php echo $reflis_refname; ?></a></h2>
					<p><?php echo $reflis_copy; ?></p>
					<?php
					if ( $reflis_button && $reflis_buttonlink ) : ?>

						<p><a href="<?php echo $reflis_buttonlink; ?>" class="btn" target="_blank"><?php echo $reflis_button; ?></a></p>

					<?php
					endif; ?>

				</div>
			</div>
		</section>

		<?php

	}

}
