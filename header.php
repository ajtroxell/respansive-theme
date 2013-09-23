<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>><!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>
		<?php if (function_exists('is_tag') && is_tag()) { echo 'Tag Archive for &quot;'.$tag.'&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' Archive - '; } elseif (is_search()) { echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' - '; } elseif (is_404()) { echo 'Not Found - '; } if (is_home()) { bloginfo('name'); echo ' - '; bloginfo('description'); } else { bloginfo('name'); } ?>
	</title>

	<!-- Included CSS Files (Compressed) -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/master.css">

	<?php $options = get_option('respansive_options'); if (($options['schemeinput'] == 'default')) { echo ""; } elseif (($options['schemeinput'] == 'none')) { echo ""; } else { echo "<link rel='stylesheet' href='".get_template_directory_uri()."/assets/css/color-schemes/".$options['schemeinput'].".css'>"; } ?>
	<?php $options = get_option('respansive_options'); if ($options['custom-stylesheet']) { echo "<link rel='stylesheet' href='".get_template_directory_uri()."/".$options['custom-stylesheet'].".css'>"; } ?>
	<?php $options = get_option('respansive_options'); if ($options['css_override']) { echo "<style type='text/css'>".$options['css_override']."</style>"; } ?>

	<!-- Google Font -->
	<link href="http://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

	<!-- Foundation Modernizr -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/third_party/foundation/custom.modernizr-ck.js"></script>

	<!-- Fav and touch icons -->
		<?php $options = get_option('respansive_options'); if ($options['ios144']) { echo "<link rel='apple-touch-icon' sizes='144x144' href='".$options['ios144']."'>"; } ?><?php $options = get_option('respansive_options'); if ($options['ios114']) { echo "<link rel='apple-touch-icon' sizes='114x114' href='".$options['ios114']."'>"; } ?><?php $options = get_option('respansive_options'); if ($options['ios72']) { echo "<link rel='apple-touch-icon' sizes='72x72' href='".$options['ios72']."'>"; } ?><?php $options = get_option('respansive_options'); if ($options['ios57']) { echo "<link rel='apple-touch-icon' href='".$options['ios57']."'>"; } ?><?php $options = get_option('respansive_options'); if ($options['favicon']) { echo "<link rel='shortcut icon' href='".$options['favicon']."'>"; } ?>

	<!-- Wordpress Header Scripts -->
		<?php wp_enqueue_script('jquery'); ?>
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>

	<!-- Wordpress XML -->
		<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php echo site_url(); ?>/feed/" />

</head>

<body <?php body_class(); ?>>

<div id="wrap">

	<header class="header-primary">
		<a id="btn-nav" class="button">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/css/images/logo-header.png" alt=""/>
			<?php if ( is_home() || is_front_page() ) {
				echo "<h1>";
				echo bloginfo('name');
				echo "</h1>";
			}
			else {
				echo "<h2>";
				echo bloginfo('name');
				echo "</h2>";
			} ?>
		</a>
		<div id="nav-wrap-primary">
			<button id="btn-search-open">
				<i class="icon-search"></i>
			</button>
			<button id="btn-nav-close">
				<i class="icon-close"></i>
			</button>
			<?php get_search_form(); ?>
			<a href="register" id="btn-register" class="button">
				Get an Account!
			</a>
			<div id="nav-primary" class="menu ls1" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu','container' => '','depth' => 2 ) ); ?>
	        </div>
	        <?php get_template_part('social'); ?>
		</div>
	</header>