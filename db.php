<?php

// Create table on plugin activation

$wphostbill_db_version = '0.1';

function wphostbill_create_table() {

  global $wpdb;
  global $wphostbill_db_version;

  $charset_collate = $wpdb->get_charset_collate();

  $wphostbill_table = $wpdb->prefix . 'wphostbill_server';

  $sql = "CREATE TABLE IF NOT EXISTS $wphostbill_table(
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`)
  ) $charset_collate;";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql);
  add_option('wphostbill_db_version', $wphostbill_db_version);
}