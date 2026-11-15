<?php
/**
 * The main template file
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main" role="main">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<div class="sts-page-header">
			<div class="sts-container">
				<h1 class="sts-page-title"><?php single_post_title(); ?></h1>
			</div>
		</div>
	<?php endif; ?>

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
					'prev_text' => '<i class="bi bi-chevron-left" aria-hidden="true"></i> ' . esc_html__( 'Previous', 'sts-kollegal' ),
					'next_text' => esc_html__( 'Next', 'sts-kollegal' ) . ' <i class="bi bi-chevron-right" aria-hidden="true"></i>',
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
