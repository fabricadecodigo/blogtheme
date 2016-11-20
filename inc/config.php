<?php 

add_action('after_setup_theme', 'divine_lite_setup');

function divine_lite_setup(){

    add_theme_support('html5');
    add_theme_support('title-tag'); 
    add_theme_support('post-formats', array('gallery', 'audio', 'video'));
    add_theme_support('post-thumbnails');
    add_theme_support('loop-pagination');
    add_theme_support('automatic-feed-links');        

    register_nav_menus(array(
        'main-nav'   => esc_html__('Main Menu', 'divine-lite'),       
        'footer-nav' => esc_html__('Footer Menu', 'divine-lite'),         
    ));

    add_action( 'admin_enqueue_scripts', 'divine_lite_admin_enqueue_script');
    add_action( 'wp_enqueue_scripts', 'divine_lite_enqueue_script');
    add_filter( 'body_class', 'divine_lite_set_body_class');
    add_filter( 'comment_form_default_fields', 'divine_lite_set_comment_form_default_fields' );    

    if ( ! isset( $content_width ) ){ $content_width = 770; }

    divine_lite_register_new_image_sizes();
}

function divine_lite_get_social_networks(){
	$options = array();

	$options[] = array(
		'title' =>  esc_html__( 'Facebook', 'divine-lite' ),
		'id'    => 'facebook-url',
		'type'  => 'url',
		'icon'	=> 'fa fa-facebook',
	);	

	$options[] = array(
		'title' =>  esc_html__( 'Twitter', 'divine-lite' ),
		'id'    => 'twitter-url',
		'type'  => 'url',
		'icon'	=> 'fa fa-twitter',
	);	

	$options[] = array(
		'title' =>  esc_html__( 'Google Plus', 'divine-lite' ),
		'id'    => 'google-plus-url',
		'type'  => 'url',
		'icon'	=> 'fa fa-google-plus',
	);	

	$options[] = array(
		'title' =>  esc_html__( 'Pinterest', 'divine-lite' ),
		'id'    => 'pinterest-url',
		'type'  => 'url',
		'icon'	=> 'fa fa-pinterest',
	);	

	$options[] = array(
		'title' =>  esc_html__( 'Instagram', 'divine-lite' ),
		'id'    => 'instagram-url',
		'type'  => 'url',
		'icon'	=> 'fa fa-instagram',
	);	

	$options[] = array(
		'title' =>  esc_html__( 'Tumblr', 'divine-lite' ),
		'id'    => 'tumblr-url',
		'type'  => 'url',
		'icon'	=> 'fa fa-tumblr',
	);		

	$options[] = array(	
		'title' =>  esc_html__( 'GitHub', 'divine-lite' ),		
		'id'    => 'github-url',
		'type'  => 'text',
		'icon'	=> 'fa fa-github',
	);

	$options[] = array(
		'title' =>  esc_html__( 'Rss', 'divine-lite' ),
		'desc' 	  => esc_html__( 'enter HIDE if you want to disable this option', 'divine-lite' ),
		'id'    => 'rss-url',
		'type'  => 'text',
		'icon'	=> 'fa fa-rss',
	);

	

	return apply_filters('divine_lite_get_social_networks', $options );
}

function divine_lite_register_new_image_sizes(){    
    add_image_size('divine-lite-blog-thumnail', 858, 415, true);  
    add_image_size('divine-lite-post-lightbox', 960, null, false);
    add_image_size('divine-lite-post-related', 272, 200, true);
}