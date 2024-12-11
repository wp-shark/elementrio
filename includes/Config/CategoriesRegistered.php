<?php
namespace Elementrio\Config;

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue registrar.
 *
 * @since 1.0.0
 * @access public
 */
class CategoriesRegistered {

	use \Elementrio\Traits\Singleton;

	/**
	 * Constructor.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {
		// Hook the method to Elementor's widget manager
		add_action( 'elementor/elements/categories_registered', [ $this, 'elementrio_widget_category' ] );
	}

	/**
	 * Add category.
	 *
	 * Register a custom widget category in Elementor's editor
	 *
	 * @since 1.1.0
	 * @param \Elementor\Elements_Manager $elements_manager
	 */
	public function elementrio_widget_category( $elements_manager ) {
		$elements_manager->add_category(
			'elementrio',
			[
				'title' => esc_html__( 'Elementrio', 'elementrio' ),
				'icon'  => 'fa fa-plug',
			]
		);
	}
}
