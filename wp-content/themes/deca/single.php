<?php
/*
Description: The Single
Theme: DECA
*/
?>

<?php get_header(); ?>

<?php if ( is_active_sidebar( 'un-blog-sidebar' ) ) {

    $col_sidebar = 'un-col-md-3 un-col-sm-12 un-col-xs-12';
    $col_content = 'un-col-md-8 un-col-sm-12 un-col-xs-12';
    $side_share = '';

} else {

    $col_sidebar = 'un-col-md-3 un-col-sm-12 un-col-xs-12';
    $col_content = 'un-col-md-8 un-col-sm-12 un-col-xs-12';
    $side_share = '

        <h6 class="un-post-l">'.esc_html__('SHARE VIA', 'deca').'</h6>

        <ul class="un-shr">
            <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().'"><i class="un-fa-icon-facebook"></i></a></li>
            <li><a target="_blank" href="https://twitter.com/home?status='.get_permalink().'"><i class="un-fa-icon-twitter"></i></a></li>
            <li><a target="_blank" href="https://plus.google.com/share?url='.get_permalink().'"><i class="un-fa-icon-google-plus"></i></a></li>
        </ul>';

}
?>

<?php while ( have_posts() ) { the_post(); ?>

	<div class="un-post-w">

        <!-- THE HEADER POST -->

        <?php if( get_post_format( get_the_ID() ) != 'video' && get_post_format( get_the_ID() ) != '' ){

            $bg = 'un-bg-b-90'; }

        else {

            $bg = 'un-bg-b-20';

        } ?>

    	<div class="un-post-x <?php un_echo( $bg, 'attr' ); ?>" style="background-image: url('<?php un_echo( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), 'attr'); ?>')">
        	
            <div class="un-box un-h-f">

                <div class="un-post-h-w">
            	
                    <div class="un-post-h un-col-md-12">

                        <div class="un-post-i">
                            <span class="un-post-f"><?php un_echo(get_post_format( get_the_ID() ). ' post', 'html' ); ?></span>
                            <span class="un-und">__</span>
                            <span class="un-post-n-c"><?php comments_number( 'No comments', '1 comments', '% comments' ); ?></span>

                        </div>

                        <h2 class="un-post-t"><?php the_title(); ?></h2>

                        <div class="un-post-m">

                            <span class="un-post-a"><?php the_author(); ?></span>
                            <span class="un-slh">/</span>

                            <span class="un-post-d"><?php the_date(); ?></span>
                            <span class="un-post-d"><?php the_date(); ?></span>
                            <span class="un-slh">/</span>

                            <span class="un-post-g"><?php un_echo( un_post_terms_list( get_the_ID(), 'category', "name", ', ' , true ), 'html' ); ?></span>

                        </div>

                    </div>

                </div>
            
            </div>
        
        </div>

        <div class="un-post-b">
    
            <div class="un-box">

                <div class="un-post-c-w">

                    <div class="un-row-p">

                        <!-- THE POST -->

                        <div class="un-post-p <?php un_echo( $col_content, 'html' ); ?>">

                            <!-- CONTENT POST -->

                            <div class="un-post-c">

                                <?php the_content(); ?>

                            </div>
                            
                            <?php if ( un_redux_opt(UN, 'opt-posttypes-posts-related') == true ) { ?>

                            	<!-- RELATED POSTS -->

                                <div class="un-post-r">
    
                                    <?php
    
                                    $args = un_related_posts_query_args( get_the_ID() );
                                    $related_query = new WP_Query( $args );
    
                                    if ($related_query->have_posts()) { ?>
    
                                        <div class="un-rel-p-w">
    
                                            <h4 class="un-rel-l"><?php esc_html_e('SIMILAR ARTICLES', 'deca'); ?></h4>
    
                                            <div class="un-crs-r">
    
                                                <?php while ( $related_query->have_posts() ) {
    
                                                    $related_query->the_post(); ?>
    
                                                    <div class="un-rel-p un-rel-item">
    
                                                        <div class="un-rel-p-m un-bg-b-20">
    
                                                            <?php un_echo( un_get_the_post_thumbnail( get_the_ID(), 370, 280, true, true ), 'html' ); ?>
    
                                                            <h4 class="un-rel-p-t">
                                                                <a href="<?php un_echo( get_the_permalink(), 'html' ); ?>"><?php un_echo( get_the_title(), 'html' ); ?></a>
                                                            </h4>
    
                                                        </div>
    
                                                    </div>
    
                                                <?php } ?>
    
                                            </div>
    
                                        </div>
    
                                    <?php }
    
                                    // Restore original Post Data
                                    wp_reset_postdata();
    
                                    ?>
    
                                </div>
                            
                            <?php } ?>
                            
                            <?php if ( un_redux_opt(UN, 'opt-posttypes-posts-comments') == true ) { ?>

                                <!-- THE COMMENTS -->
    
                                <div class="un-post-r-w">
    
                                    <?php comments_template(); ?>
    
                                </div>
                            
                            <?php } ?>

                        </div>

                        <div class="un-col-md-1"></div>

                        <?php if ( is_active_sidebar( 'un-blog-sidebar' ) ) { ?>

                            <div class="un-post-s <?php un_echo( $col_sidebar, 'attr' ); ?>">

                                <?php dynamic_sidebar( 'un-blog-sidebar' ); ?>

                            </div>

                        <?php } else { ?>

                            <div class="un-post-s <?php un_echo( $col_sidebar, 'attr' ); ?>">

                                <?php un_echo( $side_share, 'html' ); ?>

                            </div>

                        <?php } ?>

                        <div class="un-clear"></div>

                    </div>

                 </div>

            </div>

        </div>
        
    </div>
    
<?php } // end of the loop ?>

<?php get_footer();