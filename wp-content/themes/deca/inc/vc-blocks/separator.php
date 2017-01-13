<?php
/*
Description: VC Separator
Theme: Deca
*/

// Block Class 
class unSeparator extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_separator_map' ) );
        add_shortcode( 'un_separator', array( $this, 'un_separator_short' ) );
    }
 	
	// Block Map
    public function un_separator_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Separator', 'deca'),
				'base' => 'un_separator',
				'description' => esc_html__('A line separator', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(
										
					array(
						'type' => 'checkbox',
						'heading' => esc_html__('Vertical Orientation', 'deca'),
						'param_name' => 'vertical',	
						'description' => esc_html__('choose the line orientation', 'deca'),	
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__('Full Width', 'deca'),
						'param_name' => 'full',	
						'description' => esc_html__('Not works in vertical mode', 'deca'),	
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
	public function un_separator_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'vertical' => false,
					'full'	=> false,							
				), 
				$atts
			)
		);
		
				
		$html = '';
		
			if ( $full ) {
				
				$html .= '<div class="un-sep-f"></div>';
			
			} else {
	
				if ( $vertical ) {			
					$html .= '<div class="un-sep-v"></div>';
				}
				
				else {
					$html .= '<div class="un-sep-h"></div>';
				}
			
			}
			
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unSeparator();