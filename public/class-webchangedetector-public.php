<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       wp-mike.com
 * @since      1.0.0
 *
 * @package    WebChangeDetector
 * @subpackage WebChangeDetector/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    WebChangeDetector
 * @subpackage WebChangeDetector/public
 * @author     Mike Miler <mike@wp-mike.com>
 */
class WebChangeDetector_Public {


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( ! get_option( WCD_WP_OPTION_KEY_API_TOKEN ) ) {
			// Verify website.
			$this->verify_website();
		}
	}

	/** Verify the website if we do.
	 *
	 * @return void
	 */
	public function verify_website() {

		$verify_string = get_option( 'webchangedetector_verify_secret' );

		if ( ! empty( $_GET['wcd-verify'] ) && ! empty( $verify_string ) ) {
			echo wp_json_encode( $verify_string );
			die();
		}
	}
}
