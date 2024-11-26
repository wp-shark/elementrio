<?php
namespace Elementrio\Core;

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue registrar.
 *
 * @since 1.0.0
 * @access public
 */
class Enqueue {

	use \Elementrio\Traits\Singleton;

	/**
	 * Constructor.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action('elementor/frontend/after_enqueue_styles', [ $this, 'elementrio_enqueue_styles']);
	}

	/**
	 * Enqueue styles.
	 */
	function elementrio_enqueue_styles() {
		wp_enqueue_style('elementrio-styles', ELEMENTRIO_PLUGIN_URL . 'includes/Widgets/assets/css/widgets.css', array(), ELEMENTRIO_PLUGIN_VERSION);
	}
}
