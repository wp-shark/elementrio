<?php
	namespace Elementrio\Modules;

	defined('ABSPATH') || exit;

	/**
	 * Icon_Box Widget for Elementor.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	class Modules {
		use \Elementrio\Traits\Singleton;

		/**
		 * Constructor.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function __construct() {
			require_once( __DIR__ . '/glass-morphism/glass-morphism.php' );
		}
	}