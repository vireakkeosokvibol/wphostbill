<?php

// include only file
if (!defined('ABSPATH')) {
    die('Do not open this file directly.');
}

function wchb_scripts()
{
    wp_enqueue_style('main-css', plugins_url('assets/css/main.css', __FILE__), '0.1.0', false);
    // wp_enqueue_style('bootstrap', plugins_url('assets/css/bootstrap.min.css', __FILE__), '0.1.0', false);
}

function wcpp_custom_style()
{
	// echo file_get_contents(dirname(__FILE__) . '/assets/js/main.js');
    echo '<script type="text/javascript">'.file_get_contents(dirname(__FILE__) . '/assets/js/main.js').'</script>';
}

add_action('admin_enqueue_scripts', 'wchb_scripts');
add_action('admin_head', 'wcpp_custom_style');