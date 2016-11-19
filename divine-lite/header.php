<!DOCTYPE html>
<html <?php language_attributes(); ?>>              
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />                   
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />        
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />                       
        <?php wp_head(); ?>
    </head>    
    <body <?php body_class(); ?>>  
        <header class="kopa-page-header">
            <?php
            $header_info = get_theme_mod('header-info');
            $is_enable_top_social_links = get_theme_mod('is-enable-social-links');
            $is_enable_search_form = get_theme_mod('is-enable-search-form');
            ?>

            <?php if (!empty($header_info) || $is_enable_top_social_links || $is_enable_search_form): ?>
                <div class="kopa-header-top">
                    <div class="wrapper clearfix">
                        <?php if (!empty($header_info)): ?>
                            <div class="hotline-box pull-left">
                                <h6><?php echo wp_kses_post($header_info); ?></h6>
                                <span class="triangle-wrapper"></span>
                                <span class="triangle"></span>
                                <div class="kopa-border-bottom"></div>
                            </div>                        
                            <div class="left-bg-color">
                                <div class="kopa-border-bottom"></div>
                            </div>
                            <?php
                        endif;
                        ?>                                            
                        <div class="ss-box pull-right clearfix">
                            <?php
                            if ($is_enable_top_social_links) {
                                divine_lite_get_social_links();
                            }
                            ?>                          

                            <?php if ($is_enable_search_form): ?>
                                <div class="search-box pull-right clearfix">
                                    <?php get_search_form(); ?>
                                </div>
                            <?php endif; ?>                        
                        </div>
                    </div>                
                </div>  
            <?php endif; ?>

            <div class="kopa-header-bottom ">
                <div class="wrapper clearfix">                                        
                    <?php if ($logo = get_theme_mod('logo')): ?>
                        <div class="left-color-bg">
                            <div class="left-color-bg-outer"></div>
                            <div class="triangle"></div>
                        </div>
                        <div class="logo-box pull-left">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(do_shortcode($logo)); ?>" alt="<?php bloginfo('name'); ?>"></a>
                        </div>                       
                    <?php endif; ?>
                    <?php
                    #TOP MENU
                    if (has_nav_menu('main-nav')) {
                        
                        wp_nav_menu(
                            array(
                                'theme_location'  => 'main-nav',
                                'container'       => 'nav',
                                'container_id'    => 'main-nav',
                                'container_class' => 'main-nav pull-right',
                                'menu_id'         => 'main-menu',
                                'menu_class'      => 'main-menu clearfix'
                            )
                        );

                        echo '<nav class="main-nav-mobile clearfix">';

                        echo '<a class="pull"><span class="fa fa-align-justify"></span></a>';

                        wp_nav_menu(
                                array(
                                    'theme_location' => 'main-nav',
                                    'container' => FALSE,                                                                                                            
                                    'menu_class' => 'main-menu-mobile clearfix'
                                )
                        );
                        
                        echo '</nav>';
                    }
                    ?>                
                </div>                
            </div>    

            <?php if ($is_enable_top_social_links || $is_enable_search_form): ?>
                <div class="kopa-header-top-2">
                    <div class="wrapper clearfix">
                        <?php if ($is_enable_top_social_links) {
                            divine_lite_get_social_links();
                        }
                        ?>

                        <?php if ($is_enable_search_form): ?>
                            <div class="search-box pull-right clearfix">
                                <?php get_search_form(); ?>
                            </div>                        
                        <?php endif; ?>
                    </div>                
                </div> 
            <?php endif; ?>

        </header>