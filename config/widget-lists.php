<?php
if (! defined( 'ABSPATH' ) ) exit;

// Register Blog Post widget
function register_blog_post_widget($widgets_manager) {
    require_once(__DIR__ . '/../widgets/blog-post-widget.php');
    $widgets_manager->register(new \Blog_post_Widget());
}

// Register Icon Box widget
function register_icon_box_widget($widgets_manager) {
    require_once(__DIR__ . '/../widgets/icon-box-widget.php');
    $widgets_manager->register(new \Icon_Box_Widget());
}

// Register Drop Caps widget
function register_drop_caps_widget($widgets_manager) {
    require_once(__DIR__ . '/../widgets/drop-caps-widget.php');
    $widgets_manager->register(new \Drop_Caps_Widget());
}
