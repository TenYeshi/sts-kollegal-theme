<?php
/**
 * Template part for displaying page content
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="sts-page-content-wrapper">
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sts-kollegal' ),
			'after'  => '</div>',
		) );
		?>
	</div>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer sts-edit-link-footer">
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'sts-kollegal' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link"><i class="bi bi-pencil" aria-hidden="true"></i> ',
				'</span>'
			);
			?>
		</footer>
	<?php endif; ?>
</div>
