<?php
get_header();
global $divine_layout_setting;

$sb_right = $divine_layout_setting['sidebars']['pos_right'];
?>
<div class="bg-hb"></div>

<?php divine_lite_get_breadcrumb(); ?>

<div id="main-content">
    <section class="kopa-area-1 kopa-area">
        <div class="wrapper">
            <div class="row">
                <?php
                $wrap_classes = is_active_sidebar($sb_right) ? 'col-md-9 col-sm-9 col-xs-9' : 'col-md-12 col-sm-12 col-xs-12';
                ?>

                <div class="kopa-main-col <?php echo esc_attr($wrap_classes); ?>">
                    <div class="kopa-entry-list">   
                        <?php
                        if (have_posts()):
                            global $post;

                            $exceprt_type           = get_theme_mod('blog-posts-content-type', 'excerpt');
                            $excerpt_limit          = get_theme_mod('blog-posts-content-max-words', 40);                            
                            $is_enable_author       = (int) get_theme_mod('is-enable-blog-posts-author', 1);
                            $is_enable_category     = (int) get_theme_mod('is-enable-blog-posts-category', 1);                            
                            $is_enable_created_date = (int) get_theme_mod('is-enable-blog-posts-created-date', 1);
                            $is_enable_comments     = (int) get_theme_mod('is-enable-blog-posts-comment-counts', 1);

                            $GLOBALS['divine_lite_excerpt_length'] = (int)$excerpt_limit;
                            
                            ?>

                            <ul class="list-post-cat-item list-unstyled">
                                <?php
                                while (have_posts()) : the_post();
                                    $post_id     = get_the_ID();
                                    $post_url    = get_permalink();
                                    $post_title  = get_the_title();
                                    $post_format = get_post_format();
                                    ?>               
                                    <li>
                                        <article <?php post_class(array('entry-item', 'standard-post', 'clearfix')); ?>>
                                            <?php
                                            if (has_post_thumbnail() && 'full' != $exceprt_type && !is_search()):                                                
                                                ?>                                                                                               
                                                <div class="entry-thumb">
                                                    <a href="<?php echo esc_url($post_url); ?>" title="<?php echo esc_attr($post_title); ?>">
                                                        <?php the_post_thumbnail('divine-lite-blog-thumnail', array('class' => 'img-responsive')); ?>
                                                    </a>
                                                </div>                                                
                                            <?php endif; ?>                                                

                                            <div class="entry-content">

                                                <?php if ($is_enable_created_date) : ?>
                                                    <div class="entry-date style1 pull-left">
                                                        <?php 
                                                        $month = apply_filters('divine_get_singular_month', get_the_date('M'), $post_id, get_post_type());
                                                        $day   = apply_filters('divine_get_singular_day', get_the_date('d'), $post_id, get_post_type());
                                                        ?>
                                                        <span class="entry-month"><?php echo esc_attr($month); ?></span>
                                                        <span class="entry-day"><span><?php echo esc_attr($day); ?></span></span>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="content-body">
                                                    <header>

                                                        <h4 class="entry-title">
                                                            <a href="<?php echo esc_url($post_url); ?>" title="<?php echo esc_attr($post_title); ?>"><?php echo esc_attr($post_title); ?></a>
                                                        </h4>

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

                                                                <?php if ($is_enable_category): ?>
                                                                    <p class="entry-categories">
                                                                        <span class="fa fa-file-o"></span>                                                                
                                                                        <?php the_category(', '); ?>                                                                
                                                                    </p>
                                                                <?php endif ?>
                                                            </div>
                                                        <?php endif; ?>

                                                    </header>

                                                    <?php
                                                    if ('excerpt' == $exceprt_type) {
                                                        the_excerpt();
                                                    } elseif ('full' == $exceprt_type) {
                                                        global $more;
                                                        $more = true;
                                                        the_content();
                                                    } else {
                                                        if ($excerpt_limit) {
                                                            add_filter('excerpt_length', 'divine_lite_excerpt_length');
                                                            the_excerpt();
                                                            remove_filter('excerpt_length', 'divine_lite_excerpt_length');
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                    <?php
                                endwhile;
                                ?>
                            </ul>
                            
                            <?php get_template_part('pagination'); ?>  

                            <?php
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
    </section>    
</div>
<?php
get_footer();
