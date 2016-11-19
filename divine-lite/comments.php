<?php
if (post_password_required())
    return;
?>

<div id="comments">
    <?php
    if (have_comments()) :
        global $post;
        ?>         
        <?php if($count = divine_lite_get_comments_by_post_id($post->ID)): ?>
            <h4 class="comments-title widget-title style3"><?php echo esc_attr($count); ?></h4>        
        <?php endif;?>

        <ol class="comments-list clearfix">
            <?php
            wp_list_comments(array(
                'walker' => null,
                'style' => 'ul',
                'short_ping' => true,
                'callback' => 'divine_lite_list_comments',
                'type' => 'all'
            ));
            ?>
        </ol>
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>           
            <div class="pagination kopa-comment-pagination">  
                <?php
                paginate_comments_links(array(
                    'prev_text' => __('<span>&laquo;</span> Previous', 'divine-lite'),
                    'next_text' => __('Next <span>&raquo;</span>', 'divine-lite')
                ));
                ?>
            </div>
        <?php endif; ?>
        <?php if (!comments_open() && get_comments_number()) : ?>
            <blockquote><?php _e('Comments are closed.', 'divine-lite'); ?></blockquote>
        <?php endif; ?>    
        <?php
    endif;
    
    comment_form( divine_lite_get_comment_form_args() );

    ?>
</div>