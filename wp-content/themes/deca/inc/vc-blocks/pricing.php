<?php
/*
Description: VC Pricing
Theme: Incanto
*/

// Block Class 
class unPricing extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_pricing_map' ) );
        add_shortcode( 'un_pricing', array( $this, 'un_pricing_short' ) );
    }
 	
	// Block Map
    public function un_pricing_map() {	
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Pricing Table', 'deca'),
				'base' => 'un_pricing',
				'description' => esc_html__('A composable pricing table', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(
					
					
					// Title
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Pricing Title', 'deca'),
						'param_name' => 'title',
						'holder' => 'div',		   
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__('Featured', 'deca'),
						'param_name' => 'featured',	
						'description' => esc_html__('Mark this item as featured', 'deca'),	
					),
					
					// Price
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Price', 'deca'),
						'param_name' => 'price',		   
					),
					
					// Currency
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Currency', 'deca'),
						'param_name' => 'currency',		   
					),
					
					// Loop									
					array(
						'type' => 'param_group',
						'heading' => esc_html__('Features', 'deca'),
						'param_name' => 'features',	
						'description' => esc_html__('Add and sort multiple features for your pricing table', 'deca'),
						'params' => array(	
							
							// Feature Label
							array(
								'type' => 'textfield',
								'heading' => esc_html__('Feature Label', 'deca'),
								'param_name' => 'label',		   
							),
																	
						),	   
					),
					
					// Button
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
	public function un_pricing_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'title'	    => esc_html__('Choose a Title', 'deca'),
					'featured'  => false,
					'price'	    => 'free',		
					'currency'	=> '',
					'features'	=> '',
					'link'	=> '',							
				), 
				$atts
			)
		);
		
		// Build Button
		$link = vc_build_link( $link );
				
		$html = '';
		
				
		if ( $featured == true ) {
			
			$html .= '<div class="un-prc-w un-sha-tr un-prc-d">';
			
		} else {
				
			$html .= '<div class="un-prc-w un-sha-tr">';
		
		}
		
		$html .=
  
					'<div class="un-prc-l">'.$title.'</div>
					
					<div class="un-prc-p"><span class="un-prc-c">'.$currency.'</span>'.$price.'</div>
					
					<ul class="un-prc-f">';
					
					// Setup Features
					$features = json_decode(urldecode($features));
					if( $features ){
						
						foreach( $features as $feature ){
					
							$html .='<li>'.$feature->label.'</li>';
						
						}
					
					}
					
					$html .='</ul>';
					
					if( isset( $link['url'] ) ){

                        if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

						$html .= '<div class="un-prc-k"><h5><a href="'.$link['url'].'" target="'.$target.'">'.$link['title'].'</a></h5></div>';
					}
	  
			  $html .='</div>';
	
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unPricing();			