<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main" role="main">
	<div class="sts-container sts-error-container">
		<section class="sts-error-404 not-found text-center">
			<div class="sts-404-badge">404</div>
			<h1 class="sts-404-title"><?php esc_html_e( 'Page Not Found', 'sts-kollegal' ); ?></h1>
			<p class="sts-404-lead">
				<?php esc_html_e( 'The page you were looking for could not be found. It may have been moved, renamed, or is temporarily unavailable.', 'sts-kollegal' ); ?>
			</p>

			<div class="sts-404-search">
				<?php get_search_form(); ?>
			</div>

			<div class="sts-404-actions">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sts-btn sts-btn-primary">
					<i class="bi bi-house-door-fill" aria-hidden="true"></i>
					<?php esc_html_e( 'Return to Homepage', 'sts-kollegal' ); ?>
				</a>
			</div>
		</section>
	</div>
</main>

<?php
get_footer();
