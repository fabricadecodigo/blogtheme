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
                    <div class="kopa-entry-post"> 
                        <?php
                        if (have_posts()):
                            $is_enable_featured_content = (int) get_theme_mod('is-enable-post-featured-content', 1);
                            $is_enable_category         = (int) get_theme_mod('is-enable-post-category', 1);
                            $is_enable_tag              = (int) get_theme_mod('is-enable-post-tag', 1);
                            $is_enable_datetime         = (int) get_theme_mod('is-enable-post-created-date', 1);
                            $is_enable_comments         = (int) get_theme_mod('is-enable-post-comment-counts', 1);                            
                            $is_enable_author           = (int) get_theme_mod('is-enable-post-author-info', 1);

                            while (have_posts()) : the_post();
                                $post_id     = get_the_ID();
                                $post_url    = get_permalink();
                                $post_title  = get_the_title();
                                $post_format = get_post_format();
                                ?>
                                <article <?php post_class(array('entry-item', 'gallery-post', 'clearfix')); ?>>

                                    <?php if ($is_enable_featured_content): ?>
                                        <?php if (has_post_thumbnail()):?>
                                            <div class="entry-thumb">
                                                <a href="<?php echo esc_url($post_url); ?>" title="<?php echo esc_attr($post_title); ?>">
                                                    <?php the_post_thumbnail('divine-lite-blog-thumnail', array('class' => 'img-responsive')); ?>
                                                </a>                            
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="entry-content">
                                        <div class="entry-date style1 pull-left">
                                            <?php 
                                            $month = apply_filters('divine_get_singular_month', get_the_date('M'), $post_id, get_post_type());
                                            $day   = apply_filters('divine_get_singular_day', get_the_date('d'), $post_id, get_post_type());
                                            ?>
                                            <span class="entry-month"><?php echo esc_attr($month); ?></span>
                                            <span class="entry-day"><span><?php echo esc_attr($day); ?></span></span>
                                        </div>
                                        <div class="content-body">
                                            <header>
                                                <h4 class="entry-title"><?php echo esc_attr($post_title); ?></h4>

                                                <?php if ($is_enable_author || $is_enable_comments || $is_enable_category): ?>
                                                    <div class="entry-meta">
                                                        <?php if ($is_enable_author): ?>
                                                            <p class="entry-author">
                                                                <span class="fa fa-edit"></span>
                                                                <?php the_author(); ?>
                                                            </p>
                                                        <?php endif; ?>
                                                        <?php if ($is_enable_comments): ?>
                                                            <p class="entry-comment">                                                                
                                                                <span class="fa fa-comments"></span>
                                                                <?php comments_popup_link(esc_html__('No Comment', 'divine-lite'), esc_html__('1 Comment', 'divine-lite'), esc_html__('% Comments', 'divine-lite'), '', esc_html__('0 Comment', 'divine-lite')); ?>                                                                
                                                            </p>
                                                        <?php endif; ?>
                                                        <?php if (has_category() && $is_enable_category): ?>
                                                            <p class="entry-categories">
                                                                <span class="fa fa-file-o"></span>                                                                
                                                                <?php the_category(', '); ?>                                                                
                                                            </p>
                                                        <?php endif ?>
                                                    </div>
                                                <?php endif; ?>
                                            </header>

                                            <div class="kopa_post_content clearfix">
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

                                            <br />

                                            <?php if ($is_enable_tag && has_tag()): ?>
                                                <div class="kopa-tag-box">    
                                                    <span><?php _e('Tags :', 'divine-lite'); ?></span>
                                                    <?php the_tags('', ', '); ?>                        
                                                </div>
                                            <?php endif; ?>

                                        </div>

                                        <?php
                                        if ($is_enable_author) {
                                            kopa_lite_get_about_author();
                                        }
                                        ?>
                                    </div> 
                                </article>

                                <?php divine_lite_get_related_posts(); ?>

                                <?php comments_template(); ?>

                                <?php
                            endwhile;
                        else:
                            printf('<blockquote>%1$s</blockquote>', esc_html__('Nothing Found...', 'divine-lite'));
                        endif;
                        ?>
                    </div> 
                    <div class="mb-60"></div>
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
