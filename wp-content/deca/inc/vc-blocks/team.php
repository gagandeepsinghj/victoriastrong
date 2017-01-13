<?php
/*
Description: VC Team
Theme: DECA
*/

// Block Class 
class unTeamMember extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_team_member_map' ) );
        add_shortcode( 'un_team_member', array( $this, 'un_team_member_short' ) );
    }
 	
	// Block Map
    public function un_team_member_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Team Member', 'deca'),
				'base' => 'un_team_member',
				'description' => esc_html__('Create your team grid', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(	
					
					// Content									
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Image', 'deca'),
						'param_name' => 'image',	
						'description' => esc_html__('The member Image', 'deca'),		   
					),	
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Name', 'deca'),
						'param_name' => 'name',	
						'holder' => 'div',	   
					),	
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Behance', 'deca'),
						'param_name' => 'be',	
						'description' => esc_html__('Add the member Behance url (or leave it blank to disable the icon)', 'deca'),	
					),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Twitter', 'deca'),
						'param_name' => 'tw',	
						'description' => esc_html__('Add the member Twitter url (or leave it blank to disable the icon)', 'deca'),	
					),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Facebook', 'deca'),
						'param_name' => 'fb',	
						'description' => esc_html__('Add the member Facebook url (or leave it blank to disable the icon)', 'deca'),	
					),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Dribble', 'deca'),
						'param_name' => 'db',	
						'description' => esc_html__('Add the member Dribble url (or leave it blank to disable the icon)', 'deca'),	
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
	public function un_team_member_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'image'	=> '',
					'name'  => '',
					'be'    => '',
					'tw'    => '',
					'fb'    => '',
					'db'	=> '',		
				), 
				$atts
			)
		);
		
		$html = '';
		
		// Check Image
		if ( $image > 0 ) {
			
			// Build Image
			$image_html = un_get_the_attachment( $image, 600, 'auto' );
			
									
			$html .= '
			<div class="un-tm-w">
			
				<div class="un-tm-img">
					'.$image_html.'
				</div>
				
				<div class="un-tm-d">
					<h5 class="un-tm-n">'.$name.'</h5>
					<ul>
						<li><a target="_blank" href="'.$be.'">Behance</a></li>
						<li><a target="_blank" href="'.$tw.'">Twitter</a></li>
						<li><a target="_blank" href="'.$fb.'">Facebook</a></li>
						<li><a target="_blank" href="'.$db.'">Dribbble</a></li>
					</ul>
				</div>
								
			</div>';
		
			return $html;
			
		} else {
			
			return;
			
		}		
		
		$html = '';
	
		$html .= '
		';
	
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unTeamMember();			