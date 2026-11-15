<?php
/**
 * The template for displaying archive pages (Categories, Tags, Dates)
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main" role="main">
	<div class="sts-archive-header">
		<div class="sts-container">
			<?php
			the_archive_title( '<h1 class="sts-archive-title">', '</h1>' );
			the_archive_description( '<div class="sts-archive-description">', '</div>' );
			?>
		</div>
	</div>

	<div class="sts-container sts-archive-container">
		<?php if ( have_posts() ) : ?>
			<div class="sts-posts-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
				?>
			</div>

			<div class="sts-pagination-wrapper">
				<?php
				the_posts_pagination( array(
					'prev_text'          => '<i class="bi bi-chevron-left" aria-hidden="true"></i> <span class="screen-reader-text">' . esc_html__( 'Previous page', 'sts-kollegal' ) . '</span>',
					'next_text'          => '<span class="screen-reader-text">' . esc_html__( 'Next page', 'sts-kollegal' ) . '</span> <i class="bi bi-chevron-right" aria-hidden="true"></i>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'sts-kollegal' ) . ' </span>',
				) );
				?>
			</div>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
