<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              wizplugins.com
 * @since             1.0.0
 * @package           bseoni_bulk_noindex
 *
 * @wordpress-plugin
 * Plugin Name: Ultimate Bulk SEO Noindex Nofollow - Speed up Penalty Recovery Ultimate SEO Booster (Premium)
 * Plugin URI:        wizplugins.com
 * Description:       Make fast bulk edits to the robots meta tags for noindex and nofollow.
 * Version:           1.0.3
 * Author:            Wiz Plugins
 * Author URI:        wizplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bulk-seo-noindex
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}

if ( function_exists( 'ubsnsupr_fs' ) ) {
    ubsnsupr_fs()->set_basename( false, __FILE__ );
    return;
}


if ( !function_exists( 'ubsnsupr_fs' ) ) {
    // Create a helper function for easy SDK access.
    function ubsnsupr_fs()
    {
        global  $ubsnsupr_fs ;
        
        if ( !isset( $ubsnsupr_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $ubsnsupr_fs = fs_dynamic_init( array(
                'id'             => '3558',
                'slug'           => 'ultimate-bulk-seo-noindex-nofollow-speed-up-penalty-recovery',
                'premium_slug'   => 'ultimate-bulk-seo-noinde-speed-up-penalty-recovery-premium',
                'type'           => 'plugin',
                'public_key'     => 'pk_15ad0214ca5afa347a1d01db03dad',
                'is_premium'     => false,
                'premium_suffix' => 'Ultimate SEO Booster Plan',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug'   => 'bseoni_bulk_noindex_-__speed_up_penalty_recovery',
                'parent' => array(
                'slug' => 'options-general.php',
            ),
            ),
                'is_live'        => true,
            ) );
        }
        
        return $ubsnsupr_fs;
    }
    
    // Init Freemius.
    ubsnsupr_fs();
    // Signal that SDK was initiated.
    do_action( 'ubsnsupr_fs_loaded' );
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'bseoni_bulk_noindex_VERSION', '1.0.2' );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bulk-seo-noindex-activator.php
 */
function activate_bseoni_bulk_noindex()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-bulk-seo-noindex-activator.php';
    bseoni_bulk_noindex_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bulk-seo-noindex-deactivator.php
 */
function deactivate_bseoni_bulk_noindex()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-bulk-seo-noindex-deactivator.php';
    bseoni_bulk_noindex_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bseoni_bulk_noindex' );
register_deactivation_hook( __FILE__, 'deactivate_bseoni_bulk_noindex' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bulk-seo-noindex.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bseoni_bulk_noindex()
{
    $plugin = new bseoni_bulk_noindex();
    $plugin->run();
}

run_bseoni_bulk_noindex();

if ( !function_exists( 'ubsnsupr_fs_uninstall_cleanup' ) ) {
    /**
     * Plugin uninstall cleanup.
     *
     * @since 1.0.0
     */
    function ubsnsupr_fs_uninstall_cleanup()
    {
        // Delete all the plugin options
        delete_option( 'bseoni_settings' );
    }
    
    ubsnsupr_fs()->add_action( 'after_uninstall', 'ubsnsupr_fs_uninstall_cleanup' );
}
