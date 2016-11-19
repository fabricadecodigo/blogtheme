<?php

add_action('wp_enqueue_scripts', 'divine_lite_customize_enqueue_scripts', 11);

function divine_lite_customize_enqueue_scripts(){
    $image = get_theme_mod('breadcrumb-background-image', false);
	
    if(!empty($image)){
		$style = sprintf(".kopa-breadcrumb { background-image: url('%s')}", esc_url($image));
		wp_add_inline_style('divine_lite_' . 'style', $style);
	}	

    $logo_css = '';
    $margins = array(
        'margin-left',
        'margin-right',
        'margin-top',
        'margin-bottom');

    foreach($margins as $margin){
        $tmp_key = "logo-{$margin}";
        $tmp_value = (int) get_theme_mod($tmp_key);
        if( $tmp_value ){            
            $logo_css .= sprintf('%s : %spx; ', esc_attr($margin), esc_attr( $tmp_value));
        }
    }

    if( !empty($logo_css) ){
        $logo_css =  ".logo-box > a > img {" . esc_attr( $logo_css ) . "}";
        wp_add_inline_style('divine_lite_' . 'style', $logo_css);
    }

}