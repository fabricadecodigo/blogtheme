<?php

$divine_layout_setting = divine_lite_get_template_setting();
$template = apply_filters("kopa_get_template_part", "layouts/{$divine_layout_setting['layout_id']}");
get_template_part($template);