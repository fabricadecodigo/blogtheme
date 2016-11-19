<?php
/**
 * Extra for theme options settings
 */

add_filter( 'kopa_theme_options_settings', 'divine_lite_init_options', 1, 10);
function divine_lite_init_options( $options ) {
	#GENERAL SETTING
	$options[] = array(
		'title'   => esc_html__( 'Logo', 'divine-lite' ),
		'type'    => 'title',		
		'id'      => 'general',
		'icon'    => ''
	);		
	// logo group
		$options[] = array(
			'title' => esc_html__( 'Main Logo', 'divine-lite' ),
			'type'  => 'groupstart',
			'id'    => 'logo-group',			
		);
			$options[] = array(
				'title'   => esc_html__( 'Logo image', 'divine-lite' ),
				'type'    => 'upload',
				'id'      => 'logo',
				'desc'    => esc_html__( 'upload your logo image', 'divine-lite' ),
				'mimes'   => 'image',
			);
			$options[] = array(
				'title'   => esc_html__( 'Margin top (px)', 'divine-lite' ),
				'type' 	  => 'text',
				'id' 	  => 'logo-margin-top',
				'default' => '',			);
			$options[] = array(
				'title'   => esc_html__( 'Margin bottom (px)', 'divine-lite' ),
				'type' 	  => 'text',
				'id' 	  => 'logo-margin-bottom',
				'default' => '',			
			);
			$options[] = array(
				'title'   => esc_html__( 'Margin left (px)', 'divine-lite' ),
				'type' 	  => 'text',
				'id' 	  => 'logo-margin-left',
				'default' => '',			);			
			$options[] = array(
				'title'   => esc_html__( 'Margin right (px)', 'divine-lite' ),
				'type' 	  => 'text',				
				'id' 	  => 'logo-margin-right',
				'default' => '',							
			);
		// end group
		$options[] = array(
			'type' => 'groupend',
			'id'   => 'logo-group',
		);		
	
	# HEADER
	$options[] = array(
		'title'   => esc_html__( 'Header', 'divine-lite' ),
		'type'    => 'title',		
		'id'      => 'header',
		'icon'    => ''
	);


		$options[] = array(			
			'type' 	  => 'checkbox',			
			'id' 	  => 'is-enable-social-links',
			'default' => 1,
			'label'   => esc_html__( 'Social links', 'divine-lite' ),
		);
		$options[] = array(			
			'type' 	  => 'checkbox',			
			'id' 	  => 'is-enable-search-form',
			'default' => 1,
			'label'   => esc_html__( 'Search form', 'divine-lite' ),
		);
		$options[] = array(			
			'type' 	  => 'checkbox',			
			'id' 	  => 'is-enable-sticky-menu',
			'default' => 1,
			'label'   => esc_html__( 'Sticky menubar', 'divine-lite' ),
		);
		$options[] = array(
			'title'   => esc_html__( 'Header information', 'divine-lite' ),
			'type' 	  => 'textarea',			
			'id' 	  => 'header-info',
			'default' => '',		
		);

	# Breadcrumb
	$options[] = array(
		'title'   => esc_html__( 'Breadcrumb', 'divine-lite' ),
		'type'    => 'title',		
		'id'      => 'breadcrumb',
		'icon'    => ''
	);
		$options[] = array(			
			'type' 	  => 'checkbox',			
			'id' 	  => 'is-enable-breadcrumb',
			'default' => 1,
			'label'   => esc_html__( 'Show / hide', 'divine-lite' ),
		);
		$options[] = array(
			'title'   => esc_html__( 'Background image', 'divine-lite' ),
			'type'    => 'upload',
			'id'      => 'breadcrumb-background-image',			
			'mimes'   => 'image'
		);

	# Footer
	$options[] = array(
		'title'   => esc_html__( 'Footer', 'divine-lite' ),
		'type'    => 'title',		'id'      => 'footer',
		'icon'    => ''
	);		
		$options[] = array(
			'title'   => esc_html__( 'Footer information', 'divine-lite' ),
			'type' 	  => 'textarea',
			'desc' 	  => esc_html__( 'e.g. your copyright info, ...', 'divine-lite' ),
			'id' 	  => 'footer-info',
			'default' => 'Copyright 2014 - Kopasoft. All Rights Reserved',		
			'validate'=> false
			);
			
		


		$options[] = array(
			'title' => esc_html__( 'Social', 'divine-lite' ),
			'type'  => 'groupstart',
			'id'    => 'social-group',			
		);			

			$options[] = array(
				'type' 	  => 'checkbox',			
				'id' 	  => 'is-enable-social-links-footer',
				'default' => 1,
				'label'   => esc_html__( 'Check to display Social Links', 'divine-lite' ),
			);

		$options[] = array(
			'type'  => 'groupend',
			'id'    => 'social-group',			
		);

		$options[] = array(
			'title' => esc_html__( 'Footer appearance effect', 'divine-lite' ),
			'type'  => 'groupstart',
			'id'    => 'groupstart-footer-effect',			
		);	
			$options[] = array(
				'title'   => esc_html__( 'Effect', 'divine-lite' ),
				'type' 	  => 'select',				
				'id' 	  => 'footer-effect',
				'default' => '2',
				'options' => array(
					'' => esc_html__('-- Select a effect --', 'divine-lite'),
					"bounce" => "bounce",
		            "flash" => "flash",
		            "pulse" => "pulse",
		            "rubberBand" => "rubberBand",
		            "shake" => "shake",
		            "swing" => "swing",
		            "tada" => "tada",
		            "wobble" => "wobble",
		            "bounceIn" => "bounceIn",
		            "bounceInDown" => "bounceInDown",
		            "bounceInLeft" => "bounceInLeft",
		            "bounceInRight" => "bounceInRight",
		            "bounceInUp" => "bounceInUp",
		            "bounceOut" => "nceOut",
		            "bounceOutDown" => "bounceOutDown",
		            "bounceOutLeft" => "bounceOutLeft",
		            "bounceOutRight" => "bobouunceOutRight",
		            "bounceOutUp" => "bounceOutUp",
		            "fadeIn" => "fadeIn",
		            "fadeInDown" => "fadeInDown",
		            "fadeInDownBig" => "fadeInDownBig",
		            "fadeInLeft" => "fadeInLeft",
		            "fadeInLeftBig" => "fadeInLeftBig",
		            "fadeInRight" => "fadeInRight",
		            "fadeInRightBig" => "fadeInRightBig",
		            "fadeInUp" => "fadeInUp",
		            "fadeInUpBig" => "fadeInUpBig",
		            "fadeOut" => "fadeOut",
		            "fadeOutDown" => "fadeOutDown",
		            "fadeOutDownBig" => "fadeOutDownBig",
		            "fadeOutLeft" => "fadeOutLeft",
		            "fadeOutLeftBig" => "fadeOutLeftBig",
		            "fadeOutRight" => "fadeOutRight",
		            "fadeOutRightBig" => "fadeOutRightBig",
		            "fadeOutUp" => "fadeOutUp",
		            "fadeOutUpBig" => "fadeOutUpBig",
		            "flip" => "flip",
		            "flipInX" => "flipInX",
		            "flipInY" => "flipInY",
		            "flipOutX" => "flipOutX",
		            "flipOutY" => "flipOutY",
		            "lightSpeedIn" => "lightSpeedIn",
		            "lightSpeedOut" => "lightSpeedOut",
		            "rotateIn" => "rotateIn",
		            "rotateInDownLeft" => "rotateInDownLeft",
		            "rotateInDownRight" => "rotateInDownRight",
		            "rotateInUpLeft" => "rotateInUpLeft",
		            "rotateInUpRight" => "rotateInUpRight",
		            "rotateOut" => "rotateOut",
		            "rotateOutDownLeft" => "rotateOutDownLeft",
		            "rotateOutDownRight" => "rotateOutDownRight",
		            "rotateOutUpLeft" => "rotateOutUpLeft",
		            "rotateOutUpRight" => "rotateOutUpRight",
		            "hinge" => "hinge",
		            "rollIn" => "rollIn",
		            "rollOut" => "rollOut",
		            "zoomIn" => "zoomIn",
		            "zoomInDown" => "zoomInDown",
		            "zoomInLeft" => "zoomInLeft",
		            "zoomInRight" => "zoomInRight",
		            "zoomInUp" => "zoomInUp",
		            "zoomOut" => "zoomOut",
		            "zoomOutDown" => "zoomOutDown",
		            "zoomOutLeft" => "zoomOutLeft",
		            "zoomOutRight" => "zoomOutRight",
		            "zoomOutUp" => "zoomOutUp"
			));
		
			$options[] = array(
				'title'   => esc_html__( 'Duration', 'divine-lite' ),
				'type' 	  => 'select',				
				'id' 	  => 'footer-effect-duration',
				'default' => '0.5s',	
				'options' => array(
	                '0.1s'  => '0.1s',
	                '0.2s'  => '0.2s',
	                '0.3s'  => '0.3s',
	                '0.4s'  => '0.4s',
	                '0.5s'  => '0.5s',
	                '0.6s'  => '0.6s',
	                '0.7s'  => '0.7s',
	                '0.8s'  => '0.8s',
	                '0.9s'  => '0.9s',
	                '1.0s'  => '1.0s',
	                '1.25s' => '1.25s',
	                '1.5s'  => '1.5s',
	                '1.75s' => '1.75s',
	                '2.0s'  => '2.0s',  
				));

			$options[] = array(
				'title'   => esc_html__( 'Delay', 'divine-lite' ),
				'type' 	  => 'select',				
				'id' 	  => 'footer-effect-delay',
				'default' => '0.5s',	
				'options' => array(
	                '0.1s'  => '0.1s',
	                '0.2s'  => '0.2s',
	                '0.3s'  => '0.3s',
	                '0.4s'  => '0.4s',
	                '0.5s'  => '0.5s',
	                '0.6s'  => '0.6s',
	                '0.7s'  => '0.7s',
	                '0.8s'  => '0.8s',
	                '0.9s'  => '0.9s',
	                '1.0s'  => '1.0s',
	                '1.25s' => '1.25s',
	                '1.5s'  => '1.5s',
	                '1.75s' => '1.75s',
	                '2.0s'  => '2.0s', 
				));

		$options[] = array(
			'type'  => 'groupend',
			'id'    => 'groupend-footer-effect',			
		);

	#BLOG POSTS
	$options[] = array(
		'title' => esc_html__( 'Blog posts', 'divine-lite' ),
		'type'  => 'title',
		'id'    => 'blog-posts',	);
		#start group "content"
		$options[] = array(
			'title' => esc_html__( 'The content', 'divine-lite' ),
			'type'  => 'groupstart',
			'id'    => 'blog-posts-content-group',			
		);
			$options[] = array(
				'title'   => esc_html__( 'For each article in list, show:', 'divine-lite' ),
				'type' 	  => 'radio',				
				'id' 	  => 'blog-posts-content-type',
				'default' => 'excerpt',
				'options' => array(
					'excerpt'   => esc_html__( 'Excerpt', 'divine-lite'),
					'full'      => esc_html__( 'Full', 'divine-lite'),
					'max-words' => esc_html__( 'Limit number of words', 'divine-lite'),
				),			);
			$options[] = array(
				'title'   => '',
				'type'    => 'number',				
				'id'      => 'blog-posts-content-max-words',
				'default' => 40,			
			);
		#end group "content"
		$options[] = array(
			'type' => 'groupend',
			'id'   => 'blog-posts-content-group',
		);
		#start group "metadata"
		$options[] = array(
			'title' => esc_html__( 'Metadata', 'divine-lite' ),
			'type'  => 'groupstart',
			'id'    => 'blog-posts-metadata-group',			
		);
			$options[] = array(
				'title'   => NULL,
				'type' 	  => 'checkbox',				
				'id' 	  => 'is-enable-blog-posts-author',
				'default' => 1,
				'label'   => esc_html__( 'Author', 'divine-lite' ),
			);
			$options[] = array(
				'title'   => NULL,
				'type' 	  => 'checkbox',				
				'id' 	  => 'is-enable-blog-posts-category',
				'default' => 1,
				'label'   => esc_html__( 'Category', 'divine-lite' ),
			);
			$options[] = array(
				'title'   => NULL,
				'type' 	  => 'checkbox',				
				'id' 	  => 'is-enable-blog-posts-created-date',
				'default' => 1,
				'label'   => esc_html__( 'Created date', 'divine-lite' ),
			);
			$options[] = array(
				'title'   => NULL,
				'type' 	  => 'checkbox',				
				'id' 	  => 'is-enable-blog-posts-comment-counts',
				'default' => 1,
				'label'   => esc_html__( 'Comment counts', 'divine-lite' ),
			);
		#end group "metadata"
		$options[] = array(
			'type' => 'groupend',
			'id'   => 'blog-posts-metadata-group',
		);

	#SINGLE POST
	$options[] = array(
		'title' => esc_html__( 'Single post', 'divine-lite' ),
		'type'  => 'title',
		'id'    => 'single-post',	
		);
		#start group "metadata"
		$options[] = array(
			'title' => esc_html__( 'Metadata', 'divine-lite' ),
			'type'  => 'groupstart',
			'id'    => 'single-post-metadata-group',			
		);
			$options[] = array(
				'title'   => NULL,
				'type' 	  => 'checkbox',				
				'id' 	  => 'is-enable-post-featured-content',
				'default' => 1,
				'label'   => esc_html__( 'Featured content', 'divine-lite' ),
			);
			$options[] = array(
				'title'   => NULL,
				'type' 	  => 'checkbox',				
				'id' 	  => 'is-enable-post-category',
				'default' => 1,
				'label'   => esc_html__( 'Category', 'divine-lite' ),
			);
			$options[] = array(
				'title'   => NULL,
				'type' 	  => 'checkbox',				
				'id' 	  => 'is-enable-post-tag',
				'default' => 1,
				'label'   => esc_html__( 'Tags', 'divine-lite' ),
			);
			$options[] = array(
				'title'   => NULL,
				'type' 	  => 'checkbox',				
				'id' 	  => 'is-enable-post-created-date',
				'default' => 1,
				'label'   => esc_html__( 'Created date', 'divine-lite' ),
			);
			$options[] = array(
				'title'   => NULL,
				'type' 	  => 'checkbox',				
				'id' 	  => 'is-enable-post-comment-counts',
				'default' => 1,
				'label'   => esc_html__( 'Number of comments', 'divine-lite' ),
			);
			$options[] = array(
				'title'   => NULL,
				'type' 	  => 'checkbox',				
				'id' 	  => 'is-enable-post-author-info',
				'default' => 1,
				'label'   => esc_html__( 'Author information', 'divine-lite' ),
			);
		#end group "metadata"
		$options[] = array(
			'type' => 'groupend',
			'id'   => 'single-post-metadata-group',
		);
		#start group "related"
		$options[] = array(
			'title' => esc_html__( 'Related posts', 'divine-lite' ),
			'type'  => 'groupstart',
			'id'    => 'single-post-related-group',			
		);			
			$options[] = array(
				'title'   => esc_html__( 'Get by', 'divine-lite' ),
				'type' 	  => 'select',				
				'id' 	  => 'single-post-related-by',
				'default' => '2',
				'options' => array(
					'category' => esc_html__( 'Category', 'divine-lite' ),
					'post_tag' => esc_html__( 'Tag', 'divine-lite'),
			),			);
			$options[] = array(
				'title'   => esc_html__( 'Number of posts', 'divine-lite' ),
				'type'    => 'number',				
				'id'      => 'single-post-related-limit',
				'default' => 6,			
			);
		#end group "related"
		$options[] = array(
			'type' => 'groupend',
			'id'   => 'single-post-related-group',
		);

	#SOCIAL LINKS	
		$options[] = array(
			'title' => esc_html__( 'Social link', 'divine-lite' ),
			'type'  => 'title',
			'id'    => 'social-link',	
		);	
		$social_networks = divine_lite_get_social_networks();	
		$options = array_merge($options, $social_networks);			
		
	return $options;
}
