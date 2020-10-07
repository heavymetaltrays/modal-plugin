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
define( 'MODAL_NAME', 'Modal' );
define( 'MODAL_ID', 'modal' );
define( 'MODAL_PREFIX', 'modal' );
define( 'MODAL_VERSION', '1.0.0' );
define( 'MODAL_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'MODAL_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

if ( ! function_exists( __NAMESPACE__ . '\\load_plugin_textdomain' ) ) {

	add_action( 'plugins_loaded', __NAMESPACE__ . '\\load_plugin_textdomain' );

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	function load_plugin_textdomain() {

		\load_plugin_textdomain(
			MODAL_ID,
			false,
			MODAL_PATH . 'languages/'
		);

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\activate' ) ) {

	register_activation_hook( __FILE__, __NAMESPACE__ . '\\activate' );

	/**
	 * The code that runs during plugin activation.
	 * This action is documented in includes/class-modal-activator.php
	 */
	function activate() {

		return;

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\deactivate' ) ) {

	register_deactivation_hook( __FILE__, __NAMESPACE__ . '\\deactivate' );

	/**
	 * The code that runs during plugin deactivation.
	 * This action is documented in includes/class-modal-deactivator.php
	 */
	function deactivate() {

		return;

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\admin_scripts' ) ) {

	add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\admin_scripts' );

	/**
	 * Styles some admin.
	 *
	 * @since 1.0.0
	 */
	function admin_scripts() {

		// Admin CSS.
		wp_register_style(
			MODAL_ID . '-admin',
			MODAL_URL . 'assets/css/' . MODAL_ID . '-admin.css',
			array(),
			'1.0.0',
			'all'
		);

		wp_enqueue_style( MODAL_ID . '-admin' );

		// Admin JS.
		wp_register_script(
			MODAL_ID . '-admin',
			MODAL_URL . 'assets/js/' . MODAL_ID . '-admin-min.js',
			array(),
			'1.0.0',
			true
		);

		$public_data = array(
			'pluginURL' => MODAL_URL,
		);
		wp_localize_script(
			MODAL_ID . '-admin',
			MODAL_PREFIX,
			$public_data
		);

		wp_enqueue_script( MODAL_ID . '-admin' );

		// Documentation CSS.
		wp_register_style(
			MODAL_ID . '-documentation',
			MODAL_URL . 'assets/css/' . MODAL_ID . '-documentation.css',
			array(),
			'1.0.0',
			'all'
		);

		// Documentation JS.
		wp_register_script(
			MODAL_ID . '-documentation',
			MODAL_URL . 'assets/js/' . MODAL_ID . '-documentation-min.js',
			array(),
			'1.0.0',
			true
		);

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\enqueue_blocks' ) ) {

	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_blocks' );

	/**
	 * Styles blocks admin.
	 *
	 * @since 1.0.0
	 */
	function enqueue_blocks() {

		// Blocks CSS.
		wp_register_style(
			MODAL_ID . '-blocks',
			MODAL_URL . 'assets/css/' . MODAL_ID . '-blocks.css',
			array(),
			'1.0.0',
			'all'
		);

		wp_enqueue_style( MODAL_ID . '-blocks' );

		// Blocks JS.
		wp_register_script(
			MODAL_ID . '-blocks',
			MODAL_URL . 'assets/js/' . MODAL_ID . '-blocks-min.js',
			array(
				'wp-blocks',
				'wp-i18n',
				'wp-element',
				'wp-editor',
				'wp-components',
				'wp-url',
			),
			'1.0.0',
			true
		);

		$public_data = array(
			'pluginURL' => MODAL_URL,
		);
		wp_localize_script(
			MODAL_ID . '-blocks',
			MODAL_PREFIX,
			$public_data
		);

		wp_enqueue_script( MODAL_ID . '-blocks' );

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\settings_links' ) ) {

	add_action( 'plugin_action_links', __NAMESPACE__ . '\\settings_links', 10, 2 );

	/**
	 * Add plugin action links.
	 *
	 * @param array  $links       An array of plugin action links.
	 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
	 *
	 * @since    1.0.0
	 * @return   array
	 */
	function settings_links( $links, $plugin_file ) {

		if ( MODAL_ID . '-plugin/' . MODAL_ID . '.php' !== $plugin_file ) {

			return $links;

		}

		$settings_link = array(
			'<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '">' . __( 'Documentation', 'modal' ) . '</a>',
		);

		return array_merge( $settings_link, $links );

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\dashboard_pages' ) ) {

	add_action( 'admin_menu', __NAMESPACE__ . '\\dashboard_pages' );

	/**
	 * Register dashboard pages.
	 *
	 * @since 1.0.0
	 */
	function dashboard_pages() {

		add_submenu_page(
			'plugins.php',
			'Modal',
			'Modal',
			'manage_options',
			MODAL_ID,
			__NAMESPACE__ . '\\documentation',
			99
		);

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\documentation' ) ) {

	/**
	 * Remove admin notices on documentation page.
	 *
	 * @since 1.0.0
	 */
	function documentation() {

		include 'assets/partials/' . MODAL_ID . '-documentation.php';

	}

}


if ( ! function_exists( __NAMESPACE__ . '\\hide_documentation_notices' ) ) {

	add_action( 'admin_head', __NAMESPACE__ . '\\hide_documentation_notices' );

	/**
	 * Remove admin notices on documentation page.
	 *
	 * @since 1.0.0
	 */
	function hide_documentation_notices() {

		if ( is_admin() && isset( $_GET['page'] ) && 'modal' === $_GET['page'] ) {

			remove_all_actions( 'admin_notices' );
			remove_all_actions( 'all_admin_notices' );

		}

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\documentation_detail' ) ) {

	/**
	 * Create documentation detail.
	 *
	 * @param array $title        The title for the detail.
	 * @param array $description  The description for the detail.
	 * @param array $details      The listed details for the detail.
	 *
	 * @since 1.0.0
	 */
	function documentation_detail( $title = null, $description = null, $details = null ) {

		ob_start();

		include MODAL_PATH . 'assets/partials/' . MODAL_ID . '-documentation-detail.php';

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\listed_array' ) ) {

	/**
	 * List an array.
	 *
	 * @param array $array  The initial array.
	 *
	 * @since 1.0.0
	 */
	function listed_array( $array = array() ) {

		$return = '<ul>';

		foreach ( $array as $key => $value ) {

			if ( is_array( $value ) ) {

				$return .= '<li>';

					$return .= $key;

					$return .= listed_array( $value );

				$return .= '</li>';

			} else {

				$return .= '<li>' . $value . '</li>';

			}

		}

		$return .= '</ul>';

		return $return;

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\public_scripts' ) ) {

	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\public_scripts' );

	/**
	 * Styles some public.
	 *
	 * @since 1.0.0
	 */
	function public_scripts() {

		// jQuery JS.
		wp_enqueue_script( 'jquery' );

		// Fancybox CSS.
		wp_register_style(
			MODAL_ID . '-fancybox',
			MODAL_URL . 'assets/css/jquery.fancybox.min.css',
			array(),
			'3.5.7',
			'all'
		);

		wp_enqueue_style( MODAL_ID . '-fancybox' );

		// Fancybox JS.
		wp_register_script(
			MODAL_ID . '-fancybox',
			MODAL_URL . 'assets/js/jquery.fancybox.min.js',
			array( 'jquery' ),
			'3.5.7',
			true
		);

		wp_enqueue_script( MODAL_ID . '-fancybox' );

		// Public CSS.
		wp_register_style(
			MODAL_ID . '-public',
			MODAL_URL . 'assets/css/' . MODAL_ID . '-public.css',
			array(),
			'1.0.0',
			'all'
		);

		wp_enqueue_style( MODAL_ID . '-public' );

		// Public JS.
		wp_register_script(
			MODAL_ID . '-public',
			MODAL_URL . 'assets/js/' . MODAL_ID . '-public-min.js',
			array(),
			'1.0.0',
			true
		);

		$public_data = array(
			'pluginURL' => MODAL_URL,
		);
		wp_localize_script(
			MODAL_ID . '-public',
			MODAL_PREFIX,
			$public_data
		);

		wp_enqueue_script( MODAL_ID . '-public' );

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\shortcode_inline_link' ) ) {

	add_shortcode( MODAL_PREFIX . '_inline_link', __NAMESPACE__ . '\\shortcode_inline_link' );

	/**
	 * Creates a custom shortcode.
	 *
	 * @param array  $atts    The shortcode attributes available.
	 * @param string $output  The content within the shortcode.
	 *
	 * @since  1.0.0
	 * @return string
	 */
	function shortcode_inline_link( $atts, $output = null ) {

		ob_start();

		include 'assets/partials/' . MODAL_ID . '-shortcode-inline-link.php';

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

}

if ( ! function_exists( __NAMESPACE__ . '\\shortcode_inline_content' ) ) {

	add_shortcode( MODAL_PREFIX . '_inline_content', __NAMESPACE__ . '\\shortcode_inline_content' );

	/**
	 * Creates a custom shortcode.
	 *
	 * @param array  $atts    The shortcode attributes available.
	 * @param string $output  The content within the shortcode.
	 *
	 * @since  1.0.0
	 * @return string
	 */
	function shortcode_inline_content( $atts, $output = null ) {

		ob_start();

		include 'assets/partials/' . MODAL_ID . '-shortcode-inline-content.php';

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

}
