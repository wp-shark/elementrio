<?php
/*
* Plugin Name: Elementrio
* Description: An Elementor addon plugin for Elementor widgets.
* Version: 1.2.0
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Iqbal Hossain
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: elementrio
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Final class for the \Elementrio plugin.
 *
 * @since 1.1.4
 */
final class Elementrio {
	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const VERSION = '1.2.0';

	/**
	 * Minimum Elementor version
	 *
	 * @var string
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP version
	 *
	 * @var string
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementrio
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of Elementrio is loaded or can be loaded.
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementrio - Main instance.
	 */
	public static function instance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		// Plugins helper constants
		$this->helper_constants();

		// Load after plugin activation
		register_activation_hook( __FILE__, array( $this, 'activated_plugin' ) );

		// Redirect to the settings page after activation
		add_action( 'admin_init', array( $this, 'admin_redirect' ) );

		// Make sure ADD AUTOLOAD is vendor/autoload.php file
		require_once ELEMENTRIO_PLUGIN_DIR . 'vendor/autoload.php';

		// Plugin actions
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );

		// Load the plugin text domain
		add_action( 'init', array( $this, 'load_textdomain' ) );

		/**
		 * Fires while initialization of the Elementrio plugin.
		 *
		 * This action hook allows developers to perform additional tasks while the Elementrio plugin has been initialized.
		 *
		 * @since 1.0.0
		 */
		do_action( 'elementrio/init' );
	}

	/**
	 * Helper method for plugin constants.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function helper_constants() {
		define( 'ELEMENTRIO_PLUGIN_VERSION', self::VERSION );
		define( 'ELEMENTRIO_PLUGIN_NAME', 'Elementrio' );
		define( 'ELEMENTRIO_PLUGIN_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
		define( 'ELEMENTRIO_PLUGIN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
	}

	/**
	 * After activation hook method
	 * add version to the options table if not exists yet and update the version if already exists.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function activated_plugin() {
		// update vertion to the options table
		update_option( 'elementrio_version', ELEMENTRIO_PLUGIN_VERSION );

		// added installed time after checking time exist or not
		if ( ! get_option( 'elementrio_installed_time' ) ) {
			add_option( 'elementrio_installed_time', time() );
		}

		// redirect to the settings page after activation
		add_option('elementrio_do_activation_redirect', true);
	}

	/**
	 * Redirect to the settings page after activation.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function admin_redirect() {
		if ( get_option('elementrio_do_activation_redirect', false) ) {
			delete_option('elementrio_do_activation_redirect');
			wp_safe_redirect( admin_url( 'admin.php?page=elementrio&activation-redirect=1' ) );
			exit;
		}
	}

	/**
	 * Plugins loaded method.
	 * loads our others classes and textdomain.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function plugins_loaded() { 
		/**
		 * Fires before the initialization of the Elementrio plugin.
		 *
		 * This action hook allows developers to perform additional tasks before the Elementrio plugin has been initialized.
		 * @since 1.0.0
		 */
		do_action( 'elementrio/before_init' );

		// Check if Elementor installed and activated
		if (!did_action('elementor/loaded')) {
			add_action('admin_notices', [$this, 'elementrio_fail_load']);
			return;
		}

		// Check for required Elementor version
		if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
			add_action('admin_notices', [$this, 'elementrio_fail_load_elementor']);
			return;
		}

		// Check for required PHP version
		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			add_action('admin_notices', [$this, 'elementrio_fail_load_php']);
			return;
		}

		/**
		 * Action & Filter hooks.
		 *
		 * @return void
		 * @since 1.2.9
		 */
		//Elementrio\Hooks\Init::instance();

		/**
		 * Initializes the Elementrio admin functionality.
		 *
		 *
		 * @since 1.0.0
		 */
		Elementrio\Admin\Admin::instance();

		/**
		 * Initializes the Elementrio CategoriesRegistered functionality.
		 *
		 *
		 * @since 1.0.0
		 */
		Elementrio\Config\CategoriesRegistered::instance();

		/**
		 * Initializes the Elementrio Widgets functionality.
		 *
		 *
		 * @since 1.0.0
		 */
		Elementrio\Widgets\Widgets::instance();

		/**
		 * Initializes the Elementrio Modules functionality.
		 *
		 *
		 * @since 1.0.0
		 */
		Elementrio\Modules\Modules::instance();

		/**
		 * Initializes the Elementrio Enqueue functionality.
		 *
		 *
		 * @since 1.0.0
		 */
		Elementrio\Core\Enqueue::instance();

		/**
		 * Fires after the initialization of the Elementrio plugin.
		 *
		 * This action hook allows developers to perform additional tasks after the Elementrio plugin has been initialized.
		 * @since 1.0.0
		 */
		do_action( 'elementrio/after_init' );
	}

	/**
	 * elementor not loaded notice
	 */
	public function elementrio_fail_load() {
		$class = 'notice notice-error';
		$message = __('Elementrio requires Elementor to be active.', 'elementrio');

		printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
	}

	/**
	 * Check for required Elementor version
	 */
	public function elementrio_fail_load_elementor() {
		$class = 'notice notice-error';
		$message =  sprintF(
			__('Elementrio requires required Elementor version to be active. Please update Elementor.', 'elementrio'),
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
	}

	/**
	 * Check for required PHP version
	 */
	public function elementrio_fail_load_php() { 
		$class = 'notice notice-error';
		$message = sprintf(
			__('Elementrio requires PHP %s version to be active. Please update PHP version.', 'elementrio'),
			self::MINIMUM_PHP_VERSION
		);

		printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
	}

	/**
	 * Loads the plugin text domain for the Elementrio Blocks Addon.
	 *
	 * This function is responsible for loading the translation files for the plugin.
	 * It sets the text domain to 'gutenkit-blocks-addon' and specifies the directory
	 * where the translation files are located.
	 *
	 * @param string $domain   The text domain for the plugin.
	 * @param bool   $network  Whether the plugin is network activated.
	 * @param string $directory The directory where the translation files are located.
	 * @return bool True on success, false on failure.
	 * @since 2.1.5
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'elementrio', false, ELEMENTRIO_PLUGIN_DIR . 'languages/' );
	}
}

/**
 * Kickoff the plugin
 *
 * @since 1.0.0
 *
 */
new Elementrio();