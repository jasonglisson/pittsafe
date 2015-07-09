<?php
/**
 * The footer template
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */
?>
	
	<div id="footer-widget-area">
		
	<!-- Footer -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			
			<div id="tertiary" class="sidebar-container" role="complementary">
				<?php if (is_active_sidebar( 'f1-widgets' ) || is_active_sidebar( 'f2-widgets' ) || is_active_sidebar( 'f3-widgets' ) || is_active_sidebar( 'f4-widgets' ) ) { ?>
					<div class="container_16">
						
						<?php if ( is_active_sidebar( 'f1-widgets' ) ) : ?>
							<!-- First Widget Area -->
							<div class="grid_4">
								<?php dynamic_sidebar( 'f1-widgets' ); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_active_sidebar( 'f2-widgets' ) ) : ?>
							<!-- Second Widget Area -->
							<div class="grid_4">
								<?php dynamic_sidebar( 'f2-widgets' ); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_active_sidebar( 'f3-widgets' ) ) : ?>
							<!-- Third Widget Area -->
							<div class="grid_4">
								<?php dynamic_sidebar( 'f3-widgets' ); ?>
							</div>
						<?php endif; ?>

						<?php if ( is_active_sidebar( 'f4-widgets' ) ) : ?>
							<!-- Forth Widget Area -->
							<div class="grid_4">
								<?php dynamic_sidebar( 'f4-widgets' ); ?>
							</div>
						<?php endif; ?>

						<div class="clear"></div>
					</div>
				<?php }	?>

			</div>

			<!-- Site Info -->
			<div class="site-info">
				<div class="container_16">
					
					<!-- CopyRight -->
					<div class="grid_8">
						<p class="copy">
							<?php if ( ot_get_option('charitas_copyright') ){
								echo esc_html(ot_get_option('charitas_copyright'));
							} ?>
						</p>
					</div>
					
					<!-- Design By -->
					<div class="grid_8">
						<p class="designby"><a href="/" title="Pitt Safe Communities" target="_blank">Pitt Safe Communities</a></p>
					</div>

					<div class="clear"></div>
				</div>
			</div><!-- .site-info -->
		</footer><!-- #colophon .site-footer -->

	</div>
	<!-- /#page -->
	<?php wp_footer(); ?>
</body>
</html>