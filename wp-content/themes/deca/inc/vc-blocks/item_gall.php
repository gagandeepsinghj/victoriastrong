<?php
/*
Description: VC Case Item Gallery
Theme: DECA
*/

// Block Class 
class unItemGall extends WPBakeryShortCode { 

	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_item_gall_map' ) );
        add_shortcode( 'un_item_gall', array( $this, 'un_item_gall_short' ) );
    }

	// Block Map
    public function un_item_gall_map() {
		
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Item Gallery', 'deca'),
				'base' => 'un_item_gall',
				'description' => esc_html__('Gallery square with description', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',
				'params' => array(	
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Description', 'deca'),
						'param_name' => 'description',	
						'description' => esc_html__('Step description', 'deca'),	
						'holder' => 'div',
					),

                    // Loop
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Thumbnails', 'deca'),
                        'param_name' => 'thumbs',
                        'description' => esc_html__('Set your gallery thumbnails', 'deca'),
                        'params' => array(
					
                            // Image
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Image', 'deca'),
                                'param_name' => 'image',
                                'description' => esc_html__('Upload your image', 'deca'),
                            ),
					
                        )

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
	public function un_item_gall_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'description' => '',
					'thumbs' => '',
				), 
				$atts
			)
		);

        $thumbs = json_decode( urldecode( $thumbs ) );

        if( !$thumbs || count( $thumbs ) == 0 ) { return; }

		$html = '';
				    
		$html .= '<div class="un-gall-s">'.$description.'</div>';
		
		$html .= '<div class="un-gall-w un-iso">

		            <div class="un-size un-col-lg-4 un-col-md-6 un-col-sm-6 un-col-xs-12"></div>';

                    foreach( $thumbs as $thumb ) {

                        // Build Images
                        $image_html = un_get_the_attachment( $thumb->image, 400, 400, true, true );
								
                        $html .= '

                            <div class="un-item un-col-lg-4 un-col-md-6 un-col-sm-6 un-col-xs-12">
                                <a class="un-lb" href="'.wp_get_attachment_url( $thumb->image ).'">'.$image_html.'</a>
                            </div>';

                        }

							
		$html .= '</div>';
									  
				
		return $html;
		
	} // End Block Shortcode
	
}

// Block Init
new unItemGall();	