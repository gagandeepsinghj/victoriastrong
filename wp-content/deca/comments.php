<?php
/*
Description: The Comments
Theme: DECA
*/
?>

<?php $args = array(
    'walker'            => null,
    'max_depth'         => '',
    'style'             => 'ul',
    'callback'          => null,
    'end-callback'      => null,
    'type'              => 'all',
    'reply_text'        => esc_html__('Reply', 'deca'),
    'page'              => '',
    'per_page'          => '',
    'avatar_size'       => 40,
    'reverse_top_level' => null,
    'reverse_children'  => '',
    'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
    'short_ping'        => false,   // @since 3.6
    'echo'              => true     // boolean, default is true
); ?>

<ul><?php wp_list_comments( $args ); ?></ul>

<?php comment_form(); ?>

