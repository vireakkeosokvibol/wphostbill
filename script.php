<?php

function wchb_scripts() {
    wp_enqueue_style('main-css', plugins_url('assets/css/main.css', __FILE__), '0.1.0', false);
    // wp_enqueue_style('bootstrap', plugins_url('assets/css/bootstrap.min.css', __FILE__), '0.1.0', false);
}

add_action('admin_enqueue_scripts', 'wchb_scripts');