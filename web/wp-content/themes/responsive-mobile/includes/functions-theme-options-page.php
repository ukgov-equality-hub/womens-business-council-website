<?php
/**
 * Theme Options Page
 *
 * Additional content for the theme options page
 *
 * @package      responsive_mobile
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the responsive_mobile Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Theme options upgrade bar
 */
function responsive_mobile_upgrade_bar() {
	// @TODO Update to new theme upsell structure
	?>

	<div class="upgrade-callout">
		<p><img src="<?php echo get_template_directory_uri(); ?>/core/images/chimp.png" alt="CyberChimps"/>
			<?php printf( __( 'Welcome to %s!', 'responsive-mobile' ),
				'Responsive II'
			); ?>
			<?php
			if ( ! class_exists( 'cyberchimpsoptions' ) ) {
				printf( __( 'Go Pro with the %s! - Get 30%% off using <span style="color:red">PROPLUGIN30</span>', 'responsive-mobile' ),
					'<a href="http://cyberchimps.com/store/pro-features/" target="_blank" title="Pro Features Plugin">Pro Features Plugin</a> '
				);
			}
			?>
		</p>
		
	</div>

<?php
}
//add_action( 'responsive_mobile_theme_options', 'responsive_mobile_upgrade_bar', 1 );

/**
 * Theme Options Support and Information
 */
function responsive_mobile_theme_support() {
	?>

	<div id="info-box-wrapper" class="grid col-940">
		<div class="info-box notice">

			<a class="button" href="<?php echo esc_url( 'http://cyberchimps.com/guides/r-free/' ); ?>" title="<?php esc_attr_e( 'Guides', 'responsive-mobile' ); ?>" target="_blank">
				<?php _e( 'Instructions', 'responsive-mobile' ); ?></a>

			<a class="button" href="<?php echo esc_url( 'http://cyberchimps.com/forum/free/responsive-ii/' ); ?>" title="<?php esc_attr_e( 'Help', 'responsive-mobile' ); ?>" target="_blank">
				<?php _e( 'Help', 'responsive-mobile' ); ?></a>

			<a class="button" href="<?php echo esc_url( 'http://cyberchimps.com/showcase/' ); ?>" title="<?php esc_attr_e( 'Showcase', 'responsive-mobile' ); ?>" target="_blank">
				<?php _e( 'Showcase', 'responsive-mobile' ); ?></a>

			<a class="button" href="<?php echo esc_url( 'http://cyberchimps.com/store/' ); ?>" title="<?php esc_attr_e( 'More Themes', 'responsive-mobile' ); ?>" target="_blank">
				<?php _e( 'More Themes', 'responsive-mobile' ); ?></a>

				<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/contact/' ); ?>" title="<?php esc_attr_e( 'Need Customization?', 'responsive-mobile' ); ?>" target="_blank">
				<?php _e( 'Need Customization?', 'responsive-mobile' ); ?></a>
				<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/responsive-mobile/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Leave a star rating', 'responsive-mobile' ); ?>" target="_blank">
				<?php _e( 'Leave a star rating', 'responsive-mobile' ); ?></a>
				
			<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/checkout/?add-to-cart=280534' ); ?>" title="<?php esc_attr_e( 'Theme Demo Data', 'responsive-mobile' ); ?>" target="_blank">
				<?php _e( 'Theme Demo Data', 'responsive-mobile' ); ?></a>				
			<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/store/pro-features/#whygopro' ); ?>" title="<?php esc_attr_e('Why Go Pro?', 'responsive-mobile' ); ?>" target="_blank">	
				<?php _e( 'Why Go Pro?', 'responsive-mobile' ); ?></a>	

		</div>
	</div>

<?php
}
add_action( 'responsive_mobile_theme_options', 'responsive_mobile_theme_support', 2 );

/*
 * Add notification to Reading Settings page to notify if Custom Front Page is enabled.
 *
 * @since    1.9.4.0
 */
function responsive_mobile_front_page_reading_notice() {
	$screen = get_current_screen();
	$responsive_mobile_options = responsive_mobile_get_options();
	if ( 'options-reading' == $screen->id ) {
		$html = '<div class="updated">';
			if ( 1 == $responsive_mobile_options['front_page'] ) {
				$html .= '<p>' . sprintf( __( 'The Custom Front Page is enabled. You can disable it in the <a href="%1$s">theme settings</a>.', 'responsive-mobile' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
			} else {
				$html .= '<p>' . sprintf( __( 'The Custom Front Page is disabled. You can enable it in the <a href="%1$s">theme settings</a>.', 'responsive-mobile' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
			}
		$html .= '</div>';
		echo $html;
	}
}
add_action( 'admin_notices', 'responsive_mobile_front_page_reading_notice' );


function responsive_mobile_admin_bar_site_menu( $wp_admin_bar ) {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	if ( current_user_can( 'edit_theme_options' ) ){
		$wp_admin_bar->add_menu( array(
			'parent' => 'appearance',
			'id'     => 'theme_options',
			'title'  => __( 'Theme Options', 'responsive-mobile' ),
			'href'   => admin_url( 'themes.php?page=theme_options' )
		) );
	}
}
add_action( 'admin_bar_menu', 'responsive_mobile_admin_bar_site_menu', 30 );
