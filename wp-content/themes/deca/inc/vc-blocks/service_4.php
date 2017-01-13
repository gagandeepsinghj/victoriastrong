<?php
/*
Description: VC Service 4
Theme: DECA
*/

// Block Class 
class unService4 extends WPBakeryShortCode { 

	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_service_4_map' ) );
        add_shortcode( 'un_service_4', array( $this, 'un_service_4_short' ) );
    }

	// Block Map
    public function un_service_4_map() {
		
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Service 4', 'deca'),
				'base' => 'un_service_4',
				'description' => esc_html__('Your box with background', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',
				'params' => array(	
				
					// Image									
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Image', 'deca'),
						'param_name' => 'image',	
						'description' => esc_html__('Upload your background', 'deca'),		   
					),
					
					// Overlay Effect
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Overlay Effect', 'deca'),
						'param_name' => 'overlay',
						'description' => esc_html__('Add an overlay effect over your box', 'deca'),	
						'value' => array( 
							esc_html__('None', 'deca') => '', 
							esc_html__('Light 90%', 'deca') => 'un-bg-w-90',
							esc_html__('Light 80%', 'deca') => 'un-bg-w-80',
							esc_html__('Light 70%', 'deca') => 'un-bg-w-70',
							esc_html__('Light 60%', 'deca') => 'un-bg-w-60',
							esc_html__('Light 50%', 'deca') => 'un-bg-w-50',
							esc_html__('Light 40%', 'deca') => 'un-bg-w-40',
							esc_html__('Light 30%', 'deca') => 'un-bg-w-30',
							esc_html__('Light 20%', 'deca') => 'un-bg-w-20',
							esc_html__('Light 10%', 'deca') => 'un-bg-w-10',
							esc_html__('Dark 90%', 'deca') => 'un-bg-b-90',
							esc_html__('Dark 80%', 'deca') => 'un-bg-b-80',
							esc_html__('Dark 70%', 'deca') => 'un-bg-b-70',
							esc_html__('Dark 60%', 'deca') => 'un-bg-b-60',
							esc_html__('Dark 50%', 'deca') => 'un-bg-b-50',
							esc_html__('Dark 40%', 'deca') => 'un-bg-b-40',
							esc_html__('Dark 30%', 'deca') => 'un-bg-b-30',
							esc_html__('Dark 20%', 'deca') => 'un-bg-b-20',
							esc_html__('Dark 10%', 'deca') => 'un-bg-b-10',
							
						),
					),
					
					// Height
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Height', 'deca'),
                        'param_name' => 'height',
                        'description' => esc_html__('Set the height of the box', 'deca'),
                        'value' => array(
                            esc_html__('Select size', 'deca') => '',
                            esc_html__('XS', 'deca') => 'un-h-xs',
                            esc_html__('S', 'deca') => 'un-h-s',
                            esc_html__('M', 'deca') => 'un-h-m',
                            esc_html__('L', 'deca') => 'un-h-l',
                            esc_html__('XL', 'deca') => 'un-h-xl',
                        ),
                    ),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title', 'deca'),
						'param_name' => 'title',	
						'description' => esc_html__('Service Title', 'deca'),	
						'holder' => 'div',
					),
					
					// Text Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Title color', 'deca'),
                        'param_name' => 'color',
                        'description' => esc_html__('Set the color for title', 'deca'),
                        'value' => array(
                            esc_html__('Select color', 'deca') => '',
                            esc_html__('Black', 'deca') => 'un-txt-b',
                            esc_html__('White', 'deca') => 'un-txt-w',
                            esc_html__('Grey', 'deca') => 'un-txt-g',
                        ),
                    ),	
					
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Sub title', 'deca'),
						'param_name' => 'undertitle',	
						'description' => esc_html__('Service Description', 'deca'),	
					),
					
					// Link
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Link To', 'deca'),
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
		
	}	// End Block Map
	
	// Block Shortcode
	public function un_service_4_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'image' => '',
					'overlay' => '',
					'height' => '',
					'title' => '',
					'color' => '',
					'undertitle' => '',
					'link' => '',
				), 
				$atts
			)
		);

        $html = '';
		
		// Build Images
      	$bg = wp_get_attachment_url( $image );
		
							
		$html .='

		<div class="un-srv-g '.$height.'" style="background-image: url('.$bg.')">
		
			<div class="un-srv-o '.$overlay.'">
			
				<div class="un-srv-x">';
				
					if( isset( $link['url'] ) ){

						if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }
		
							$html .= '<a href="'.$link['url'].'" target="'.$target.'"><h3 class="un-srv-t '.$color.'">'.$title.'</h3></a>';
														
					} else {
						
						$html .= '<h3 class="un-srv-t '.$color.'">'.$title.'</h3>';
						
					}
	
					$html .= '<div class="un-srv-u '.$color.'">'.$undertitle.'</div>
				
				</div>
			
			</div>

		</div>';
				
		return $html;
		
	} // End Block Shortcode
	
}

// Block Init
new unService4();	