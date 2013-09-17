jQuery(document).ready(function(){

	jQuery('#logo_options').change(function() {
		var logo_drop = jQuery('#logo_options option:selected').val();
		if(logo_drop === "yes") {
			jQuery('#squar3d_theme_options_logo_url').show();
		} else {
			jQuery('#squar3d_theme_options_logo_url').hide();
		}
	}).change();

    jQuery('input.regular-text').change(function () {
		if (jQuery(this).val().length === 0) {
			jQuery(this).parent('.metro-icon').removeClass('active');
		} else {
			jQuery(this).parent('.metro-icon').addClass('active');
		}
	});

	jQuery('input.regular-text').each(function () {
		if (jQuery(this).val().length !== 0) {
			jQuery(this).parent('.metro-icon').addClass('active');
		}
	});

	jQuery('input.regular-text').click(function () {
		jQuery(this).select();
	});

	jQuery('.metro-icon').click(function () {
		jQuery(this).children('input').focus();
	});

	jQuery('#color_scheme').change(function(){
		var color = jQuery('#color_scheme option:selected').val();
		jQuery('#preview').removeClass().addClass(color);
	});

	jQuery('#color_scheme').change(function() {
		var color = jQuery('#color_scheme option:selected').val();
		jQuery('#preview').removeClass().addClass(color);
	}).change();

	jQuery('#color_scheme').change(function() {
		var scheme_drop = jQuery('#color_scheme option:selected').val();
		if(scheme_drop !== "default, none") {
			jQuery('#color_scheme_custom').val('');
		}
	});

	/* Assign .wps-panel-active class to the first section link and the first section content */
    jQuery('#wps-panel-sidebar a:first').addClass('wps-panel-active');
    jQuery('#wps-panel-content .wps-panel-section:first').addClass('wps-panel-active');
     
    /* Handle the section change when a section link is clicked */
    jQuery('#wps-panel-sidebar a').click(function(e){
         
        /* Prevent default behaviour */
        e.preventDefault();
         
        /* Get the section id */
        var section_id = jQuery(this).attr('href');
         
        /* Remove .wps-panel-active class from the previous section link and add it to the new one */
        jQuery('#wps-panel-sidebar .wps-panel-active').removeClass('wps-panel-active');
        jQuery(this).addClass('wps-panel-active');
         
        /* Add .wps-panel-active class to the new section content and remove it from the previous one */
        jQuery('#wps-panel-content .wps-panel-section' + section_id).addClass('wps-panel-active').siblings('.wps-panel-active').removeClass('wps-panel-active');
         
    });


});