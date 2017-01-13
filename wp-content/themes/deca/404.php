<?php
/*
Description: The Archive
Theme: DECA
*/
?>

<?php get_header(); ?>

<?php // Archive Header ?>

<div class="un-row-h">

    <div class="un-box">

        <div class="un-pg-hd-w">

            <div class="un-pg-t-v un-hd-l un-vrt-2"><?php esc_html_e('Error', 'deca') ?><br><?php esc_html_e('404', 'deca') ?></div>

            <div class="un-pg-t-w">

                <div class="un-hd-l"><?php esc_html_e('Error', 'deca') ?><br><?php esc_html_e('404', 'deca') ?></div>

                <div class="un-pg-d"><?php un_echo(un_redux_opt(UN, 'opt-adv-error-page-content'), 'html'); ?></div>

            </div>

        </div>

    </div>

</div>


<?php get_footer();

