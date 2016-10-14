<?php
/**
 * ACF Content Type View : constellation
 *
 * @package mindup
 * @author ChuckReynolds <chuck@vuurr.com>
 */
?>

<section class="acf constellation">
	<div class="items">

		<?php
		// lets make a loop to save on the redundancy
		$max_const = 5; // max number of tabs/cols in acf
		for ( $const = 1; $const <= $max_const; $const++ ) :
			// pull and sanitize vars
			$const_label   = sanitize_text_field( get_sub_field( 'const_label' . $const ) );   // Text
			$const_icon    = get_sub_field( 'const_icon' . $const );                           // Image
			$const_copy    = wp_kses_post( get_sub_field( 'const_copy' . $const ) );           // Text Area
			$const_ctacopy = sanitize_text_field( get_sub_field( 'const_ctacopy' . $const ) ); // Text
			$const_ctalink = esc_url( get_sub_field( 'const_ctalink' . $const ) );             // Url
			#var_dump( $const, $const_label, $const_icon, $const_copy, $const_ctacopy, $const_ctalink );
		?>
			<div class="tab<?php echo $const; ?>">
				<?php
				#echo $const . " of " . $max_const;
				?>
				<h3 onclick=""><?php echo $const_label; ?></h3>
				<div class="circle" onclick="">
					<div class="circle-image">
						<img class="image-responsive" src="<?php echo $const_icon['url']; ?>" alt="">
					</div>
					<p class="circle-text"><?php echo $const_copy; ?>
					<?php
					if ( $const_ctacopy && $const_ctalink ) : ?>
						<a href="<?php echo $const_ctalink; ?>"><?php echo $const_ctacopy; ?> »</a>
					<?php
					endif;
					?>
					</p>
				</div>
			</div>
		<?php
		endfor;
		?>

	</div>
</section>
