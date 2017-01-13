<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div class="un-prod-w un-row">

    <div class="un-box">
    
         
            <?php while ( have_posts() ) : the_post(); ?>
    
                <?php wc_get_template_part( 'content', 'single-product' ); ?>
    
            <?php endwhile; // end of the loop. ?>
        
	</div>
    
</div>

<?php 
$shop_content = get_post( wc_get_page_id('shop') );
$shop_content = $shop_content->post_content;
un_echo( do_shortcode($shop_content), 'full' );
?>

<?php get_footer( 'shop' ); ?>
