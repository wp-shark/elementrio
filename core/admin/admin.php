<?php
if (! defined( 'ABSPATH' ) ) exit;
/**
 * Register a custom menu page.
 */
function elementrio_menu_page() {
    add_menu_page( 
        __( 'Custom Menu Title', 'elementrio' ),
        'Elementrio',
        'manage_options',
        'elementrio',
        'elementrio_menu_content',
        plugins_url( 'images/elementrio.svg',  __FILE__),
        '58.6'
    );
}
add_action( 'admin_menu', 'elementrio_menu_page' );

/**
 * Include the menu.php file content.
 */
require_once plugin_dir_path( __FILE__ ) . 'menu.php';

/**
 * Enqueue styles and scripts for the custom menu page.
 */
function elementrio_enqueue_admin_styles() {
    wp_enqueue_style( 'elementrio-admin-styles', plugins_url( 'css/admin-styles.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'elementrio_enqueue_admin_styles' );

function elementrio_enqueue_admin_scripts() {
    wp_enqueue_script( 'elementrio-admin-scripts', plugins_url( 'js/admin-scripts.js', __FILE__ ), array( 'jquery' ), '', true );
}
add_action( 'admin_enqueue_scripts', 'elementrio_enqueue_admin_scripts' );
