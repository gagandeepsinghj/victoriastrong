<?php
/* 
Description: VC Service 1
Theme: DECA
*/

// Block Class 
class unService1 extends WPBakeryShortCode { 

	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_service_1_map' ) );
        add_shortcode( 'un_service_1', array( $this, 'un_service_1_short' ) );
    }

	// Block Map
    public function un_service_1_map() {
		
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Service 1', 'deca'),
				'base' => 'un_service_1',
				'description' => esc_html__('Your standard service', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',
				'params' => array(	
					
				
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title', 'deca'),
						'param_name' => 'title',	
						'description' => esc_html__('Service Title', 'deca'),	
						'holder' => 'div',
					),	
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Description', 'deca'),
						'param_name' => 'description',	
						'description' => esc_html__('Service Description', 'deca'),	
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
		
	}	// End Block Map
	
	// Block Shortcode
	public function un_service_1_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'title'     => '',
					'description'	=> '',
				), 
				$atts
			)
		);
		
		$html = '';
			
		$html .='
		<div class="un-srv-w">
			<h5 class="un-srv-t">'.$title.'</h5>
			<div class="un-exc">
				'.$description.'
			</div>
		</div>';
				
		return $html;
		
	} // End Block Shortcode
	
}

// Block Init
new unService1();	