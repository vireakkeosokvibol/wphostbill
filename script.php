<?php

function wchb_scripts() {
    wp_enqueue_style('main-css', plugins_url('assets/main.css', __FILE__), '0.1.0', false);
    wp_enqueue_style('uikit-min-css', plugins_url('assets/uikit.min.css', __FILE__), '3.6.16', false);
    wp_enqueue_script('uikit-min-js', plugins_url('assets/uikit.min.js', __FILE__), '3.6.16', false);
    wp_enqueue_script('uikit-icons-min-js', plugins_url('assets/uikit-icons.min.js', __FILE__), '3.6.16', false);
    wp_enqueue_script('echarts-min-js', plugins_url('assets/echarts.min.js', __FILE__), '5.0.2', false);
    
}

add_action('admin_enqueue_scripts', 'wchb_scripts');