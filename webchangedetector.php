<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              webchangedetector.com
 * @since             0.1
 * @package           WebChangeDetector
 *
 * @wordpress-plugin
 * Plugin Name:       WebChange Detector
 * Plugin URI:        webchangedetector.com
 * Description:       Detect changes on your website visually before and after updating your website. You can also run automatic change detections and get notified on changes of your website.
 * Version:           3.0.4
 * Author:            Mike Miler
 * Author URI:        webchangedetector.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       webchangedetector
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */

define( 'WEBCHANGEDETECTOR_VERSION', '3.0.4' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-webchangedetector-activator.php
 */
function activate_webchangedetector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-webchangedetector-activator.php';
	WebChangeDetector_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-webchangedetector-deactivator.php
 */
function deactivate_webchangedetector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-webchangedetector-deactivator.php';
	WebChangeDetector_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_webchangedetector' );
register_deactivation_hook( __FILE__, 'deactivate_webchangedetector' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-webchangedetector.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_webchangedetector() {
	$plugin = new WebChangeDetector();
	$plugin->run();
}


if ( ! function_exists( 'dd' ) ) {
	/**
	 * Dump and die function.
	 *
	 * @param mixed ...$output The output.
	 *
	 * @return void
	 */
	function dd( ...$output ) {
		// this is PHP 5.6+.
		echo '<pre>';
		foreach ( $output as $o ) {
			if ( is_array( $o ) || is_object( $o ) ) {
				// phpcs:disable WordPress.PHP.DevelopmentFunctions
				print_r( $o );
				// phpcs:enable
				continue;
			}
			echo esc_html( $o );
		}
		echo '</pre>';
		die();
	}
}

run_webchangedetector();
