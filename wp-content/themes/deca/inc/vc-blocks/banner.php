<?php
/*
Description: VC Banner
Theme: DECA
*/

// Block Class 
class unBanner extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_banner_map' ) );
        add_shortcode( 'un_banner', array( $this, 'un_banner_short' ) );
    }
 	
	// Block Map
    public function un_banner_map() {	
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Banner', 'deca'),
				'base' => 'un_banner',
				'description' => esc_html__('A banner shop', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(
				
					// Title
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title', 'deca'),
						'param_name' => 'title',		   
					),
					
					// Subtitle
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Subtitle', 'deca'),
						'param_name' => 'subtitle',		   
					),
										
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
	public function un_banner_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'title' => '',
					'subtitle' => '',
					'link'	=> '',							
				), 
				$atts
			)
		);
		
		// Build Link
		$link = vc_build_link( $link );
		
		$html = '';
				
			$html .= '<div class="un-ban-w">';
			
				if ( $title ) {
			
					$html .= '<div class="un-ban-t">'.$title.'</div>';
				
				}
				
				if ( $subtitle ) {
				
					$html .= '<div class="un-ban-s">'.$subtitle.'</div>';
				
				}
		
				if( isset( $link['url'] ) ){
	
					if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }
	
					$html .= '<h5 class="un-ban-k"><a href="'.$link['url'].'" target="'.$target.'">'.$link['title'].'</a></h5>';
				}
				
			$html .= '</div>';
	
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unBanner();			