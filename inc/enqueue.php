<?php
/**
 * Enqueue scripts and styles
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue theme stylesheets and JavaScript
 */
function sts_kollegal_scripts() {
	$version = STS_KOLLEGAL_VERSION;

	// Google Fonts: Inter, Manrope, Noto Sans Tibetan
	wp_enqueue_style(
		'sts-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&family=Noto+Sans+Tibetan:wght@400;700&display=swap',
		array(),
		null
	);

	// Bootstrap Icons for utility icons (telephone, envelope, facebook, search, etc.)
	wp_enqueue_style(
		'bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
		array(),
		'1.11.3'
	);

	// Theme style.css
	wp_enqueue_style(
		'sts-kollegal-style',
		get_stylesheet_uri(),
		array(),
		$version
	);

	// Main theme styles
	wp_enqueue_style(
		'sts-kollegal-main',
		STS_KOLLEGAL_URI . '/assets/css/main.css',
		array( 'sts-kollegal-style' ),
		$version
	);

	// Header & navigation styling
	wp_enqueue_style(
		'sts-kollegal-header',
		STS_KOLLEGAL_URI . '/assets/css/header.css',
		array( 'sts-kollegal-main' ),
		$version
	);

	// Footer styling
	wp_enqueue_style(
		'sts-kollegal-footer',
		STS_KOLLEGAL_URI . '/assets/css/footer.css',
		array( 'sts-kollegal-main' ),
		$version
	);

	// Responsive breakpoint overrides
	wp_enqueue_style(
		'sts-kollegal-responsive',
		STS_KOLLEGAL_URI . '/assets/css/responsive.css',
		array( 'sts-kollegal-header', 'sts-kollegal-footer' ),
		$version
	);

	// Event-specific assets (scoped to event posts and archives)
	if ( is_singular( 'post' ) || is_category( 'events' ) || is_archive() || is_home() ) {
		wp_enqueue_style(
			'sts-kollegal-events',
			STS_KOLLEGAL_URI . '/assets/css/events.css',
			array( 'sts-kollegal-main' ),
			$version
		);

		wp_enqueue_script(
			'sts-kollegal-events-js',
			STS_KOLLEGAL_URI . '/assets/js/events.js',
			array(),
			$version,
			true
		);
	}

	// Accessible navigation handler
	wp_enqueue_script(
		'sts-kollegal-navigation',
		STS_KOLLEGAL_URI . '/assets/js/navigation.js',
		array(),
		$version,
		true
	);

	// Threaded comments support
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sts_kollegal_scripts' );
