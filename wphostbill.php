<?php
/*
  Plugin Name: WP Hosting Billing
  Plugin URI: https://github.com/vireakkeosokvibol/wphostbill
  Description: For for manage and selling web hosting in wordpress woocommerce.
  Version: 0.1
  Requires at least: 5.0
  Requires PHP: 7.3
  Tested up to: 7.4
  Author: VIREAK KEOSOKVIBOL
  Author URI: https://github.com/vireakkeosokvibol
  Text Domain: wphostbill

  Copyright 2021  VIREAK KEOSOKVIBOL  (email: vireakkeosokvibol@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// include only file
if (!defined('ABSPATH')) {
  die('Do not open this file directly.');
}

define('WPHOSTBILL_FILE', __FILE__);

require_once dirname(__FILE__) . ('/script.php');
require_once dirname(__FILE__) . ('/api.php');
require_once dirname(__FILE__) . ('/db.php');


class WPHOSTBILL
{
  protected static $instance = null;

  static function getInstance()
  {
    if (!is_a(self::$instance, 'WPHOSTBILL')) {
      self::$instance = new WPHOSTBILL();
    }

    return self::$instance;
  } // getInstance

  function   __construct()
  {
    // // Create table when plugion activation is running.
    register_activation_hook(__FILE__, 'wphostbill_create_table');

    /**
     * Add settings link to plugin actions
     *
     * @param  array  $plugin_actions
     * @param  string $plugin_file
     * @since  1.0
     * @return array
     */
    add_action('admin_menu', array($this, 'add_menu'));
    add_action('woocommerce_admin_process_product_object', array($this, 'single_product_update'));
    add_action('woocommerce_product_options_general_product_data', array($this, 'custom_product_tab_content'));

    add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'add_plugin_link'));
    add_filter('woocommerce_product_data_tabs', array($this, 'custom_product_tabs'));
    // add_filter('woocommerce_product_data_panels', array($this, 'custom_product_tab_content'));
  }

  function add_plugin_link($links)
  {

    // $list_table_plugin_url = admin_url("admin.php?page=wphostbill-settings");
    // $first_link = '<a href="' . $list_table_plugin_url . '">List Table Plugin</a>';

    $settings_link = admin_url("admin.php?page=wphostbill-settings");

    $settings_anchor = '<a href="' . $settings_link . '">Settings</a>';

    array_push($links, $settings_anchor);
    // array_push($links, $first_link);

    return $links;
  }
  /**
   * Add admin menu
   */
  function add_menu()
  {
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
      /**
       * Add admin menu and submenu
       */
      add_menu_page(
        'Woocommerce Hosting Billing',
        'WP Hosting Billing',
        'manage_options',
        'wphostbill-dashboard',
        '',
        'dashicons-editor-kitchensink'
      );
      add_submenu_page(
        'wphostbill-dashboard',
        'Dasbboard',
        'Dashboard',
        'manage_options',
        'wphostbill-dashboard',
        function () {
          require_once dirname(__FILE__) . ('/templates/admin/dashboard.php');
        }
      );
      add_submenu_page(
        'wphostbill-dashboard',
        'Server',
        'Server',
        'manage_options',
        'wphostbill-server',
        function () {
          require_once dirname(__FILE__) . ('/templates/admin/server.php');
        }
      );
      add_submenu_page(
        'wphostbill-dashboard',
        'Settings',
        'Settings',
        'manage_options',
        'wphostbill-settings',
        function () {
          require_once dirname(__FILE__) . ('/templates/admin/settings.php');
        }
      );

      /**
       * Add woocommerce submenu
       */
      add_submenu_page('woocommerce', 'Invoices', 'Invoices', 'manage_options', 'invoices', function () {
        require_once dirname(__FILE__) . ('/templates/woocommerce/invoice.php');
      });
    }
  } // admin_menu

  function single_product_update($product)
  {
    // $product->update_meta_data('_wphostbill_service', isset($_POST['_wphostbill_service']) ? 'yes' : 'no');
  }

  /**
   * Add a custom product tab.
   */
  function custom_product_tabs($tabs)
  {

    $tabs['wphostbill_service'] = array(
      'label'    => __('Service', 'woocommerce'),
      'target'  => 'wphostbill_service_options',
      'class'    => array('show_if_virtual', 'show_if_wphostbill_service'),
    );

    return $tabs;
  }

  function custom_product_tab_content()
  {
    echo '<div class="options_group">';
  
    // Custom fields will be created here...
    woocommerce_wp_text_input( 
      array( 
        'id'          => '_text_field', 
        'label'       => __( 'My Text Field', 'woocommerce' ), 
        'placeholder' => 'http://',
        'desc_tip'    => 'true',
        'description' => __( 'Enter the custom value here.', 'woocommerce' ) 
      )
    );
    woocommerce_wp_text_input( 
      array( 
        'id'          => '_text_field', 
        'label'       => __( 'My Text Field', 'woocommerce' ), 
        'placeholder' => 'http://',
        'desc_tip'    => 'true',
        'description' => __( 'Enter the custom value here.', 'woocommerce' ) 
      )
    );
    
    echo '</div>';

    // require_once dirname(__FILE__) . ('/templates/admin/product_tab_content.php');
  }
}

if (class_exists('WPHOSTBILL')) {
  $wphostbill = new WPHOSTBILL();
}
