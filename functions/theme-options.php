<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'squar3d_options', 'squar3d_theme_options', 'theme_options_validate' );
}

function admin_register_head() {
    $style = get_template_directory_uri() . '/functions/css/squar3d.css';
    echo "<link rel='stylesheet' type='text/css' href='$style' />\n";

    $icons = get_template_directory_uri() . '/functions/css/wp-metro.min.css';
    echo "<link rel='stylesheet' type='text/css' href='$icons' />\n";

    $schemes = get_template_directory_uri() . '/functions/css/color-schemes.css';
    echo "<link rel='stylesheet' type='text/css' href='$schemes' />\n";

    $js = get_template_directory_uri() . '/functions/js/theme-options.js';
    echo "<script type='text/javascript' src='$js'></script>\n";

}
add_action('admin_head', 'admin_register_head');

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'squar3d-v2' ), __( 'Theme Options', 'squar3d-v2' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create array for logo control
 */
$logo_options = array(
	'0' => array(
		'value' =>	'yes',
		'label' => __( 'yes', 'squar3d' )
	),
	'1' => array(
		'value' =>	'no',
		'label' => __( 'no', 'squar3d' )
	)
);
/**
 * Create array for our color schemes
 */
$select_options = array(
	'0' => array(
		'value' =>	'default',
		'label' => __( 'default - #25c7e9', 'squar3d' )
	),
	'1' => array(
		'value' =>	'custom',
		'label' => __( 'custom', 'squar3d' )
	),
	'2' => array(
		'value' =>	'lime',
		'label' => __( 'lime - #a4c400', 'squar3d' )
	),
	'3' => array(
		'value' => 'green',
		'label' => __( 'green - #60a917', 'squar3d' )
	),
	'4' => array(
		'value' => 'emerald',
		'label' => __( 'emerald - #008a00', 'squar3d' )
	),
	'5' => array(
		'value' => 'teal',
		'label' => __( 'teal - #00aba9', 'squar3d' )
	),
	'6' => array(
		'value' => 'cyan',
		'label' => __( 'cyan - #1ba1e2', 'squar3d' )
	),
	'7' => array(
		'value' => 'cobalt',
		'label' => __( 'cobalt - #0050ef', 'squar3d' )
	),
	'8' => array(
		'value' => 'indigo',
		'label' => __( 'indigo - #6a00ff', 'squar3d' )
	),
	'9' => array(
		'value' => 'violet',
		'label' => __( 'violet - #aa00ff', 'squar3d' )
	),
	'10' => array(
		'value' => 'pink',
		'label' => __( 'pink - #f472d0', 'squar3d' )
	),
	'11' => array(
		'value' => 'magenta',
		'label' => __( 'magenta - #d80073', 'squar3d' )
	),
	'12' => array(
		'value' => 'crimson',
		'label' => __( 'crimson - #a20025', 'squar3d' )
	),
	'13' => array(
		'value' => 'red',
		'label' => __( 'red - #e51400', 'squar3d' )
	),
	'13' => array(
		'value' => 'orange',
		'label' => __( 'orange - #fa6800', 'squar3d' )
	),
	'15' => array(
		'value' => 'amber',
		'label' => __( 'amber - #f0a30a', 'squar3d' )
	),
	'16' => array(
		'value' => 'yellow',
		'label' => __( 'yellow - #e3c800', 'squar3d' )
	),
	'17' => array(
		'value' => 'brown',
		'label' => __( 'brown - #825a2c', 'squar3d' )
	),
	'18' => array(
		'value' => 'olive',
		'label' => __( 'olive - #6d8764', 'squar3d' )
	),
	'19' => array(
		'value' => 'steel',
		'label' => __( 'steel - #647687', 'squar3d' )
	),
	'20' => array(
		'value' => 'mauve',
		'label' => __( 'mauve - #76608a', 'squar3d' )
	),
	'21' => array(
		'value' => 'sienna',
		'label' => __( 'sienna - #7a3b3f', 'squar3d' )
	),
	'22' => array(
		'value' => 'taupe',
		'label' => __( 'taupe - #87794e', 'squar3d' )
	)
);

/**
 * Create array for search position
 */
$search_options = array(
	'0' => array(
		'value' =>	'above',
		'label' => __( 'above header', 'squar3d' )
	),
	'1' => array(
		'value' =>	'below',
		'label' => __( 'below main navigation', 'squar3d' )
	),
	'2' => array(
		'value' =>	'none',
		'label' => __( 'do not display', 'squar3d' )
	)
);

/**
 * Create array for tagline control
 */
$tagline_options = array(
	'0' => array(
		'value' =>	'yes',
		'label' => __( 'yes', 'squar3d' )
	),
	'1' => array(
		'value' =>	'no',
		'label' => __( 'no', 'squar3d' )
	)
);


/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $search_options, $tagline_options, $logo_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>

	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'squar3d-v2' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'squar3d-v2' ); ?></strong></p></div>
		<?php endif; ?>

		<div id="wps-panel">

			<div id="wps-panel-sidebar">
				<ul>
					<li><a href="#wps-panel-section-general">General</a></li>
					<li><a href="#wps-panel-section-appearance">Appearance</a></li>
					<li><a href="#wps-panel-section-social">Social</a></li>
					<li><a href="#wps-panel-section-footer">Footer</a></li>
				</ul>
	    	</div><!-- #wps-panel-sidebar -->

	    	<div id="wps-panel-content">

		<form method="post" action="options.php">
			<?php settings_fields( 'squar3d_options' ); ?>
			<?php $options = get_option( 'squar3d_theme_options' ); ?>

				<?php
				/**
				 * Logos
				 */
				?>
			<div class="wps-panel-section" id="wps-panel-section-general">

				<div class="section squared">
					<h3><?php _e( 'Logo', 'squar3d-v2' ); ?></h3>
					<label class="description" for="squar3d_theme_options[logoinput]"><?php _e( 'Show logo image?', 'squar3d' ); ?></label>
					<select name="squar3d_theme_options[logoinput]" id="logo_options">
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
					<div id="squar3d_theme_options_logo_url">
						<?php 
							$logo = array( array( 
								"Input" => "logo", 
								"Label" => "URL (maximum width 510px):"
							)
						);
							foreach ( $logo as $input ) {
							echo "<p><label class='description' for='squar3d_theme_options[".$input['Input']."]'>".$input['Label']."</label><br/><input id='squar3d_theme_options[".$input['Input']."]' class='regular-text' type='text' name='squar3d_theme_options[".$input['Input']."]' value='";
							echo esc_attr_e( $options[$input['Input']] );
							echo "' /></p>";
						} ?>
					</div>

					<h3><?php _e( 'Other Images', 'squar3d-v2' ); ?></h3>
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
						echo "<p><label class='description' for='squar3d_theme_options[".$input['Input']."]'>".$input['Label']."</label><br/><input id='squar3d_theme_options[".$input['Input']."]' class='regular-text' type='text' name='squar3d_theme_options[".$input['Input']."]' value='";
						echo esc_attr_e( $options[$input['Input']] );
						echo "' /></p>";
					} ?>
				</div>
				<div class="section squared">
					<h3><?php _e( 'Search Field Placement', 'squar3d-v2' ); ?></h3>
					<label class="description" for="squar3d_theme_options[searchinput]"><?php _e( 'Select a position:', 'squar3d' ); ?></label>
					<select name="squar3d_theme_options[searchinput]">
						<?php
							$selected = $options['searchinput'];
							$p = '';
							$r = '';

							foreach ( $search_options as $option ) {
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

			</div><!-- #wps-panel-section-general -->

			 <div class="wps-panel-section" id="wps-panel-section-appearance">

				<?php
				/**
				 * Color Scheme
				 */
				?>
				<div class="section squared">
					<h3><?php _e( 'Color Scheme', 'squar3d-v2' ); ?></h3>
					<label class="description" for="squar3d_theme_options[schemeinput]"><?php _e( 'Select a color scheme:', 'squar3d' ); ?></label>
					<select id="color_scheme" name="squar3d_theme_options[schemeinput]">
						<?php
							$selected = $options['schemeinput'];
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
				<div class="section squared">
					<h3><?php _e( 'Custom Stylesheet', 'squar3d-v2' ); ?></h3>
					<?php 
						$stylesheet = array( array(
							"Input" => "custom-stylesheet", 
							"Label" => 'Stylesheet Filename (upload to "squar3d" theme folder):'
						)
					);
						foreach ( $stylesheet as $input ) {
						echo "<label class='description' for='squar3d_theme_options[".$input['Input']."]'>".$input['Label']."</label><br/><input id='color_scheme_custom' class='regular-text' type='text' name='squar3d_theme_options[".$input['Input']."]' value='";
						echo esc_attr_e( $options[$input['Input']] );
						echo "' />";
					} ?>
				</div>
				<div class="section squared">
					<h3><?php _e( 'CSS Overrides', 'squar3d-v2' ); ?></h3>
					<?php 
						$css_override = array( array(
							"Input" => "css_override", 
							"Label" => 'For simple overriding of CSS properties. Insert CSS here, no need for opening or closing stylesheet tags:'
						)
					);
						foreach ( $css_override as $input ) {
						echo "<p><label class='description' for='squar3d_theme_options[".$input['Input']."]'>".$input['Label']."</label><br/><textarea id='squar3d_theme_options[".$input['Input']."]' class='textarea' name='squar3d_theme_options[".$input['Input']."]'>";
						echo esc_attr_e( $options[$input['Input']] );
						echo "</textarea>";
					} ?>
				</div>
				<div class="section squared">
					<h3><?php _e( 'Show site tagline under logo?', 'squar3d-v2' ); ?></h3>
					<label class="description" for="squar3d_theme_options[taglineinput]"><?php _e( 'Yes or No:', 'squar3d' ); ?></label>
					<select name="squar3d_theme_options[taglineinput]">
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

			</div><!-- #wps-panel-section-appearance -->

			<div class="wps-panel-section" id="wps-panel-section-social">

				<?php
				/**
				 * Social Icons
				 */
				?>
				<div class="section squared">
					<h3><?php _e( 'Footer Social Icons', 'squar3d-v2' ); ?></h3>

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
						echo "<div id='".$input['Input']."' class='metro-icon'><i class='".$input['Icon']."'></i><label class='description' for='squar3d_theme_options[".$input['Input']."]'>".$input['Label']."</label><input id='squar3d_theme_options[".$input['Input']."]' class='regular-text' type='text' name='squar3d_theme_options[".$input['Input']."]' value='";
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
				<div class="section squared">
					<h3><?php _e( 'Footer Options', 'squar3d-v2' ); ?></h3>

					<?php 
						$footer = array( array(
							"Input" => "footer-text", 
							"Label" => "Insert Text Right of Copyright (HTML allowed):"
							),
						array(
							"Input" => "google-analytics", 
							"Label" => "Google Analytics Code"
						)
					);
						foreach ( $footer as $input ) {
						echo "<p><label class='description' for='squar3d_theme_options[".$input['Input']."]'>".$input['Label']."</label><br/><textarea id='squar3d_theme_options[".$input['Input']."]' class='textarea' name='squar3d_theme_options[".$input['Input']."]'>";
						echo esc_attr_e( $options[$input['Input']] );
						echo "</textarea>";
					} ?>

				</div>

			</div><!-- #wps-panel-section-misc -->

		</div><!-- #wps-panel-content -->
     
	</div><!-- #wps_panel -->

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'squar3d-v2' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $search_options, $tagline_options, $logo_options;

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
	foreach( $inputValidateArray as $key => $value) {
		$input[$value] = wp_filter_nohtml_kses( $input[$value] );
	}

	$inputValidateArray;
	$inputValidateArray["footer-text"] = "footer-text";
	$inputValidateArray["google-analytics"] = "google-analytics";
	$inputValidateArray["custom-stylesheet"] = "custom-stylesheet";
	$inputValidateArray["css_override"] = "css_override";
	foreach( $inputValidateArray as $key => $value) {
		$input[$value] = $input[$value];
	}

	$input['searchinput'] = $input['searchinput'];
	$input['schemeinput'] = $input['schemeinput'];
	$input['taglineinput'] = $input['taglineinput'];
	$input['logoinput'] = $input['logoinput'];

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/