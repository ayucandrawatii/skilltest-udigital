<?php
/**
* REMOVE EMPTY PARAGRAPH AFTER SHORTCODE
*/
add_filter( 'the_content', 'remove_empty_paragraph' );
function remove_empty_paragraph( $content ) {
    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );
}

function udigital_row($atts, $content){
    extract( shortcode_atts( array(
        'class' => '',
    ), $atts ) );

    return '<div class="row '. esc_attr($class) .'">'. do_shortcode($content) .'</div>';
}
add_shortcode('udigital_row', 'udigital_row');

function udigital_col($atts, $content){
    extract( shortcode_atts( array(
        'class' => '',
    ), $atts ) );

    return '<div class="'. esc_attr($class) .'">'. do_shortcode($content) .'</div>';
}
add_shortcode('udigital_col', 'udigital_col');

