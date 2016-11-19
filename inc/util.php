<?php

function divine_lite_log($message){
	if (WP_DEBUG === true) {
        if (is_array($message) || is_object($message)) {
            error_log(print_r($message, true));
        } else {
            error_log($message);
        }
    }
}

function divine_lite_get_image_src($post_id = 0, $size = 'thumbnail') {
    $thumb = get_the_post_thumbnail($post_id, $size);
    if (!empty($thumb)) {
        $_thumb = array();
        $regex = '#<\s*img [^\>]*src\s*=\s*(["\'])(.*?)\1#im';
        preg_match($regex, $thumb, $_thumb);
        $thumb = $_thumb[2];
    }
    
    return $thumb;
}

function divine_lite_get_attribute($attrib, $tag){        
    $re = '/' . preg_quote($attrib) . '=([\'"])?((?(1).+?|[^\s>]+))(?(1)\1)/is';
    if (preg_match($re, $tag, $match)) {
        return urldecode($match[2]);
    }
    return false;
}

if(!function_exists('divine_lite_get_template_setting')){
    function divine_lite_get_template_setting() {
        if ( function_exists( 'kopa_get_template_setting' ) ) {
            return kopa_get_template_setting();
        } else {
            if ( ! is_home() && is_front_page() ) {
                $layout = 'static-page';
            } elseif ( is_home() || is_archive() ) {
                $layout = 'blog-page';
            } elseif ( is_page() ) {
                $layout = 'static-page';
            } elseif ( is_singular() ) {
                $layout = 'single-post';
            } elseif ( is_search() ) {
                $layout = 'blog-page';
            } elseif ( is_404() ) {
                $layout = 'error-404';
            }
            $array = array(
                'layout_id' => $layout,
                'sidebars' => array(
                    'pos_right'    => 'sb_right',
                    'pos_footer_1' => 'sb_footer_1',
                    'pos_footer_2' => 'sb_footer_2',
                    'pos_footer_3' => 'sb_footer_3',
                    'pos_footer_4' => 'sb_footer_4',
                    'pos_footer_5' => 'sb_footer_5',
                )
            );
            return $array;
        }
    }
}

function divine_lite_excerpt_length($length){
    return $GLOBALS['divine_lite_excerpt_length'];
}