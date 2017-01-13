<?php
/*
Description: Theme Options
Theme: Deca
*/

// Check if Redux exixts
if ( !class_exists( 'Redux' ) ) {
	return;
}


//******************//
// OPTIONS ARGUMENTS //
//******************//

$un_opt_args = array(

	// Options Name
	'opt_name' => UN,
	
	// Display
	'display_name' => 'Deca',
	'admin_bar' => true,
	'admin_bar_icon' => 'dashicons-screenoptions', 
	'allow_sub_menu' => true,
	'display_version' => false,
	'hide_reset' => false,
	'menu_type' => 'menu',
	'menu_title' => 'Deca',
	'menu_icon' => 'dashicons-screenoptions',
	'page_icon' => 'dashicons-screenoptions',
	'page_slug' => 'deca_options',
	'page_title' => 'Deca Options',
	
	// Features
	'customizer' => false,
	'default_show' => true,
	'default_mark' => '*',
	'show_import_export' => true,
	'class' => 'un-redux',
	'update_notice' => false,
	'disable_tracking' => true,
	'dev_mode' => false,
	
	// Footer Infos
	'footer_text' => wp_kses(__('<p>Have you found a <b>issue</b> or simply need <b>support</b>? Open a <b>ticket</b> on <a href="http://support.uncommons.pro" target="_blank">http://support.uncommons.pro</a></p>', 'deca'), wp_kses_allowed_html( 'post' )),
	'share_icons' => array(
		array(
			'url'   => 'http://themeforest.net/user/unCommons/portfolio/',
			'title' => 'Our Portfolio',
			'icon'  => 'el el-icon-briefcase'
		),
		array(
			'url'   => 'http://support.uncommons.pro/',
			'title' => 'Ask Support',
			'icon'  => 'el el-icon-heart'
		),
		array(
			'url'   => 'http://www.uncommons.pro/',
			'title' => 'Discover the unCommons\'s Laborator',
			'icon'  => 'el el-icon-star'
		),
		array(
			'url'   => 'https://twitter.com/unCommonsTeam',
			'title' => 'Follow us on Twitter',
			'icon'  => 'el el-icon-twitter'
		),
		array(
			'url'   => 'https://www.facebook.com/unCommons',
			'title' => 'Follow us on Facebook',
			'icon'  => 'el el-icon-facebook'
		),
		array(
			'url'   => 'https://www.behance.net/unCommons',
			'title' => 'Follow us on Behance',
			'icon'  => 'el el-icon-behance'
		),			
	),
	
);

// Set Arguments
Redux::setArgs( UN, $un_opt_args );



//******************//
// OPTIONS SECTIONS //
//******************//

// HELP
$help_section = array(
	'title'  => esc_html__('Help', 'deca'),
	'id'     => 'help',
	'desc'   => '',
	'icon'   => 'el el-magic',
	'fields' => array(
		
		// HTML Description
		array(
			'id'       => 'opt-help-info',
			'type'     => 'raw',
			'content'  => '
			<h2>Got you a problem using the theme?</h2>
			<h4><em>Don\'t worry! Here there\'s all you need.</em></h4>
			<br>
			<h3>1. Try to follow our <a href="http://demo.uncommons.pro/themes/wp/deca/docs/" target="_blank">Guide</a></h3>
			<br>
			<h3>2. Ask our help <a href="http://support.uncommons.pro" target="_blank" class="un-options-button">opening a ticket</a>!</h3>
			<br>
			<h3>3. Don\'t forgive to register your license and your domain on <a href="http://license.uncommons.pro?domain='.urlencode(esc_url(get_site_url())).'" target="_blank" class="un-options-button">license.uncommons.pro</a> to unlock your theme!</h3>',
		),  	
	),
);

Redux::setSection(UN, $help_section);

// GENERAL SETTINGS
$general_settings_section = array(
	'title'  => esc_html__('General Settings', 'deca'),
	'id'     => 'general_settings',
	'icon'   => 'el el-adjust-alt',
	'fields' => array(
		
		// Border Header Logo
		array(
			'id'       => 'opt-border-header-logo',
			'type'     => 'media', 
			'url'      => true,
			'title'    => esc_html__('Border Header Logo', 'deca'),
			'default'  => array(
				'url' => UN_THEME_URI.'assets/img/logo.png',
			),
		),
		
		// Border Menu Logo
		array(
			'id'       => 'opt-border-menu-logo',
			'type'     => 'media', 
			'url'      => true,
			'title'    => esc_html__('Border Menu Logo', 'deca'),
			'default'  => array(
				'url' => UN_THEME_URI.'assets/img/logo2.png',
			),
		),
		
		// Border Menu Logo
		array(
			'id'       => 'opt-top-header-logo',
			'type'     => 'media', 
			'url'      => true,
			'title'    => esc_html__('Top Header Logo', 'deca'),
			'default'  => array(
				'url' => UN_THEME_URI.'assets/img/logo3.png',
			),
		),

	),
);

Redux::setSection(UN, $general_settings_section);


// STYLING
$general_settings_section = array(
	'title'  => esc_html__('Styling', 'deca'),
	'id'     => 'styling',
	'icon'   => 'el el-brush',
	'fields' => array(
	
		// Primary Color
		array(
			'id'       => 'opt-primary-color',
			'type'     => 'color',
			'title'    => esc_html__('Primary Color', 'deca'), 
			'subtitle' => esc_html__('The most characteristic color', 'deca'),
			'default'  => '#f5f8fa',
			'validate' => 'color',
			'output'   => array(
                'background' => '.un-foot, .un-blog-lk, .un-pag-a, .un-crs-r .un-arr-w, .un-row-h, .un-src-mdl, .vc_tta-tab > a, .vc_tta-panel .vc_tta-panel-heading, .un-grid-d, .un-cs-b, .woocommerce div.product .woocommerce-tabs ul.tabs li',
				'border-top-color' => '.un-ang-t-r',
				'border-right-color' => '.un-ang-b-r', 
            ),
		),
		
		// Primary Color
		array(
			'id'       => 'opt-secondary-color',
			'type'     => 'color',
			'title'    => esc_html__('Secondary Color', 'deca'), 
			'subtitle' => esc_html__('For most secondary features and panels', 'deca'),
			'default'  => '#e1e8ed',
			'validate' => 'color',
			'output'   => array(
                'border-color' => '#un-sqr-hor',
				'border-top-color' => '.un-hr, .un-sep-f, .un-rel-w-w, .woocommerce .un-prod-det .price',
				'border-right-color' => '.woocommerce div.product .woocommerce-tabs ul.tabs li', 
				'border-bottom-color' => '.un-post-c, .un-feed-p, .un-blog-e, .un-menu-shop .sub-menu li, #un-menu-hor .sub-menu li, .un-arch-p, .un-post-r-w li article, .woocommerce .un-prod-det .price, .woocommerce .woocommerce-tabs, .woocommerce #reviews #comments .commentlist li', 
				'border-left-color' => '.woocommerce div.product .woocommerce-tabs ul.tabs li', 
				'background' => '.un-menu-shop .sub-menu li:hover, #un-menu-hor .sub-menu li:hover, .un-crs-r .owl-next:hover .un-arr-w, .un-crs-r .owl-prev:hover .un-arr-w, .un-pag-a:hover, .un-cll-w', 
				'color' => '.un-pg-t-v, .un-cs-bt', 
            ),
		),
		
		// Details Color
		array(
			'id'       => 'opt-details-color',
			'type'     => 'color',
			'title'    => esc_html__('Details Color', 'deca'), 
			'subtitle' => esc_html__('For small details (like link mouseover)', 'deca'),
			'default'  => '#dd4b57',
			'validate' => 'color',
			'output'   => array(
				'color' => '.un-dot-a:hover, .un-prc-k a:hover, .un-work-t a:hover, .un-div-r, .un-dot-a:hover, .un-get-t i:hover, .un-soc-k i:hover, .un-menu-o:hover i, .un-menu-x i:hover, .un-btn-top i:hover, .un-wdg-w ul li a:hover, .un-wdg-w .textwidget a:hover, .un-wdg-w .tagcloud a:hover, .un-feed-a a:hover, .un-post-g a:hover, .un-shr li a:hover i, .un-rel-p-t a:hover, #un-menu-vrt li a:hover, .un-src-btn i:hover, .un-src-btn-top i:hover, #un-menu-mob li a:hover, .un-arch-t a:hover, .un-arch-a a:hover, .un-grid-t a:hover, .un-grid-k a:hover, .un-cs-l li a:hover', 
            ),
		),
		
		// Primary Font
		array(
			'id'       => 'opt-primary-font',
			'type'     => 'typography', 
			'title'    => esc_html__('Primary Font', 'deca'),
            'subtitle' => esc_html__('This is the main font, used for example for the common text overall the theme.' , 'deca'),
			'google'      => true, 
			'font-style'  => false,
			'font-weight'  => false,
			'font-size'  => false,
			'subsets'  => false,
			'line-height'  => false,
			'word-spacing'  => false,
			'letter-spacing'  => false,
			'text-align'  => false,
			'text-transform'  => false,
			'color'  => false,
			'all_styles'  => true,			
			'default'     => array(
				'font-family' => 'Source Sans Pro',
				'google'      => true,
			),
			'output'   => array(
                'body',
                '.un-wdg-p-t a',                
            ),
		), 
		
		// Secondary Font
		array(
			'id'       => 'opt-secondary-font',
			'type'     => 'typography', 
			'title'    => esc_html__('Secondary Font', 'deca'),
            'subtitle' => esc_html__('This font is used for the titles, headings and great texts.' , 'deca'),
			'google'      => true, 
			'font-style'  => false,
			'font-weight'  => false,
			'font-size'  => false,
			'subsets'  => false,
			'line-height'  => false,
			'word-spacing'  => false,
			'letter-spacing'  => false,
			'text-align'  => false,
			'text-transform'  => false,
			'color'  => false,	
			'all_styles'  => true,			
			'default'     => array(
				'font-family' => 'Montserrat',
				'google'      => true,
			),
			'output'      => array(
				'#un-menu-vrt li > a',
				'#un-menu-vrt .sub-menu li a',
				'.un-menu-shop li a, #un-menu-hor li a',
				'.un-menu-shop .sub-menu li a, #un-menu-hor .sub-menu li a',
                'h1, h2, h3, h4, h5, h6',
                '.un-sub',
                '.un-btn-k',
                '.un-get-t span',
                '.un-menu-btn span',
                '.un-wdg-w ul li a',
                '.un-wdg-w .un-lnk',
                '.un-blog-r, .un-blog-s',
                '.un-pag-n ul li',
                '#un-menu-vrt li > a',
                '#un-menu-hor li a',
                '#un-menu-mob li > a',
                '.un-post-r-w .reply',
                '.un-post-r-w .comment-author .fn',
                '.un-post-r-w li .comment-metadata',
                '.un-src-field',
                '.vc_tta-title-text',
                '.vc_btn3.vc_btn3-color-white',
                '.un-hd-xl',
                '.un-hd-l',
                '.un-srv-l',
                '.un-srv-s',
                '.un-srv-k, .un-srv-t',
                '.un-grid-t',
                '.un-grid-r, .un-grid-s',
                '.un-blog-k',
                '.un-work-rm',
                '.un-works-k',
                '.un-flt li',
                '.un-cs-l li',
                '.un-cs-bt',
                '.un-pics-k',
                '.un-crs-k',
                '.un-sld-d',
                '.un-sld-k',
                '.un-cases-k',
            ),
		),

        // Details Font
        array(
            'id'       => 'opt-details-font',
            'type'     => 'typography',
            'title'    => esc_html__('Details Font', 'deca'),
            'subtitle' => esc_html__('This font is used for some details like quotes, widgets, category\'s label, etc.' , 'deca'),
            'google'      => true,
            'font-style'  => false,
            'font-weight'  => false,
            'font-size'  => false,
            'subsets'  => false,
            'line-height'  => false,
            'word-spacing'  => false,
            'letter-spacing'  => false,
            'text-align'  => false,
            'text-transform'  => false,
            'color'  => false,
            'all_styles'  => true,
            'default'     => array(
                'font-family' => 'Merriweather',
                'google'      => true,
            ),
            'output'      => array(			
			'.un-wdg-w ul li .post-date',
			'.un-wdg-p-m',
			'.un-feed-d',
			'.un-feed-a a',
			'.un-feed-c',
			'.un-feed-c',
			'.un-blog-d',
			'.un-blog-a',
			'.un-blog-c',
			'.un-post-i',
			'.un-post-d',
			'.un-post-a',
			'.un-post-g a',
			'.un-arch-d',
			'.un-arch-a a',
			'.un-arch-c',
			'.un-post-r-w li .comment-metadata',
			'.un-qt-t',
			'.un-qt-a',
			),
        ),
		
		
		// Menu Border Main Item
		array(
			'id'       => 'opt-menu-border-main-item',
			'type'     => 'typography', 
			'title'    => esc_html__('Menu Border Main Item', 'deca'),
			'google'      => true, 
			'font-family' => true,
			'font-style'  => true,
			'font-weight'  => true,
			'font-size'  => true,
			'subsets'  => false,
			'line-height'  => true,
			'word-spacing'  => true,
			'letter-spacing'  => true,
			'text-align'  => false,
			'text-transform'  => true,
			'color'  => true,	
			'all_styles'  => true,			
			'default'     => array(
				'color'       => '#000',
				'font-weight'  => '700', 
				'font-family' => 'Montserrat',
				'google'      => true,
				'font-size'   => '40px',
				'line-height' => '50px', 
				'word-spacing' => 'normal',
				'letter-spacing' => 'normal',
				'text-transform' => 'capitalize',
			),
			'output' => array('#un-menu-vrt li > a'),
			
		),
		
		// Menu Border Sub Item
		array(
			'id'       => 'opt-menu-border-sub-item',
			'type'     => 'typography', 
			'title'    => esc_html__('Menu Border Sub Item', 'deca'),
			'google'      => true, 
			'font-family' => true,
			'font-style'  => true,
			'font-weight'  => true,
			'font-size'  => true,
			'subsets'  => false,
			'line-height'  => true,
			'word-spacing'  => true,
			'letter-spacing'  => true,
			'text-align'  => false,
			'text-transform'  => true,
			'color'  => true,	
			'all_styles'  => true,			
			'default'     => array(
				'color'       => '#000',
				'font-weight'  => '700', 
				'font-family' => 'Montserrat',
				'google'      => true,
				'font-size'   => '20px',
				'line-height' => '30px', 
				'word-spacing' => 'normal',
				'letter-spacing' => 'normal',
				'text-transform' => 'capitalize',
			),
			'output' => array('#un-menu-vrt .sub-menu li a'),
			
		),
		
		// Menu Top Main Item
		array(
			'id'       => 'opt-menu-top-main-item',
			'type'     => 'typography', 
			'title'    => esc_html__('Menu Top Main Item', 'deca'),
			'google'      => true, 
			'font-family' => true,
			'font-style'  => true,
			'font-weight'  => true,
			'font-size'  => true,
			'subsets'  => false,
			'line-height'  => false,
			'word-spacing'  => true,
			'letter-spacing'  => true,
			'text-align'  => false,
			'text-transform'  => true,
			'color'  => false,	
			'all_styles'  => true,			
			'default'     => array(
				'font-weight'  => '700', 
				'font-family' => 'Montserrat',
				'google'      => true,
				'font-size'   => '14px',
				'word-spacing' => 'normal',
				'letter-spacing' => 'normal',
				'text-transform' => 'uppercase',
			),
			'output' => array('.un-menu-shop li a, #un-menu-hor li a'),
			
		),
		
		// Menu Top Sub Item
		array(
			'id'       => 'opt-menu-top-sub-item',
			'type'     => 'typography', 
			'title'    => esc_html__('Menu Top Sub Item', 'deca'),
			'google'      => true, 
			'font-family' => true,
			'font-style'  => true,
			'font-weight'  => true,
			'font-size'  => true,
			'subsets'  => false,
			'line-height'  => false,
			'word-spacing'  => true,
			'letter-spacing'  => true,
			'text-align'  => false,
			'text-transform'  => true,
			'color'  => false,	
			'all_styles'  => true,			
			'default'     => array(
				'font-weight'  => '700', 
				'font-family' => 'Montserrat',
				'google'      => true,
				'font-size'   => '14px',
				'word-spacing' => 'normal',
				'letter-spacing' => 'normal',
				'text-transform' => 'uppercase',
			),
			'output' => array('.un-menu-shop .sub-menu li a, #un-menu-hor .sub-menu li a'),
			
		),
		
		// H1
		array(
			'id'       => 'opt-h1',
			'type'     => 'typography', 
			'title'    => esc_html__('Heading 1', 'deca'),
			'google'      => true, 
			'font-family' => false,
			'font-style'  => true,
			'font-weight'  => true,
			'font-size'  => true,
			'subsets'  => false,
			'line-height'  => true,
			'word-spacing'  => true,
			'letter-spacing'  => true,
			'text-align'  => false,
			'text-transform'  => true,
			'color'  => true,	
			'all_styles'  => true,			
			'default'     => array(
				'color'       => '#000',
				'font-weight'  => '700', 
				//'font-family' => 'Montserrat',
				'google'      => true,
				'font-size'   => '80px',
				'line-height' => '90px', 
				'word-spacing' => '0',
				'letter-spacing' => '0',
				//'text-transform' => 'uppercase',
			),
			'output' => array('h1'),
			
		),
		
		// H2
		array(
			'id'       => 'opt-h2',
			'type'     => 'typography', 
			'title'    => esc_html__('Heading 2', 'deca'),
			'google'      => true, 
			'font-family' => false,
			'font-style'  => true,
			'font-weight'  => true,
			'font-size'  => true,
			'subsets'  => false,
			'line-height'  => true,
			'word-spacing'  => true,
			'letter-spacing'  => true,
			'text-align'  => false,
			'text-transform'  => true,
			'color'  => true,	
			'all_styles'  => true,			
			'default'     => array(
                'color'       => '#000',
                'font-weight'  => '700',
                //'font-family' => 'Montserrat',
                'google'      => true,
                'font-size'   => '60px',
                'line-height' => '70px',
                'word-spacing' => '0',
                'letter-spacing' => '0',
                //'text-transform' => 'uppercase',
			),
			'output' => array('h2'),
		),
		
		// H3
		array(
			'id'       => 'opt-h3',
			'type'     => 'typography', 
			'title'    => esc_html__('Heading 3', 'deca'),
			'google'      => true, 
			'font-family' => false,
			'font-weight'  => true,
			'font-weight'  => true,
			'font-size'  => true,
			'subsets'  => false,
			'line-height'  => true,
			'word-spacing'  => true,
			'letter-spacing'  => true,
			'text-align'  => false,
			'text-transform'  => true,
			'color'  => true,	
			'all_styles'  => true,			
			'default'     => array(
                'color'       => '#000',
                'font-weight'  => '700',
                //'font-family' => 'Montserrat',
                'google'      => true,
                'font-size'   => '40px',
                'line-height' => '50px',
                'word-spacing' => '0',
                'letter-spacing' => '0',
                //'text-transform' => 'uppercase',
			),
			'output' => array('h3'),
		),
		
		// H4
		array(
			'id'       => 'opt-h4',
			'type'     => 'typography', 
			'title'    => esc_html__('Heading 4', 'deca'),
			'google'      => true, 
			'font-family' => false,
			'font-style'  => true,
			'font-weight'  => true,
			'font-size'  => true,
			'subsets'  => false,
			'line-height'  => true,
			'word-spacing'  => true,
			'letter-spacing'  => true,
			'text-align'  => false,
			'text-transform'  => true,
			'color'  => true,	
			'all_styles'  => true,			
			'default'     => array(
                'color'       => '#000',
                'font-weight'  => '700',
                //'font-family' => 'Montserrat',
                'google'      => true,
                'font-size'   => '20px',
                'line-height' => '26px',
                'word-spacing' => '0',
                'letter-spacing' => '0',
                //'text-transform' => 'uppercase',
			),
			'output' => array('h4'),
		),
		
		// H5
		array(
			'id'       => 'opt-h5',
			'type'     => 'typography', 
			'title'    => esc_html__('Heading 5', 'deca'),
			'google'      => true, 
			'font-family' => false,
			'font-style'  => true,
			'font-weight'  => true,
			'font-size'  => true,
			'subsets'  => false,
			'line-height'  => true,
			'word-spacing'  => true,
			'letter-spacing'  => true,
			'text-align'  => false,
			'text-transform'  => true,
			'color'  => true,	
			'all_styles'  => true,			
			'default'     => array(
				'color'       => '#000',
				'font-weight'  => '700', 
				//'font-family' => 'Montserrat',
				'google'      => true,
				'font-size'   => '16px',
				'line-height' => '20px',
				'word-spacing' => '0',
				'letter-spacing' => '0',
				'text-transform' => 'uppercase',
			),
			'output' => array('h5'),
		),
		
		// H6
		array(
			'id'       => 'opt-h6',
			'type'     => 'typography', 
			'title'    => esc_html__('Heading 6', 'deca'),
			'google'      => true, 
			'font-family' => false,
			'font-style'  => true,
			'font-weight'  => true,
			'font-size'  => true,
			'subsets'  => false,
			'line-height'  => true,
			'word-spacing'  => true,
			'letter-spacing'  => true,
			'text-align'  => false,
			'text-transform'  => true,
			'color'  => true,	
			'all_styles'  => true,			
			'default'     => array(
                'color'       => '#000',
                'font-weight'  => '700',
                //'font-family' => 'Montserrat',
                'google'      => true,
                'font-size'   => '14px',
                'line-height' => '18px',
                'word-spacing' => '0',
                'letter-spacing' => '0',
                'text-transform' => 'uppercase',
			),
			'output' => array('h6'),
		), 
	),
);

Redux::setSection(UN, $general_settings_section);

// HEADER
$header_section = array(
	'title'  => esc_html__('Header', 'deca'),
	'id'     => 'header',
	'icon'   => 'el el-cog',
	'fields' => array(

        // Header Type
        array(
            'id'       => 'opt-header-type',
            'type'     => 'select',
            'title'    => esc_html__('Type', 'deca'),
            'options'  => array(
                'border' => esc_html__('Border', 'deca'),
                'top' => esc_html__('Top', 'deca'),
            ),
            'default'  => 'border',
        ),
		
		// Top Header Settings
        array(
            'id'       => 'opt-header-top-sticky',
            'type'     => 'select',
            'title'    => esc_html__('Header Position', 'deca'),
            'options'  => array(
                'sticky' => esc_html__('Sticky', 'deca'),
                'fixed' => esc_html__('Fixed', 'deca'),
            ),
            'default'  => 'sticky',
			'required' => array('opt-header-type','equals','top'),
        ),
		
		// Top Header Settings
        array(
            'id'       => 'opt-header-top-type',
            'type'     => 'select',
            'title'    => esc_html__('Header Background', 'deca'),
            'options'  => array(
                'white' => esc_html__('White', 'deca'),
                'black' => esc_html__('Black', 'deca'),
				'transp_black' => esc_html__('Transparent (Black Menu)', 'deca'),
                'transp_white' => esc_html__('Transparent (Gray Menu)', 'deca'),
            ),
            'default'  => 'white',
			'required' => array('opt-header-type','equals','top'),
        ),
		
		// Menu Scrollbar
        array(
            'id'       => 'opt-header-border-menu-scroll',
			'type'     => 'switch', 
			'title'    => esc_html__('Menu Scrollbar', 'deca'),
			'default'  => true,
			'required' => array('opt-header-type','equals','border'),
        ),
		
		// Border Header Nav
        array(
            'id'       => 'opt-header-border-nav',
			'type'     => 'switch', 
			'title'    => esc_html__('Page Navigation', 'deca'),
			'default'  => true,
			'required' => array('opt-header-type','equals','border'),
        ),

        // Search Icon
        array(
            'id'       => 'opt-header-search',
            'type'     => 'switch',
            'title'    => esc_html__('Search Icon', 'deca'),
            'default'  => true,
        ),


	),
);

Redux::setSection(UN, $header_section);


// FOOTER
$footer_section = array(
	'title'  => esc_html__('Footer', 'deca'),
	'id'     => 'footer',
	'icon'   => 'el el-cog',
	'fields' => array(
	
		// Footer Widgets Cols
		array(
			'id'       => 'footer-widgets-col',
			'type'     => 'button_set',
			'title'    => esc_html__('Widgets Columns', 'deca'),
			'options' => array(
				'2' => '2 Columns', 
				'3' => '3 Columns', 
				'4' => '4 Columns'
			 ), 
			'default' => '3'
		),
		
		// Get in Touch
		array(
			'id'       => 'opt-footer-touch',
			'type'     => 'text',
			'title'    => esc_html__('Get in Touch URL', 'deca'),
			'subtitle' => esc_html__('Leave blank to disable it', 'deca'),
			'default'  => '',
		),
		
		// Footer Copy
		array(
			'id'       => 'opt-footer-copy',
			'type'     => 'editor', 
			'title'    => esc_html__('Copyright', 'deca'),
			'subtitle' => esc_html__('Leave blank to disable it', 'deca'),
			'default'  => '',
		),
		
		// Behance
        array(
            'id'       => 'opt-footer-behance',
            'type'     => 'text',
            'title'    => esc_html__('Behance', 'deca'),
            'subtitle' => esc_html__('Leave blank to disable the Behance icon', 'deca'),
        ),
		
        // Twitter
        array(
            'id'       => 'opt-footer-twitter',
            'type'     => 'text',
            'title'    => esc_html__('Twitter', 'deca'),
            'subtitle' => esc_html__('Leave blank to disable the Twitter icon', 'deca'),
        ),

        // Facebook
        array(
            'id'       => 'opt-footer-facebook',
            'type'     => 'text',
            'title'    => esc_html__('Facebook', 'deca'),
            'subtitle' => esc_html__('Leave blank to disable the Facebook icon', 'deca'),
        ),

        // Google+
        array(
            'id'       => 'opt-footer-googleplus',
            'type'     => 'text',
            'title'    => esc_html__('Google+', 'deca'),
            'subtitle' => esc_html__('Leave blank to disable the Google+ icon', 'deca'),
        ),
		
		 // Youtube
        array(
            'id'       => 'opt-footer-youtube',
            'type'     => 'text',
            'title'    => esc_html__('Youtube', 'deca'),
            'subtitle' => esc_html__('Leave blank to disable the Youtube icon', 'deca'),
        ),

        // Instagram
        array(
            'id'       => 'opt-footer-instagram',
            'type'     => 'text',
            'title'    => esc_html__('Instagram', 'deca'),
            'subtitle' => esc_html__('Leave blank to disable the Instagram icon', 'deca'),
        ),

        // Pinterest
        array(
            'id'       => 'opt-footer-pinterest',
            'type'     => 'text',
            'title'    => esc_html__('Pinterest', 'deca'),
            'subtitle' => esc_html__('Leave blank to disable the Pinterest icon', 'deca'),
        ),

        // RSS
        array(
            'id'       => 'opt-footer-rss',
            'type'     => 'text',
            'title'    => esc_html__('RSS', 'deca'),
            'subtitle' => esc_html__('Leave blank to disable the RSS icon', 'deca'),
        ),
		
	),
);

Redux::setSection(UN, $footer_section);


// HOME
$home_section = array(
	'title'  => esc_html__('Homepage', 'deca'),
	'id'     => 'home',
	'icon'   => 'el el-home',
	'fields' => array(
		
		// HTML Description
		array(
			'id'       => 'opt-home-info',
			'type'     => 'raw',
			'content'  => wp_kses(__('
			<h2>Are you searching for the Home Options??</h2>
			<h4><em>With DECA you can create many different Homepages using the Visual Composer!</em></h4>
			<br>
			<h3>1. Take a look to the Visual Composer <a href="https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=4030510" target="_blank">How To</a></h3>
			<br>
			<h3>2. Try to follow our <a href="http://demo.uncommons.pro/themes/wp/deca/docs/" target="_blank">Guide</a> (we added many blocks to Visual Composer)</h3>
			<br>
			<h3>3. Now you can <a href="post-new.php?post_type=page" target="_blank">Create a new Page</a> and set it on VC Template</h3>
			<br>
			<h3>4. At the end of this process you only have to set the page as Static Page > Frontpage in the <a href="options-reading.php" target="_blank">WP Reading Options</a></h3>
			<br>
			<h3>5. Still problems? Ask our help <a href="http://support.uncommons.pro" target="_blank" class="un-options-button">opening a ticket</a>!</h3>', 'deca'), wp_kses_allowed_html( 'post')),
		),  		
	),
);

Redux::setSection(UN, $home_section);

// POST TYPES
$posttypes_section = array(
	'title'  => esc_html__('Post Types', 'deca'),
	'id'     => 'posttypes',
	'icon'   => 'el el-th-large',
	'fields' => array( 
	
		// Related Posts
		array(
			'id'       => 'opt-posttypes-posts-related',
			'type'     => 'switch',
			'title'    => esc_html__('Related Posts', 'deca'),
			'default'  => true,
		),
		
		// Comments Posts
		array(
			'id'       => 'opt-posttypes-posts-comments',
			'type'     => 'switch',
			'title'    => esc_html__('Comments Posts', 'deca'),
			'default'  => true,
		),
	
		// Related Projects
		array(
			'id'       => 'opt-posttypes-projects-related',
			'type'     => 'switch',
			'title'    => esc_html__('Related Projects', 'deca'),
			'default'  => true,
		),
		
		// Related Cases
		array(
			'id'       => 'opt-posttypes-cases-related',
			'type'     => 'switch',
			'title'    => esc_html__('Related Case of Studies', 'deca'),
			'default'  => true,
		),
	
	),
);

Redux::setSection(UN, $posttypes_section);

// SHOP - WOOCOMMERCE
$shop_section = array(
	'title'  => esc_html__('Shop', 'deca'),
	'id'     => 'shop',
	'icon'   => 'el el-shopping-cart',
	'fields' => array(
	
		// Header Type
        array(
            'id'       => 'opt-shop-header-type',
            'type'     => 'select',
            'title'    => esc_html__('Header Type', 'deca'),
            'options'  => array(
                'border' => esc_html__('Border', 'deca'),
                'top' => esc_html__('Top', 'deca'),
            ),
            'default'  => 'border',
        ),
		
		// Top Header Settings
        array(
            'id'       => 'opt-shop-header-top-type',
            'type'     => 'select',
            'title'    => esc_html__('Header Background', 'deca'),
            'options'  => array(
                'white' => esc_html__('White', 'deca'),
                'black' => esc_html__('Black', 'deca'),
            ),
            'default'  => 'white',
			'required' => array('opt-shop-header-type','equals','top'),
        ),
		
		// Hero Section Type
		array(
            'id'       => 'opt-shop-hero-type',
            'type'     => 'select',
            'title'    => esc_html__('Hero Section', 'deca'),
            'options'  => array(
                'title' => esc_html__('Simple Title', 'deca'),
                'advanced' => esc_html__('Advanced', 'deca'),
            ),
            'default'  => 'title',
        ),
		
		
		// SIMPLE TITLE //
		
			// Message
			array(
				'id'    => 'opt-shop-hero-simple',
				'type'  => 'info',
				'title' => esc_html__('You choosen Simple Title', 'deca'),
				'style' => 'warning',
				'desc'  => esc_html__('The system will use the standard page title you set in your shop page.', 'deca'),
				'required' => array('opt-shop-hero-type','equals','title'),
			),
		
		
		// ADVANCED HERO //
		
			// Background
			array(         
				'id'       => 'opt-shop-hero-adv-background',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'deca'),
				'default'  => array(
					'background-color' => '#F5F8FA',
				),
				'output'   => array( '#un-advanced-shop-hero' ),
				'required' => array('opt-shop-hero-type','equals','advanced'),
			),
			
			// Overlay
			array(
				'id'       => 'opt-shop-hero-adv-overlay',
				'type'     => 'select',
				'title'    => esc_html__('Overlay', 'deca'),
				'options'  => array(
					' ' => esc_html__('None', 'deca'), 
					'un-bg-w-90' => esc_html__('Light 90%', 'deca'),
					'un-bg-w-80' => esc_html__('Light 80%', 'deca'),
					'un-bg-w-70' => esc_html__('Light 70%', 'deca'),
					'un-bg-w-60' => esc_html__('Light 60%', 'deca'),
					'un-bg-w-50' => esc_html__('Light 50%', 'deca'),
					'un-bg-w-40' => esc_html__('Light 40%', 'deca'),
					'un-bg-w-30' => esc_html__('Light 30%', 'deca'),
					'un-bg-w-20' => esc_html__('Light 20%', 'deca'),
					'un-bg-w-10' => esc_html__('Light 10%', 'deca'),
					'un-bg-b-90' => esc_html__('Dark 90%', 'deca'),
					'un-bg-b-80' => esc_html__('Dark 80%', 'deca'),
					'un-bg-b-70' => esc_html__('Dark 70%', 'deca'),
					'un-bg-b-60' => esc_html__('Dark 60%', 'deca'),
					'un-bg-b-50' => esc_html__('Dark 50%', 'deca'),
					'un-bg-b-40' => esc_html__('Dark 40%', 'deca'),
					'un-bg-b-30' => esc_html__('Dark 30%', 'deca'),
					'un-bg-b-20' => esc_html__('Dark 20%', 'deca'),
					'un-bg-b-10' => esc_html__('Dark 10%', 'deca'),
				),
				'default'  => ' ',
				'required' => array('opt-shop-hero-type','equals','advanced'),
			),
			
			// Text Color
			array(
				'id'       => 'opt-shop-hero-adv-txt-color',
				'type'     => 'select',
				'title'    => esc_html__('Text Color', 'deca'),
				'options'  => array(
					' ' => esc_html__('Default', 'deca'), 
					'un-txt-w' => esc_html__('Light', 'deca'),
					'un-txt-b' => esc_html__('Dark', 'deca'),
				),
				'default'  => ' ',
				'required' => array('opt-shop-hero-type','equals','advanced'),
			),
		
			// Title
			array(
				'id'       => 'opt-shop-hero-adv-title',
				'type'     => 'text',
				'title'    => esc_html__('Shop Title', 'deca'),
				'default'  => esc_html__('Shop', 'deca'),
				'required' => array('opt-shop-hero-type','equals','advanced'),
			),
			
			// Bread
			array(
				'id'       => 'opt-shop-hero-adv-bread',
				'type'     => 'switch',
				'title'    => esc_html__('Breadcrumb', 'deca'),
				'default'  => true,
				'required' => array('opt-shop-hero-type','equals','advanced'),
			),
			
		// Related
		array(
			'id'       => 'opt-shop-related',
			'type'     => 'switch',
			'title'    => esc_html__('Related Products', 'deca'),
			'default'  => true,
		),
						
		// Columns
		array(
			'id'       => 'opt-shop-cols',
			'type'     => 'image_select',
			'title'    => esc_html__('Products Columns', 'deca'), 
			'options'  => array(
				'2'      => array(
					'alt'   => esc_html__('2 Columns', 'deca'), 
					'img'  => UN_THEME_URI.'assets/img/opt_2cols.png'
				),
				'3'      => array(
					'alt'   => esc_html__('3 Columns', 'deca'), 
					'img'   => UN_THEME_URI.'assets/img/opt_3cols.png'
				),
				'4'      => array(
					'alt'   => esc_html__('4 Columns', 'deca'), 
					'img'   => UN_THEME_URI.'assets/img/opt_4cols.png'
				),
			),
			'default' => '3'
		),
				
		// Enable Sidebar
        array(
            'id'       => 'opt-shop-sidebar',
            'type'     => 'switch',
            'title'    => esc_html__('Sidebar', 'deca'),
            'default'  => true,
        ),
			
	),
);

if ( class_exists( 'WooCommerce' ) ) {
	Redux::setSection(UN, $shop_section);
}


// ADVANCED
$advanced_section = array(
	'title'  => esc_html__('Advanced', 'deca'),
	'id'     => 'advanced',
	'icon'   => 'el el-wrench',
	'fields' => array(
				
		// Loader Type
        array(
            'id'       => 'opt-adv-loader-type',
            'type'     => 'select',
            'title'    => esc_html__('Loader Type', 'deca'),
            'options'  => array(
                'theme' => esc_html__('Theme', 'deca'),
                'custom' => esc_html__('Custom', 'deca'),
            ),
            'default'  => 'theme',
        ),
		
		// Custom Image Loader
		array(
			'id'       => 'opt-adv-custom-loader',
			'type'     => 'media', 
			'url'      => true,
			'title'    => esc_html__('Custom Loader', 'deca'),
			'subtitle' => esc_html__('Set the custom loader to overwrite the loader of the theme.', 'deca'),
			'default'  => array(
				'url' => UN_THEME_URI.'assets/img/logo3.png',
			),
			'required' => array('opt-adv-loader-type','equals','custom'),
		),
		
		// Page Loading
		array(
			'id'       => 'opt-adv-page-loading',
			'type'     => 'select', 
			'title'    => esc_html__('Page Loading', 'deca'),
			'options'  => array(
                'all' => esc_html__('All Pages', 'deca'),
                'home' => esc_html__('Only Home', 'deca'),
				'disabled' => esc_html__('Disabled', 'deca'),
            ),
            'default'  => 'all',
		),

        // 404 Page Content
        array(
            'id'       => 'opt-adv-error-page-content',
            'type'     => 'editor',
            'title'    => esc_html__('404/Error Page Content', 'deca'),
            'subtitle' => esc_html__('Customize your 404 page with useful content.', 'deca'),
            'default'  => esc_html__('Sorry the current page is not exist.. Try again or use the menu links', 'deca'),
            'args'     => array(
                'wpautop' => true,
                'teeny'            => true,
                'textarea_rows'    => 10
            )
        ),

		// Head Custom Code
		array(
			'id'       => 'opt-adv-custom-head',
			'type'     => 'ace_editor',
			'title'    => esc_html__('Head Custom Code', 'deca'),
			'subtitle' => esc_html__('Useful for Google Analytics or other scripts and codes.', 'deca'),
			'mode'     => 'html',
			'theme'    => 'chrome',
		),
		
		// Foot Custom Code
		array(
			'id'       => 'opt-adv-custom-foot',
			'type'     => 'ace_editor',
			'title'    => esc_html__('Foot Custom Code', 'deca'),
			'subtitle' => esc_html__('Useful for foot scripts and codes.', 'deca'),
			'mode'     => 'html',
			'theme'    => 'chrome',
		),
		
		// Custom CSS
		array(
			'id'       => 'opt-adv-custom-css',
			'type'     => 'ace_editor',
			'title'    => esc_html__('Custom CSS', 'deca'),
			'subtitle' => esc_html__('Useful for your CSS classes or to edit the css style without open files.', 'deca'),
			'mode'     => 'css',
			'theme'    => 'chrome',
		),

        // HIDE unCommons News & Notices (backend)
        array(
            'id'       => 'opt-adv-unCommons-hide',
            'type'     => 'switch',
            'title'    => esc_html__('Hide unCommons News & Notices', 'deca'),
            'default'  => false,
        ),

	),
);

Redux::setSection(UN, $advanced_section);