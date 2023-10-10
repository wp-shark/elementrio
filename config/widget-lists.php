<?php
if (!defined('ABSPATH')) {
	exit;
}

// Register Blog Post widget
function elementrio_register_blog_post_widget($widgets_manager) {
	require_once(ELEMENTRIO_PLUGIN_DIR . 'widgets/blog-post-widget.php');
	$widgets_manager->register(new \Blog_post_Widget());
}

// Register Icon Box widget
function elementrio_register_icon_box_widget($widgets_manager) {
	require_once(ELEMENTRIO_PLUGIN_DIR . 'widgets/icon-box-widget.php');
	$widgets_manager->register(new \Icon_Box_Widget());
}

// Register Drop Caps widget
function elementrio_register_drop_caps_widget($widgets_manager) {
	require_once(ELEMENTRIO_PLUGIN_DIR . 'widgets/drop-caps-widget.php');
	$widgets_manager->register(new \Drop_Caps_Widget());
}