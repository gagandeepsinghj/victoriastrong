<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 


// Shop Options
$hero_type = un_redux_opt(UN, 'opt-shop-hero-type', 'title');

if( $hero_type == 'advanced' ){
	$hero_overlay = un_redux_opt(UN, 'opt-shop-hero-adv-overlay', ' ');
	$hero_txt_color = un_redux_opt(UN, 'opt-shop-hero-adv-txt-color', ' ');
	$hero_title = un_redux_opt(UN, 'opt-shop-hero-adv-title', 'Shop');
	$hero_bread = un_redux_opt(UN, 'opt-shop-hero-adv-bread', true);
}else{
	$hero_overlay = $hero_txt_color = '';
	$hero_title = get_the_title( wc_get_page_id('shop') );
	$hero_bread = false;
}

$shop_sidebar = un_redux_opt(UN, 'opt-shop-sidebar', true);

if( $shop_sidebar ){
	$conten_col = 'un-col-md-9';
}else{
	$conten_col = 'un-col-md-12';
}

?>



<div class="un-shop">

	<?php if( $hero_type == 'advanced' ){ ?>
    
        <div id="un-advanced-shop-hero" class="un-row-h-s <?php un_echo( $hero_overlay, 'attr' ); ?> <?php un_echo( $hero_txt_color, 'attr' ); ?>">
    
            <div class="un-box">
              
              <div class="un-col-md-12 un-shop-h-w">
        
                <h3 class="un-shop-t"><?php un_echo( $hero_title, 'html' ); ?></h3>
        		
                <?php if( $hero_bread ){ 
				
					 $bread_args = array(
						'delimiter'  => '<span class="un-slh">/</span>',
						'wrap_before'  => '<div class="un-shop-b" itemprop="breadcrumb">',
						'wrap_after' => '</div>',
						'before'   => '<span>',
						'after'   => '</span>',
					);
					
					woocommerce_breadcrumb( $bread_args );
					
				} ?>
                
              </div>
        
            </div>
        
        </div>
    
    <?php }else{ ?>
    
        <div class="un-row-h">
    
            <div class="un-box">
    
                <div class="un-pg-hd-w">
    
                    <div class="un-pg-t-v un-hd-l un-vrt-2"><?php un_echo( $hero_title, 'html' ); ?></div>
    
                    <div class="un-pg-t-w">
    
                        <div class="un-hd-l"><?php un_echo( $hero_title, 'html' ); ?></div>
    
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    <?php } ?>
        
	<div class="un-box">
    
    	 <?php if( $shop_sidebar ){ ?>
            <div class="un-col-md-3 un-shop-s">
        
                <?php // Shop Sidebar
                    dynamic_sidebar( 'un-shop-sidebar' );
                ?>
            
            </div>
        <?php } ?>
    
    	<div class="<?php un_echo( $conten_col, 'attr' ); ?> un-shop-c">
		    
            <?php if ( have_posts() ) : ?>
    
                <?php
                    /**
                     * woocommerce_before_shop_loop hook
                     *
                     * @hooked woocommerce_result_count - 20
                     * @hooked woocommerce_catalog_ordering - 30
                     */
                    do_action( 'woocommerce_before_shop_loop' );
                ?>
    
                <?php woocommerce_product_loop_start(); ?>
    
                    <?php woocommerce_product_subcategories(); ?>
    
                    <?php while ( have_posts() ) : the_post(); ?>
    
                        <?php wc_get_template_part( 'content', 'product' ); ?>
    
                    <?php endwhile; // end of the loop. ?>
    
                <?php woocommerce_product_loop_end(); ?>
    
                <?php
                    /**
                     * woocommerce_after_shop_loop hook
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                ?>
    
            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
    
                <?php wc_get_template( 'loop/no-products-found.php' ); ?>
    
            <?php endif; ?>
        
        </div>        
        
        <div class="un-clear"></div>
    
	</div> 
    
</div>

<?php
	/**
	 * woocommerce_archive_description hook
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );

?>


<?php get_footer( 'shop' ); ?>
