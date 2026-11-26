<?php
/**
 * Register widget areas (sidebars)
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register widget areas with identical IDs to preserve all existing widgets.
 */
function sts_kollegal_widgets_init() {
	// Footer Column 1
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'sts-kollegal' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Appears in the first footer column.', 'sts-kollegal' ),
		'before_widget' => '<div id="%1$s" class="sts-footer-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Footer Column 2
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'sts-kollegal' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Appears in the second footer column.', 'sts-kollegal' ),
		'before_widget' => '<div id="%1$s" class="sts-footer-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Footer Column 3
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'sts-kollegal' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Appears in the third footer column.', 'sts-kollegal' ),
		'before_widget' => '<div id="%1$s" class="sts-footer-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Footer Column 4 (optional)
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'sts-kollegal' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Appears in the fourth footer column if enabled.', 'sts-kollegal' ),
		'before_widget' => '<div id="%1$s" class="sts-footer-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Primary Blog Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'sts-kollegal' ),
		'id'            => 'primary-sidebar',
		'description'   => esc_html__( 'Appears beside blog posts and archives.', 'sts-kollegal' ),
		'before_widget' => '<div id="%1$s" class="sts-sidebar-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Right Sidebar alias (for compatibility)
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'sts-kollegal' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Secondary sidebar area.', 'sts-kollegal' ),
		'before_widget' => '<div id="%1$s" class="sts-sidebar-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'sts_kollegal_widgets_init' );
