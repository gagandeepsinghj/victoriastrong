<?php
/*
Description: The Header Shop
Theme: DECA
*/
?>

<div class="un-hr-top-shop">

    <div class="un-box">

        <div class="un-col-lg-8 un-col-md-12 un-col-sm-12 un-col-xs-12 un-menu-left-shop">
        
            <?php
									
            $menu_shop_args = array(
            'theme_location'  => 'shop-location',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'un-menu-w un-menu-shop',
            'container_id'    => 'un-menu-shop-l',
            'menu_class'      => 'un-menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => '',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 1,
            'walker'          => ''
            );

            ?>
            
            <?php wp_nav_menu( $menu_shop_args ); ?>

        </div>
        
        <?php
		
		global $woocommerce;
		$cart_url = $woocommerce->cart->get_cart_url();
		$cart_count = $woocommerce->cart->cart_contents_count; 
		$cart_total = $woocommerce->cart->cart_contents_total.' '.get_woocommerce_currency_symbol(); 
		?>
        
        <div class="un-col-lg-4 un-col-md-12 un-col-sm-12 un-col-xs-12 un-menu-right-shop">
        	
            <div id="un-menu-shop-r" class="un-menu-w un-menu-shop">
                <ul class="un-menu">
                    
                    <li class="un-src-btn-top"><i class="un-fa-icon-search"></i></li>
                    
                    <li>
                    	<span class="un-cart-icon">
                        	<a href="<?php un_echo( $cart_url, 'url' ); ?>">
                    			<i class="un-l-icon-uniEA"></i>
                                <span class="un-cart-count"><?php un_echo( $cart_count, 'html' ); ?></span>
                                <span class="un-cart-info"><?php un_echo( esc_html__('Total Price: ', 'deca').$cart_total, 'html' ); ?></span>                          
                            </a>
                        </span>
                    </li>
                            
                </ul>
            </div>
            
        </div>
        
        <div class="un-clear"></div>

    </div>

</div>
