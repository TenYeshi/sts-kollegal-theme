<?php
/**
 * Helper template functions
 *
 * @package STS_Kollegal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get theme mod with fallback to legacy kindergarten_art_school keys
 *
 * @param string $key Mod key name without prefix
 * @param mixed $default Default fallback value
 * @return mixed
 */
function sts_get_mod( $key, $default = '' ) {
	$val = get_theme_mod( 'sts_' . $key );
	if ( false !== $val && '' !== $val && null !== $val ) {
		return $val;
	}

	// Fallback to legacy parent theme mod if stored
	$legacy_val = get_theme_mod( 'kindergarten_art_school_' . $key );
	if ( false !== $legacy_val && '' !== $legacy_val && null !== $legacy_val ) {
		return $legacy_val;
	}

	return $default;
}

/**
 * Returns school phone display number
 */
function sts_get_phone() {
	$phone = sts_get_mod( 'header_phone_number', '+91 94801 80554' );
	return $phone;
}

/**
 * Returns school phone tel: URI
 */
function sts_get_phone_tel() {
	$phone = sts_get_phone();
	return preg_replace( '/[^0-9+]/', '', $phone );
}

/**
 * Returns school email
 */
function sts_get_email() {
	return sts_get_mod( 'header_email_id', 'stskollegal@sambhota.org' );
}

/**
 * Returns school hours
 */
function sts_get_hours() {
	return sts_get_mod( 'header_hours', 'Mon - Sat: 8:30 AM - 4:00 PM' );
}

/**
 * Returns Facebook URL
 */
function sts_get_facebook() {
	return sts_get_mod( 'social_media1_heading', 'https://www.facebook.com/sts.kollegal' );
}

/**
 * Returns copyright text
 */
function sts_get_copyright() {
	$default = sprintf(
		/* translators: %s: Current Year */
		esc_html__( '© %s Sambhota Tibetan School (STS) Kollegal. All rights reserved.', 'sts-kollegal' ),
		date_i18n( 'Y' )
	);
	return sts_get_mod( 'footer_copyright_text', $default );
}

/**
 * Check if the current post or page is built with Elementor
 */
function sts_is_elementor_page( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}
	return (bool) get_post_meta( $post_id, '_elementor_edit_mode', true );
}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function sts_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated screen-reader-text" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<span class="posted-on"><i class="bi bi-calendar3" aria-hidden="true"></i> ' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Prints categories and tags for post
 */
function sts_entry_footer() {
	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list( esc_html__( ', ', 'sts-kollegal' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links"><i class="bi bi-folder2-open" aria-hidden="true"></i> ' . esc_html__( 'Posted in %1$s', 'sts-kollegal' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'sts-kollegal' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links"><i class="bi bi-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'sts-kollegal' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}
