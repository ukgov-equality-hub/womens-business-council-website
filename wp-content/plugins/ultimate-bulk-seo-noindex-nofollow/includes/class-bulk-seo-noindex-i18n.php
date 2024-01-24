<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       wizplugins.com
 * @since      1.0.0
 *
 * @package    bseoni_bulk_noindex
 * @subpackage bseoni_bulk_noindex/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    bseoni_bulk_noindex
 * @subpackage bseoni_bulk_noindex/includes
 * @author     Wiz Plugins <hello@wizplugins.com>
 */
class bseoni_bulk_noindex_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bulk-seo-noindex',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
