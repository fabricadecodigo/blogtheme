<?php
get_header();
?>
<div class="bg-hb"></div>

<?php divine_lite_get_breadcrumb(); ?>

<div id="main-content" class="clearfix">
    <section class="error-404 clearfix">

        <div class="left-col">
            <p><?php esc_html_e('404', 'divine-lite'); ?></p>
        </div>
        <div class="right-col">
            <h1><?php esc_html_e('Page not found...', 'divine-lite'); ?></h1>
            <p><?php esc_html_e("We're sorry, but we can't find the page you were looking for. It's probably some thing we've done wrong but now we know about it we'll try to fix it. In the meantime, try one of this options:", 'divine-lite'); ?></p>
            <ul class="arrow-list">
                <li><a href="javascript: history.go(-1);"><?php esc_html_e('Go back to previous page', 'divine-lite'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go to homepage', 'divine-lite'); ?></a></li>
            </ul>
        </div>

    </section>    
</div>
<?php
get_footer();
