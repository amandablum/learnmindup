<?php
/**
 * ACF Content Type View : 3_column
 *
 * @package mindup
 * @author ChuckReynolds <chuck@vuurr.com>
 */
?>

<section class="acf threecolumn">
	<div class="container">

	<?php
	// lets make a loop to save on the redundancy
	$max_tabs = 5; // max number of tabs/cols in acf
	for ( $tab = 1; $tab <= $max_tabs; $tab++ ) :
		// pull and sanitize vars
		$three_col_headline = sanitize_text_field( get_sub_field( '3col_headline' . $tab ) ); // Text
		$three_col_image    = get_sub_field( '3col_image' . $tab );                           // Image
		$three_col_copy     = wp_kses_post( get_sub_field( '3col_copy' . $tab ) );            // Text Area
		$three_col_ctacopy  = sanitize_text_field( get_sub_field( '3col_ctacopy' . $tab ) );  // Text
		$three_col_ctalink  = esc_url( get_sub_field( '3col_ctalink' . $tab ) );              // Url
		#var_dump( $tabs, $three_col_headline, $three_col_image, $three_col_copy, $three_col_ctacopy, $three_col_ctalink );
	?>

		<div class="tab<?php echo $tab; ?>">
			<h3><?php echo $three_col_headline; ?></h3>

			<img class="image-responsive" src="<?php echo $three_col_image['url']; ?>" alt="">

			<p><?php echo $three_col_copy; ?></p>

			<?php
			if ( $three_col_ctacopy && $three_col_ctalink ) : ?>

				<p><a href="<?php echo $three_col_ctalink; ?>"><?php echo $three_col_ctacopy; ?></a></p>

			<?php
			endif; ?>
		</div>

	<?php
	endfor; ?>

	</div>
</section>
