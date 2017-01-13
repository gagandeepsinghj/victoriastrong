<?php
/*
Description: VC Service 2
Theme: DECA
*/

// Block Class 
class unService2 extends WPBakeryShortCode { 

	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_service_2_map' ) );
        add_shortcode( 'un_service_2', array( $this, 'un_service_2_short' ) );
    }

	// Block Map
    public function un_service_2_map() {
		
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Service 2', 'deca'),
				'base' => 'un_service_2',
				'description' => esc_html__('Your service with label', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',
				'params' => array(	
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__('label', 'deca'),
						'param_name' => 'label',	
						'description' => esc_html__('Label in rotation', 'deca'),	
						'holder' => 'div',
					),


                    // Loop
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Icons with link', 'deca'),
                        'param_name' => 'icons',
                        'description' => esc_html__('Set your list of icons', 'deca'),
                        'params' => array(

                            // Content
                            array(
                                'type' => 'iconpicker',
                                'heading' => esc_html__( 'Icon', 'deca'),
                                'param_name' => 'icon',
                                'description' => esc_html__( 'Select the icon', 'deca'),
                                'settings' => array(
                                    'emptyIcon' => false,
                                    'type' => 'fawe',
                                    'iconsPerPage' => 100,
                                ),
                            ),


                            // Link
                            array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('Link Icon', 'deca'),
                                'param_name' => 'url',
                                'description' => esc_html__('Add an url for your icon', 'deca'),
                            ),

                        )
                    ),

				
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Sticky', 'deca'),
						'param_name' => 'sticky',
						'description' => esc_html__('Description', 'deca'),	
						'holder' => 'div',
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
		
	}	// End Block Map
	
	// Block Shortcode
	public function un_service_2_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'label' => '',
                    'icons' => '',
					'sticky' => '',
					'link' => '',
				), 
				$atts
			)
		);

        $icons = json_decode( urldecode( $icons ) );

		$html = ''; $srv_class = '';

        if( isset( $label ) ) { $srv_class = 'un-m-t-40'; }

		$html .= '
		<div class="un-srv-w '.$srv_class.'">

			<div class="un-srv-l un-vrt">'.$label.'</div>';

            if( $icons || count( $icons ) > 0 ) {

                $html .= '<ul class="un-srv-n">';

                            foreach( $icons as $icon ) {

                                // Build Link
                                $link_icon = vc_build_link( $icon->url );

                                if( !empty( $link_icon['url'] ) ) {

                                    if( $link_icon['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                                    $html .= '<li><a href ="'.$link_icon['url'].'" target ="'.$target.'"><i class="'.$icon->icon.'"></i></a></li>';

                                } else {

                                    $html .= '<li><i class="'.$icon->icon.'"></i></li>';

                                }

                            }

                $html .= '</ul>';

            }

			$html .= '<div class="un-srv-s">'.$sticky.'</div>';

            // Build Link
            $link = vc_build_link( $link );
						
			if( !empty( $link['url'] ) ){

                if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                $html .= '<div class="un-srv-k"><a href="'.$link['url'].'" target="'.$target.'">'.$link['title'].'</a></div>';

			}

            else {

                $html .= '<div class="un-srv-k">'.$link['title'].'</div>';

            }
			
			
		$html .=' </div>';
				
		return $html;
		
	} // End Block Shortcode
	
}

// Block Init
new unService2();	