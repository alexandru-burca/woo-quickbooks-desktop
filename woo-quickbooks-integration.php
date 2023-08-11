<?php

/**
 * Plugin Name:       Woocommerce - QuickBooks Desktop Integration
 * Plugin URI:        http://getrocketship.com/
 * Description:       Woocommerce Integration with QuickBooks Desktop
 * Version:           1.0.0
 * Author:            Alexandru Burca
 * Author URI:        http://getrocketship.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woocommerce-quickbooks-wooq
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


defined( 'WOOQ_PATH' ) or define( 'WOOQ_PATH', plugin_dir_path( __FILE__ ) );
defined( 'WOOQ_URL' )  or define( 'WOOQ_URL',  plugin_dir_url( __FILE__ ) );
defined( 'WOOQ_BASE' ) or define( 'WOOQ_BASE', plugin_basename( __FILE__ ) );
$WOOQ_version = get_file_data(WOOQ_PATH.basename(WOOQ_BASE), array('Version'), 'plugin');
$WOOQ_textDomain = get_file_data(WOOQ_PATH.basename(WOOQ_BASE), array('Text Domain'), 'plugin');
$WOOQ_pluginName = get_file_data(WOOQ_PATH.basename(WOOQ_BASE), array('Plugin Name'), 'plugin');

/**
 * Currently plugin version.
 */
defined( 'WOOQ_VERSION' ) or define( 'WOOQ_VERSION', $WOOQ_version[0] );

/**
 * The unique identifier.
 */
defined( 'WOOQ_DOMAIN' ) or define( 'WOOQ_DOMAIN', $WOOQ_textDomain[0] );

/**
 * Plugin Name
 */
defined( 'WOOQ_NAME' ) or define( 'WOOQ_NAME', $WOOQ_pluginName[0] );


/**
 * The code that runs during plugin activation.
*/
function activate_woocommerce_quickbooks_wooq() {
	require_once WOOQ_PATH . 'includes/class-woocommerce-quickbooks-activator.php';
	WOO_QUICKBOOKS_WOOQ_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_woocommerce_quickbooks_wooq() {
	require_once WOOQ_PATH . 'includes/class-woocommerce-quickbooks-deactivator.php';
	WOO_QUICKBOOKS_WOOQ_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woocommerce_quickbooks_wooq' );
register_deactivation_hook( __FILE__, 'deactivate_woocommerce_quickbooks_wooq' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require WOOQ_PATH . 'includes/class-woocommerce-quickbooks.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_woocommerce_quickbooks_wooq() {

	$plugin = new WOO_QUICKBOOKS_WOOQ();
	$plugin->run();

}
run_woocommerce_quickbooks_wooq();