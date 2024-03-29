<?php
/**
 * Sidebars
 *
 * Register Sidebars
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
 * Register widgetized area and update sidebar with default widgets.
 */
function responsive_mobile_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'responsive-mobile' ),
		'description'   => __( 'Area 1 - sidebar.php - Displays on Default, Blog, Blog Excerpt page templates', 'responsive-mobile' ),
		'id'            => 'main-sidebar',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'responsive-mobile' ),
		'description'   => __( 'Area 2 - sidebar-right.php - Displays on Content/Sidebar page templates', 'responsive-mobile' ),
		'id'            => 'right-sidebar',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'responsive-mobile' ),
		'description'   => __( 'Area 3 - sidebar-left.php - Displays on Sidebar/Content page templates', 'responsive-mobile' ),
		'id'            => 'left-sidebar',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Left Sidebar Half Page', 'responsive-mobile' ),
		'description'   => __( 'Area 4 - sidebar-left-half.php - Displays on Sidebar Half Page/Content page templates', 'responsive-mobile' ),
		'id'            => 'left-sidebar-half',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Right Sidebar Half Page', 'responsive-mobile' ),
		'description'   => __( 'Area 5 - sidebar-right-half.php - Displays on Content/Sidebar Half Page page templates', 'responsive-mobile' ),
		'id'            => 'right-sidebar-half',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Home Widget 1', 'responsive-mobile' ),
		'description'   => __( 'Area 6 - sidebar-home.php - Displays on the Home Page', 'responsive-mobile' ),
		'id'            => 'home-widget-1',
		'before_title'  => '<div id="widget-title-one" class="widget-title-home"><h3 class="widget-title-home">',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Home Widget 2', 'responsive-mobile' ),
		'description'   => __( 'Area 7 - sidebar-home.php - Displays on the Home Page', 'responsive-mobile' ),
		'id'            => 'home-widget-2',
		'before_title'  => '<div id="widget-title-two" class="widget-title-home"><h3 class="widget-title-home">',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Home Widget 3', 'responsive-mobile' ),
		'description'   => __( 'Area 8 - sidebar-home.php - Displays on the Home Page', 'responsive-mobile' ),
		'id'            => 'home-widget-3',
		'before_title'  => '<div id="widget-title-three" class="widget-title-home"><h3 class="widget-title-home">',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Gallery Sidebar', 'responsive-mobile' ),
		'description'   => __( 'Area 9 - sidebar-gallery.php - Displays on the page after an image has been clicked in a Gallery', 'responsive-mobile' ),
		'id'            => 'gallery-widget',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Colophon Widget', 'responsive-mobile' ),
		'description'   => __( 'Area 10 - sidebar-colophon.php, 100% width Footer widgets', 'responsive-mobile' ),
		'id'            => 'colophon-widget',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="colophon-widget widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Top Widget', 'responsive-mobile' ),
		'description'   => __( 'Area 11 - sidebar-top.php - Displays on the right of the header', 'responsive-mobile' ),
		'id'            => 'top-widget',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="responsive-mobile-top-widget %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget', 'responsive-mobile' ),
		'description'   => __( 'Area 12 - sidebar-footer.php - Maximum of 3 widgets per row', 'responsive-mobile' ),
		'id'            => 'footer-widget',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>'
	) );
}
add_action( 'widgets_init', 'responsive_mobile_widgets_init' );

function responsive_mobile_footer_widget_param( $params )
{
	global $footer_widget_counter_rm;
	$responsive_mobile_options = responsive_mobile_get_options();
	
	if (isset($responsive_mobile_options['footer_widget_layout']))
		$layout = $responsive_mobile_options['footer_widget_layout'];
	else
		$layout = '';
	

	//Check if we are displaying "Footer Sidebar"
	if ( $params[0]['id'] == 'footer-widget' ) {

		//Check which footer layout is selcted

		if ($layout == 'footer-2-col')
		{			
			$class                      = 'class="footer-widget-2col ';			
			$params[0]['before_widget'] = preg_replace('/class="/', $class, $params[0]['before_widget'],1 );

		}
		else if ($layout == 'footer-1-col')
		{			
			$class                      = 'class="footer-widget-1col ';			
			$params[0]['before_widget'] = preg_replace('/class="/', $class, $params[0]['before_widget'],1 );

		}
		
	}

	return $params;
}
add_filter( 'dynamic_sidebar_params', 'responsive_mobile_footer_widget_param' );
