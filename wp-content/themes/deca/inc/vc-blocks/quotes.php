<?php
/*
Description: VC Quotes Carousel
Theme: DECA
*/

// Block Class 
class unQuotes extends WPBakeryShortCode {

    // Class Init
    function __construct() {
        add_action( 'init', array( $this, 'un_quotes_map' ) );
        add_shortcode( 'un_quotes', array( $this, 'un_quotes_short' ) );
    }

    // Block Map
    public function un_quotes_map() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
            array(
                'name' => esc_html__('Quotes', 'deca'),
                'base' => 'un_quotes',
                'description' => esc_html__('A carousel of quotes', 'deca'),
                'category' => esc_html__('DECA', 'deca'),
                'weight' => 9999,
                'icon' => UN_THEME_URI.'assets/img/icon.jpg',
                'params' => array(

                    // Loop
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Quotes', 'deca'),
                        'param_name' => 'quotes',
                        'description' => esc_html__('Add and reorder your quotes', 'deca'),
                        'params' => array(

                            // Title
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Quote', 'deca'),
                                'param_name' => 'quote',
                            ),

                            // Title
                            array(
                                'type' => 'textarea',
                                'heading' => esc_html__('Author', 'deca'),
                                'param_name' => 'author',
                            ),
                        ),
                    ),

                    // Autolpay
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Enable Autoplay', 'deca'),
                        'param_name' => 'autoplay',
                    ),

                    // Slide Delay
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Slide Delay', 'deca'),
                        'param_name' => 'delay',
                        'description' => esc_html__('Use an integer value for milliseconds (default value: 5000)', 'deca'),
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
    public function un_quotes_short( $atts ) {

        extract(
            shortcode_atts(
                array(
                    'quotes' => '',
                    'autoplay' => true,
                    'delay' => '5000',
                ),
                $atts
            )
        );

        $quotes = json_decode(urldecode($quotes));

        if( !$quotes || count($quotes) == 0 ) { return; }

        if( $autoplay == true ){
            $autoplay = $delay;
        }else{
            $autoplay = 'false';
        }

        $html = '';

        $html .= '<div class="un-qt-w">
					<div class="un-qt-s">';

                        foreach($quotes as $quote) {

                            $html .= '<div class="un-qt-r">';

                            if ( $quote->quote ) {
                                $html .= '<div class="un-qt-t un-p-r-30 un-p-l-30">'.$quote->quote.'</div>';
                            }

                            if ( $quote->author ) {
                                $html .= '<div class="un-qt-a">'.$quote->author.'</div>';
                            }

                            $html .= '</div>';

                        }

        $html .= '</div></div>';

        return $html;

    } // End Block Shortcode

} // End Block Class


// Block Init
new unQuotes();			