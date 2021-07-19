<?php
/**
 * Plugin Name: Woocommerce Hosting Billing
 * Description: For for manage and selling web hosting in wordpress woocommerce.
 **/
include_once('script.php');
include_once('admin_menu.php');
include_once('api.php');
include_once('db.php');

// Create table when plugion activation is running.
register_activation_hook( __FILE__, 'wphostbill_create_table' );