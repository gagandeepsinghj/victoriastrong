<?php
/*
Description: VC Callout
Theme: DECA
*/

// Block Class 
class unCallout extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_callout_map' ) );
        add_shortcode( 'un_callout', array( $this, 'un_callout_short' ) );
    }
 	
	// Block Map
    public function un_callout_map() {	
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Callout', 'deca'),
				'base' => 'un_callout',
				'description' => esc_html__('A big button', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(
										
					// Link
					array(
						'type' => 'vc_link',
						'heading' => esc_html__('Link', 'deca'),
						'param_name' => 'link',		   
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
	public function un_callout_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'link'	=> '',							
				), 
				$atts
			)
		);
		
		// Build Link
		$link = vc_build_link( $link );
				
		$html = '';
	
			if( isset( $link['url'] ) ){

                if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

				$html .= '<div class="un-cll-w"><a href="'.$link['url'].'" target="'.$target.'"><h5 class="un-cll-k">'.$link['title'].'</h5></a></div>';
			}
	
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unCallout();			