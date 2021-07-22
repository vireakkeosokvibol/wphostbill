<?php

// include only file
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

if (!class_exists('WP_List_Table')) {
  require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Server extends WP_List_Table
{
  function __construct()
  {
  }
}

if (class_exists('Server')) {
  $server = new Server();
}
