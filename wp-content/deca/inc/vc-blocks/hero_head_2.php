<?php
/*
Description: VC Hero Heading 2
Theme: DECA
*/

// Block Class 
class unHeroHead2 extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_hero_head_2_map' ) );
        add_shortcode( 'un_hero_head_2', array( $this, 'un_hero_head_2_short' ) );
    }
 	
	// Block Map
    public function un_hero_head_2_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Hero Head 2', 'deca'),
				'base' => 'un_hero_head_2',
				'description' => esc_html__('Hero Heading with Details', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(	
				
					// Size	
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Size', 'deca'),
						'param_name' => 'size',	
						'value' => array(
                            esc_html__('Select size', 'deca') => '',
							esc_html__('H1', 'deca') => 'h1', 
							esc_html__('H2', 'deca') => 'h2',
							esc_html__('H3', 'deca') => 'h3',
							esc_html__('H5', 'deca') => 'h4',
							esc_html__('H4', 'deca') => 'h5',
							esc_html__('H6', 'deca') => 'h6',
						),
					),
					
					// Title
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title', 'deca'),
						'param_name' => 'title',		   
					),
					
					// Margin Bottom	
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Spacing', 'deca'),
						'param_name' => 'margin',	
						'value' => array( 
							esc_html__('No Spacing', 'deca') => '', 
							esc_html__('10 Pixels', 'deca') => 'un-m-b-10',
							esc_html__('20 Pixels', 'deca') => 'un-m-b-20',
							esc_html__('30 Pixels', 'deca') => 'un-m-b-30',
							esc_html__('40 Pixels', 'deca') => 'un-m-b-40',
							esc_html__('50 Pixels', 'deca') => 'un-m-b-50',
							esc_html__('60 Pixels', 'deca') => 'un-m-b-60',
							esc_html__('70 Pixels', 'deca') => 'un-m-b-70',
							esc_html__('80 Pixels', 'deca') => 'un-m-b-80',
							esc_html__('90 Pixels', 'deca') => 'un-m-b-90',
						),
					),	
										
					// Subtitle	
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Subtitle', 'deca'),
						'param_name' => 'subtitle',		   
					),
					
					// Details	
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Details', 'deca'),
						'param_name' => 'details',		   
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
	public function un_hero_head_2_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'size' => '',
					'title'	=> '',
					'margin' => 'un-m-b-0',
					'subtitle' => '',
					'details' => '',
				), 
				$atts
			)
		);
		
		
				
		$html = '';
		
		$html .= '<div class="un-hd-w">';
		
			if ( $title ) {
				$html .= '<'.$size.' class="'.$margin.' un-hd-t un-p-l-30 un-p-r-30">'.$title.'</'.$size.'>';
			}
			
			if ( $subtitle ) {
				$html .= '<div class="un-sub">'.$subtitle.'</div>';
			}
			
			if ( $details ) {
				$html .= '<div class="un-div-r un-m-t-30 un-m-b-20"></div>';
				$html .= '<div class="un-det un-p-l-30 un-p-r-30">'.$details.'</div>';
			}
		
		$html .= '</div>';
	
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unHeroHead2();			