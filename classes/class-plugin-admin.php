<?php
/**
 * Admin.
 * The admin-facing functionality of the plugin.
 *
 * @author   LUNCH LADY <support@lunchlady.co>
 * @license  https://www.gnu.org/licenses/gpl-2.0.en.html GPL-2.0
 * @link     https://github.com/heavymetaltrays/modal-plugin/
 * @version  1.0.0
 *
 * @package  Modal
 */

namespace LUNCH_LADY\Modal;

class Plugin_Admin {

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct() {

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

			include PATH . 'assets/partials/documentation-detail.php';

			$output = ob_get_contents();

			ob_end_clean();

			return $output;

		}

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

	/**
	 * Admin scripts.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {

		// Admin CSS.
		wp_register_style(
			ID . '-admin',
			URL . 'assets/css/' . ID . '-admin.css',
			array(),
			'1.0.0',
			'all'
		);

		wp_enqueue_style( ID . '-admin' );

		// Admin JS.
		wp_register_script(
			ID . '-admin',
			URL . 'assets/js/' . ID . '-admin-min.js',
			array(),
			'1.0.0',
			true
		);

		$public_data = array(
			'pluginURL' => URL,
		);
		wp_localize_script(
			ID . '-admin',
			PREFIX,
			$public_data
		);

		wp_enqueue_script( ID . '-admin' );

		// Documentation CSS.
		wp_register_style(
			ID . '-documentation',
			URL . 'assets/css/' . ID . '-documentation.css',
			array(),
			'1.0.0',
			'all'
		);

		// Documentation JS.
		wp_register_script(
			ID . '-documentation',
			URL . 'assets/js/' . ID . '-documentation-min.js',
			array(),
			'1.0.0',
			true
		);

	}

	/**
	 * Block scripts.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_blocks() {

		// Blocks CSS.
		wp_register_style(
			ID . '-blocks',
			URL . 'assets/css/' . ID . '-blocks.css',
			array(),
			'1.0.0',
			'all'
		);

		wp_enqueue_style( ID . '-blocks' );

		// Blocks JS.
		wp_register_script(
			ID . '-blocks',
			URL . 'assets/js/' . ID . '-blocks-min.js',
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
			'pluginURL' => URL,
		);
		wp_localize_script(
			ID . '-blocks',
			PREFIX,
			$public_data
		);

		wp_enqueue_script( ID . '-blocks' );

	}

	/**
	 * Add plugin action links.
	 *
	 * @param string $links       An array of plugin action links.
	 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
	 */
	public function settings_links( $links, $plugin_file ) {

		if ( ID . '-plugin/' . ID . '.php' !== $plugin_file ) {

			return $links;

		}

		$settings_link = array(
			'<a href="' . esc_url( admin_url( 'plugins.php?page=' . ID ) ) . '">' . __( 'Documentation', 'modal' ) . '</a>',
		);

		return array_merge( $settings_link, $links );

	}

	/**
	 * Register dashboard pages.
	 *
	 * @since 1.0.0
	 */
	public function dashboard_pages() {

		add_submenu_page(
			'plugins.php',
			'Modal',
			'Modal',
			'manage_options',
			ID,
			array( $this, 'documentation' ),
			99
		);

	}

	/**
	 * Remove admin notices on documentation page.
	 *
	 * @since 1.0.0
	 */
	public function documentation() {

		include PATH . 'assets/partials/documentation.php';

	}

	/**
	 * Remove admin notices on documentation page.
	 *
	 * @since 1.0.0
	 */
	public function hide_documentation_notices() {

		if ( is_admin() && isset( $_GET['page'] ) && 'modal' === $_GET['page'] ) {

			remove_all_actions( 'admin_notices' );
			remove_all_actions( 'all_admin_notices' );

		}

	}

}
