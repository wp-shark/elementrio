<?php
/*
* Plugin Name: Elementrio
* Description: An Elementor addon plugin for Elementor widgets.
* Version: 1.1.4
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Iqbal Hossain
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: elementrio
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Defining plugin constants.
 *
 * @since 1.0.0
 */
define('ELEMENTRIO_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ELEMENTRIO_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Make sure the Elementor plugin is active
if (!did_action('elementor/loaded')) {
    add_action('admin_notices', 'elementrio_fail_load');
    return;
}

/**
 * Defining plugin version
 *
 * @since 1.0.0
 */
class Elementrio_Version {
    const PLUGIN_VERSION = '1.1.4';

    public static function get_plugin_version() {
        return self::PLUGIN_VERSION;
    }
}

/**
 * After activation hook method
 * Add version to the options table if not exists yet and update the version if already exists.
 *
 * @return void
 * @since 1.0.0
 */
function elementrio_activated_plugin() {
	// Update version in the options table
	update_option('elementrio_version', Elementrio_Version::get_plugin_version());

	// Add installed time after checking if it exists or not
	if (!get_option('elementrio_installed_time')) {
		add_option('elementrio_installed_time', time());
	}

	// Redirect to the settings page after activation
	add_option('elementrio_do_activation_redirect', true);
}
register_activation_hook(__FILE__, 'elementrio_activated_plugin');

/**
 * Redirect to the settings page after activation.
 *
 * @return void
 * @since 1.0.0
 */
function elementrio_admin_redirect() {
	if (get_option('elementrio_do_activation_redirect', false)) {
		delete_option('elementrio_do_activation_redirect');
		wp_safe_redirect(admin_url('admin.php?page=elementrio'));
		exit;
	}
}
add_action('admin_init', 'elementrio_admin_redirect');

// Show admin notice if Elementor is not installed or activated
function elementrio_fail_load() {
    $class = 'notice notice-error';
    $message = __('Elementrio requires Elementor to be active.', 'elementrio');

    printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
}

// Enqueue Elementrio plugin's custom CSS
function elementrio_enqueue_styles() {
    $elementrio_version = Elementrio_Version::get_plugin_version();
    wp_enqueue_style('elementrio-styles', ELEMENTRIO_PLUGIN_URL . 'assets/css/elementrio.css', array(), $elementrio_version);
}
add_action('elementor/frontend/after_enqueue_styles', 'elementrio_enqueue_styles');

// Enqueue Elementrio plugin's custom js
function elementrio_enqueue_script() {
    $elementrio_version = Elementrio_Version::get_plugin_version();
    wp_enqueue_script('elementrio-js', ELEMENTRIO_PLUGIN_URL . 'assets/js/elementrio.js', array(), $elementrio_version, true);
}
add_action('elementor/frontend/after_register_scripts', 'elementrio_enqueue_script');

// Fires before the initialization of the Elementrio plugin.
function elementrio_plugins_loaded() {
	/**
	 * This action hook allows developers to perform additional tasks before the Elementrio plugin has been initialized.
	 * @since 1.0.0
	 */
	do_action('elementrio/before_init');
}
add_action('plugins_loaded', 'elementrio_plugins_loaded');

// Include category registration file
require_once(__DIR__ . '/config/categories-registered.php');

// Include widget registration file and register widgets
require_once(__DIR__ . '/config/widget-lists.php');
add_action('elementor/widgets/register', 'elementrio_register_blog_post_widget');
add_action('elementor/widgets/register', 'elementrio_register_icon_box_widget');
add_action('elementor/widgets/register', 'elementrio_register_drop_caps_widget');

// Include modules lists
require_once(__DIR__ . '/config/module-lists.php');

// Include admin files
require_once(__DIR__ . '/core/admin/admin.php');
require_once(__DIR__ . '/core/admin/menu.php');