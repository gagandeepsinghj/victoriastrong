<?php
/*
Description: VC Sidebar
Theme: Deca
*/

// Block Class 
class unSidebar extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_sidebar_map' ) );
        add_shortcode( 'un_sidebar', array( $this, 'un_sidebar_short' ) );
    }
 	
	// Block Map
    public function un_sidebar_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Sidebar', 'deca'),
				'base' => 'un_sidebar',
				'description' => esc_html__('Include your sidebar widgets', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(


                    //
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Sidebar', 'deca'),
                        'param_name' => 'type',
                        'value' => array(
                            esc_html__('Select a widget area', 'deca') => '',
                            esc_html__('Blog', 'deca') => 'un-blog-sidebar',
                            esc_html__('Page', 'deca') => 'un-page-sidebar',
                            esc_html__('Footer 1', 'deca') => 'un-foot1-sidebar',
                            esc_html__('Footer 2', 'deca') => 'un-foot2-sidebar',
                            esc_html__('Footer 3', 'deca') => 'un-foot3-sidebar',
                            esc_html__('Footer 4', 'deca') => 'un-foot4-sidebar',
							esc_html__('Extra 1', 'deca') => 'un-extra1-sidebar',
                            esc_html__('Extra 2', 'deca') => 'un-extra2-sidebar',
                            esc_html__('Extra 3', 'deca') => 'un-extra3-sidebar',
                            esc_html__('Extra 4', 'deca') => 'un-extra4-sidebar',
                        ),
                        'description' => esc_html__('Enter the name slug of your area widgets. (ex. Blog)', 'deca'),

                    ),

					
					// Special Features
					array(
						'type' => '',
						'param_name' => 'info_special',	
						'description' => wp_kses(__('<i class="fa fa-info-circle"></i> To manage special section features like the overlay, the full-height and bg you have to edit the <b>Row Options</b>', 'deca'), wp_kses_allowed_html( 'post')),	
						'group' => esc_html__('Special Features', 'deca'),		   
					),
				),
			)
		);					  			  
	   
    } // End Block Map
	
	
	// Block Shortcode
	public function un_sidebar_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'type'	=> '',
				), 
				$atts
			)
		);

				
		$html = '';

            ob_start();

            dynamic_sidebar($type);

            $html .= ob_get_contents();

            ob_end_clean();

        return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unSidebar();