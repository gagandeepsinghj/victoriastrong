<?php
/*
Description: The Footer
Theme: DECA
*/
?>

<?php if( !is_page() || (is_page() && redux_post_meta(UN, get_the_ID(), 'meta-footer-widgets') == 1 ) ) { ?>

    <footer class="un-foot un-row">

        <div class="un-box">

        <?php $footer_col = un_redux_opt(UN, 'footer-widgets-col');

        switch( $footer_col ) {

            case 2: ?>

                <div class="un-col-md-6 un-col-f">
                    <div class="un-p-t-80 un-p-b-80">
                        <?php dynamic_sidebar( 'un-foot1-sidebar' ); ?>
                    </div>
                </div>

                <div class="un-col-md-6 un-col-f">
                    <div class="un-p-t-80 un-p-b-80">
                        <?php dynamic_sidebar( 'un-foot2-sidebar' ); ?>
                    </div>
                </div>

                <div class="un-clear"></div>

            <?php break;

            case 3: ?>

                <div class="un-col-md-4 un-col-f">
                    <div class="un-p-t-80 un-p-b-80">
                        <?php dynamic_sidebar( 'un-foot1-sidebar' ); ?>
                    </div>
                </div>

                <div class="un-col-md-4 un-col-f">
                    <div class="un-p-t-80 un-p-b-80">
                        <?php dynamic_sidebar( 'un-foot2-sidebar' ); ?>
                    </div>
                </div>

                <div class="un-col-md-4 un-col-f">
                    <div class="un-p-t-80 un-p-b-80 un-bg-w">
                        <?php dynamic_sidebar( 'un-foot3-sidebar' ); ?>
                    </div>
                </div>

                <div class="un-clear"></div>

                <?php break;

            case 4: ?>

                <div class="un-col-md-3 un-col-f">
                    <div class="un-p-t-80 un-p-b-80">
                        <?php dynamic_sidebar( 'un-foot1-sidebar' ); ?>
                    </div>
                </div>

                <div class="un-col-md-3 un-col-f">
                    <div class="un-p-t-80 un-p-b-80">
                        <?php dynamic_sidebar( 'un-foot2-sidebar' ); ?>
                    </div>
                </div>

                <div class="un-col-md-3 un-col-f">
                    <div class="un-p-t-80 un-p-b-80 un-bg-w">
                        <?php dynamic_sidebar( 'un-foot3-sidebar' ); ?>
                    </div>
                </div>

                <div class="un-col-md-3 un-col-f">
                    <div class="un-p-t-80 un-p-b-80">
                        <?php dynamic_sidebar( 'un-foot4-sidebar' ); ?>
                    </div>
                </div>

                <div class="un-clear"></div>

                <?php break;

        } ?>

	    </div>
        
    </footer>

<?php } else { ?>

    <footer></footer>

<?php } ?>

<?php if( is_page() && redux_post_meta(UN, get_the_ID(), 'meta-header-type') ) {

    $head_type = redux_post_meta(UN, get_the_ID(), 'meta-header-type');

}

if( empty( $head_type ) ){

    $head_type = un_redux_opt(UN, 'opt-header-type');

}

if ( $head_type == 'top' ) { ?>

    <div class="un-hr-b">

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

    <div class="un-btn-top"><i class="un-fa-icon-chevron-up"></i></div>

<?php } ?>

<!-- Search Modal -->
<div id="un-src-mdl" class="un-src-mdl">
	
    <div class="un-src-x"><i class="un-l-icon-uniE04A"></i></div>
	
    <form id="un-src-form" class="un-src-form" action="<?php un_echo( home_url( '/' ), 'url' ); ?>" method="get">
    	<input type="textbox" name="s" placeholder="search..." value="" id="un-src-field" class="un-src-field">
        <?php if( un_is_woocommerce() ){ ?>
        	<input type="hidden" name="post_type" value="product">
        <?php } ?>
        <div class="un-src-row"></div>
    </form>

</div>

<?php wp_footer(); ?>

</body>
</html>