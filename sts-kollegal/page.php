<?php
/**
 * The template for displaying all pages
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$is_elementor = sts_is_elementor_page();
?>

<main id="main" class="site-main" role="main">
	<?php
	while ( have_posts() ) :
		the_post();

		if ( $is_elementor ) :
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'sts-elementor-entry' ); ?>>
				<div class="entry-content sts-elementor-canvas">
					<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sts-kollegal' ),
						'after'  => '</div>',
					) );
					?>
				</div>
			</article>
			<?php
		else :
			?>
			<div class="sts-page-header">
				<div class="sts-container">
					<h1 class="sts-page-title"><?php the_title(); ?></h1>
				</div>
			</div>

			<div class="sts-container sts-standard-page">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'sts-page-article' ); ?>>
					<div class="entry-content">
						<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sts-kollegal' ),
							'after'  => '</div>',
						) );
						?>
					</div>

					<?php if ( comments_open() || get_comments_number() ) : ?>
						<div class="sts-comments-wrapper">
							<?php comments_template(); ?>
						</div>
					<?php endif; ?>
				</article>
			</div>
			<?php
		endif;

	endwhile;
	?>
</main>

<?php
get_footer();
