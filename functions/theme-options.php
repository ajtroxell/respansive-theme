<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'respansive_options', 'respansive_options', 'theme_options_validate' );
}

function admin_register_head() {
    $style = get_template_directory_uri() . '/functions/css/options.css';
    echo "<link rel='stylesheet' type='text/css' href='$style' />\n";

    $icons = get_template_directory_uri() . '/functions/css/wp-metro.min.css';
    echo "<link rel='stylesheet' type='text/css' href='$icons' />\n";

    $themes = get_template_directory_uri() . '/functions/css/themes.css';
    echo "<link rel='stylesheet' type='text/css' href='$themes' />\n";

    $js = get_template_directory_uri() . '/functions/js/theme-options.js';
    echo "<script type='text/javascript' src='$js'></script>\n";

}
add_action('admin_head', 'admin_register_head');

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'respansive' ), __( 'Theme Options', 'respansive' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create array for logo control
 */
$logo_options = array(
	'0' => array(
		'value' =>	'yes',
		'label' => __( 'yes', 'respansive' )
	),
	'1' => array(
		'value' =>	'no',
		'label' => __( 'no', 'respansive' )
	)
);
/**
 * Create array for our color themes
 */
$select_options = array(
	'0' => array(
		'value' =>	'theme-default',
		'label' => __( 'default - #1abc9c', 'respansive' )
	),
	'1' => array(
		'value' =>	'theme-custom',
		'label' => __( 'custom', 'respansive' )
	),
	'2' => array(
		'value' =>	'theme-alizarin',
		'label' => __( 'alizarin - #e74c3c', 'respansive' )
	),
	'3' => array(
		'value' => 'theme-amethyst',
		'label' => __( 'amethyst - #9b59b6', 'respansive' )
	),
	'4' => array(
		'value' => 'theme-belize-hole',
		'label' => __( 'belize hole - #2980B9', 'respansive' )
	),
	'5' => array(
		'value' => 'theme-blue-good',
		'label' => __( 'blue good - #81a4af', 'respansive' )
	),
	'6' => array(
		'value' => 'theme-carrot',
		'label' => __( 'carrot - #e67e22', 'respansive' )
	),
	'7' => array(
		'value' => 'theme-concrete',
		'label' => __( 'concrete - #95A5A6', 'respansive' )
	),
	'8' => array(
		'value' => 'theme-emerald',
		'label' => __( 'emerald - #2ECC71', 'respansive' )
	),
	'9' => array(
		'value' => 'theme-orange',
		'label' => __( 'orange - #F39C12', 'respansive' )
	),
	'10' => array(
		'value' => 'theme-peter-river',
		'label' => __( 'peter river - #3498DB', 'respansive' )
	),
	'11' => array(
		'value' => 'theme-pink-lizard',
		'label' => __( 'pink lizard - #fa2e39', 'respansive' )
	),
	'12' => array(
		'value' => 'theme-pomegranate',
		'label' => __( 'pomegranate - #C0392B', 'respansive' )
	),
	'13' => array(
		'value' => 'theme-pumpkin',
		'label' => __( 'pumpkin - #D35400', 'respansive' )
	),
	'14' => array(
		'value' => 'theme-wet-asphalt',
		'label' => __( 'wet asphalt - #34495E', 'respansive' )
	),
	'15' => array(
		'value' => 'theme-wisteria',
		'label' => __( 'wisteria - #8E44AD', 'respansive' )
	)
);

/**
 * Create array for tagline control
 */
$tagline_options = array(
	'0' => array(
		'value' =>	'yes',
		'label' => __( 'yes', 'respansive' )
	),
	'1' => array(
		'value' =>	'no',
		'label' => __( 'no', 'respansive' )
	)
);

/**
 * Create array for author-box control
 */
$author_options = array(
	'0' => array(
		'value' =>	'yes',
		'label' => __( 'yes', 'respansive' )
	),
	'1' => array(
		'value' =>	'no',
		'label' => __( 'no', 'respansive' )
	)
);

/**
 * Create array for register button control
 */
$register_options = array(
	'0' => array(
		'value' =>	'yes',
		'label' => __( 'yes', 'respansive' )
	),
	'1' => array(
		'value' =>	'no',
		'label' => __( 'no', 'respansive' )
	)
);


/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $tagline_options, $author_options, $logo_options, $register_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>

	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'respansive' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'respansive' ); ?></strong></p></div>
		<?php endif; ?>

		<div id="wps-panel">

			<div id="wps-panel-sidebar">
				<ul>
					<li><a href="#wps-panel-section-logos">Logos</a></li>
					<li><a href="#wps-panel-section-appearance">Appearance</a></li>
					<li><a href="#wps-panel-section-register">Registration</a></li>
					<li><a href="#wps-panel-section-social">Social</a></li>
					<li><a href="#wps-panel-section-footer">Footer</a></li>
				</ul>
	    	</div><!-- #wps-panel-sidebar -->

	    	<div id="wps-panel-content">

		<form method="post" action="options.php">
			<?php settings_fields( 'respansive_options' ); ?>
			<?php $options = get_option( 'respansive_options' ); ?>

				<?php
				/**
				 * Logos
				 */
				?>
			<div class="wps-panel-section" id="wps-panel-section-logos">

				<div class="section respansive">
					<h3><?php _e( 'Logo', 'respansive' ); ?></h3>
					<label class="description" for="respansive_options[logoinput]"><?php _e( 'Show logo image?', 'respansive' ); ?></label>
					<select name="respansive_options[logoinput]" id="logo_options">
						<?php
							$selected = $options['logoinput'];
							$p = '';
							$r = '';

							foreach ( $logo_options as $option ) {
								$label = $option['label'];
								if ( $selected == $option['value'] ) // Make default first in list
									$p = "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								else
									$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
							}
							echo $p . $r;
						?>
					</select>
					<p>If you do not want to use a logo image your title will be shown via an H1 tag for the home page and H2 tag for subsequent pages.</p>
					<div id="respansive_options_logo_url">
						<?php 
							$logo = array( array( 
								"Input" => "logo", 
								"Label" => "URL (maximum width 510px):"
							)
						);
							foreach ( $logo as $input ) {
							echo "<p><label class='description' for='respansive_options[".$input['Input']."]'>".$input['Label']."</label><br/><input id='respansive_options[".$input['Input']."]' class='regular-text' type='text' name='respansive_options[".$input['Input']."]' value='";
							echo esc_attr_e( $options[$input['Input']] );
							echo "' /></p>";
						} ?>
					</div>

					<h3><?php _e( 'Other Images', 'respansive' ); ?></h3>
					<?php 
						$images = array( array(
							"Input" => "favicon", 
							"Label" => "Favicon URL (16px by 16px):"
						),
						array( 
							"Input" => "ios144", 
							"Label" => "iOS Icon URL (144px by 144px):"
						),
						array( 
							"Input" => "ios114", 
							"Label" => "iOS Icon URL (114px by 114px):"
						),
						array( 
							"Input" => "ios72", 
							"Label" => "iOS Icon URL (72px by 72px):"
						),
						array( 
							"Input" => "ios57", 
							"Label" => "iOS Icon URL (57px by 57px):"
						)
					);
						foreach ( $images as $input ) {
						echo "<p><label class='description' for='respansive_options[".$input['Input']."]'>".$input['Label']."</label><br/><input id='respansive_options[".$input['Input']."]' class='regular-text' type='text' name='respansive_options[".$input['Input']."]' value='";
						echo esc_attr_e( $options[$input['Input']] );
						echo "' /></p>";
					} ?>
				</div>

			</div><!-- #wps-panel-section-general -->

			<div class="wps-panel-section" id="wps-panel-section-appearance">

				<?php
				/**
				 * Color theme
				 */
				?>
				<div class="section respansive">
					<h3><?php _e( 'Color Theme', 'respansive' ); ?></h3>
					<label class="description" for="respansive_options[themeinput]"><?php _e( 'Select a color scheme:', 'respansive' ); ?></label>
					<select id="color_scheme" name="respansive_options[themeinput]">
						<?php
							$selected = $options['themeinput'];
							$p = '';
							$r = '';

							foreach ( $select_options as $option ) {
								$label = $option['label'];
								if ( $selected == $option['value'] ) // Make default first in list
									$p = "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								else
									$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
							}
							echo $p . $r;
						?>
					</select>
					<div class="color-preview">
						<div id="preview">
							<span>Preview</span>
						</div>
					</div>
				</div>
				<div class="section respansive">
					<h3><?php _e( 'Custom Stylesheet', 'respansive' ); ?></h3>
					<?php 
						$stylesheet = array( array(
							"Input" => "custom-stylesheet", 
							"Label" => 'Stylesheet Filename (upload to "respansive" theme folder):'
						)
					);
						foreach ( $stylesheet as $input ) {
						echo "<label class='description' for='respansive_options[".$input['Input']."]'>".$input['Label']."</label><br/><input id='color_scheme_custom' class='regular-text' type='text' name='respansive_options[".$input['Input']."]' value='";
						echo esc_attr_e( $options[$input['Input']] );
						echo "' />";
					} ?>
				</div>
				<div class="section respansive">
					<h3><?php _e( 'CSS Overrides', 'respansive' ); ?></h3>
					<?php 
						$css_override = array( array(
							"Input" => "css_override", 
							"Label" => 'For simple overriding of CSS properties. Insert CSS here, no need for opening or closing stylesheet tags:'
						)
					);
						foreach ( $css_override as $input ) {
						echo "<p><label class='description' for='respansive_options[".$input['Input']."]'>".$input['Label']."</label><br/><textarea id='respansive_options[".$input['Input']."]' class='textarea' name='respansive_options[".$input['Input']."]'>";
						echo esc_attr_e( $options[$input['Input']] );
						echo "</textarea>";
					} ?>
				</div>
				<div class="section respansive">
					<h3><?php _e( 'Show site tagline on home page?', 'respansive' ); ?></h3>
					<label class="description" for="respansive_options[taglineinput]"><?php _e( 'Yes or No:', 'respansive' ); ?></label>
					<select name="respansive_options[taglineinput]">
						<?php
							$selected = $options['taglineinput'];
							$p = '';
							$r = '';

							foreach ( $tagline_options as $option ) {
								$label = $option['label'];
								if ( $selected == $option['value'] ) // Make default first in list
									$p = "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								else
									$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
							}
							echo $p . $r;
						?>
					</select>
					<p>This is the tagline assigned on the <a href="/wp-admin/options-general.php">General Settings</a> page.</p>
				</div>
				<div class="section respansive">
					<h3><?php _e( 'Show author image and bio on posts?', 'respansive' ); ?></h3>
					<label class="description" for="respansive_options[authorinput]"><?php _e( 'Yes or No:', 'respansive' ); ?></label>
					<select name="respansive_options[authorinput]">
						<?php
							$selected = $options['authorinput'];
							$p = '';
							$r = '';

							foreach ( $author_options as $option ) {
								$label = $option['label'];
								if ( $selected == $option['value'] ) // Make default first in list
									$p = "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								else
									$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
							}
							echo $p . $r;
						?>
					</select>
				</div>

			</div><!-- #wps-panel-section-appearance -->

			<div class="wps-panel-section" id="wps-panel-section-register">

				<div class="section respansive">
					<h3><?php _e( 'Registration', 'respansive' ); ?></h3>
					<label class="description" for="respansive_options[registerinput]"><?php _e( 'Show user registration button in sidebar?', 'respansive' ); ?></label>
					<select name="respansive_options[registerinput]" id="register_options">
						<?php
							$selected = $options['registerinput'];
							$p = '';
							$r = '';

							foreach ( $register_options as $option ) {
								$label = $option['label'];
								if ( $selected == $option['value'] ) // Make default first in list
									$p = "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								else
									$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
							}
							echo $p . $r;
						?>
					</select>
					<p>You can also add a link to your registration page in the main navigation menu.</p>
					
					<h3><?php _e( 'Registration Button Values', 'respansive' ); ?></h3>
					<?php 
						$registerbutton = array( array(
							"Input" => "registerurl", 
							"Label" => "Registration page URL:"
						),
						array( 
							"Input" => "registertext", 
							"Label" => "Registration button text:"
						)
					);
						foreach ( $registerbutton as $input ) {
						echo "<p><label class='description' for='respansive_options[".$input['Input']."]'>".$input['Label']."</label><br/><input id='respansive_options[".$input['Input']."]' class='regular-text' type='text' name='respansive_options[".$input['Input']."]' value='";
						echo esc_attr_e( $options[$input['Input']] );
						echo "' /></p>";
					} ?>
				</div>

			</div><!-- #wps-panel-section-register -->

			<div class="wps-panel-section" id="wps-panel-section-social">

				<?php
				/**
				 * Social Icons
				 */
				?>
				<div class="section respansive">
					<h3><?php _e( 'Social Icons', 'respansive' ); ?></h3>

					<?php 
						$icons = array( array(
							"Icon" => "metro-amazon", 
							"Input" => "input-amazon", 
							"Label" => "Amazon Wishlist/Store URL"
						),
						array( 
							"Icon" => "metro-bitbucket", 
							"Input" => "input-bitbucket", 
							"Label" => "BitBucket URL"
						),
						array( 
							"Icon" => "metro-calendar", 
							"Input" => "input-calendar", 
							"Label" => "Calendar URL"
						),
						array( 
							"Icon" => "metro-chat", 
							"Input" => "input-chat", 
							"Label" => "Chat URL"
						),
						array( 
							"Icon" => "metro-delicious", 
							"Input" => "input-delicious", 
							"Label" => "Delicious Username"
						),
						array( 
							"Icon" => "metro-deviantart", 
							"Input" => "input-deviantart", 
							"Label" => "DeviantArt Username"
						),
						array( 
							"Icon" => "metro-disqus", 
							"Input" => "input-disqus", 
							"Label" => "Disqus Username"
						),
						array( 
							"Icon" => "metro-dribbble", 
							"Input" => "input-dribbble", 
							"Label" => "Dribbble Username"
						),
						array( 
							"Icon" => "metro-earphones", 
							"Input" => "input-earphones", 
							"Label" => "Earphones URL"
						),
						array( 
							"Icon" => "metro-evernote", 
							"Input" => "input-evernote", 
							"Label" => "Evernote Notebook URL"
						),
						array( 
							"Icon" => "metro-excel", 
							"Input" => "input-excel", 
							"Label" => "Excel Spreadsheet URL"
						),
						array( 
							"Icon" => "metro-flickr", 
							"Input" => "input-flickr", 
							"Label" => "Flickr URL"
						),
						array( 
							"Icon" => "metro-github", 
							"Input" => "input-github", 
							"Label" => "GitHub Repo URL"
						),
						array( 
							"Icon" => "metro-githubsolid", 
							"Input" => "input-githubsolid", 
							"Label" => "GitHub(solid icon) Repo URL"
						),
						array( 
							"Icon" => "metro-googleplus", 
							"Input" => "input-googleplus", 
							"Label" => "Google+ URL"
						),
						array( 
							"Icon" => "metro-facebook", 
							"Input" => "input-facebook", 
							"Label" => "Facebook URL"
						),
						array( 
							"Icon" => "metro-lastfm", 
							"Input" => "input-lastfm", 
							"Label" => "Last.fm Username"
						),
						array( 
							"Icon" => "metro-linkedin", 
							"Input" => "input-linkedin", 
							"Label" => "LinkedIn Username"
						),
						array( 
							"Icon" => "metro-mail", 
							"Input" => "input-mail", 
							"Label" => "Email Address <small>(encode first)</small>"
						),
						array( 
							"Icon" => "metro-marketplace", 
							"Input" => "input-marketplace", 
							"Label" => "Marketplace/App URL"
						),
						array( 
							"Icon" => "metro-office", 
							"Input" => "input-office", 
							"Label" => "Office Document URL"
						),
						array( 
							"Icon" => "metro-one-note", 
							"Input" => "input-one-note", 
							"Label" => "OneNote Document URL"
						),
						array( 
							"Icon" => "metro-phone", 
							"Input" => "input-phone", 
							"Label" => "Phone Number"
						),
						array( 
							"Icon" => "metro-rss", 
							"Input" => "input-rss", 
							"Label" => "RSS Feed URL"
						),
						array( 
							"Icon" => "metro-skydrive", 
							"Input" => "input-skydrive", 
							"Label" => "SkyDrive File/Folder URL"
						),
						array( 
							"Icon" => "metro-skype", 
							"Input" => "input-skype", 
							"Label" => "Skype Username"
						),
						array( 
							"Icon" => "metro-soundcloud", 
							"Input" => "input-soundcloud", 
							"Label" => "Sound Username"
						),
						array( 
							"Icon" => "metro-spotify", 
							"Input" => "input-spotify", 
							"Label" => "Spotify User Number"
						),
						array( 
							"Icon" => "metro-steam", 
							"Input" => "input-steam", 
							"Label" => "Steam URL"
						),
						array( 
							"Icon" => "metro-stumbleupon", 
							"Input" => "input-stumbleupon", 
							"Label" => "StumbleUpon Username"
						),
						array( 
							"Icon" => "metro-stumbleuponold", 
							"Input" => "input-stumbleuponold", 
							"Label" => "StumbleUpon(old icon) Username"
						),
						array( 
							"Icon" => "metro-tumblr", 
							"Input" => "input-tumblr", 
							"Label" => "Tumblr Url"
						),
						array( 
							"Icon" => "metro-twitter", 
							"Input" => "input-twitter", 
							"Label" => "Twitter Username"
						),
						array( 
							"Icon" => "metro-vimeo", 
							"Input" => "input-vimeo", 
							"Label" => "Vimeo Video/Profile URL"
						),
						array( 
							"Icon" => "metro-word", 
							"Input" => "input-word", 
							"Label" => "Word Document URL"
						),
						array( 
							"Icon" => "metro-wordpress", 
							"Input" => "input-wordpress", 
							"Label" => "Wordpress Blog URL"
						),
						array( 
							"Icon" => "metro-xbox", 
							"Input" => "input-xbox", 
							"Label" => "Xbox Gamertag"
						),
						array( 
							"Icon" => "metro-youtube", 
							"Input" => "input-youtube", 
							"Label" => "YouTube Username"
						)
					);
						foreach ( $icons as $input ) {
						echo "<div id='".$input['Input']."' class='metro-icon'><i class='".$input['Icon']."'></i><label class='description' for='respansive_options[".$input['Input']."]'>".$input['Label']."</label><input id='respansive_options[".$input['Input']."]' class='regular-text' type='text' name='respansive_options[".$input['Input']."]' value='";
						echo esc_attr_e( $options[$input['Input']] );
						echo "' /></div>";
					} ?>

					<div class="clear"></div>
				</div>

			</div><!-- #wps-panel-section-social -->

			<div class="wps-panel-section" id="wps-panel-section-footer">

				<?php
				/**
				 * Footer
				 */
				?>
				<div class="section respansive">
					<h3><?php _e( 'Footer Options', 'respansive' ); ?></h3>

					<?php 
						$footer = array( array(
							"Input" => "footer-text", 
							"Label" => "Insert text to the right of the Copyright (HTML allowed):"
							),
						array(
							"Input" => "google-analytics", 
							"Label" => "Google Analytics Code"
						)
					);
						foreach ( $footer as $input ) {
						echo "<p><label class='description' for='respansive_options[".$input['Input']."]'>".$input['Label']."</label><br/><textarea id='respansive_options[".$input['Input']."]' class='textarea' name='respansive_options[".$input['Input']."]'>";
						echo esc_attr_e( $options[$input['Input']] );
						echo "</textarea>";
					} ?>

				</div>

			</div><!-- #wps-panel-section-misc -->

		</div><!-- #wps-panel-content -->
     
	</div><!-- #wps_panel -->

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'respansive' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $tagline_options, $author_options, $logo_options, $register_options;

	// Say our text option must be safe text with no HTML tags
	$inputValidateArray;
	$inputValidateArray["input-amazon"] = "input-amazon";
	$inputValidateArray["input-bitbucket"] = "input-bitbucket";
	$inputValidateArray["input-calendar"] = "input-calendar";
	$inputValidateArray["input-chat"] = "input-chat";
	$inputValidateArray["input-delicious"] = "input-delicious";
	$inputValidateArray["input-deviantart"] = "input-deviantart";
	$inputValidateArray["input-disqus"] = "input-disqus";
	$inputValidateArray["input-dribbble"] = "input-dribbble";
	$inputValidateArray["input-earphones"] = "input-earphones";
	$inputValidateArray["input-evernote"] = "input-evernote";
	$inputValidateArray["input-excel"] = "input-excel";
	$inputValidateArray["input-flickr"] = "input-flickr";
	$inputValidateArray["input-github"] = "input-github";
	$inputValidateArray["input-githubsolid"] = "input-githubsolid";
	$inputValidateArray["input-googleplus"] = "input-googleplus";
	$inputValidateArray["input-facebook"] = "input-facebook";
	$inputValidateArray["input-lastfm"] = "input-lastfm";
	$inputValidateArray["input-linkedin"] = "input-linkedin";
	$inputValidateArray["input-mail"] = "input-mail";
	$inputValidateArray["input-marketplace"] = "input-marketplace";
	$inputValidateArray["input-office"] = "input-office";
	$inputValidateArray["input-one-note"] = "input-one-note";
	$inputValidateArray["input-phone"] = "input-phone";
	$inputValidateArray["input-rss"] = "input-rss";
	$inputValidateArray["input-skydrive"] = "input-skydrive";
	$inputValidateArray["input-skype"] = "input-skype";
	$inputValidateArray["input-soundcloud"] = "input-soundcloud";
	$inputValidateArray["input-spotify"] = "input-spotify";
	$inputValidateArray["input-steam"] = "input-steam";
	$inputValidateArray["input-stumbleupon"] = "input-stumbleupon";
	$inputValidateArray["input-stumbleuponold"] = "input-stumbleuponold";
	$inputValidateArray["input-tumblr"] = "input-tumblr";
	$inputValidateArray["input-twitter"] = "input-twitter";
	$inputValidateArray["input-vimeo"] = "input-vimeo";
	$inputValidateArray["input-word"] = "input-word";
	$inputValidateArray["input-wordpress"] = "input-wordpress";
	$inputValidateArray["input-xbox"] = "input-xbox";
	$inputValidateArray["input-youtube"] = "input-youtube";
	$inputValidateArray["favicon"] = "favicon";
	$inputValidateArray["logo"] = "logo";
	$inputValidateArray["ios144"] = "ios144";
	$inputValidateArray["ios114"] = "ios114";
	$inputValidateArray["ios72"] = "ios72";
	$inputValidateArray["ios57"] = "ios57";
	$inputValidateArray["registertext"] = "registertext";
	foreach( $inputValidateArray as $key => $value) {
		$input[$value] = wp_filter_nohtml_kses( $input[$value] );
	}

	$inputValidateArray;
	$inputValidateArray["registerurl"] = "registerurl";
	$inputValidateArray["footer-text"] = "footer-text";
	$inputValidateArray["google-analytics"] = "google-analytics";
	$inputValidateArray["custom-stylesheet"] = "custom-stylesheet";
	$inputValidateArray["css_override"] = "css_override";
	foreach( $inputValidateArray as $key => $value) {
		$input[$value] = $input[$value];
	}

	$input['themeinput'] = $input['themeinput'];
	$input['taglineinput'] = $input['taglineinput'];
	$input['logoinput'] = $input['logoinput'];
	$input['registerinput'] = $input['registerinput'];

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/