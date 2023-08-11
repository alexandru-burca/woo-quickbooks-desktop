<?php

/**
 * The file that defines the core plugin class
 *
 * @since      1.0.0
 *
*/

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 */
class WOO_QUICKBOOKS_WOOQ {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      WOO_QUICKBOOKS_WOOQ_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;


	/**
	 * Define the core functionality of the plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->load_dependencies();
		$this->set_locale();
        $this->helper = new WOO_QUICKBOOKS_WOOQ_HELPER;
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

        /**
		 * The class responsible with commom functions
		 */
        require_once WOOQ_PATH . 'includes/class-woocommerce-quickbooks-helper.php';

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once WOOQ_PATH . 'includes/class-woocommerce-quickbooks-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once WOOQ_PATH . 'includes/class-woocommerce-quickbooks-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once WOOQ_PATH . 'admin/class-woocommerce-quickbooks-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once WOOQ_PATH . 'public/class-woocommerce-quickbooks-public.php';

		$this->loader = new WOO_QUICKBOOKS_WOOQ_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new WOO_QUICKBOOKS_WOOQ_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new WOO_QUICKBOOKS_WOOQ_Admin($this->helper);
		//

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new WOO_QUICKBOOKS_WOOQ_Public($this->helper);
        //

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    WOO_QUICKBOOKS_WOOQ_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

}
