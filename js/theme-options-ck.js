jQuery(document).ready(function(){jQuery("#logo_options").change(function(){var e=jQuery("#logo_options option:selected").val();e==="yes"?jQuery("#respansive_options_logo_url").show():jQuery("#respansive_options_logo_url").hide()}).change();jQuery("input.regular-text").change(function(){jQuery(this).val().length===0?jQuery(this).parent(".metro-icon").removeClass("active"):jQuery(this).parent(".metro-icon").addClass("active")});jQuery("input.regular-text").each(function(){jQuery(this).val().length!==0&&jQuery(this).parent(".metro-icon").addClass("active")});jQuery("input.regular-text").click(function(){jQuery(this).select()});jQuery(".metro-icon").click(function(){jQuery(this).children("input").focus()});jQuery("#color_scheme").change(function(){var e=jQuery("#color_scheme option:selected").val();jQuery("#preview").removeClass().addClass(e)});jQuery("#color_scheme").change(function(){var e=jQuery("#color_scheme option:selected").val();jQuery("#preview").removeClass().addClass(e)}).change();jQuery("#color_scheme").change(function(){var e=jQuery("#color_scheme option:selected").val();e!=="default, none"&&jQuery("#color_scheme_custom").val("")});jQuery("#wps-panel-sidebar a:first").addClass("wps-panel-active");jQuery("#wps-panel-content .wps-panel-section:first").addClass("wps-panel-active");jQuery("#wps-panel-sidebar a").click(function(e){e.preventDefault();var t=jQuery(this).attr("href");jQuery("#wps-panel-sidebar .wps-panel-active").removeClass("wps-panel-active");jQuery(this).addClass("wps-panel-active");jQuery("#wps-panel-content .wps-panel-section"+t).addClass("wps-panel-active").siblings(".wps-panel-active").removeClass("wps-panel-active")})});