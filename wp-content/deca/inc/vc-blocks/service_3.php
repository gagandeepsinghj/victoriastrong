<?php
/*
Description: VC Service 3
Theme: DECA
*/

// Block Class 
class unService3 extends WPBakeryShortCode { 

	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_service_3_map' ) );
        add_shortcode( 'un_service_3', array( $this, 'un_service_3_short' ) );
    }

	// Block Map
    public function un_service_3_map() {
		
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Service 3', 'deca'),
				'base' => 'un_service_3',
				'description' => esc_html__('Your service with icon', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',
				'params' => array(	
					
					// Content									
					array(
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon', 'deca'),
						'param_name' => 'icon',
						'description' => esc_html__( 'Select the service icon', 'deca'),
						'settings' => array(
							'emptyIcon' => false,
							'type' => 'linea',
							'iconsPerPage' => 500,
						),
					),
					
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
	public function un_service_3_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'icon'	=> '',
					'title'     => '',
					'description'	=> '',
				), 
				$atts
			)
		);

        $html = '';
		
			
		$html .='

		<div class="un-srv-w">

			<div class="un-srv-i">
				<i class="'.$icon.'"></i>
			</div>

			<div class="un-div-r un-m-b-40 un-m-t-40"></div>

			<h6 class="un-srv-t">'.$title.'</h6>

			<div class="un-exc">
				'.$description.'
			</div>

		</div>';
				
		return $html;
		
	} // End Block Shortcode
	
}

// Block Init
new unService3();	