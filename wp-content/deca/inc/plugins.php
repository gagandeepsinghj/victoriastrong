<?php
/*
Description: Plugins Inclusion
Theme: DECA
*/

// Require the TGM Lib
require_once(UN_THEME_DIR.'inc/plugins/tgm.php');

// Init the Plugins
add_action( 'tgmpa_register', 'un_plugins_init' );

function un_plugins_init() {
	
	// Plugins Array
    $plugins = array(

        array(
            'name'               => 'WPBakery Visual Composer',
            'slug'               => 'js_composer',
            'source'             => UN_THEME_DIR.'inc/plugins/js_composer.zip',
            'required'           => true,
            'version'            => '4.8.1',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '', 
        ),
		
		array(
            'name'               => 'Contact Form 7',
            'slug'               => 'contact-form-7',
            'source'             => UN_THEME_DIR.'inc/plugins/cf7.zip',
            'required'           => true,
            'version'            => '4.3',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '', 
        ),

        array(
            'name'               => 'Visual Composer Responsive Google Map',
            'slug'               => 'vc_gmap_addon',
            'source'             => UN_THEME_DIR.'inc/plugins/vc_gmap_addon.zip',
            'required'           => true,
            'version'            => '1.2',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
        ),

    );

    // Config Settings
    $config = array(
        'default_path' => '',                     
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,                    
        'dismissable'  => false,                    
        'dismiss_msg'  => '',                      
        'is_automatic' => true,                   
        'message'      => '',                      
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'deca'),
            'menu_title'                      => esc_html__( 'Install Plugins', 'deca'),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'deca'), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'deca'),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'deca' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'deca' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'deca' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'deca' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'deca' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'deca' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'deca' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'deca' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'deca' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'deca' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'deca'),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'deca'),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'deca'), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}