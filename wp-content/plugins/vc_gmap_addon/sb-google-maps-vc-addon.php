<?php
/*
	Plugin Name: Visual Composer Responsive Google Maps
	Description: This is a plugin to generate multilingual responsive google maps with different styles and layers. 114 stunning styles available and counting. Nearest Places API.
	Plugin URI: http://plugins.sbthemes.com/responsive-google-maps-vc-addon/
	Version: 1.2
	Author: SB Themes
	Author URI: http://codecanyon.net/user/sbthemes/portfolio?ref=sbthemes
*/

@define(SBVCGMAP_PLUGIN_VERSION, '1.2');													//Plugin Version
@define(SBVCGMAP_PLUGIN_NAME, 'SB Responsive Google Maps');					//Plugin Name
@define(SBVCGMAP_PLUGIN_DIR, trim(plugin_dir_url(__FILE__), '/'));							//Plugin Dir
@define(SBVCGMAP_PLUGIN_PATH, trim(plugin_dir_path(__FILE__), '/'));						//Plugin Path

//Including all common functions
include('inc/functions.php');

//Including admin panel
include('admin/admin-panel.php');

//Including shortcodes
include('shortcodes.php');



