<?php
/**
 * Add menu
 **/
function wphostbill_dashboard() {
    include_once('templates/index.php');
}

function wphostbill_menu2() {
    include_once('templates/settings.php');
}

function my_menu_pages(){
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
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
            'wphostbill_dashboard'
        );
        add_submenu_page(
            'wphostbill-dashboard',
            'Settings',
            'Settings',
            'manage_options',
            'settings',
            'wphostbill_menu2'
        );
	}
    
}
/**
 * Add setting page
 **/

/**
 * Check if WooCommerce is active
 **/
function myguten_admin_notice() {
    if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		echo '<div class="error"><p>';
		echo sprintf( __( 'WordPress Hosting Billing require Woocommerce. <a href="'. get_admin_url() . '/plugin-install.php?s=woocommerce&tab=search&type=term">Please insatll Woocommerce plugin.</a>' ), get_preview_post_link() );
		echo '</p></div>';
	}
};
add_action( 'admin_notices', 'myguten_admin_notice' );
add_action('admin_menu', 'my_menu_pages');
