<?php
/*
Description: The Page
Theme: DECA
*/
?>

<?php get_header(); ?>

<?php // Page Header ?>

<?php if( is_page() && redux_post_meta(UN, get_the_ID(), 'meta-header-title') == 1 ) { ?>

    <div class="un-row-h">

        <div class="un-box">

            <div class="un-pg-hd-w">

                <div class="un-pg-t-v un-hd-l un-vrt-2"><?php the_title(); ?></div>

                <div class="un-pg-t-w">

                    <div class="un-hd-l"><?php the_title(); ?></div>

                </div>

            </div>

        </div>

    </div>

<?php }

// The Loop
if ( have_posts() ) { ?>

    <div class="un-row">

        <div class="un-box">

            <?php while ( have_posts() ) { the_post(); ?>

                <div class="un-page-w">

                    <div class="un-col-md-1"></div>

                    <div class="un-col-md-10 un-page-c">

                        <?php the_content(); ?>

                    </div>

                    <div class="un-col-md-1"></div>

                    <div class="un-clear"></div>

                </div>

            <?php } ?>

        </div>

    </div>

<?php } else { ?>

    <div class="un-row">

        <div class="un-box">

            <div class="un-page-w">

                <div class="un-col-md-1"></div>

                <div class="un-page-c un-col-md-10">

                    <h3><?php esc_html_e('No posts found here!', 'deca'); ?></h3>

                </div>

                <div class="un-col-md-1"></div>

                <div class="un-clear"></div>

            </div>

        </div>

    </div>

<?php }

get_footer();