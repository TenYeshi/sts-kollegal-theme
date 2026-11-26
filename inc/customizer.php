<?php
/**
 * STS Kollegal Theme Customizer
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sts_kollegal_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Institutional Contact & Header Section
	$wp_customize->add_section( 'sts_header_section', array(
		'title'       => esc_html__( 'School Contact & Header', 'sts-kollegal' ),
		'priority'    => 30,
		'description' => esc_html__( 'Institutional contact details displayed in the top bar.', 'sts-kollegal' ),
	) );

	// Phone Number
	$wp_customize->add_setting( 'sts_header_phone_number', array(
		'default'           => '+91 94801 80554',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'sts_header_phone_number', array(
		'label'    => esc_html__( 'Phone Number', 'sts-kollegal' ),
		'section'  => 'sts_header_section',
		'type'     => 'text',
	) );

	// Email Address
	$wp_customize->add_setting( 'sts_header_email_id', array(
		'default'           => 'stskollegal@sambhota.org',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'sts_header_email_id', array(
		'label'    => esc_html__( 'Email Address', 'sts-kollegal' ),
		'section'  => 'sts_header_section',
		'type'     => 'email',
	) );

	// Operating Hours
	$wp_customize->add_setting( 'sts_header_hours', array(
		'default'           => 'Mon - Sat: 8:30 AM - 4:00 PM',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'sts_header_hours', array(
		'label'    => esc_html__( 'School Hours', 'sts-kollegal' ),
		'section'  => 'sts_header_section',
		'type'     => 'text',
	) );

	// Facebook URL
	$wp_customize->add_setting( 'sts_social_media1_heading', array(
		'default'           => 'https://www.facebook.com/sts.kollegal',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'sts_social_media1_heading', array(
		'label'    => esc_html__( 'Facebook Page URL', 'sts-kollegal' ),
		'section'  => 'sts_header_section',
		'type'     => 'url',
	) );

	// Institutional Footer Section
	$wp_customize->add_section( 'sts_footer_section', array(
		'title'    => esc_html__( 'School Footer', 'sts-kollegal' ),
		'priority' => 35,
	) );

	// Copyright Text
	$wp_customize->add_setting( 'sts_footer_copyright_text', array(
		'default'           => '© ' . date('Y') . ' Sambhota Tibetan School (STS) Kollegal. All rights reserved.',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'sts_footer_copyright_text', array(
		'label'    => esc_html__( 'Copyright Line', 'sts-kollegal' ),
		'section'  => 'sts_footer_section',
		'type'     => 'textarea',
	) );
}
add_action( 'customize_register', 'sts_kollegal_customize_register' );
