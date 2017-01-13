<?php
/*
Description: Mega Projects Widget
Theme: DECA
*/
 
add_action( 'widgets_init', 'un_mega_projects' );


function un_mega_projects() {
	register_widget( 'UN_Mega_Projects' );
}

class UN_Mega_Projects extends WP_Widget {

	function UN_Mega_Projects() {
		
		$widget_ops = array( 'classname' => 'un-mega-projects', 'description' => esc_html__('Display the projects as you want', 'deca') );

        WP_Widget::__construct( 'un-mega-projects', esc_html__('UN: Mega Projects', 'deca'), $widget_ops );
		
	}
	
	// Display Widget 
	
	function widget( $args, $instance ) {
		
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Mega Projects' : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ) {
 			$number = 5;
		}
		if ( !empty( $instance['orderby'] ) ) {
 			$orderby = $instance['orderby'];
		}else{
			$orderby = 'none';
		}
		if ( !empty( $instance['orderdir'] ) ) {
 			$orderdir = $instance['orderdir'];
		}else{
			$orderdir = 'DESC';
		}
		if ( !empty( $instance['cat_filter'] ) &&  !in_array('-1', $instance['cat_filter']) ) {
 			$cat_filter = array(array( 'taxonomy' => 'un-portfolio-categories', 'field' => 'id', 'terms' => $instance['cat_filter'] ));
		}else{
			$cat_filter = array();
		}
		
		
		// Query
		$qr_args = array (
			'post_type' => 'un-portfolio',
			'tax_query' => $cat_filter,
			'posts_per_page' => $number, 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => true,
			'orderby' => $orderby, 
			'order' => $orderdir,
		);
		
		$qr = new WP_Query( $qr_args );
		
		// START WIDGET HTML
		
		if ( $qr->have_posts() ) {
			
			// Before Widget
			un_echo($before_widget, 'html');
	
			// Display the widget title 
			if ( $title ) {
				un_echo($before_title.$title.$after_title, 'html');
			}

            ?>
			
			    <div class="un-wdg-p-l">

                    <ul>

                        <?php while ($qr->have_posts()) { $qr->the_post();

                            $post_cat_ar = wp_get_post_terms( get_the_ID(), 'un-portfolio-categories');
                            $post_cat = $post_cat_ar[0]->name; ?>

                                <li class="un-wdg-p">

                                    <div class="un-wdg-p-t"><a href="<?php get_the_permalink(); ?>"><?php un_echo(un_get_the_post_thumbnail(get_the_ID(), 100, 100, true), 'html'); ?></a></div>

                                    <div class="un-wdg-p-b">

                                        <div class="un-wdg-p-t"><a href="<?php un_echo(get_the_permalink(), 'attr'); ?>"><?php un_echo(get_the_title(), 'html'); ?></a></div>

                                        <div class="un-wdg-p-m"><?php un_echo(get_the_date(), 'html'); ?></div>

                                    </div>

                                </li>

                        <?php } ?>

                    </ul>

            </div>
			
			<?php // After Widget
			un_echo($after_widget, 'html');
			
		}
		
		// Restore original Post Data
		wp_reset_postdata();
		
		
	}

	// Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['cat_filter'] = $new_instance['cat_filter'];
		$instance['orderby'] = $new_instance['orderby'];
		$instance['orderdir'] = $new_instance['orderdir'];

		return $instance;
		
	}

	
	function form( $instance ) {
		
		$title = isset($instance['title']) ? esc_attr($instance['title']) :  esc_html__('Mega Projects', 'deca');
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		$cat_filter = isset($instance['cat_filter']) ? $instance['cat_filter'] : array('-1');
		$orderby = isset($instance['orderby']) ? $instance['orderby'] : 'none';
		$orderdir = isset($instance['orderdir']) ? $instance['orderdir'] : 'DESC';
?>

	
		<p><label for="<?php un_echo($this->get_field_id('title'), 'attr'); ?>"><?php un_echo('Title:', 'html'); ?></label>
		<input class="widefat" id="<?php un_echo($this->get_field_id('title'), 'attr'); ?>" name="<?php un_echo($this->get_field_name('title'), 'attr'); ?>" type="text" value="<?php un_echo($title, 'attr'); ?>" /></p>

		<p><label for="<?php un_echo($this->get_field_id('number'), 'attr'); ?>"><?php un_echo('Number of projects to show:', 'html'); ?></label>
		<input id="<?php un_echo($this->get_field_id('number'), 'attr'); ?>" name="<?php un_echo($this->get_field_name('number'), 'attr'); ?>" type="text" value="<?php un_echo($number, 'attr'); ?>" size="3" /></p>

		<p>
			<label for="<?php un_echo($this->get_field_id( 'cat_filter' ), 'attr'); ?>"><?php esc_html_e('Category Filter:', 'deca'); ?></label>
            
			<?php $categories = get_terms( 'un-portfolio-categories', array('orderby' => 'name','order' => 'ASC')); ?>
		       
       		<select multiple="multiple" id="<?php un_echo($this->get_field_id( 'cat_filter' ), 'attr'); ?>" name="<?php un_echo($this->get_field_name( 'cat_filter' ).'[]', 'attr'); ?>" class="widefat">
            <option <?php if ( in_array('-1', $cat_filter) ){ un_echo('selected="selected"', 'attr'); } ?> value="-1"><?php esc_html_e('All Categories', 'deca');?></option>
    		<?php foreach ($categories as $category) {  ?>
            <option <?php if ( $cat_filter && in_array($category->term_id, $cat_filter) ){ un_echo('selected="selected"', 'attr'); } ?> value="<?php un_echo($category->term_id, 'attr'); ?>"><?php un_echo($category->name, 'html') ; ?></option>
			<?php } ?>
    		</select>
		</p>


		 <p><label for="<?php un_echo( $this->get_field_id('orderby'), 'attr'); ?>"><?php echo 'Order projects by:'; ?></label>
		<select id="<?php un_echo( $this->get_field_id( 'orderby' ), 'attr'); ?>" name="<?php un_echo( $this->get_field_name( 'orderby' ), 'attr'); ?>" class="widefat">



            <option <?php if ($orderby == 'none' ){ un_echo('selected="selected"', 'attr'); } ?> value="none">No order</option>



            <option <?php if ($orderby == 'comment_count' ){ un_echo('selected="selected"', 'attr'); } ?> value="comment_count">Comment Count</option>



            <option <?php if ($orderby == 'date' ){ un_echo('selected="selected"', 'attr'); } ?> value="date">Creation Date</option>



            <option <?php if ($orderby == 'modified' ){ un_echo('selected="selected"', 'attr'); } ?> value="modified">Edit Date</option>



            <option <?php if ($orderby == 'title' ){ un_echo('selected="selected"', 'attr'); } ?> value="title">Title</option>



            <option <?php if ($orderby == 'rand' ){ un_echo('selected="selected"', 'attr'); } ?> value="rand">Random</option>



        </select>



        </p>
        <p><label for="<?php un_echo($this->get_field_id('orderdir'), 'attr'); ?>"><?php un_echo('Order direction:', 'html'); ?></label>
		<select id="<?php un_echo($this->get_field_id( 'orderdir' ), 'attr'); ?>" name="<?php un_echo($this->get_field_name( 'orderdir' ), 'html'); ?>" class="widefat">



            <option <?php if ($orderdir == 'ASC' ){ un_echo('selected="selected"', 'attr'); } ?> value="ASC">Ascending order </option>



            <option <?php if ($orderdir == 'DESC' ){ un_echo('selected="selected"', 'attr'); } ?> value="DESC">Descending order</option>



        </select>



        </p>

	<?php
	}
}

?>