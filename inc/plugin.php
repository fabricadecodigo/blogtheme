<?php
add_action('tgmpa_register', 'divine_lite_register_required_plugins');

function divine_lite_register_required_plugins() {
    $plugins = array(            
        array(
            'name'               => 'Kopa Framework',
            'slug'               => 'kopatheme',
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => ''
        ),
    );
    $config = array(        
        'has_notices'  => true,
        'is_automatic' => false
    );
    
    tgmpa($plugins, $config);    
}
