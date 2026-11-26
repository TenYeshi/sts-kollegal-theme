<?php
/**
 * STS Kollegal functions and definitions
 *
 * @package STS_Kollegal
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'STS_KOLLEGAL_VERSION', '1.0.0' );
define( 'STS_KOLLEGAL_DIR', get_template_directory() );
define( 'STS_KOLLEGAL_URI', get_template_directory_uri() );

/**
 * Load core theme modular components
 */
require_once STS_KOLLEGAL_DIR . '/inc/setup.php';
require_once STS_KOLLEGAL_DIR . '/inc/enqueue.php';
require_once STS_KOLLEGAL_DIR . '/inc/widgets.php';
require_once STS_KOLLEGAL_DIR . '/inc/template-functions.php';
require_once STS_KOLLEGAL_DIR . '/inc/customizer.php';
