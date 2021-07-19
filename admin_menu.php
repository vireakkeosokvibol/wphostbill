<?php

function wchb_dashboard() {
    include_once('templates/index.php');
}

function wchb_menu2() {
    include_once('templates/settings.php');
}

function my_menu_pages(){
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        add_menu_page(
            'Woocommerce Hosting Billing',
            'WCHB',
            'manage_options',
            'wchb-dashboard',
            '',
            'dashicons-editor-kitchensink'
        );
        add_submenu_page(
            'wchb-dashboard',
            'Dasbboard',
            'Dashboard',
            'manage_options',
            'wchb-dashboard',
            'wchb_dashboard'
        );
        add_submenu_page(
            'wchb-dashboard',
            'Settings',
            'Settings',
            'manage_options',
            'settings',
            'wchb_menu2'
        );
	}
    
}
/**
 * Check if WooCommerce is active
 **/
function myguten_admin_notice() {
    if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		echo '<div class="error"><p>';
		echo sprintf( __( 'Woocommerce Hosting Billing require Woocommerce. <a href="'. get_admin_url() . '/plugin-install.php?s=woocommerce&tab=search&type=term">Please insatll Woocommerce plugin.</a>' ), get_preview_post_link() );
		echo '</p></div>';
	}
};
add_action( 'admin_notices', 'myguten_admin_notice' );
add_action('admin_menu', 'my_menu_pages');
