<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="sts-no-results not-found text-center">
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'sts-kollegal' ); ?></h2>
	</header>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'sts-kollegal' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?>
			</p>
		<?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sts-kollegal' ); ?></p>
			<div class="sts-search-wrapper">
				<?php get_search_form(); ?>
			</div>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sts-kollegal' ); ?></p>
			<div class="sts-search-wrapper">
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
