<?php

/**
 * Title: About
*
* Description: Displays list of all CyberChimps theme linking to it's pro and free versions.
*
* Please do not edit this file. This file is part of the CyberChimps Framework and all modifications
* should be made in a child theme.
*
* @category CyberChimps Framework
* @package  Framework
* @since    1.0
* @author   CyberChimps
* @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
* @link     http://www.cyberchimps.com/
*/

// Add stylesheet and JS for upsell page.
function cyberchimps_about_style() {

	// Set template directory uri
	$directory_uri = get_template_directory_uri();


	wp_enqueue_style( 'about_style', get_template_directory_uri() . '/css/about.css' );

}

// Add upsell page to the menu.
function cyberchimps_add_about() {
	$page = add_theme_page(
			'About Responsive Mobile',
			'About Responsive Mobile',
			'administrator',
			'cyberchimps-responsive',
			'cyberchimps_display_about'
	);

	add_action( 'admin_print_styles-' . $page, 'cyberchimps_about_style' );
}

add_action( 'admin_menu', 'cyberchimps_add_about' );

// Define markup for the upsell page.
function cyberchimps_display_about() {

	// Set template directory uri
	$theme      = wp_get_theme();
	?>
	<div class="about-container">
		<div>
		<h1 class="heading"><?php echo "Responsive Mobile - ".$theme['Version'] ?></h1>
		<a href='https://wordpress.org/support/theme/responsive-mobile/reviews/#new-post' target="_blank" style='margin-top: 22px' class="button button-primary"><?php _e('Leave a star rating','responsive-mobile')?></a>

		<?php
			$directory_uri = get_template_directory_uri();

		?>
		</div>

		<div class="about-info">	
			<span><img src="<?php echo $directory_uri ?>/images/logo.png"></span>
			<?php printf(  '<p> Responsive II (codename Responsive Mobile) is an HTML Mobile-first responsive WordPress theme that looks classy on any device like iPad, tablet, Desktop, iPhone etc. It has a new light framework. This Free WordPress theme comes with simple but powerful theme options for full CMS control.'
			); ?>
</div>
		
		<div class="features">
			<h2>Why upgrade to Pro?</h2>
			<table class="features-table">
			<thead>
			<tr>
				<th class=""></th>
				<th>Responsive Mobile</th>
				<th>Pro Features Plugin</th>
			</tr>
			<tr>
			<td class="feature">Responsive layout</td>
			<td class="featureyes"><span class='dashicons-before dashicons-yes'></span></td>
			<td class="featureyes"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>

			<tr>
			<td class="feature">Custom Scripts for Header and Footer</td>
			<td class="featureyes"><span class='dashicons-before dashicons-yes'></span></td>
			<td class="featureyes"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>

                        <tr>
			<td class="feature">Ready-to-use Color Schemes (Skins)</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>
                        
			<tr>
			<td class="feature">Change the background image for Contact Form Area</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>

			<td class="feature">Ability to upload custom favicon, apple touch icon</td>
			<td class="featureyes"><span class='dashicons-before dashicons-no-alt'></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>

				<tr>
			<td class="feature">Custom Header, Footer Scripts</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>

			<tr>
			<td class="feature">Typography & Fonts
			</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>
			<tr>
			<td class="feature">Control the meta data displayed on blog posts (author, date, etc.)</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>
			<tr>
			<td class="feature">Show/Hide featured images for your WordPress posts</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>
			<tr>
			<td class="feature">Include post format icons on blog page</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>
			<tr>
			<td class="feature">Custom 404 Page</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>
			<tr>
			<td class="feature">Responsive Videos</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>
			<tr>
			<td class="feature">Gallery Lightbox</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>
			<tr>
			<td class="feature">Control the footer text</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>
			<tr>
			<tr>
			<td class="feature">High Priority Support via Helpdesk</td>
			<td class="featureyes"><span class="dashicons-before dashicons-no-alt"></span></td>
			<td class="featureno"><span class='dashicons-before dashicons-yes'></span></td>
			</tr>
			<tr>

			</thead>
			</table>
		</div>
		<?php
		 if( !class_exists('cyberchimpsoptions') )
					{
		 ?>
		<div class="buy">
		<a class="button button-primary buylink" target="_blank" href="https://cyberchimps.com/store/pro-features/?utm_source=about">Buy Pro Features Plugin</a>
		</div>
		<?php } ?>
	</div>
<?php
}
