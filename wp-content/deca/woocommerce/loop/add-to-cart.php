<?php
/**
 * Loop Add to Cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product; ?>

<div class="un-btns-woo">

<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<div class="un-btn-woo un-btn-cart"><a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="%s product_type_%s"><i class="un-l-icon-uniEE"></i></a></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->product_type )
		// esc_html( $product->add_to_cart_text() )
	),
$product ); ?>

<div class="un-btn-woo un-btn-view"><a href="<?php the_permalink(); ?>"><i class="un-l-icon-uni48"></i></a></div>

</div>
