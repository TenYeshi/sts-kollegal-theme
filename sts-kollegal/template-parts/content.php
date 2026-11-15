<?php
/**
 * Template part for displaying posts in an archive or index grid
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'sts-post-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="sts-card-media">
			<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( 'medium_large', array( 'class' => 'sts-card-img', 'loading' => 'lazy' ) ); ?>
			</a>
			<?php
			$categories = get_the_category();
			if ( ! empty( $categories ) ) :
				?>
				<span class="sts-card-badge">
					<?php echo esc_html( $categories[0]->name ); ?>
				</span>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="sts-card-body">
		<div class="sts-card-meta">
			<?php sts_posted_on(); ?>
		</div>

		<h2 class="sts-card-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>

		<div class="sts-card-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="sts-card-footer">
			<a href="<?php the_permalink(); ?>" class="sts-read-more">
				<span><?php esc_html_e( 'Read Article', 'sts-kollegal' ); ?></span>
				<i class="bi bi-arrow-right" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</article>
