<?php
namespace Elementrio\Hooks;

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue registrar.
 *
 * @since 1.0.0
 * @access public
 */
class Init {

	use \Elementrio\Traits\Singleton;

	/**
	 * class constructor.
	 * private for singleton
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {
		// Third Party Compatibility
		//\Elementrio\Hooks\ThirdPartyCompatibility::instance();
	}
}