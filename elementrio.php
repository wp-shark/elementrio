<?php
/*
* Plugin Name: Elementrio
* Description: An Elementor addon plugin for Elementor widgets.
* Version: 1.0.0
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Iqbal Hossain
* Plugin URI: https://themezam.com/plugin/elementrio/
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
    const PLUGIN_VERSION = '1.0.0';

    public static function get_plugin_version() {
        return self::PLUGIN_VERSION;
    }
}

// You can retrieve the plugin version like this:
//$elementrio_version = Elementrio_Version::get_plugin_version();


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

// Include widget registration file and register widgets
require_once(__DIR__ . '/config/widget-lists.php');
add_action('elementor/widgets/register', 'elementrio_register_blog_post_widget');
add_action('elementor/widgets/register', 'elementrio_register_icon_box_widget');
add_action('elementor/widgets/register', 'elementrio_register_drop_caps_widget');