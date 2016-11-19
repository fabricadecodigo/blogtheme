<?php
#API
require get_template_directory() . '/api/TGMPluginActivation.class.php';

#PLUGINS
require get_template_directory() . '/inc/plugin.php';

#DIVINE FUNCTION
require_once(get_template_directory() . '/inc/util.php');
require_once(get_template_directory() . '/inc/hook.php');
require_once(get_template_directory() . '/inc/config.php');

#DIVINE FEATURED
require_once(get_template_directory() . '/inc/theme-option.php');
require_once(get_template_directory() . '/inc/layout.php');
require_once(get_template_directory() . '/inc/sidebar.php');

#CUSTOMIZE
require_once(get_template_directory() . '/inc/customize.php');