<?php
/*
Description: The Header Border
Theme: DECA
*/
?> 

<div class="un-hr-frm">

    <div class="un-hr-bar-t">
		<?php
		$logo = un_redux_opt(UN, 'opt-border-header-logo');
		if( !$logo ){ $logo = UN_THEME_URI.'assets/img/logo.png'; }
		?>
        <div class="un-logo-t">
            <a href="<?php un_echo( get_home_url('/'), 'url' ); ?>"><img src="<?php un_echo( $logo['url'], 'url' ); ?>" alt=""></a>
        </div>

    </div>

    <div class="un-hr-bar-l">

        <div class="un-menu-x">
            <i class="un-l-icon-uniE04A"></i>
        </div>

        <?php
		
		if( un_redux_opt(UN, 'opt-header-border-menu-scroll') ){
		
			$scroll_class = 'un-scroll';
				
		} else {
		
			$scroll_class = '';
				
		}

        $menu_side_args = array(
            'theme_location'  => '',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'un-menu-w '.$scroll_class,
            'container_id'    => 'un-menu-vrt',
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

        <?php wp_nav_menu( $menu_side_args ); ?>

        <div class="un-src-btn"><i class="un-fa-icon-search"></i></div>
		
        <?php
		$logo_side = un_redux_opt(UN, 'opt-border-menu-logo');
		if( !$logo_side ){ $logo_side = UN_THEME_URI.'assets/img/logo2.png'; }
		?>
        
        <div class="un-head-i">
            <img src="<?php un_echo( $logo_side['url'], 'url' ); ?>" alt="">
        </div>

        <div class="un-menu-btn">
            <div class="un-vrt un-menu-o">
                <span><?php esc_html_e('menu', 'deca'); ?></span><i class="un-fa-icon-bars"></i>
            </div>
        </div>

    </div>

    <div class="un-hr-bar-r">
        <?php if( un_redux_opt(UN, 'opt-header-border-nav') ) { ?>

            <div class="un-hr-nav"><ul class="un-dot-nav"></ul></div>

        <?php } ?>

    </div>

    <div class="un-hr-bar-b">

        <div class="un-box un-pos-r">

            <div class="un-get-t">

                <?php if( un_redux_opt(UN, 'opt-footer-touch') ){ ?>

                    <a href="<?php un_echo(un_redux_opt(UN, 'opt-footer-touch'), 'html'); ?>"><i class="un-fa-icon-envelope"></i>
                        <span><?php esc_html_e('get in touch', 'deca'); ?></span></a>

                <?php } ?>

            </div>

            <?php $icon_be = $icon_tw = $icon_fb = $icon_gp = $icon_yt = $icon_in = $icon_pin = $icon_rss = '';

            if( un_redux_opt(UN, 'opt-footer-behance') ) {

                $icon_be = '<li><a target="_blank" href="'.un_redux_opt(UN, 'opt-footer-behance').'"><i class="un-fa-icon-behance"></i></a></li>';

            } if( un_redux_opt(UN, 'opt-footer-twitter') ) {

                $icon_tw = '<li><a target="_blank" href="'.un_redux_opt(UN, 'opt-footer-twitter').'"><i class="un-fa-icon-twitter"></i></a></li>';

            } if( un_redux_opt(UN, 'opt-footer-facebook') ) {

                $icon_fb = '<li><a target="_blank" href="'.un_redux_opt(UN, 'opt-footer-facebook').'"><i class="un-fa-icon-facebook"></i></a></li>';

            } if( un_redux_opt(UN, 'opt-footer-googleplus') ) {

                $icon_gp = '<li><a target="_blank" href="' . un_redux_opt(UN, 'opt-footer-googleplus') . '"><i class="un-fa-icon-google-plus"></i></a></li>';

            } if( un_redux_opt(UN, 'opt-footer-youtube') ) {

                $icon_yt = '<li><a target="_blank" href="'.un_redux_opt(UN, 'opt-footer-youtube').'"><i class="un-fa-icon-youtube"></i></a></li>';

            } if( un_redux_opt(UN, 'opt-footer-instagram') ) {

                $icon_in = '<li><a target="_blank" href="'.un_redux_opt(UN, 'opt-footer-instagram').'"><i class="un-fa-icon-instagram"></i></a></li>';

            } if( un_redux_opt(UN, 'opt-footer-pinterest') ) {

                $icon_pin = '<li><a target="_blank" href="'.un_redux_opt(UN, 'opt-footer-pinterest').'"><i class="un-fa-icon-pinterest"></i></a></li>';

            } if( un_redux_opt(UN, 'opt-footer-rss') ) {

                $icon_rss = '<li><a target="_blank" href="'.un_redux_opt(UN, 'opt-footer-rss').'"><i class="un-fa-icon-rss"></i></a></li>';

            } ?>

            <div class="un-soc-k">

                <ul><?php un_echo($icon_be.$icon_tw.$icon_fb.$icon_gp.$icon_yt.$icon_in.$icon_pin.$icon_rss, 'html'); ?></ul>

            </div>

        </div>

    </div>

</div>
