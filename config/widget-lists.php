<?php
if (!defined('ABSPATH')) {
	exit;
}

// Register Blog Post widget
function elementrio_register_blog_post_widget($widgets_manager) {
	require_once(ELEMENTRIO_PLUGIN_DIR . 'widgets/elementrio-blog-post-widget.php');
	$widgets_manager->register(new \Elementrio_Blog_Post_Widget());
}

// Register Icon Box widget
function elementrio_register_icon_box_widget($widgets_manager) {
	require_once(ELEMENTRIO_PLUGIN_DIR . 'widgets/elementrio-icon-box-widget.php');
	$widgets_manager->register(new \Elementrio_Icon_Box_Widget());
}

// Register Drop Caps widget
function elementrio_register_drop_caps_widget($widgets_manager) {
	require_once(ELEMENTRIO_PLUGIN_DIR . 'widgets/elementrio-drop-caps-widget.php');
	$widgets_manager->register(new \Elementrio_Drop_Caps_Widget());
}

// Register Drop Caps widget
function elementrio_register_chart_widget($widgets_manager) {
	require_once(ELEMENTRIO_PLUGIN_DIR . 'widgets/elementrio-chart-widget.php');
	$widgets_manager->register(new \Elementrio_Chart_Widget());
}