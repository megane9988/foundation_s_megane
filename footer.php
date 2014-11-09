<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package foundation_s_megane
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info text-center">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'foundationfoundation_s_megane_megane' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'foundationfoundation_s_megane_megane' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'foundationfoundation_s_megane_megane' ), 'foundationfoundation_s_megane_megane', '<a href="http://m-g-n.me" rel="designer">megane9988</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
