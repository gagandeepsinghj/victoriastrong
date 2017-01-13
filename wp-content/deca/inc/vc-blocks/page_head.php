<?php
/*
Description: VC Page Heading
Theme: DECA
*/

// Block Class 
class unPageHead extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_page_head_map' ) );
        add_shortcode( 'un_page_head', array( $this, 'un_page_head_short' ) );
    }
 	
	// Block Map
    public function un_page_head_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Page Head', 'deca'),
				'base' => 'un_page_head',
				'description' => esc_html__('Page Heading with Description', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(
					
					// Title
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Title', 'deca'),
						'param_name' => 'title',
						'holder' => 'div',		   
					),
					
										
					// Description	
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Description', 'deca'),
						'param_name' => 'description',		   
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
	public function un_page_head_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'title'	=> '',
					'description' => '',			
				), 
				$atts
			)
		);
		
		
				
		$html = '';
		
		$html .= '<div class="un-pg-hd-w un-col-md-12">';

                if ( $title ) {
                    $html .= '<div class="un-pg-t-v un-hd-l un-vrt-2">'.$title.'</div>';
                }
			
				$html .='<div class="un-pg-t-w">';
			
					if ( $title ) {
						$html .= '<div class="un-hd-l">'.$title.'</div>';
					}
					
					
					if ( $description ) {
						$html .= '<div class="un-pg-d">'.$description.'</div>';
					}
				
				$html .= '</div>';
								
		$html .= '</div>';
	
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unPageHead();			