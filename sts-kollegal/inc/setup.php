<?php
/**
 * STS Kollegal Theme Setup
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'sts_kollegal_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function sts_kollegal_setup() {
		// Translation domain
		load_theme_textdomain( 'sts-kollegal', STS_KOLLEGAL_DIR . '/languages' );

		// RSS feed links
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );

		// Enable featured images
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 675, true );

		// Register Navigation Menus
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'sts-kollegal' ),
			'footer'  => esc_html__( 'Footer Menu', 'sts-kollegal' ),
		) );

		// HTML5 markup support
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		) );

		// Custom logo support
		add_theme_support( 'custom-logo', array(
			'height'      => 150,
			'width'       => 150,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Align wide support for blocks
		add_theme_support( 'align-wide' );

		// Responsive embeds
		add_theme_support( 'responsive-embeds' );

		// Core block styles
		add_theme_support( 'wp-block-styles' );

		// Selective refresh for widgets
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'sts_kollegal_setup' );

/**
 * Set the content width in pixels, based on the theme's design.
 */
function sts_kollegal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sts_kollegal_content_width', 1200 );
}
add_action( 'after_setup_theme', 'sts_kollegal_content_width', 0 );
