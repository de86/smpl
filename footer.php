<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package smpl
 */
?>

	</div><!-- #content -->
</div><!-- #page -->	

<div id="full-width-footer" class="full-width-footer">
	<footer id="colophon" class="site-footer container900" role="contentinfo">
		<?php get_sidebar('footer'); ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'smpl' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'smpl' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'smpl' ), 'smpl', '<a href="http://www.delliottdesigns.com" rel="designer">David Elliott</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #full-width-footer -->

<?php wp_footer(); ?>

</body>
</html>
