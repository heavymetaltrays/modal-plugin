<?php
/**
 * Core.
 * The file that defines the core plugin class.
 *
 * @author   LUNCH LADY <support@lunchlady.co>
 * @license  https://www.gnu.org/licenses/gpl-2.0.en.html GPL-2.0
 * @link     https://github.com/heavymetaltrays/modal-plugin/
 * @version  1.0.0
 *
 * @package  Modal
 */

namespace LUNCH_LADY\Modal;

class Plugin {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power the plugin.
	 *
	 * @var    Plugin_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * Define the core functionality of the plugin.
	 */
	public function __construct() {

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the core plugin.
		 */
		include_once PATH . 'classes/class-plugin-loader.php';

		/**
		 * The class responsible for defining internationalization functionality of the plugin.
		 */
		include_once PATH . 'classes/class-plugin-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		include_once PATH . 'classes/class-plugin-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing side of the site.
		 */
		include_once PATH . 'classes/class-plugin-public.php';

		$this->loader = new Plugin_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 */
	private function set_locale() {

		$plugin_i18n = new Plugin_I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality of the plugin.
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Plugin_Admin();

		/**
		 * Enqueue files.
		 */
		// Admin.
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		// Blocks.
		$this->loader->add_action( 'enqueue_block_editor_assets', $plugin_admin, 'enqueue_blocks' );

		/**
		 * Admin settings links.
		 */
		$this->loader->add_filter( 'plugin_action_links', $plugin_admin, 'settings_links', 10, 2 );

		/**
		 * Documentation page.
		 */
		// Create menu page.
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'dashboard_pages' );
		// Remove admin notices on documentation page.
		$this->loader->add_action( 'admin_head', $plugin_admin, 'hide_documentation_notices' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality of the plugin.
	 */
	private function define_public_hooks() {

		$plugin_public = new Plugin_Public();

		/**
		 * Enqueue files.
		 */
		// Public.
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		/**
		 * Shortcodes.
		 */
		// Inline Link.
		$this->loader->add_shortcode( PREFIX . '_inline_link', $plugin_public, 'shortcode_inline_link' );
		// Inline Content.
		$this->loader->add_shortcode( PREFIX . '_inline_content', $plugin_public, 'shortcode_inline_content' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

}
