<?php
/**
 * The template for displaying all single posts
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main" role="main">
	<div class="sts-container sts-single-container">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'sts-single-post' ); ?>>
				<header class="entry-header sts-post-header">
					<div class="sts-post-meta">
						<?php sts_posted_on(); ?>
						<?php
						$categories = get_the_category();
						if ( ! empty( $categories ) ) :
							?>
							<span class="sts-cat-badge">
								<i class="bi bi-tag" aria-hidden="true"></i>
								<?php echo esc_html( $categories[0]->name ); ?>
							</span>
						<?php endif; ?>
					</div>

					<h1 class="entry-title sts-post-title"><?php the_title(); ?></h1>
				</header>

				<?php if ( has_post_thumbnail() && ! has_block( 'core/post-featured-image' ) ) : ?>
					<div class="sts-featured-media">
						<?php the_post_thumbnail( 'large', array( 'class' => 'sts-featured-img' ) ); ?>
					</div>
				<?php endif; ?>

				<div class="entry-content sts-entry-body">
					<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sts-kollegal' ),
						'after'  => '</div>',
					) );
					?>
				</div>

				<footer class="entry-footer sts-post-footer">
					<?php sts_entry_footer(); ?>
				</footer>

				<?php
				the_post_navigation( array(
					'prev_text' => '<span class="nav-subtitle"><i class="bi bi-arrow-left" aria-hidden="true"></i> ' . esc_html__( 'Previous Article', 'sts-kollegal' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Article', 'sts-kollegal' ) . ' <i class="bi bi-arrow-right" aria-hidden="true"></i></span> <span class="nav-title">%title</span>',
				) );
				?>

				<?php if ( comments_open() || get_comments_number() ) : ?>
					<div class="sts-comments-section">
						<?php comments_template(); ?>
					</div>
				<?php endif; ?>
			</article>
		<?php endwhile; ?>
	</div>
</main>

<?php
get_footer();
