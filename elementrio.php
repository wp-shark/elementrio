<?php
/*
 * Plugin Name:       Elementrio
 * Description:       An Elementor addon plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Iqbal Hossain
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       elementrio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Make sure the Elementor plugin is active
if ( ! did_action( 'elementor/loaded' ) ) {
	add_action( 'admin_notices', 'elementrio_fail_load' );
	return;
}

function elementrio_fail_load() {
	$class = 'notice notice-error';
	$message = __( 'Elementrio requires Elementor to be active.', 'elementrio' );

	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
}

// Enqueue elementrio plugin's custom CSS
function elementrio_enqueue_styles() {
	wp_enqueue_style( 'elementrio-styles', plugins_url( 'css/elementrio.css', __FILE__ ) );
}
add_action( 'elementor/frontend/after_enqueue_styles', 'elementrio_enqueue_styles' );

// Register elementrio plugin widgets
function register_icon_box_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/icon-box-widget.php' );

	$widgets_manager->register( new \Icon_Box_Widget() );

}
add_action( 'elementor/widgets/register', 'register_icon_box_widget' );