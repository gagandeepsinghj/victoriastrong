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

            <div class="un-pg-t-v un-hd-l un-vrt-2"><?php single_cat_title('',true); ?></div>

            <div class="un-pg-t-w">

                <div class="un-hd-l"><?php single_cat_title('',true); ?></div>

                <div class="un-pg-d"><?php un_echo(get_the_archive_description(), 'html'); ?></div>

            </div>

        </div>

    </div>

</div>

<?php // The Loop
if ( have_posts() ) { ?>

<div class="un-row">

    <div class="un-box">

        <div class="un-arch-w">

            <div class="un-col-md-1"></div>

            <div class="un-arch-c un-col-md-10">

            <div class="un-arch-l">

            <?php while ( have_posts() ) { the_post();

            // Author Metas
            $author_name = get_the_author_meta( 'display_name' );
            $author_id = get_the_author_meta( 'ID' ); ?>

            <div class="un-arch-p">

                <h2 class="un-arch-t"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <div class="un-arch-m">

                    <span class="un-arch-a"><a href="<?php un_echo(get_author_posts_url( $author_id, $author_name ), 'attr'); ?>"><?php un_echo(get_the_author(), 'html'); ?></a></span>
                    <span class="un-slh">/</span>

                    <span class="un-arch-d"><?php un_echo(get_the_date(), 'html'); ?></span>
                    <span class="un-slh">/</span>

                    <span class="un-arch-c"><?php un_echo(un_post_terms_list( get_the_ID(), 'category', 'name', ', ' , true ), 'html'); ?></span>

                </div>

                <div class="un-arch-e"><?php un_echo(get_the_excerpt(), 'html'); ?></div>

                </div>

            <?php } ?>

            </div>

            <?php un_echo(un_pagination(), 'html'); ?>

        </div>

            <div class="un-col-md-1"></div>

            <div class="un-clear"></div>

        </div>

    </div>

</div>

<?php } else { ?>

    <div class="un-row">

        <div class="un-box">

            <div class="un-arch-w">

                <div class="un-col-md-1"></div>

                <div class="un-arch-c un-col-md-10">
                    <h3><?php esc_html_e('No posts found here!', 'deca'); ?></h3>
                </div>

                <div class="un-col-md-1"></div>

                <div class="un-clear"></div>

            </div>

     </div>

    </div>

<?php }

get_footer();