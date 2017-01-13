<?php
/*
Description: VC Clients
Theme: DECA
*/

// Block Class 
class unClients extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_clients_map' ) );
        add_shortcode( 'un_clients', array( $this, 'un_clients_short' ) );
    }
 	
	// Block Map
    public function un_clients_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Clients', 'deca'),
				'base' => 'un_clients',
				'description' => esc_html__('A Clients List', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(	
					
					// image
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Logo', 'deca'),
						'param_name' => 'logo',	
					),

                    // Button
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Link', 'deca'),
                        'param_name' => 'url',
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
	public function un_clients_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'logo'	=> '',
					'url'	=> '',
				), 
				$atts
			)
		);

        // Build Button
        $link = vc_build_link( $url );
					
		$html = '';
		
			if( isset($logo) ){
				
				// Build Image Shape
				$logo_html = un_get_the_attachment( $logo, 155, '', false, true );
				
				if( isset( $link['url'] ) ){

                    if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

					$html = '<div class="un-cln-w"><a href="'.$link['url'].'" target="'.$target.'">'.$logo_html.'</a></div>';
				}
					
				else {
					$html = '<div class="un-cln-w">'.$logo_html.'</div>';
				}
			
			}
		
	
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unClients();			