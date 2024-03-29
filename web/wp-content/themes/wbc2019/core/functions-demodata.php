<?php

/**
 * Title: Feedback
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

function cyberchimps_demodata_style() {
	
	// Set template directory uri
	$directory_uri = get_template_directory_uri();
	
	wp_enqueue_style( 'about_style', get_template_directory_uri() . '/core/css/options.css' );
	
	wp_enqueue_script( 'responsive_jquery_validation', get_stylesheet_directory_uri() . '/core/js/jquery.validate.min.js', array(), true );
	wp_enqueue_script( 'responsive_jquery_validationform', get_stylesheet_directory_uri() . '/core/js/validation.js', array(), true );
}

function cyberchimps_add_demodata() {
	$page = add_theme_page(
			'Theme Demo Data',
			'Theme Demo Data',
			'administrator',
			'responsive-demodata',
			'cyberchimps_display_email'
	);

	add_action( 'admin_print_styles-' . $page, 'cyberchimps_demodata_style' );
}

add_action( 'admin_menu', 'cyberchimps_add_demodata' );

function responsive_sender_email($sent_from)
{
	return $_POST['ccemail'];
}
function responsive_mail_name ($sent_from)
{
	return $_POST['ccemail']; 
}
function cyberchimps_display_email() {
	$strResponseMessage ='';
	$to = 'support@cyberchimps.com';
	if (isset($_POST['ccSubmitBtn']))
	{
		//Send mail
		if(!empty($_POST['ccemail']))
		{
			$subject = "Demo Data Request for Responsive Mobile";
			$headers = 'From: '.'<'.$_POST['ccemail'].'>'. "\r\n";			
			
			
			add_filter( 'wp_mail_from', 'responsive_sender_email' );
			add_filter( 'wp_mail_from_name', 'responsive_mail_name' );
			
			if(wp_mail($to, $subject, $headers)) {
				$strResponseMessage = "Thanks, your note is on its way to us now. Be sure to whitelist our mail id support@cyberchimps.com so that our reply doesn't end up in your spam folder. Have a lovely day ahead !";
			} else {
				$strResponseMessage = "Error Sending Mail. Please try submitting the form again.";
			}
		}
	}
	
		
		?>					
				<div class="panel-heading"><h3 class="panel-title" style="line-height: 20px;"><?php echo "Demo Data Request";?></h3></div>				
				<div class="panel panel-primary">
				<?php if ($strResponseMessage != '' ) { ?> 
					<span class="updateres"> <?php echo $strResponseMessage; ?></span>
				<?php } else { ?>	
				
<span class="ccinfo"><?php _e("Please enter your email ID and click on Send to receive the demo data for Responsive Mobile (Responsive ii).",'responsive-mobile') ?></span>
		
					
				      <div class="panel-body">
						<form action="" id="formfeedback" method="post">
							 <div class="form-group">								
								<label for="ccemail">Email Id</label>
							    <input type="text" id="ccemail" class="form-control" name="ccemail" placeholder="Enter Email Id" data-placement="right" title="Please Enter Email Id" value="<?php ?>"/>
						   </div>
						   <input type="submit" id="ccSubmitBtn" name="ccSubmitBtn" class="button button-primary" value="Send">						   
					   </form>
					</div>
				</div>	
			<?php }?>				 	   
		<?php 	 			
}