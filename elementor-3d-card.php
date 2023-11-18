<?php

/**
 * Plugin Name:       Elementor 3d card
 * Plugin URI:
 * Description:       Custom Elementor card addon.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            MD.Ridwan
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       card3d
 * Domain Path:       /languages
 * Elementor tested up to:     3.5.0
 * Elementor Pro tested up to: 3.5.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


function elementor_3d_card() {
	// Check if Elementor plugin is active
	if ( defined( 'ELEMENTOR_VERSION' ) ) {
		// Load plugin file
		require_once __DIR__ . '/widgets-loader.php';

		// Run the plugin
		\widget_loader\rs_widgets::instance();
	}
}
add_action( 'plugins_loaded', 'elementor_3d_card' );
