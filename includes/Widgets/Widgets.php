<?php
	namespace Elementrio\Widgets;

	defined('ABSPATH') || exit;

	/**
	 * Icon_Box Widget for Elementor.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	class Widgets {
		use \Elementrio\Traits\Singleton;

		/**
		 * Constructor.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function __construct() {
			// Hook the method to Elementor's widget manager
			add_action( 'elementor/widgets/register', [ $this, 'register_list_widget' ] );
		}

		/**
		 * Register the widget.
		 */
		function register_list_widget( $widgets_manager ) {

			require_once( __DIR__ . '/icon-box/icon-box.php' );
			require_once( __DIR__ . '/drop-cap/drop-cap.php' );
			require_once( __DIR__ . '/blog-posts/blog-posts.php' );

			$widgets_manager->register( new \Icon_Box_Widget());
			$widgets_manager->register( new \Drop_Caps_Widget());
			$widgets_manager->register( new \Blog_Post_Widget());
		}
	}