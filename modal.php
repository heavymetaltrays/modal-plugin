<?php
/**
 * Custom plugin.
 * The file that starts it all.
 *
 * If you have an idea to make this plugin better, reach out.
 * ideas@lunchlady.co
 *
 * @author   LUNCH LADY <support@lunchlady.co>
 * @license  https://www.gnu.org/licenses/gpl-2.0.en.html GPL-2.0
 * @link     https://github.com/heavymetaltrays/modal-plugin/
 * @version  1.0.0
 *
 * @package  Modal
 *
 * @wordpress-plugin
 * Plugin Name:       Modal
 * Plugin URI:        https://github.com/heavymetaltrays/modal-plugin/
 * Description:       Adds custom modal functionality to a WordPress website.
 * Version:           1.0.0
 * Requires at least: 5
 * Requires PHP:      7
 * Author:            LUNCH LADY
 * Author URI:        https://lunchlady.co/
 * License:           GPL-2.0
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.en.html
 * Text Domain:       modal
 * Domain Path:       /languages
 */

namespace LUNCH_LADY\Modal;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Defined.
define( __NAMESPACE__ . '\\NAME', 'Modal' );
define( __NAMESPACE__ . '\\ID', 'modal' );
define( __NAMESPACE__ . '\\PREFIX', 'modal' );
define( __NAMESPACE__ . '\\VERSION', '1.0.0' );
define( __NAMESPACE__ . '\\PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( __NAMESPACE__ . '\\URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

if ( ! function_exists( __NAMESPACE__ . '\\activate' ) ) {

	register_activation_hook( __FILE__, __NAMESPACE__ . '\\activate' );

	/**
	 * The code that runs during plugin activation.
	 * This action is documented in classes/class-activator.php
	 */
	function activate() {

		require_once PATH . 'classes/class-plugin-activator.php';
		Plugin_Activator::activate();

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\deactivate' ) ) {

	register_deactivation_hook( __FILE__, __NAMESPACE__ . '\\deactivate' );

	/**
	 * The code that runs during plugin deactivation.
	 * This action is documented in classes/class-deactivator.php
	 */
	function deactivate() {

		require_once PATH . 'classes/class-plugin-deactivator.php';
		Plugin_Deactivator::deactivate();

	}

}

/**
 * The core plugin class.
 */
require PATH . 'classes/class-plugin.php';

if ( ! function_exists( __NAMESPACE__ . '\\run_plugin' ) ) {

	/**
	 * Begins execution of the plugin.
	 */
	function run_plugin() {

		$plugin = new Plugin();
		$plugin->run();

	}
	run_plugin();

}
