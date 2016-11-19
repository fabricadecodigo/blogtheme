<?php

// sidebar manager
add_filter( 'kopa_sidebar_default', 'divine_lite_set_default_sidebars' );

function divine_lite_set_default_sidebars( $options ) {
	$options['sb_right']    = array('name' => esc_html__( 'Right', 'divine-lite'));
	$options['sb_footer_1'] = array('name' => esc_html__( 'Footer 1', 'divine-lite'));
	$options['sb_footer_2'] = array('name' => esc_html__( 'Footer 2', 'divine-lite'));
	$options['sb_footer_3'] = array('name' => esc_html__( 'Footer 3', 'divine-lite'));
	$options['sb_footer_4'] = array('name' => esc_html__( 'Footer 4', 'divine-lite'));
	$options['sb_footer_5'] = array('name' => esc_html__( 'Footer 5', 'divine-lite'));

	return $options;
}

add_filter( 'kopa_sidebar_default_attributes', 'divine_lite_set_default_sidebar_wrap' );

function divine_lite_set_default_sidebar_wrap($wrap) {
	$wrap['before_widget'] = '<div id="%1$s" class="widget clearfix %2$s">';
	$wrap['after_widget']  = '</div>';
	$wrap['before_title']  = '<h3 class="widget-title">';
	$wrap['after_title']   = '</h3>';

	return $wrap;
}

if(!class_exists('Kopa_Framework')){
	add_action( 'widgets_init', 'divine_lite_deactive_kopa_framework' );
	function divine_lite_deactive_kopa_framework(){
		$args = array(
			array(
				'name'          => esc_html__( 'Right', 'divine-lite' ),
				'id'            => 'sb_right',
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			),
			array(
				'name'          => esc_html__( 'Footer 1', 'divine-lite' ),
				'id'            => 'sb_footer_1',
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			),
			array(
				'name'          => esc_html__( 'Footer 2', 'divine-lite' ),
				'id'            => 'sb_footer_2',
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			),
			array(
				'name'          => esc_html__( 'Footer 3', 'divine-lite' ),
				'id'            => 'sb_footer_3',
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			),
			array(
				'name'          => esc_html__( 'Footer 4', 'divine-lite' ),
				'id'            => 'sb_footer_4',
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			),
			array(
				'name'          => esc_html__( 'Footer 5', 'divine-lite' ),
				'id'            => 'sb_footer_5',
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			),
		);
		foreach ($args as $arg) {
			register_sidebar( $arg );
		}
	}
}
