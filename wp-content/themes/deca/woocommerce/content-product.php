<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Columns
$shop_cols = un_redux_opt(UN, 'opt-shop-cols', '3');

switch( $shop_cols ){
	
	case '2':
	$col_class = 'un-col-md-6 un-col-sm-6 un-col-xs-12';
	break;
	
	case '3':
	$col_class = 'un-col-md-4 un-col-sm-6 un-col-xs-12';
	break;
	
	case '4':
	$col_class = 'un-col-md-3 un-col-sm-6 un-col-xs-12';
	break;
	
	default:
	$col_class = 'un-col-md-4 un-col-sm-6 un-col-xs-12';
	break;
	
}

?>
<div class="un-prod-col <?php un_echo( $col_class, 'attr' ); ?>">

	<div class="un-prod-i">

		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
    
        <div class="un-prod-k">
        
            <div class="un-prod-h">
            
                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                
            </div>
    
            <?php
                /**
                 * woocommerce_before_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                 */
                do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>
                    
        </div>
        
        <div class="un-prod-c">
        
            <?php
        
                /**
                 * woocommerce_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_template_loop_product_title - 10
                 */
                do_action( 'woocommerce_shop_loop_item_title' ); 
                        
            
                /**
                 * woocommerce_after_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item_title' );
                
            ?>
        
        </div>
    
    </div>

</div>
