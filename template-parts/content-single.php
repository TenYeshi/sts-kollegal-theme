<?php
/**
 * Template part for displaying single post content
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="sts-single-content-wrapper">
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sts-kollegal' ),
			'after'  => '</div>',
		) );
		?>
	</div>
</div>
