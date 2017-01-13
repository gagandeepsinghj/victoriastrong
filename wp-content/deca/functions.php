<?php
/*
Description: WP Functions - Theme init
Theme: DECA
*/

/* *************** */
/*   THEME INIT    */
/* *************** */

// Constants 
define( 'UN_THEME_URI', get_template_directory_uri().'/' );
define( 'UN_THEME_DIR', get_template_directory().'/' );
define( 'UN', 'uncommons' );

// Language
   load_theme_textdomain( 'deca', UN_THEME_DIR . 'languages' );

// Setup
   require(UN_THEME_DIR.'inc/setup.php'); 

// Assets
   require(UN_THEME_DIR.'inc/assets.php');

// Theme Functions
   require(UN_THEME_DIR.'inc/aq_resizer.php');
   require(UN_THEME_DIR.'inc/functions.php');
   
    // CPT Plugin Fix
	if(function_exists('is_plugin_active') && is_plugin_active('deca-cpt/deca-cpt.php')){
		deactivate_plugins( 'deca-cpt/deca-cpt.php', true );
	} 
	
    // CPTs
    require(UN_THEME_DIR.'inc/cpt/un-portfolio.php');
	require(UN_THEME_DIR.'inc/cpt/un-portfolio-categories.php');
	require(UN_THEME_DIR.'inc/cpt/un-case-studies.php');
	require(UN_THEME_DIR.'inc/cpt/un-case-categories.php');

// Plugins
   require(UN_THEME_DIR.'inc/plugins.php');  

// Widgets
	require(UN_THEME_DIR.'inc/widgets/mega-posts.php');
	require(UN_THEME_DIR.'inc/widgets/mega-projects.php');

// Redux Framework
if ( !class_exists( 'ReduxFramework' ) && file_exists( UN_THEME_DIR.'redux/framework.php' ) ) {
	require_once( UN_THEME_DIR.'redux/framework.php' );
}

// Redux Extensions
if( file_exists( UN_THEME_DIR.'inc/redux_ext.php' ) ){
	require_once( UN_THEME_DIR.'inc/redux_ext.php' );
}

// Redux Options
if ( class_exists( 'ReduxFramework' ) && file_exists( UN_THEME_DIR.'inc/options.php' ) ) {
	require_once( UN_THEME_DIR.'inc/options.php' ); 
}

// Redux Metaboxes
if ( class_exists( 'ReduxFramework' ) && file_exists( UN_THEME_DIR.'inc/metaboxes.php' ) ) { 
	require_once( UN_THEME_DIR.'inc/metaboxes.php' ); 
}

// Visual Composer init
if ( defined( 'WPB_VC_VERSION' ) ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/setup.php' ); 
}

// WooCommerce Init
if ( class_exists( 'WooCommerce' ) ) {
	require_once( UN_THEME_DIR.'inc/woocommerce.php' ); 
}

// unCommons News Init
if( file_exists( UN_THEME_DIR.'inc/un_news.php' ) ){
	require_once( UN_THEME_DIR.'inc/un_news.php' ); 
}
