<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       wizplugins.com
 * @since      1.0.0
 *
 * @package    bseoni_bulk_noindex
 * @subpackage bseoni_bulk_noindex/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    bseoni_bulk_noindex
 * @subpackage bseoni_bulk_noindex/public
 * @author     Wiz Plugins <hello@wizplugins.com>
 */
class bseoni_bulk_noindex_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $bseoni_bulk_noindex    The ID of this plugin.
	 */
	private $bseoni_bulk_noindex;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $bseoni_bulk_noindex, $version ) {

		$this->bseoni_bulk_noindex = $bseoni_bulk_noindex;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in bseoni_bulk_noindex_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The bseoni_bulk_noindex_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->bseoni_bulk_noindex, plugin_dir_url( __FILE__ ) . 'css/bulk-seo-noindex-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in bseoni_bulk_noindex_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The bseoni_bulk_noindex_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->bseoni_bulk_noindex, plugin_dir_url( __FILE__ ) . 'js/bulk-seo-noindex-public.js', array( 'jquery' ), $this->version, false );

	}

}
include 'noindex-nofollow-head-injection.php';