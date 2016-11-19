<?php
/**
 * Custom layouts
 */
add_filter( 'kopa_layout_manager_settings', 'divine_lite_extra_layout_manager_settings', 1, 10 );

function divine_lite_get_positions(){
	return apply_filters('divine_lite_get_positions', array(
		'pos_right'    => esc_html__( 'Right', 'divine-lite' ),
		'pos_footer_1' => esc_html__( 'Footer 1', 'divine-lite' ),
		'pos_footer_2' => esc_html__( 'Footer 2', 'divine-lite' ),
		'pos_footer_3' => esc_html__( 'Footer 3', 'divine-lite' ),
		'pos_footer_4' => esc_html__( 'Footer 4', 'divine-lite' ),
		'pos_footer_5' => esc_html__( 'Footer 5', 'divine-lite' ),
	));
}

function divine_lite_get_sidebars_default(){
	return apply_filters('divine_lite_get_sidebars_default', array(
		'pos_right'    => 'sb_right',
		'pos_footer_1' => 'sb_footer_1',
		'pos_footer_2' => 'sb_footer_2',
		'pos_footer_3' => 'sb_footer_3',
		'pos_footer_4' => 'sb_footer_4',
		'pos_footer_5' => 'sb_footer_5',
	));
}

function divine_lite_extra_layout_manager_settings( $options ) {
	/**************************************************
	POSITIONS
	**************************************************/	
	$positions = divine_lite_get_positions();

	/**************************************************
	SIDEBARS
	**************************************************/	
	$sidebars_default = divine_lite_get_sidebars_default();

	/**************************************************
	PAGE
	**************************************************/
	$static_page = array(
		'title'     => esc_html__( 'Static page', 'divine-lite' ),
		'preview'   => get_template_directory_uri() . '/images/layouts/static-page.png',
		'positions' => array(
			'pos_right',			
			'pos_footer_1',
			'pos_footer_2',
			'pos_footer_3',
			'pos_footer_4',
			'pos_footer_5',
		)
	);

	$options['page-layout']['positions'] = $positions;
	$options['page-layout']['layouts']   = array(
		'static-page' => $static_page,
	);
	$options['page-layout']['default'] = array(
		'layout_id' => 'static-page',
		'sidebars'  => array(
			'static-page' => $sidebars_default,		
		),
	);

	$options['frontpage-layout']['positions'] = $positions;
	$options['frontpage-layout']['layouts'] = array(
		'static-page' => $static_page,
	);
	$options['frontpage-layout']['default'] = array(
		'layout_id' => 'static-page',
		'sidebars'  => array(
			'static-page' => $sidebars_default,		
		),
	);
	/**************************************************
	BLOG PAGE
	**************************************************/
	$blog_page = array(
		'title'     => esc_html__( 'Blog page', 'divine-lite' ),
		'preview'   => get_template_directory_uri() . '/images/layouts/blog-page.png',
		'positions' => array(		
			'pos_right',						
			'pos_footer_1',
			'pos_footer_2',
			'pos_footer_3',
			'pos_footer_4',
			'pos_footer_5',
		)
	);

	$options['blog-layout']['positions'] = $positions;
	$options['blog-layout']['layouts'] = array(
		'blog-page' => $blog_page,
	);
	$options['blog-layout']['default'] = array(
		'layout_id' => 'blog-page',
		'sidebars'  => array(
			'blog-page' => $sidebars_default,
		),
	);

	/**************************************************
	SINGLE POST
	**************************************************/
	$single_post = array(
		'title'     => esc_html__( 'Single post', 'divine-lite' ),
		'preview'   => get_template_directory_uri() . '/images/layouts/single-post.png',
		'positions' => array(	
			'pos_right',						
			'pos_footer_1',
			'pos_footer_2',
			'pos_footer_3',
			'pos_footer_4',
			'pos_footer_5',
		)
	);
	$options['post-layout']['positions'] = $positions;
	$options['post-layout']['layouts'] = array(
		'single-post'     => $single_post,
	);
	$options['post-layout']['default'] = array(
		'layout_id' => 'single-post',
		'sidebars'  => array(
			'single-post'     => $sidebars_default,
		),
	);


	/**************************************************
	SEARCH RESULT
	**************************************************/
	$search_page = array(
		'title'     => esc_html__( 'Search', 'divine-lite' ),
		'preview'   => get_template_directory_uri() . '/images/layouts/search-page.png',
		'positions' => array(	
			'pos_right',						
			'pos_footer_1',
			'pos_footer_2',
			'pos_footer_3',
			'pos_footer_4',
			'pos_footer_5',
		)
	);
	$options['search-layout']['positions'] = $positions;
	$options['search-layout']['layouts'] = array(
		'search-page'    => $search_page,
	);
	$options['search-layout']['default'] = array(
		'layout_id' => 'search-page',
		'sidebars'  => array(
			'search-page'    => $sidebars_default
		),
	);

	/**************************************************
	ERROR
	**************************************************/
	$error_404 = array(
		'title'     => esc_html__( 'Error page - 404', 'divine-lite' ),
		'preview'   => get_template_directory_uri() . '/images/layouts/error-404.png',
		'positions' => array(											
			'pos_footer_1',
			'pos_footer_2',
			'pos_footer_3',
			'pos_footer_4',
			'pos_footer_5',
		)
	);

	$options['error404-layout']['positions'] = $positions;
	$options['error404-layout']['layouts'] = array(
		'error-404'     => $error_404,
	);
	$options['error404-layout']['default'] = array(
		'layout_id' => 'error-404',
		'sidebars'  => array(
			'error-404'     => $sidebars_default,
		),
	);


	return $options;
}