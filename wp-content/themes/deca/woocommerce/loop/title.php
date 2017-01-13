<?php
/**
 * Product loop title
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<h6 class="un-prod-t-l"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
