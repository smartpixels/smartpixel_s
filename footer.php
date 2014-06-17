<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package smartpixel_s
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer small-12 medium-12 medium-uncentered large-12 large-uncentered columns" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'smartpixel_s' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'smartpixel_s' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'smartpixel_s' ), 'smartpixel_s', '<a href="http://www.smartpixels.net" rel="designer">Arulprakash</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
