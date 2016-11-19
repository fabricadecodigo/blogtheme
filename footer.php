<?php 

global $divine_layout_setting;
divine_lite_get_footer_social_links();

$footer_1 = $divine_layout_setting['sidebars']['pos_footer_1'];
$footer_2 = $divine_layout_setting['sidebars']['pos_footer_2'];
$footer_3 = $divine_layout_setting['sidebars']['pos_footer_3'];
$footer_4 = $divine_layout_setting['sidebars']['pos_footer_4'];
$footer_5 = $divine_layout_setting['sidebars']['pos_footer_5'];
?>

<?php if(is_active_sidebar( $footer_1) ||
            is_active_sidebar( $footer_2) ||
            is_active_sidebar( $footer_3) ||
            is_active_sidebar( $footer_4) ||
            is_active_sidebar( $footer_5)): ?>

<div id="bottom-sidebar">
    <div class="wrapper">
        <div class="row">
            <?php
            add_filter('dynamic_sidebar_params', 'divine_lite_edit_footer_sidebar');

            #WIDGET AREA {FOOTER 1}            
            if (is_active_sidebar( $footer_1)):                
                echo '<div class="col-md-4 col-sm-4">';
                dynamic_sidebar($footer_1);
                echo '</div>';                            
            endif;
            ?>

            <?php
            #WIDGET AREA {FOOTER 2}            
            if (is_active_sidebar($footer_2)):               
                echo '<div class="col-md-2 col-sm-2">';
                dynamic_sidebar($footer_2);
                echo '</div>';                            
            endif;
            ?>

            <?php
            #WIDGET AREA {FOOTER 3}            
            if (is_active_sidebar($footer_3)):                
                echo '<div class="col-md-2 col-sm-2">';
                dynamic_sidebar($footer_3);
                echo '</div>';                
            endif;
            ?>

            <?php
            #WIDGET AREA {FOOTER 4}            
            if (is_active_sidebar($footer_4)):                
                echo '<div class="col-md-2 col-sm-2">';
                dynamic_sidebar($footer_4);
                echo '</div>';                            
            endif;
            ?>

            <?php
            #WIDGET AREA {FOOTER 5}            
            if (is_active_sidebar($footer_5)):                
                echo '<div class="col-md-2 col-sm-2">';
                dynamic_sidebar($footer_5);
                echo '</div>';                            
            endif;

            remove_filter('dynamic_sidebar_params', 'divine_lite_edit_footer_sidebar');
            ?>
        </div>
    </div>
</div>
<?php endif;?>

<footer id="kopa-page-footer">
    <div class="wrapper clearfix">
        <?php if ($footer_info = get_theme_mod('footer-info')): ?>
            <p id="copyright" class="pull-left"><?php echo wp_kses_post($footer_info); ?></p>
        <?php endif; ?>

        <?php
        #FOOTER MENU
        if (has_nav_menu('footer-nav')) {
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-nav',
                    'container' => 'nav',
                    'container_id' => 'footer-nav',
                    'container_class' => 'footer-nav pull-right',
                    'menu_id' => 'footer-menu',
                    'menu_class' => 'footer-menu clearfix'
                )
            );
        }
        ?>       
    </div>
    <p id="back-top"><a href="#top"></a></p>
</footer>    
<?php wp_footer(); ?>
</body>
</html>