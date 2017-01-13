<?php
/*
Description: VC Slider
Theme: DECA
*/

// Block Class 
class unSlider extends WPBakeryShortCode {

	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_slider_map' ) );
        add_shortcode( 'un_slider', array( $this, 'un_slider_short' ) );
    }

	// Block Map
    public function un_slider_map() {

		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

		// Map the block with vc_map()
		vc_map(
			array(
				'name' => esc_html__('Slider Hero', 'deca'),
				'base' => 'un_slider',
				'description' => esc_html__('Add multiple images in slider hero mode', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',
				'params' => array(


                    // More
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('More', 'deca'),
                        'param_name' => 'more',
                    ),


                    // Loop
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Thumbnails', 'deca'),
                        'param_name' => 'thumbs',
                        'description' => esc_html__('Set your gallery thumbnails', 'deca'),
                        'params' => array(


                            // Overlay Effect
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Overlay background', 'deca'),
                                'param_name' => 'overlay',
                                'description' => esc_html__('Add an overlay effect over the slide', 'deca'),
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


                            // Multiple Images
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Upload', 'deca'),
                                'param_name' => 'thumb',
                                'description' => esc_html__('Upload your image', 'deca'),

                            ),


                            // Size
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Heading', 'deca'),
                                'param_name' => 'head',
                                'description' => esc_html__('Choose the size of your title', 'deca'),
                                'value' => array(
                                    esc_html__('Set size', 'deca') => '',
                                    esc_html__('H1', 'deca') => 'h1',
                                    esc_html__('H2', 'deca') => 'h2',
                                    esc_html__('H3', 'deca') => 'h3',
                                    esc_html__('H5', 'deca') => 'h4',
                                    esc_html__('H4', 'deca') => 'h5',
                                    esc_html__('H6', 'deca') => 'h6',
                                ),
                            ),


                            // Color
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Color', 'deca'),
                                'param_name' => 'color',
                                'description' => esc_html__('Choose the color of your headings', 'deca'),
                                'value' => array(
                                    esc_html__('Set color', 'deca') => '',
                                    esc_html__('Dark', 'deca') => 'un-txt-b',
                                    esc_html__('Light', 'deca') => 'un-txt-w',
                                ),
                            ),


                            // Title
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Title', 'deca'),
                                'param_name' => 'title',
                            ),


                            // Description
                            array(
                                'type' => 'textarea',
                                'heading' => esc_html__('Description', 'deca'),
                                'param_name' => 'desc',
                            ),


                            // Link
                            array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('Link', 'deca'),
                                'param_name' => 'url',
                                'description' => esc_html__('if you use an external link you disable the lightbox on this image', 'deca'),
                            ),


                        ),

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
	public function un_slider_short( $atts ) {

		extract(
			shortcode_atts(
				array(
                    'more' => '',
                    'thumbs' => '',
				),
				$atts
			)
		);


        $thumbs = json_decode( urldecode( $thumbs ) );

        if( !$thumbs || count( $thumbs ) == 0 ) { return; }

        $html = '';

        $html .= '<div class="un-sld-w un-sld-s">';

                        foreach ( $thumbs as $thumb ) {

                                $html .= '<div class="un-item">

                                            <div class="un-sld-p un-full '.$thumb->overlay.'" style="background-image: url('.wp_get_attachment_url( $thumb->thumb ).')">';

                                                if( isset( $thumb->title ) || isset( $thumb->desc ) ) {

                                                    $html .= '<div class="un-sld-c un-txt-c '.$thumb->color.'">';

                                                        // Build Link
                                                        $link = vc_build_link( $thumb->url );

                                                        if( !empty( $link['url'] ) ) {

                                                            if ( isset( $thumb->title ) ) {

                                                                if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                                                                $html .= '<'.$thumb->head.' class="un-sld-t un-m-b-40 un-p-r-30 un-p-l-30">
                                                                            <a href ="'.$link['url'].'" target ="'.$target.'">'.$thumb->title.'</a>
                                                                        </'.$thumb->head.'>';

                                                            }

                                                        } else {

                                                            if ( isset( $thumb->title ) ) {

                                                                $html .= '<'.$thumb->head.' class="un-sld-t un-m-b-40 un-p-r-30 un-p-l-30">'.$thumb->title.'</'.$thumb->head.'>';

                                                            }

                                                        }

                                                        $html .= '<div class="un-sld-d un-p-l-30 un-p-r-30">'.$thumb->desc.'</div>

                                                    </div>';

                                                }

                                            $html .= '</div>

                                        </div>';

                    }

                $html .= '</div>';

                // Build Link
                $more = vc_build_link( $more );

                if( !empty( $more['url'] ) ) {

                    if( $more['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                    $html .= '<div class="un-m-t-40 un-txt-c">
                                    <div class="un-sep-s un-m-b-30"></div>
                                    <div class="un-sld-k"><a href="'.$more['url'].'" target="'.$target.'">'.$more['title'].'</a></div>
                            </div>';

                }



		return $html;

	} // End Block Shortcode

} // End Block Class


// Block Init
new unSlider();