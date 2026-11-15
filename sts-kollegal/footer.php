<?php
/**
 * The template for displaying the footer
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
		<div class="sts-footer-widgets">
			<div class="sts-container">
				<div class="sts-footer-grid">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="sts-footer-col footer-col-1">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="sts-footer-col footer-col-2">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="sts-footer-col footer-col-3">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<div class="sts-footer-col footer-col-4">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="sts-footer-bottom">
		<div class="sts-container sts-footer-bottom-inner">
			<div class="sts-copyright">
				<p><?php echo esc_html( sts_get_copyright() ); ?></p>
			</div>

			<div class="sts-footer-nav">
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'menu_class'     => 'sts-footer-menu',
						'depth'          => 1,
						'container'      => false,
					) );
				}
				?>
			</div>
		</div>
	</div>

	<!-- Scroll to top button -->
	<button id="sts-scroll-top" class="sts-scroll-top" aria-label="<?php esc_attr_e( 'Scroll to top', 'sts-kollegal' ); ?>">
		<i class="bi bi-arrow-up" aria-hidden="true"></i>
	</button>
</footer>

<?php wp_footer(); ?>
</body>
</html>
