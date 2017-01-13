<?php
/*
Description: The Header Top
Theme: DECA
*/
?>

<?php $head_style = '';

// Check Header Background

switch( $head_bg ) {

    case 'white':

        $head_style .= 'un-head-bg-wh';
        $head_style .= ' un-head-bk';
        break;

    case 'black':

        $head_style .= 'un-head-bg-bk';
        $head_style .= ' un-head-wh';
        break;

    case 'transp_black':

        $head_style .= 'un-head-bk';
        break;

    case 'transp_white':

        $head_style .= 'un-head-gr';
        break;

} ?>


<div class="un-hr-top <?php un_echo( $head_style, 'attr' ); ?>">

    <div class="un-box">

        <div class="un-hr-pos">
        
			<?php 
            $logo = un_redux_opt(UN, 'opt-top-header-logo');
            if( !$logo ){ $logo = UN_THEME_URI.'assets/img/logo3.png'; }
            ?>

            <div class="un-logo">
                <a href="<?php un_echo( get_home_url('/'), 'url' ); ?>"><img src="<?php un_echo( $logo['url'], 'url' ); ?>" alt=""></a>
            </div>

            <?php
						
            $menu_split_args = array(
            'theme_location'  => '',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'un-menu-w',
            'container_id'    => 'un-menu-hor',
            'menu_class'      => 'un-menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 3,
            'walker'          => ''
            );

            ?>
            
            <?php
            // Add the right Icon to the end of main menu
            add_filter('wp_nav_menu_items','un_topmenu_final_icon', 10, 2);
            
            function un_topmenu_final_icon( $items, $args ) {
                                        
				$enable_icon = '1';
				
				if( $enable_icon == 1 ){
					return $items . '<li class="un-src-btn-top"><i class="un-fa-icon-search"></i></li>';	
				}
                      
            
                return $items;
				
            }
            ?>

            <?php wp_nav_menu( $menu_split_args ); ?>

            <div class="un-menu-w" id="un-menu-swt">

                <ul class="un-menu">
                    <li><div class="un-menu-s"><i class="un-l-icon-uniE032"></i></div></li>
                </ul>

            </div>


        </div>

    </div>

</div>

<div id="un-menu-m">

    <div class="un-menu-m-x">
        <i class="un-l-icon-uniE04A"></i>
    </div>

    <?php

    $menu_mob_args = array(
    'theme_location'  => '',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'un-menu-d-w',
    'container_id'    => 'un-menu-mob',
    'menu_class'      => 'un-menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    );

    ?>

    <?php wp_nav_menu( $menu_mob_args ); ?>


</div>