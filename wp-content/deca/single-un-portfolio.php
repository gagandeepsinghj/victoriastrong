<?php
/*
Description: Visual Composer Single Project
Theme: DECA
*/
?>

<?php get_header(); ?>

<?php while ( have_posts() ) { the_post(); ?>

	<?php the_content(); ?>    
    
<?php } // end of the loop.


// Related Projects

$args = un_related_posts_query_args( get_the_ID(), 'un-portfolio-categories', 3 );

// The Query
$rel_query = new WP_Query( $args ); ?>

<div class="un-box">

    <div class="un-rel-w-w">

        <h4 class="un-rel-w-t"><?php esc_html_e('Similar Projects', 'deca'); ?></h4>
        <div class="un-rel-w-s"><?php un_echo(get_the_excerpt(), 'html'); ?></div>

        <?php // The Loop
        if ( $rel_query->have_posts() ) {

            $i = 0;

            while ( $rel_query->have_posts() ) {
                $rel_query->the_post();

                $thumb = un_get_the_post_thumbnail( get_the_ID(), 1110, 280, true, true );

                switch( $i ){

                    case 0:

                        $rel_class = '';
                        break;

                    case 1:

                        $rel_class = 'un-col-md-6 un-no-p-l';
                        break;

                    case 2:

                        $rel_class = 'un-col-md-6 un-no-p-r';
                        break;


                } ?>

                <div class="un-rel-w-p <?php un_echo($rel_class, 'attr'); ?>">

                    <a href="<?php un_echo(get_the_permalink(), 'attr'); ?>">
                        <?php un_echo($thumb, 'html'); ?></a>

                </div>

                <?php $i++; ?>


            <?php }


        } ?>

        <div class="un-clear"></div>

    </div>

</div>

<?php get_footer();
