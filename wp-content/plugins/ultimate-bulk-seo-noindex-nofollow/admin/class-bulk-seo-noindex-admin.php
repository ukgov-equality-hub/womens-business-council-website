<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       wizplugins.com
 * @since      1.0.0
 *
 * @package    bseoni_bulk_noindex
 * @subpackage bseoni_bulk_noindex/admin
 */
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    bseoni_bulk_noindex
 * @subpackage bseoni_bulk_noindex/admin
 * @author     Wiz Plugins <hello@wizplugins.com>
 */
class bseoni_bulk_noindex_Admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $bseoni_bulk_noindex    The ID of this plugin.
     */
    private  $bseoni_bulk_noindex ;
    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private  $version ;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $bseoni_bulk_noindex       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $bseoni_bulk_noindex, $version )
    {
        $this->bseoni_bulk_noindex = $bseoni_bulk_noindex;
        $this->version = $version;
    }
    
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
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
        wp_enqueue_style(
            $this->bseoni_bulk_noindex,
            plugin_dir_url( __FILE__ ) . 'css/bulk-seo-noindex-admin.css',
            array(),
            $this->version,
            'all'
        );
        //		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bulk-seo-noindex-admin.css', array(), $this->version, 'all' );
    }
    
    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
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
        wp_enqueue_script(
            $this->bseoni_bulk_noindex,
            plugin_dir_url( __FILE__ ) . 'js/bulk-seo-noindex-admin.js',
            array( 'jquery' ),
            $this->version,
            false
        );
    }

}
add_action( 'admin_menu', 'bseoni_add_admin_menu' );
add_action( 'admin_init', 'bseoni_settings_init' );
function bseoni_add_admin_menu()
{
    add_options_page(
        'Bulk SEO Noindex',
        'Bulk SEO Noindex',
        'manage_options',
        'bseoni_bulk_noindex_-__speed_up_penalty_recovery',
        'bseoni_options_page'
    );
}

function bseoni_settings_init()
{
    register_setting( 'bseoni', 'bseoni_settings' );
    if ( ubsnsupr_fs()->is_not_paying() ) {
        add_settings_section(
            'bseoni_bseoni_section',
            __( '', 'wordpress' ),
            'bseoni_settings_section_callback',
            'bseoni'
        );
    }
}

function bseoni_settings_section_callback()
{
    
    if ( ubsnsupr_fs()->is_not_paying() ) {
        echo  '<section class="bseoni"><h1>' . __( 'Awesome Premium Features', 'ultimate-bulk-seo-noindex-nofollow-speed-up-penalty-recovery' ) . '</h1>' ;
        echo  '<h2>Uh Oh! You can\'t access these amazingly powerful settings unless you upgrade to pro</h2>' ;
        echo  '<h3>By upgrading to <strong>PRO</strong</strong> you get access to the following features</p>' ;
        echo  '<table class="bseoni">' ;
        echo  '  <tr>' ;
        echo  '    <th class="bseoni-0lax"><h2>Integrates with:</h2></th>' ;
        echo  '    <th class="bseoni-0lax"></th>' ;
        echo  '  </tr>' ;
        echo  '  <tr>' ;
        echo  '    <td class="bseoni-0lax"><img class="yoast" src="' . esc_url( plugins_url( 'images/Yoast_Icon.png', dirname( __FILE__ ) ) ) . '"></td>' ;
        echo  '    <td class="bseoni-0lax"><img class="aioseo" src="' . esc_url( plugins_url( 'images/aioseo.jpg', dirname( __FILE__ ) ) ) . '"></td>' ;
        echo  '  </tr>' ;
        echo  '  <tr>' ;
        echo  '    <td class="bseoni-0lax"><h3>Index and Follow lights</h3></td>' ;
        echo  '    <td class="bseoni-0lax"><h3>Woocommerce Products</h3></td>' ;
        echo  '  </tr>' ;
        echo  '  <tr>' ;
        echo  '    <td class="bseoni-0lax"><img class="signals" src="' . esc_url( plugins_url( 'images/signals.jpg', dirname( __FILE__ ) ) ) . '"></td>' ;
        echo  '    <td class="bseoni-0lax">' ;
        echo  '<ul>' ;
        echo  '<li><strong>WooCommerce Products</strong></li>' ;
        echo  '<li><strong>Product categories</strong></li>' ;
        echo  '<li><strong>Product tags</strong></li>' ;
        echo  '<li><strong>Post categories</strong></li>' ;
        echo  '<li><strong>Post tags</strong></li>' ;
        echo  '<li><strong>One click remove all settings option</strong></li>' ;
        echo  '<li><strong>One on one support</strong></li>' ;
        echo  '</ul>' ;
        echo  '    </td>' ;
        echo  '  </tr>' ;
        echo  '</table>' ;
        echo  '<br>' ;
        echo  '<a class="bseoni-upgrade" href="' . ubsnsupr_fs()->get_upgrade_url() . '">' . __( 'Upgrade Now!', 'ultimate-bulk-seo-noindex-nofollow-speed-up-penalty-recovery' ) . '</a>' ;
        echo  '<p class="bseoni-use-free">Don\'t need these features? Not to worry. You can still use this powerful and fast plugin on the post and page list view. Simply select the posts (or pages) to noindex or nofollow, select the bulk action then click apply and the job is done. When you visit the post or page you\'ll see in the source code that it is now noindexed or nofollowed or both</p>' ;
        echo  '
    </section>' ;
    }

}

function bseoni_options_page()
{
    ?>
	<form action='options.php' method='post'>

		<h2>Ultimate Bulk SEO Noindex Nofollow - Speed up Penalty Recovery</h2>
		<p><strong>Note about changing settings:</strong> If you change a post or page and the results aren't reflected on the visitor facing side ensure that you clear the cache and check the page and source in a private incognito browser.</p>

		<?php 
    settings_fields( 'bseoni' );
    do_settings_sections( 'bseoni' );
    ?>

	</form>
	<?php 
}

include 'bulk-seo-pages.php';
include 'bulk-seo-posts.php';
include 'posts-type-bulk-selector.php';
include 'page-type-bulk-selector.php';

if ( ubsnsupr_fs()->is_not_paying() ) {
    function general_admin_notices()
    {
        global  $pagenow ;
        echo  '<div class="notice notice-warning is-dismissible">
             <p>Has <b>Ultimate Bulk SEO Noindex Nofollow</b> been useful? Why not leave a <a href="https://wordpress.org/plugins/search/ultimate-bulk-seo-noindex-nofollow-speed-up-penalty-recovery/">5 star review?</a> Need more features and control? <a href="https://wizplugins.com/plugin-product/ultimate-bulk-no-index-no-follow-wordpress-plugin/">Upgrade to pro</a></p>
         </div>' ;
    }
    
    add_action( 'admin_notices', 'general_admin_notices' );
}
