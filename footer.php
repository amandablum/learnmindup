<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mindup
 */
?>

	</div><!-- #content -->

</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div id="footer-wrap">
		<div class="footerCol1">
			<a href="/" class="footer-logo">MindUp</a>
			<?php dynamic_sidebar( 'footercol1' ); ?>
		</div>
		<div class="footerCol2">
			<?php wp_nav_menu( array( 'theme_location' => 'footer-1', 'menu_class' => 'footerMenu' ) ); ?>
		</div>
		<div class="footerCol3">
			<?php wp_nav_menu( array( 'theme_location' => 'footer-2', 'menu_class' => 'footerMenu' ) ); ?>
		</div>
		<div class="footerCol4">
			<?php dynamic_sidebar( 'footercol4' ); ?>
		</div>
		<div class="footerBottom">
			<?php dynamic_sidebar( 'footbottom' ); ?>
		</div>
	</div> <!-- /footer-wrap -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
