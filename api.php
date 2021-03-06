<?php

// include only file
if (!defined('ABSPATH')) {
    die('Do not open this file directly.');
}

function wchb_posts() {
    return 'test';
}

add_action('rest_api_init', function () {
    register_rest_route('wchb/v1', '/posts', [
        'methods' => 'GET',
        'callback' => 'wchb_posts',
        'permission_callback' => '__return_true'
    ]);
});
