<?php
/**
 * Theme Options Class
 *
 * Creates the options from supplied arrays
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
if ( !defined( 'WPINC' ) ) {
	die;
}

Class Responsive_Options {

	public $options_only;

	public $options;

	public $responsive_mobile_options;

	public static $static_responsive_mobile_options;

	public static $static_default_options;

	protected $default_options;

	/**
	 * Pulls in the arrays for the options and sets up the responsive options
	 *
	 * @param $options array
	 */
	public function __construct( $options ) {
		$this->options            = $options;
		$this->options_only       = $this->get_options_only( $this->options );
		$this->responsive_mobile_options = get_option( 'responsive_mobile_theme_options' );
		$this->default_options    = $this->get_options_defaults( $this->options_only );

		self::$static_responsive_mobile_options = $this->responsive_mobile_options;
		self::$static_default_options    = $this->default_options;

		$this->attributes['onclick'] = 'return confirm("' . __( 'Do you want to restore the default settings?', 'responsive-mobile' ) . __( 'All theme settings will be lost!', 'responsive-mobile' ) . __( 'Click OK to restore.', 'responsive-mobile' ) . '")';

		add_action( 'admin_print_styles-appearance_page_theme_options', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'admin_init', array( $this, 'theme_options_init' ) );
		add_action( 'admin_menu', array( $this, 'theme_page_init' ) );
	}

	/**
	 * Init theme options page
	 */
	public function theme_page_init() {
		// Register the page
		add_theme_page(
			__( 'Theme Options', 'responsive-mobile' ),
			__( 'Theme Options', 'responsive-mobile' ),
			'edit_theme_options',
			'theme_options',
			array( $this, 'theme_options_do_page' )
		);
	}

	/**
	 * Init theme options to white list our options
	 */
	public function theme_options_init() {

		register_setting(
			'responsive_mobile_options',
			'responsive_mobile_theme_options',
			array( &$this, 'theme_options_validate' )
		);
	}

	/**
	 * A safe way of adding JavaScripts to a WordPress generated page.
	 */
	public function admin_enqueue_scripts() {
		//@TODO Make sure the locations still work when in the plugin
		wp_enqueue_style( 'responsive-theme-options' );
		wp_enqueue_script( 'responsive-theme-options' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'jquery-drag-drop', get_template_directory_uri() . '/libraries/js/jquery-ui-1.10.4.custom.min.js', array( 'jquery' ), '20140619', true );
	}

	/**
	 * Create the theme options page container and initialise the render display method
	 */
	public function theme_options_do_page() {

		if ( !isset( $_REQUEST['settings-updated'] ) ) {
			$_REQUEST['settings-updated'] = false;
		}

		?>

		<div class="wrap">
			<?php echo "<h2>" . wp_get_theme() . " " . __( 'Theme Options', 'responsive-mobile' ) . "</h2>"; ?>


			<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
				<div class="updated fade"><p><strong><?php _e( 'Options Saved', 'responsive-mobile' ); ?></strong></p></div>
			<?php endif; ?>

			<?php responsive_mobile_theme_options(); // Theme Options Hook ?>

			<form method="post" action="options.php" enctype="multipart/form-data" >
				<?php settings_fields( 'responsive_mobile_options' ); ?>

				<div class="settings-row">
					<?php
					$this->render_display();
					?>
				</div>
				<!-- .row -->
			</form>
		</div><!-- wrap -->
	<?php
	}

	/**
	 * Displays the options
	 *
	 * Loops through sections array
	 *
	 * @return string
	 */
	public function render_display() {

		foreach ( $this->options as $section ) {
			$this->container( $section['title'], $section['fields'] );
		}
	}

	/**
	 * Creates main sections title and container
	 *
	 * Loops through the sections array
	 *
	 * @param $title string
	 * @param $fields array
	 *
	 * @return string
	 */
	protected function container( $title, $fields ) {

		foreach ( $fields as $field ) {
			$section[] = $this->section( $this->parse_args( $field ) );
		}

		$html = '<h3 class="rwd-toggle">' . esc_html( $title ) . '<a href="#"></a></h3><div class="rwd-container"><div class="rwd-block">';

		foreach ( $section as $option ) {
			$html .= $option;
		}

		$html .= $this->save();
		$html .= '</div><!-- .rwd-block --></div><!-- .rwd-container -->';

		echo $html;

	}

	/**
	 * Creates the title section for each option input
	 *
	 * @param $title string
	 * @param $subtitle string
	 *
	 * @return string
	 */
	protected function sub_heading( $title, $sub_title ) {

		// If width is not set or it's not set to full then go ahead and create default layout
		if ( !isset( $args['width'] ) || $args['width'] != 'full' ) {
			$html = '<div class="col-md-4">';

			$html .= '<h4 class="title">' . $title . '</h4>';

			$html .= ( '' !== $sub_title ) ? '<div class="sub-title"><p>' . $sub_title . '</p></div>' : '';

			$html .= '</div><!-- .col-md-4 -->';

			return $html;

		}
	}

	/**
	 * Creates option section with inputs
	 *
	 * Calls option type
	 *
	 * @param $options array
	 *
	 * @return string
	 */
	protected function section( $options ) {

		$html = '<div class="row">';

		$html .= $this->sub_heading( $options['title'], $options['subtitle'] );

		// If the width is not set to full then create normal size, otherwise create full width
		$html .= ( !isset( $options['width'] ) || $options['width'] != 'full' ) ? '<div class="col-md-8">' : '<div class="col-md-12">';

		$html .= $this->{$options['type']}( $options );

		$html .= '</div>';

		$html .= '</div>';

		return $html;

	}

	/**
	 * Creates text input
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function text( $args ) {

		extract( $args );

		$value = ( !empty( $this->responsive_mobile_options[$id] ) ) ? $this->responsive_mobile_options[$id] : '';

		$html = '<input id="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '" class="regular-text" type="text" name="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '" value="' . esc_html( $value ) . '" placeholder="' . esc_attr( $placeholder ) . '" /><label class="description" for="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '">' . esc_html( $description ) . '</label>';

		return $html;
	}

	/**
	 * Creates upload input
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function upload( $args ) {

		extract( $args );

		$value = ( !empty( $this->responsive_mobile_options[$id] ) ) ? $this->responsive_mobile_options[$id] : '';


		$html = '<div class="grid col-700 media-upload">
                    <input id="responsive_mobile_theme_options_' . $id . '" name="responsive_mobile_theme_options[' . $id . ']" type="text" value="' . esc_attr( $value ) . '" />
                    <label class="description" for="responsive_mobile_theme_options[' . $id . ']">' . $description . '</label>
                    <button class="button upload" name="responsive_mobile_theme_options[' . $id . ']_upload" id="responsive_mobile_theme_options_' . $id . '_upload">' . $button . '</button>
                    </div>
                    <div class="grid col-220 fit media-upload">';
		if( $value != '' ) {
			$html .= '<img src="' . esc_url( $value ) . '" class="upload-image"/>';
		}

		$html .= '</div>';


		return $html;
	}

	/**
	 * Creates text input with color picker.
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function color( $args ) {

		extract( $args );

		$value = ( !empty( $this->responsive_mobile_options[$id] ) ) ? $this->responsive_mobile_options[$id] : '';

		$html = '<input id="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '" class="wp-color-picker regular-text" type="text" name="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '" value="' . esc_html( $value ) . '" placeholder="' . esc_attr( $placeholder ) . '" /><label class="description" for="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '">' . esc_html( $description ) . '</label>';

		return $html;
	}

	/**
	 * Creates textarea input
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function textarea( $args ) {

		extract( $args );

		$class[] = 'large-text';
		$classes = implode( ' ', $class );

		$description = ( '' !== $description ) ? '<label class="description" for="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '">' . esc_html( $description ) . '</label>': '';
		$heading = ( '' !== $heading ) ? '<p>' . esc_html( $heading ) . '</p>' : '';

		$value = ( !empty( $this->responsive_mobile_options[$id] ) ) ? $this->responsive_mobile_options[$id] : '';

		$html = $heading . '<textarea id="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '" class="' . esc_attr( $classes ) . '" cols="50" rows="30" name="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '" placeholder="' . $placeholder . '">' . esc_html( $value ) . '</textarea>' . $description;

		return $html;
	}
	
	/**
	 * Creates export textarea input
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function export( $args ) {

		extract( $args );
		$options = esc_html( serialize( $this->responsive_mobile_options ) );
		$html = '<textarea rows="10" cols="50">' . $options . '</textarea>';
		$html .= '<br/><a class="export-option" href="data:text/octet-stream;charset=utf-8,' . str_replace( "#", "%23", $options ) . '" download="theme-option-backup.txt">Download</a>';
		
		return $html;
	}
	
	/**
	 * Creates import textarea input
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function import( $args ) {

		extract( $args );

		$html = '<textarea name="import" rows="10" cols="50"></textarea>';
		$html .= "<br/><input type='file' id='import_file' name='import_file' />";

		return $html;
	}

	/**
	 * Creates select dropdown input
	 *
	 * Loops through options
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function select( $args ) {

		extract( $args );

		$html = '<select id="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '" name="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '">';
		foreach ( $options as $key => $value ) {
			// looping through and creating all the options and making the one saved in the options as the chosen one otherwise falling back to the default
			$html .= '<option' . selected( ( isset( $this->responsive_mobile_options[$id] ) ) ? $this->responsive_mobile_options[$id] : $default, $key, false ) . ' value="' . esc_attr( $key ) . '">' . esc_html(
					$value
				) .
				'</option>';
		}
		$html .= '</select>';

		return $html;

	}

	/**
	 * Creates checkbox input
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function checkbox( $args ) {

		extract( $args );

		$checked = ( isset( $this->responsive_mobile_options[$id] ) ) ? checked( 1, esc_attr( $this->responsive_mobile_options[$id] ), false ) : checked( 0, 1 );

		$html = '<input id="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '" name="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '" type="checkbox" value="1" ' . $checked . '/><label class="description" for="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '">' . wp_kses_post( $description ) . '</label>';

		return $html;
	}

	/**
	 * Creates a description
	 *
	 * @param $args
	 *
	 * @return string
	 */
	protected function description( $args ) {

		extract( $args );

		$html = '<p>' . wp_kses_post( $description ) . '</p>';

		return $html;
	}

	/**
	 * Creates save, reset and upgrade buttons
	 *
	 * @return string
	 */
	protected function save() {
		$html = '<div class="col-md-12"><p class="submit">' . get_submit_button( __( 'Save Options', 'responsive-mobile' ), 'primary', 'responsive_mobile_theme_options[submit]', false ) . ' ' . get_submit_button( __( 'Restore Defaults', 'responsive-mobile' ), 'secondary', 'responsive_mobile_theme_options[reset]', false, $this->attributes ) . '</p></div>';

		return $html;

	}

	/**
	 * Creates editor input
	 *
	 * @param $args array
	 *
	 * @return string
	 */
	protected function editor( $args ) {

		extract( $args );

		$class[] = 'large-text';
		$classes = implode( ' ', $class );

		$value = ( !empty( $this->responsive_mobile_options[$id] ) ) ? $this->responsive_mobile_options[$id] : '';

		$editor_settings = array(
			'textarea_name' => 'responsive_mobile_theme_options[' . $id . ']',
			'media_buttons' => true,
			'tinymce'       => array( 'plugins' => 'wordpress' ),
			'editor_class'  => esc_attr( $classes )
		);

		$html = '<div class="tinymce-editor">';
		ob_start();
		$html .= wp_editor( $value, 'responsive_mobile_theme_options_' . $id . '_', $editor_settings );
		$html .= ob_get_contents();
		$html .= '<label class="description" for="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '">' . esc_html( $description ) . '</label>';
		$html .= '</div>';
		ob_clean();

		return $html;
	}

	protected function dragdrop( $args ) {
		extract( $args );

		$items = array();

		$original_items = $options['items'];

		// If there is no settings saved just use the original options
		if ( ! isset( $this->responsive_mobile_options[$id] ) || '' === $this->responsive_mobile_options[$id] || 'null' === $this->responsive_mobile_options[$id] ) {
			$items = json_decode( $default, true );
		} else {
			// Get json from saved settings and decode it
			$items = json_decode( $this->responsive_mobile_options[ $id ], true );

		}
			foreach ( $items as $index => $item ) {
				foreach ( $item as $i => $it ) {
					if ( isset( $original_items[$it] ) ) {
						$new_item[$index][$it] = $original_items[$it];
					}
					// Unset it from the original list so that we can see if there are any options left over
					// anything left over will be new options added after the original save
					unset($original_items[$it]);
				}
			}
		
			// After unsetting the original items if there are any left over then we need to add them to the first
			// select box so a user can select it
			if ( !empty( $original_items ) ) {
				foreach( $original_items as $key => $item ) {
					$new_item[0][$key] = $item;
				}
			}

			$items = $new_item;


		// Create the home dropzone to be added at the start of the dropzones array
		$select_items = array(
			'select-items' => 	$options['items_title']
		);
		
		$drop_zones = $select_items + $options['drop_zones'];

		// Create the display html
		$html = '<div id="' . $id . '" class="drag-drop-container row">';

		$i = 0;

		// Make the column size so that it fits in the row
		$col_size = 12 / count( $drop_zones );
		$col_size = intval( $col_size );

		// Loop through the drop zones to create the sections
		foreach ( $drop_zones as $drop_zone => $name ) {
			$html .= '<div class="items-container col-xs-' . $col_size . '">';
			$html .= '<h4>' . $name . '</h4>';
			$html .= '<ul id="' . $drop_zone . '" class="sortable">';

			// If there are items in this drop zone then display them
			if ( isset( $items[$i] ) ) {
				foreach ( $items[$i] as $key => $item ) {
						$html .= '<li id="' . $key . '">' . $item . '</li>';
				}
			}


			$html .= '</ul>';
			$html .= '</div>';

			$i++;
		}
		$html .= '</div>';

		// Hidden text box that will save data
		$value = ( !empty( $this->responsive_mobile_options[$id] ) ) ? $this->responsive_mobile_options[$id] : '';

		$html .= '<input type="hidden" id="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '" name="' . esc_attr( 'responsive_mobile_theme_options[' . $id . ']' ) . '" value="' . esc_html( $value ) . '" />';

		return $html;
	}


	/**
	 * VALIDATION SECTION
	 */

	/**
	 * Initialises the validation of the settings when submitted
	 *
	 * Called by the register_settings()
	 *
	 * @param $input
	 *
	 * @return array|mixed|void
	 */
	public function theme_options_validate( $input ) {
	
		/*
		 * Import functionality
		 *
		 * Both the copy/paste and file upload options are active. First it checks for file, if any file is uploaded then
		 * it processes that. Otherwise it checks if anything is sent with the textarea for the import.
		 */

		global $wp_filesystem;
		
		// Check if any file is uplaoded
		if( isset( $_FILES['import_file'] ) && $_FILES['import_file']['name'] ) {

			// Initialise WP filesystem.
			WP_Filesystem( request_filesystem_credentials( 'options.php', '', false, false, null ) );

			// Get the text of the uploaded file and trim it to remove space from either end.
			$import_file_text = trim( $wp_filesystem->get_contents( $_FILES['import_file']['tmp_name'] ) );

			if( $import_file_text ) {
				$string = stripslashes( $import_file_text );

				// check string is serialized and unserialize it
				if( is_serialized( $string ) ) {
					$try = unserialize( ( $string ) );
				}

				// make sure $try is set with the unserialized data
				if( $try ) {
					add_settings_error( 'responsive_mobile_theme_options', 'imported_success', __( 'Options Imported', 'responsive-mobile' ), 'updated fade' );

					return $try;
				}
				else {
					add_settings_error( 'responsive_mobile_theme_options', 'imported_failed', __( 'Invalid Data for Import', 'responsive-mobile' ), 'error fade' );
				}
			}
		}
		// If no file is uploaded then check for the texarea field for improt option.
		else {
			if( isset( $_POST['import'] ) ) {
				if( trim( $_POST['import'] ) ) {

					$string = stripslashes( trim( $_POST['import'] ) );

					// check string is serialized and unserialize it
					if( is_serialized( $string ) ) {
						$try = unserialize( ( $string ) );
					}

					// make sure $try is set with the unserialized data
					if( $try ) {
						add_settings_error( 'responsive_mobile_theme_options', 'imported_success', __( 'Options Imported', 'responsive-mobile' ), 'updated fade' );

						return $try;
					}
					else {
						add_settings_error( 'responsive_mobile_theme_options', 'imported_failed', __( 'Invalid Data for Import', 'responsive-mobile' ), 'error fade' );
					}
				}
			}
		}
		/********************* End of Import Options functionality ************************/
		
		$defaults = $this->default_options;
		if ( isset( $input['reset'] ) ) {

			$input = $defaults;

		} else {

			// remove the submit button that gets included in the $input
			unset ( $input['submit'] );

			// add missing checkbox values that don't get added when they are unchecked
			$input = $this->add_missing_checkboxes( $input );

			$options = $this->options_only;

			$input = $input ? $input : array();
			$input = apply_filters( 'responsive_mobile_settings_sanitize', $input );

			// Loop through each setting being saved and pass it through a sanitization filter
			foreach ( $input as $key => $value ) {

				$validate = isset( $options[$key]['validate'] ) ? $options[$key]['validate'] : false;

				if ( $validate ) {
					$input[$key] = $this->{'validate_' . $validate}( $value, $key );
				} else {
					// TODO could do with returning error message
					//return;
				}

			}

		}

		return $input;
	}

	/**
	 * Validates checkbox
	 *
	 * checks if the value submitted is a boolean value
	 *
	 * @param $input
	 * @param $key
	 *
	 * @return null
	 */
	protected function validate_checkbox( $input, $key ) {

		// if the input is anything other than a 1 make it a 0
		if ( 1 == $input ) {
			$input = 1;
		} else {
			$input = 0;
		}

		return $input;
	}

	/**
	 * Validates a dropdown select option
	 *
	 * checks that the value is available in the options, if it can't find it then to return the default
	 *
	 * @param $input
	 * @param $key
	 *
	 * @return mixed
	 */
	protected function validate_select( $input, $key ) {

		$options = $this->options_only[$key];
		$input   = ( array_key_exists( $input, $options['options'] ) ? $input : $this->default_options[$key] );

		return $input;
	}

	public static function responsive_mobile_categorylist_validate() {
		// An array of valid results
		$args = array(
				'type'         => 'post',
				'orderby'      => 'name',
				'order'        => 'ASC',
				'hide_empty'   => 1,
				'hierarchical' => 1,
				'taxonomy'     => 'category'
		);
		$option_categories = array();
		$category_lists = get_categories( $args );
		$option_categories[''] = esc_html(__( 'Choose Category', 'responsive-mobile' ));
		foreach( $category_lists as $category ){
			$option_categories[$category->term_id] = $category->name;
		}
		return $option_categories;		
	}

	/**
	 * Validates the editor textarea
	 *
	 * @param $input
	 * @param $key
	 *
	 * @return string
	 */
	protected function validate_editor( $input, $key ) {

		$input = wp_kses_stripslashes( $input );

		return $input;
	}

	/**
	 * Validates/sanitizes a url
	 *
	 * @param $input
	 * @param $key
	 *
	 * @return string
	 */
	protected function validate_url( $input, $key ) {

		$input = esc_url_raw( $input );

		return $input;
	}

	/**
	 * Validates/sanitizes a text input
	 *
	 * @param $input
	 * @param $key
	 *
	 * @return string
	 */
	protected function validate_text( $input, $key ) {

		$input = sanitize_text_field( $input );

		return $input;
	}

	/**
	 * Validates the css textarea
	 *
	 * @param $input
	 * @param $key
	 *
	 * @return string
	 */
	public function validate_css( $input, $key ) {

		$input = wp_kses_stripslashes( $input );

		$input = wp_kses_post( $input );

		return $input;
	}

	/**
	 * Validates the javascript textarea
	 *
	 * @param $input
	 * @param $key
	 *
	 * @return string
	 */
	protected function validate_js( $input, $key ) {

		$input = wp_kses_stripslashes( $input );

		return $input;
	}

	/**
	 * Validates the Drag and Drop
	 *
	 * Checks input against defaults and if there is no match it removes it
	 *
	 * @param $input
	 * @param $key
	 *
	 * @return mixed|string|void
	 */
	protected function validate_drag_drop( $input, $key ) {

			// Get the defaults
			$defaults = $this->default_options;
			$defaults = json_decode( $defaults[$key], true );

		if ( '' !== $input && 'null' !== $input ) {
			$decoded = json_decode( $input, true );
	
			$single_default = array();
			// break defaults down into a single array
			foreach( $defaults as $default ) {
				foreach( $default as $single ) {
					$single_default[] = $single;
				}
			}
	
			foreach ( $decoded as $i => $items ) {
				foreach ( $items as $i2 => $item ) {
					if ( ! in_array( $item, $single_default ) ) {
						unset( $decoded[$i][$i2] );
					}
				}
	
			}
	
			return json_encode( $decoded );
		} else {
			return json_encode( $defaults );
		}
	}

	/**
	 * Removes the sections from the options array given in construct
	 * and sets the id as the key
	 *
	 * @param $options
	 */
	protected function get_options_only( $options ) {
		$new_array = array();
		foreach ( $options as $option ) {
			foreach ( $option['fields'] as $opt ) {
				$new_array[$opt['id']] = $opt;
			}

		}

		return $new_array;
	}

	/**
	 * Adds missing checkboxes
	 *
	 * When checkboxes are not checked they are not added to database leaving some undefined indexes, this adds them in
	 *
	 * @param $input
	 *
	 * @return array
	 */
	protected function add_missing_checkboxes( $input ) {
		$checkboxes = array();
		$new_array  = array();
		$options    = $this->options_only;

		foreach ( $options as $option => $value ) {
			if ( 'checkbox' == $value['type'] ) {
				$checkboxes[$option] = 0;
			}
		}

		$new_array = wp_parse_args( $input, $checkboxes );

		return $new_array;
	}

	/**
	 * Gets the defaults as key => value
	 *
	 * @param $options
	 *
	 * @return array
	 */
	protected function get_options_defaults( $options ) {

		$defaults = array();
		foreach ( $options as $option ) {
			$defaults[$option['id']] = $option['default'];
		}

		return $defaults;
	}

	/**
	 * parses the options with the defaults to get a complete array
	 *
	 * @return array
	 */
	public static function get_parse_options() {
		$options = wp_parse_args( self::$static_responsive_mobile_options, self::$static_default_options );

		return $options;
	}

	/**
	 * Makes sure that every option has all the required args
	 *
	 * @param $args array
	 *
	 * @return array
	 */
	protected function parse_args( $args ) {
		$default_args = array(
			'title'       => '',
			'subtitle'    => '',
			'heading'     => '',
			'type'        => 'text',
			'id'          => '',
			'class'       => array(),
			'description' => '',
			'placeholder' => '',
			'options'     => array(),
			'default'     => '',
			'validate'    => '',
			'options'     => array()
		);

		$result = array_merge( $default_args, $args );

		return $result;
	}
}
