<?php

/**
 * Plugin Name: WP Hosting Billing
 * Description: For for manage and selling web hosting in wordpress woocommerce.
 **/
include_once('script.php');
include_once('admin_menu.php');
include_once('api.php');
include_once('db.php');

define('WPHOSTBILL', plugin_basename( __FILE__ ));

// Create table when plugion activation is running.
register_activation_hook(__FILE__, 'wphostbill_create_table');

/**
 * Add settings link to plugin actions
 *
 * @param  array  $plugin_actions
 * @param  string $plugin_file
 * @since  1.0
 * @return array
 */
function add_plugin_link( $links ) {
 
  $list_table_plugin_url = admin_url("admin.php?page=settings");
    // $first_link = '<a href="' . $list_table_plugin_url . '">List Table Plugin</a>';

    $settings_link = admin_url("admin.php?page=settings");

    $settings_anchor = '<a href="' . $settings_link . '">Settings</a>';

    array_push($links, $settings_anchor);
    // array_push($links, $first_link);

    return $links;
}
add_filter( 'plugin_action_links_' . WPHOSTBILL, 'add_plugin_link', );