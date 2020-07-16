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
 * @link     https://lunchlady.co/
 * @version  1.0.0
 *
 * @package  LUNCH_LADY\Moonlight
 *
 * @wordpress-plugin
 * Plugin Name:       Moonlight
 * Plugin URI:        https://github.com/foodinspector/moonlight-plugin/
 * Description:       Adds custom popup functionality to a modern WordPress website.
 * Version:           1.0.0
 * Requires at least: 5
 * Requires PHP:      7
 * Author:            LUNCH LADY
 * Author URI:        https://lunchlady.co/
 * License:           GPL-2.0
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.en.html
 * Text Domain:       moonlight
 * Domain Path:       /languages
 */

namespace LUNCH_LADY\Moonlight;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Defined.
define( 'MOONLIGHT_NAME', 'Moonlight' );
define( 'MOONLIGHT_ID', 'moonlight' );
define( 'MOONLIGHT_PREFIX', 'moonlight' );
define( 'MOONLIGHT_VERSION', '1.0.0' );
define( 'MOONLIGHT_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'MOONLIGHT_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

if ( ! function_exists( __NAMESPACE__ . '\\activate' ) ) {

	register_activation_hook( __FILE__, __NAMESPACE__ . '\\activate' );

	/**
	 * The code that runs during plugin activation.
	 * This action is documented in includes/class-moonlight-activator.php
	 */
	function activate() {
		require_once 'includes/class-moonlight-activator.php';
		Activator::activate();
	}

}

if ( ! function_exists( __NAMESPACE__ . '\\deactivate' ) ) {

	register_deactivation_hook( __FILE__, __NAMESPACE__ . '\\deactivate' );

	/**
	 * The code that runs during plugin deactivation.
	 * This action is documented in includes/class-moonlight-deactivator.php
	 */
	function deactivate() {
		require_once 'includes/class-moonlight-deactivator.php';
		Deactivator::deactivate();
	}

}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require 'includes/class-moonlight.php';

if ( ! function_exists( __NAMESPACE__ . '\\run' ) ) {

	/**
	 * Begins execution of the plugin.
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does
	 * not affect the page life cycle.
	 *
	 * @since    1.0.0
	 */
	function run() {

		$plugin = new Plugin();
		$plugin->run();

	}
	run();

}
