<?php

// Create table on plugin activation

$wphostbill_db_version = '0.1';

function wphostbill_create_table() {

  global $wpdb;
  global $wphostbill_db_version;

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

  $charset_collate = $wpdb->get_charset_collate();

  $wphostbill_table = $wpdb->prefix . 'wphostbill_server';

  $sql = "CREATE TABLE IF NOT EXISTS $wphostbill_table(
    id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
    hostname VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    port INT(4),
    account_number MEDIUMINT(9),
    status BOOLEAN NOT NULL default true,
    PRIMARY KEY (`id`)
  ) $charset_collate;";
  dbDelta($sql);

  $wphostbill_table = $wpdb->prefix . 'wphostbill_server_group';

  $sql = "CREATE TABLE IF NOT EXISTS $wphostbill_table(
    id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE,
    PRIMARY KEY (`id`)
  ) $charset_collate;";
  dbDelta($sql);
  
  add_option('wphostbill_db_version', $wphostbill_db_version);
}