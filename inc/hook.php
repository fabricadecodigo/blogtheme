<?php

function divine_lite_admin_enqueue_script(){
    $dir = get_template_directory_uri();
    wp_enqueue_style('divine_lite_' . 'admin_style', $dir. "/css/admin.style.css", array(), NULL);
}

function divine_lite_enqueue_script(){
	global $wp_styles, $is_IE, $kopaCurrentLayout;
    $layout_setting = divine_lite_get_template_setting();

    $dir = get_template_directory_uri();
        
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'divine-lite' ) ) {       
        $google_fonts_url = add_query_arg( 'family', urlencode( 'Open Sans:400,600,700|Lato:700,400|Roboto Slab:400,700,300,100|Pacifico' ), '//fonts.googleapis.com/css' );
        wp_enqueue_style( 'divine_lite_font_google', $google_fonts_url, array(), false, 'all' );
    }    

    wp_enqueue_style( 'font-awesome', $dir. "/css/font-awesome.min.css", array(), NULL);
    wp_enqueue_style( 'bootstrap', $dir . '/css/bootstrap.css', array(), NULL);
    wp_enqueue_style( 'superfish', $dir . '/css/superfish.css', array(), NULL);
    wp_enqueue_style( 'owl-carousel', $dir . '/css/owl.carousel.css', array(), NULL);
    wp_enqueue_style( 'owl-theme', $dir . '/css/owl.theme.css', array(), NULL);
    wp_enqueue_style( 'jquery-navgoco', $dir . '/css/jquery.navgoco.css', array(), NULL);    
    wp_enqueue_style( 'animate', $dir . '/css/animate.css', array(), NULL);    
    wp_enqueue_style( 'magnific-popup', $dir . '/css/magnific-popup.css', array(), NULL);
    wp_enqueue_style( 'divine_lite_style', get_stylesheet_uri(), array(), NULL);

    wp_enqueue_script('jquery');

    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script( 'modernizr', $dir . '/js/modernizr.js', array('jquery'), NULL, TRUE);
    wp_enqueue_script( 'bootstrap', $dir . '/js/bootstrap.js', array('jquery'), NULL, TRUE);
    wp_enqueue_script( 'divine_lite_custom', $dir . '/js/custom.js', array('jquery'), NULL, TRUE);
    wp_localize_script( 'divine_lite_custom', 'kopa_variable', array(
        'url' => array(
            'template_directory_uri' => get_template_directory_uri() . '/',
            'ajax' => admin_url('admin-ajax.php')
        ),
        'template' => array(
            'post_id' => is_singular() ? get_queried_object_id() : 0
        ),
        'contact' => array(
            'address' => esc_html( get_theme_mod('contact_address', '') ),
            'marker'  => '',
        ),        
        'option' => array(
            'is_enable_sticky_menu' => (int)get_theme_mod('is-enable-sticky-menu', 1)
        ),
        'i18n' => array(
            'SEARCH'    => esc_html__('Search...', 'divine-lite'),
            'LOADING'   => esc_html__('Loading...', 'divine-lite'),
            'LOAD_MORE' => esc_html__('Load more', 'divine-lite'),
            'LOADING'   => esc_html__('Loading...', 'divine-lite'),
            'VIEW'      => esc_html__('View', 'divine-lite'),
            'VIEWS'     => esc_html__('Views', 'divine-lite'),
            'validate'  => array(
                'form' => array(
                    'CHECKING' => esc_html__('Checking', 'divine-lite'),
                    'SUBMIT'   => esc_html__('Send message', 'divine-lite'),
                    'SENDING'  => esc_html__('Sending...', 'divine-lite')
                ),
                'recaptcha' => array(
                    'INVALID'  => esc_html__('Your captcha is incorrect. Please try again', 'divine-lite'),
                    'REQUIRED' => esc_html__('Captcha is required', 'divine-lite')
                ),
                'name' => array(
                    'REQUIRED'  => esc_html__('Please enter your name', 'divine-lite'),
                    'MINLENGTH' => esc_html__('At least {0} characters required', 'divine-lite')
                ),
                'email' => array(
                    'REQUIRED' => esc_html__('Please enter your email', 'divine-lite'),
                    'EMAIL'    => esc_html__('Please enter a valid email', 'divine-lite')
                ),
                'url' => array(
                    'REQUIRED' => esc_html__('Please enter your url', 'divine-lite'),
                    'URL'      => esc_html__('Please enter a valid url', 'divine-lite')
                ),
                'message' => array(
                    'REQUIRED'  => esc_html__('Please enter a message', 'divine-lite'),
                    'MINLENGTH' => esc_html__('At least {0} characters required', 'divine-lite')
                )
            )
        )
    ));
    
    /*
     * --------------------------------------------------
     * IE FIX
     * --------------------------------------------------
     */
    if ($is_IE) {
        wp_register_style('divine_lite_ie', $dir . '/css/ie.css', array(), NULL);
        wp_enqueue_style('divine_lite_ie');
        $wp_styles->add_data('divine_lite_ie', 'conditional', 'lt IE 9');

        wp_register_style('divine_lite_ie9', $dir . '/css/ie9.css', array(), NULL);
        wp_enqueue_style('divine_lite_ie9');
        $wp_styles->add_data('divine_lite_ie9', 'conditional', 'IE 9');
    }
}

function divine_lite_set_body_class($classes){
    $divine_layout_setting = divine_lite_get_template_setting();

    switch ($divine_layout_setting['layout_id']) {
        case 'blog-page':
            array_push($classes, 'kopa-blog-page');
            break;
    }

	return $classes;
}

function divine_lite_get_social_links(){
    $socials = divine_lite_get_social_networks(); 
    ?>
    <ul class="social-links pull-left clearfix">
        <?php    
        foreach ($socials as $index => $social) {
            $href = get_theme_mod($social['id']);

            if ('rss-url' == $social['id']) {
                if (empty($href)) {
                    $href = get_bloginfo_rss('rss2_url');
                } elseif ('HIDE' == strtoupper($href)) {
                    $href = '';
                }
            }

            if (!empty($href)) {
                printf('<li><a class="kopa-social-link %s" href="%s" target="_blank" title="%s" rel="nofollow"></a></li>', esc_attr($social['icon']), esc_url($href), esc_attr($social['title']));
            }
        }
        ?>
    </ul>
    <?php
}

function divine_lite_get_footer_social_links(){
    $is_enable_social_links = (int)get_theme_mod('is-enable-social-links-footer');    

    if ($is_enable_social_links):
        ?>    
        <section class="kopa-area-3">
            <div class="wrapper">
                
                <?php if ($is_enable_social_links): ?>
                    <div class="left-area">
                        <div class="widget kopa-social-link-widget">
                            <span><?php _e('Stay in touch', 'divine-lite'); ?></span>
                            <ul class="social-links pull-left clearfix">
                                <?php
                                $socials = divine_lite_get_social_networks(); 
                                foreach ($socials as $index => $social) {
                                    $href = get_theme_mod($social['id']);

                                    if ('rss-url' == $social['id']) {
                                        if (empty($href)) {
                                            $href = get_bloginfo_rss('rss2_url');
                                        } elseif ('HIDE' == strtoupper($href)) {
                                            $href = '';
                                        }
                                    }

                                    if (!empty($href)) {
                                        printf('<li><a class="%s" href="%s" target="_blank" title="%s" rel="nofollow"></a></li>', esc_attr($social['icon']), esc_url($href), esc_attr($social['title']));
                                    }
                                }                           
                                ?>
                            </ul>                
                        </div>            
                    </div>        
                <?php endif; ?>

            </div>
        </section>
    <?php endif;
}

function divine_lite_get_breadcrumb() {
    if(1 != (int)get_theme_mod('is-enable-breadcrumb', 1))
        return;

    global $post, $wp_query;
    $current_class = 'current-page';
    $prefix = '&nbsp;/&nbsp;';

    $breadcrumb_before = '<div class="kopa-breadcrumb">';
    $breadcrumb_before.= '<div class="wrapper clearfix">';
    $breadcrumb_before.= '<div class="pull-left">';

    $site_title = get_bloginfo('name');
    $site_desc = get_bloginfo('description');

    if (is_archive()) {
        if (is_tag()) {
            $term = get_term(get_queried_object_id(), 'post_tag');
            $site_title = $term->name;
            
            if( $tag_desc = $term->description ){
                $site_desc = $tag_desc;
            }

        } else if (is_category()) {
            $term = get_term(get_queried_object_id(), 'category');
            $site_title = $term->name;

            if( $category_desc = $term->description ){
                $site_desc = $category_desc;
            }                

        }
    } else if (is_single() || is_page()) {
        $id         = get_queried_object_id();
        $site_title = get_the_title($id);
        $site_desc  = get_post_field('post_content', $id);     
    }

    $site_title        = apply_filters('divine_breadcrumb_site_title', $site_title);
    $site_desc         = strip_shortcodes(apply_filters('divine_breadcrumb_site_desc', wp_trim_words($site_desc, 10, '..')));
    
    $breadcrumb_before .= sprintf('<span>%s</span>', $site_title);
    $breadcrumb_before .= sprintf('<p>%s</p>', $site_desc);
    
    $breadcrumb_before .= '</div>';
    $breadcrumb_before .= '<div class="pull-right clearfix">';
    
    $breadcrumb_after  = '</div>';
    $breadcrumb_after  .= '</div>';
    $breadcrumb_after  .= '</div>';
    
    $breadcrumb_home   = '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . esc_url(home_url('/')) . '" itemprop="url"><span itemprop="title">' . esc_html__('Home', 'divine-lite') . '</span></a></span>';
    $breadcrumb        = '';

    if (is_archive()) {
        if (is_tag()) {
            $term = get_term(get_queried_object_id(), 'post_tag');
            $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', $current_class, $term->name);
        } else if (is_category()) {
            $terms_link = explode($prefix, substr(get_category_parents(get_queried_object_id(), TRUE, $prefix), 0, (strlen($prefix) * -1)));
            $n = count($terms_link);
            if ($n > 1) {
                for ($i = 0; $i < ($n - 1); $i++) {
                    $breadcrumb.= $prefix . $terms_link[$i];
                }
            }
            $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', $current_class, get_the_category_by_ID(get_queried_object_id()));
        } else if (is_year() || is_month() || is_day()) {

            $m = get_query_var('m');
            $date = array('y' => NULL, 'm' => NULL, 'd' => NULL);
            if (strlen($m) >= 4)
                $date['y'] = substr($m, 0, 4);
            if (strlen($m) >= 6)
                $date['m'] = substr($m, 4, 2);
            if (strlen($m) >= 8)
                $date['d'] = substr($m, 6, 2);
            if ($date['y'])
                if (is_year())
                    $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', $current_class, $date['y']);
                else
                    $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', get_year_link($date['y']), $date['y']);
            if ($date['m'])
                if (is_month())
                    $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', $current_class, date('F', mktime(0, 0, 0, $date['m'])));
                else
                    $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', get_month_link($date['y'], $date['m']), date('F', mktime(0, 0, 0, $date['m'])));
            if ($date['d'])
                if (is_day())
                    $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', $current_class, $date['d']);
                else
                    $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', get_day_link($date['y'], $date['m'], $date['d']), $date['d']);
        }else if (is_author()) {

            $author_id = get_queried_object_id();
            $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', $current_class, sprintf(__('Posts created by %1$s', 'divine-lite'), get_the_author_meta('display_name', $author_id)));
        }
    } else if (is_search()) {
        $s = get_search_query();
        $c = $wp_query->found_posts;
        $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', $current_class, sprintf(__('Searched for "%s" return %s results', 'divine-lite'), $s, $c));
    } else if (is_singular()) {
        if (is_page()) {
            if (is_front_page()) {
                $breadcrumb = NULL;
            } else {
                $post_ancestors = get_post_ancestors($post);
                if ($post_ancestors) {
                    $post_ancestors = array_reverse($post_ancestors);
                    foreach ($post_ancestors as $crumb)
                        $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', esc_url( get_permalink($crumb) ), esc_html(get_the_title($crumb)));
                }
                $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="%1$s" itemprop="url" href="%2$s"><span itemprop="title">%3$s</span></a></span>', $current_class, esc_url( get_permalink(get_queried_object_id()) ), esc_html(get_the_title(get_queried_object_id())));
            }
        } else if (is_single()) {
            $categories = get_the_category(get_queried_object_id());
            if ($categories) {
                foreach ($categories as $category) {
                    $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', get_category_link($category->term_id), $category->name);
                }
            }
            $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="%1$s" itemprop="url" href="%2$s"><span itemprop="title">%3$s</span></a></span>', $current_class, esc_url( get_permalink(get_queried_object_id()) ), esc_html(get_the_title(get_queried_object_id())));
        }
    } else if (is_404()) {
        $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', $current_class, esc_html__('Page not found', 'divine-lite'));
    } else {
        $breadcrumb.= $prefix . sprintf('<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="%1$s" itemprop="url"><span itemprop="title">%2$s</span></a></span>', $current_class, esc_html__('Latest News', 'divine-lite'));
    }

    echo $breadcrumb_before;
    echo $breadcrumb_home . apply_filters('kopa_get_breadcrumb', $breadcrumb, $current_class, $prefix);
    echo $breadcrumb_after;
}

function divine_lite_sidebar_right_params($params){
    $params[0]['before_title']  = '<h4 class="widget-title style4">';
    $params[0]['after_title']   = '</h4>';

    return $params;
}

function divine_lite_get_comments_by_post_id($post_id, $return_only_number = false) {
    $count = NULL;

    if (comments_open($post_id)) {
        $comment_number = (int) get_comments_number($post_id);
        switch ($comment_number) {
            case 0:
                $count = esc_html__('Comment Now', 'divine-lite');
                break;
            case 1:
                $count = sprintf('%s %s', $comment_number, esc_html__('Comment', 'divine-lite'));
                break;
            default:
                $count = sprintf('%s %s', $comment_number, esc_html__('Comments', 'divine-lite'));
                break;
        }
    } else {
        $count = esc_html__('0 Comment', 'divine-lite');
    }

    if ($return_only_number) {
        $count = (int) $count;
    }

    return apply_filters('divine_lite_get_comments_by_post_id', $count);
}

function kopa_lite_get_about_author(){
    global $post;

    $user_id     = $post->post_author;
    $description = get_the_author_meta('description', $user_id);
    $email       = get_the_author_meta('user_email', $user_id);
    $name        = get_the_author_meta('display_name', $user_id);
    $url         = trim(get_the_author_meta('user_url', $user_id));
    $link        = ($url) ? $url : get_author_posts_url($user_id);    

    ?>
    <div class="kopa-author clearfix">
        <a class="avatar-thumb" href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($name); ?>"><?php echo get_avatar($email, 86); ?></a> 

        <div class="author-content">
            <header class="clearfix">
                <h6 class="author-name"><a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($name); ?>"><?php echo esc_attr($name); ?></a></h6>                
            </header>
            <?php 
            if($description){
                ?>
                <p>
                    <?php echo wp_kses_post($description); ?>
                </p>
                <?php
            }
            ?>            
        </div>
    </div>
    <?php
}

function divine_lite_get_related_posts(){
    $get_by = get_theme_mod('single-post-related-by', 'post_tag');
    $limit  = (int) get_theme_mod('single-post-related-limit', 6);

    if ($limit > 0) {
        global $post;
        $taxs = array();

        if ('category' == $get_by) {
            $cats = get_the_category(($post->ID));
            if ($cats) {
                $ids = array();
                foreach ($cats as $cat) {
                    $ids[] = $cat->term_id;
                }
                $taxs [] = array(
                    'taxonomy' => 'category',
                    'field'    => 'id',
                    'terms'    => $ids
                );
            }
        } else if ('post_tag' == $get_by) {
            $tags = get_the_tags($post->ID);
            if ($tags) {
                $ids = array();
                foreach ($tags as $tag) {
                    $ids[] = $tag->term_id;
                }
                $taxs [] = array(
                    'taxonomy' => 'post_tag',
                    'field'    => 'id',
                    'terms'    => $ids
                );
            }
        }

        if ($taxs) {
            $related_args = array(
                'post_type' => array($post->post_type),
                'tax_query' => $taxs,
                'post__not_in' => array($post->ID),
                'posts_per_page' => $limit
            );

            $related_posts = new WP_Query($related_args);
            if ($related_posts->have_posts()):

                $list_classes = array('kopa-related-post', 'portfolio-list');
                $list_classes[] = sprintf('portfolio-list-%d-items', $related_posts->post_count);
                
                ?>  
                <div class="<?php echo implode(' ', $list_classes); ?>">
                    <h4 class="widget-title style3"><?php echo apply_filters('divine_divine_lite_get_related_posts_title', esc_html__('Related articles', 'divine-lite')); ?></h4>  
                    <div class="row">
                        <div class="owl-carousel owl-carousel-8">
                            <?php
                            while ($related_posts->have_posts()):
                                $related_posts->the_post();
																$post_id    = get_the_ID();
																$post_url   = get_permalink();
																$post_title = get_the_title();
                                ?>
                                <div class="item">
                                    <article class="portfolio-item">
                                        <div class="portfolio-thumb">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php
                                                $image_full = divine_lite_get_image_src($post_id, 'divine-lite-post-lightbox');
                                                ?>
                                                <a href="<?php echo esc_url($post_url); ?>">
                                                    <?php the_post_thumbnail('divine-lite-post-related', array('class' => 'img-responsive')); ?>
                                                </a>

                                                <div class="thumb-hover">
                                                    <ul class="clearfix">
                                                        <li><a href="<?php echo esc_url($image_full); ?>" class="group2 pf-gallery fa fa-search-plus" title="<?php echo esc_attr($post_title); ?>"></a></li>
                                                        <li><a href="<?php echo esc_url($post_url); ?>" class="pf-detail fa fa-sign-out" title="<?php echo esc_attr($post_title); ?>"></a></li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <h6 class="portfolio-title"><a href="<?php echo esc_url($post_url); ?>" title="<?php echo esc_attr($post_title); ?>"><?php echo esc_attr($post_title); ?></a></h6>
                                        <span class="entry-date"><i class="fa fa-calendar"></i><span><?php echo esc_html(get_the_date()); ?></span></span>
                                        <?php printf('<span>%s</span>', get_the_excerpt() ); ?>
                                    </article>  
                                </div>
                                <?php
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>                    
                <?php
            endif;
            wp_reset_postdata();
        }
    }
}

function  divine_lite_edit_footer_sidebar($params){    
    if($effect = get_theme_mod('footer-effect', false)){
        $duration = get_theme_mod('footer-effect-duration', '0.5s');
        $delay    = get_theme_mod('footer-effect-delay', '0.5s');

        $str = sprintf('data-wow-duration="%s" data-wow-delay="%s" class="wow animated %s ', esc_attr($duration), esc_attr($delay), $effect);

        $params[0]['before_widget'] = str_replace("'", '"', $params[0]['before_widget']);
        $params[0]['before_widget'] = str_replace('class="', $str, $params[0]['before_widget']);        
    }


    return $params;   
}

function divine_lite_get_comment_form_args(){
	$args                       = array();
	$args['format']             = 'html5';			
	$args['label_submit']       = esc_html__( 'Send comment', 'divine-lite' );
	$args['class_form']         = 'contact-form comment-form clearfix';
	$args['id_form']            = 'comments-form';
	$args['id_submit']          = 'submit-contact';
	$args['class_submit']       = '';		
	$args['submit_button']      = '<input type="submit" name="%1$s" id="%2$s" class="%3$s" value="%4$s">';
	$args['submit_field']       = '<div class="row"><div class="col-md-12 col-sm-12 col-xs-12"><p class="contact-button clearfix"><span>%1$s %2$s</span></p></div></div>';
	$args['title_reply_before'] = '<h4 class="contact-title widget-title style3">';
	$args['title_reply_after']  = '</h4>';	
	$args['comment_field']      = '<div class="row"><div class="col-md-12 col-sm-12 col-xs-12">';  
	$args['comment_field']      .= sprintf('<p class="textarea-label">%s <span>(*)</span></p>', esc_html__('Your comments', 'divine-lite'));
	$args['comment_field']      .= '<p class="textarea-block">';
	$args['comment_field']      .= '<textarea name="comment" id="comment_message" rows="10"></textarea>';
	$args['comment_field']      .= '</p>';
	$args['comment_field']      .= '</div></div>';  
	  
	return $args;
}

function divine_lite_set_comment_form_default_fields( $fields ) {

	$commenter = wp_get_current_commenter();
	
	$fields['author'] = '<div class="row"><div class="col-md-4 col-sm-4 col-xs-4"><p class="input-block">';    
	$fields['author'] .= sprintf('<input type="text" value="%s" id="comment_name" name="author" size="30" placeholder="%s">', esc_attr($commenter['comment_author']), '');
	$fields['author'] .= '</p></div><div class="col-md-8 col-sm-8 col-xs-8"><div class="input-label">';  
	$fields['author'] .= sprintf('<p>%s <span>(*)</span></p>', esc_html__('Name', 'divine-lite'));
	$fields['author'] .= sprintf('<p>%s</p>', esc_html__('Your full name please.', 'divine-lite'));
	$fields['author'] .= '</div></div></div>';
	
	
	$fields['email']  .= '<div class="row"><div class="col-md-4 col-sm-4 col-xs-4"><p class="input-block">';  
	$fields['email']  .= sprintf('<input type="%s" value="%s" id="comment_email" name="email" size="30" placeholder="%s">', 'email', esc_attr($commenter['comment_author_email']), esc_html__('Your email', 'divine-lite'));
	$fields['email']  .= '</p></div><div class="col-md-8 col-sm-8 col-xs-8"><div class="input-label">';  
	$fields['email']  .= sprintf('<p>%s <span>(*)</span></p>', esc_html__('Email address', 'divine-lite'));
	$fields['email']  .= sprintf('<p>%s</p>', esc_html__('Used for gravatar.', 'divine-lite'));
	$fields['email']  .= '</div></div></div>';  
	
	$fields['url']    = '<div class="row"><div class="col-md-4 col-sm-4 col-xs-4"><p class="input-block">';  
	$fields['url']    .= sprintf('<input type="%s" value="%s" id="comment_url" name="url" size="30" placeholder="%s">', 'text', esc_attr($commenter['comment_author_url']), '');
	$fields['url']    .= '</p></div><div class="col-md-8 col-sm-8 col-xs-8"><div class="input-label">';  
	$fields['url']    .= sprintf('<p>%s</p>', esc_html__('Website', 'divine-lite'));
	$fields['url']    .= sprintf('<p>%s</p>', esc_html__('Link back if you want.', 'divine-lite'));
	$fields['url']    .= '</div></div></div>';  

	return $fields;
}

function divine_lite_list_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  ?>
  <li <?php comment_class('clearfix'); ?> id="comment-<?php comment_ID(); ?>">
      <article class="comment-wrap clearfix">
          <div class="comment-avatar">
              <?php echo get_avatar($comment->comment_author_email, 80); ?>
          </div>

          <div class="media-body clearfix">
              <header class="clearfix">
                  <div class="pull-left">
                      <h6><?php comment_author_link(); ?></h6>
                  </div>
                  <div class="comment-button pull-right">
                      <span class="comment-date"><?php comment_time(get_option('date_format') . ' - ' . get_option('time_format')); ?></span>

                      <?php comment_reply_link(array_merge($args, array('reply_text' => '<span class="fa fa-mail-reply"></span>', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>                                                                                                                                                                        

                      <?php edit_comment_link('<span class="fa fa-pencil"></span>','', ''); ?>
                  </div>
              </header>
              <?php comment_text(true); ?>      
          </div>
      </article>                                                                      
  
  <?php
}
