<?php
get_header();
global $divine_layout_setting;

$sb_right = $divine_layout_setting['sidebars']['pos_right'];
?>
<div class="bg-hb"></div>

<?php divine_lite_get_breadcrumb(); ?>

<div id="main-content">

    <section class="kopa-area kopa-area-1">
        <div class="wrapper">
            <div class="row">                
                <?php
                $wrap_classes = is_active_sidebar($sb_right) ? 'col-md-9 col-sm-9 col-xs-9' : 'col-md-12 col-sm-12 col-xs-12';
                ?>
                <div class="kopa-main-col <?php echo esc_attr($wrap_classes); ?>">                

                    <div class="entry-content">
                        <?php
                        if (have_posts()):
                            while (have_posts()) : the_post();
                                ?>
                                <div <?php post_class(); ?>>

                                    <div class="kopa_page_content clearfix">
                                        <?php the_content(); ?>
                                    </div>

                                    <?php
                                    wp_link_pages(array(
                                        'before'           => '<p class="page-links clearfix">',
                                        'after'            => '</p>',
                                        'next_or_number'   => 'next',
                                        'nextpagelink'     => '<span class="pull-left">' . esc_html__('Next', 'divine-lite') . '</span>',
                                        'previouspagelink' => '<span class="pull-right">' . esc_html__('Previous', 'divine-lite') . '</span>',
                                        'echo'             => 1
                                    ));
                                    ?>

                                </div>             

                                <?php comments_template(); ?>   
                                                                
                                <?php
                            endwhile;
                        else:
                            printf('<blockquote>%1$s</blockquote>', esc_html__('Nothing Found...', 'divine-lite'));
                        endif;
                        ?>
                    </div>
                </div>                
                
                <?php
                #WIDGET AREA {RIGHT}
                
                if (is_active_sidebar($sb_right)):
                    echo '<div class="sidebar col-md-3 col-sm-3 col-xs-3">';
                    add_filter('dynamic_sidebar_params', 'divine_lite_sidebar_right_params');           
                    dynamic_sidebar($sb_right);
                    remove_filter('dynamic_sidebar_params', 'divine_lite_sidebar_right_params');           
                    echo '<div class="mb-20"></div>';
                    echo '</div>';
                endif;
                ?>

            </div>            
        </div>  
        <div class="mb-30"></div>  
    </section>       
</div>
<?php
get_footer();
