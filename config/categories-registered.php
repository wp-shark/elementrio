<?php
if (! defined( 'ABSPATH' ) ) exit;

/**
 * Add category.
 *
 * Register a custom widget category in Elementor's editor
 *
 * @since 1.1.0
 * @param \Elementor\Widgets_Manager $widgets_manager
 */
function elementrio_widget_category($widgets_manager) {
    $widgets_manager->add_category(
        'elementrio',
        array(
            'title' => esc_html__('Elementrio', 'elementrio'),
            'icon'  => 'fa fa-plug',
        ),
        1
    );
}

// Hook the function to Elementor's widget manager
add_action('elementor/elements/categories_registered', 'elementrio_widget_category');

