<?php
/*
Description: The Header
Theme: DECA
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
   
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
    <?php un_echo(un_redux_opt(UN, 'opt-adv-custom-head'), 'full'); ?>

    <?php wp_head(); ?>
    
</head>

<?php

$head_type = '';
$head_bg = '';
$head_class = '';

if( (is_page() || is_single()) && redux_post_meta(UN, get_the_ID(), 'meta-header-type') ) {

    $head_type = redux_post_meta(UN, get_the_ID(), 'meta-header-type');

}

if( empty( $head_type ) ){

    $head_type = un_redux_opt(UN, 'opt-header-type');

}

if( (is_page() || is_single()) &&  redux_post_meta(UN, get_the_ID(), 'meta-header-top-type') ) {

    $head_bg = redux_post_meta(UN, get_the_ID(), 'meta-header-top-type');

}

if( empty( $head_bg ) ){

    $head_bg = un_redux_opt(UN, 'opt-header-top-type');

}

// Shop Header
if( un_is_woocommerce() ) {
	
	$head_type = un_redux_opt(UN, 'opt-shop-header-type', 'border');
	$head_bg = un_redux_opt(UN, 'opt-shop-header-top-type', 'white');
	
}



// Check Header Style

switch( $head_type ) {

    case 'top':

        $head_class .= 'un-head-top';
        break;

    case 'border':

        $head_class .= 'un-head-brd';
        break;

}

if( $head_type == 'top' ) {

    // Check Header Background

    switch( $head_bg ) {

        case 'white':

            $head_class .= ' un-head-bg-1';
            break;

        case 'black':

            $head_class .= ' un-head-bg-1';
            break;

        case 'transp_white':

            $head_class .= ' un-head-bg-0';
            break;

        case 'transp_black':

            $head_class .= ' un-head-bg-0';
            break;

    }
}

?>

<body <?php body_class( $head_class ); ?>>

<?php $page_load = un_redux_opt(UN, 'opt-adv-page-loading'); ?>

<?php $loader_type = un_redux_opt(UN, 'opt-adv-loader-type'); ?>

<?php $loader = un_redux_opt(UN, 'opt-adv-custom-loader'); ?>


<?php switch( $page_load ){

    case 'all': ?>

        <div id="un-mask">
        
        	<?php if ( $loader_type == 'theme' ) { ?>

                <div id="un-spin">
    
                    <div id="un-sqr-vrt"></div>
                    <div id="un-sqr-hor"></div>
    
                </div>
            
            <?php } else { ?>
            
            	<div class="un-load"><img src="<?php un_echo( $loader['url'], 'url' ); ?>" alt=""></div>
            
            <?php } ?>

        </div>

    <?php break;

    case 'home':

        if( is_home() || is_front_page() ){ ?>

            <div id="un-mask">
            
        		<?php if ( $loader_type == 'theme' ) { ?>

                    <div id="un-spin">
    
                        <div id="un-sqr-vrt"></div>
                        <div id="un-sqr-hor"></div>
    
                    </div>
                
            	<?php } else { ?>
                
                	<div class="un-load"><img src="<?php un_echo( $loader['url'], 'url' ); ?>" alt=""></div>
                
                <?php } ?>

            </div>

        <?php }

        break;

    default:

        break;


} ?>

<header class="un-head">

    <?php switch( $head_type ){

        case 'border':

            include( UN_THEME_DIR . 'headers/header-border.php' );
            break;

        case 'top':

            include( UN_THEME_DIR . 'headers/header-top.php' );
            break;

    } 
	
    if( un_is_woocommerce() ) {
		
		include( UN_THEME_DIR . 'headers/header-shop.php' );	
		
	}
	
	?>

</header>