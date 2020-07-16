<?php
/**
 * Primary.
 * Defines the core class.
 *
 * @author   LUNCH LADY <support@lunchlady.co>
 * @license  https://www.gnu.org/licenses/gpl-2.0.en.html GPL-2.0
 * @link     https://lunchlady.co/
 * @version  1.0.0
 *
 * @package  LUNCH_LADY\Moonlight
 */

namespace LUNCH_LADY\Moonlight;

/**
 * Main class for plugin.
 */
class Plugin {

	// Constants.
	const NAME    = MOONLIGHT_NAME;
	const ID      = MOONLIGHT_ID;
	const PREFIX  = MOONLIGHT_PREFIX;
	const VERSION = MOONLIGHT_VERSION;
	const PATH    = MOONLIGHT_PATH;
	const URL     = MOONLIGHT_URL;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Loader. Orchestrates the hooks of the plugin.
	 * - I18n. Defines internationalization functionality.
	 * - WP_Admin. Defines all hooks for the admin area.
	 * - WP_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once 'class-' . self::ID . '-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once 'class-' . self::ID . '-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once self::PATH . 'admin/class-' . self::ID . '-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once self::PATH . 'public/class-' . self::ID . '-public.php';

		$this->loader = new Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new I18n();

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

		$plugin_admin = new WP_Admin();

		/**
		 * Enqueue files.
		 */
		// Styles.
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		// Scripts.
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		// Blocks.
		$this->loader->add_action( 'enqueue_block_editor_assets', $plugin_admin, 'enqueue_blocks' );

		/**
		 * Admin settings links.
		 */
		$this->loader->add_filter( 'plugin_action_links', $plugin_admin, 'settings_links', 10, 2 );

		/**
		 * Register dashboard pages.
		 */
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'dashboard_pages' );

		/**
		 * Remove admin notices on documentation page.
		 */
		$this->loader->add_action( 'admin_head', $plugin_admin, 'hide_documentation_notices' );

		/**
		 * Register custom post types.
		 */
		$this->loader->add_filter( 'init', $plugin_admin, 'custom_post_types', 0 );

		/**
		 * Init meta boxes.
		 */
		$this->loader->add_action( 'load-post.php', $plugin_admin, 'init_metabox' );
		$this->loader->add_action( 'load-post-new.php', $plugin_admin, 'init_metabox' );

		/**
		 * Add meta to rest.
		 */
		$this->loader->add_action( 'rest_api_init', $plugin_admin, 'add_meta_to_rest' );

		/**
		 * Add custom columns.
		 */
		$this->loader->add_filter( 'manage_moonlight-popup_posts_columns', $plugin_admin, 'custom_columns' );

		/**
		 * Add custom column content.
		 */
		$this->loader->add_action( 'manage_moonlight-popup_posts_custom_column', $plugin_admin, 'custom_column_content', 10, 2 );

		/**
		 * Add custom column content.
		 */
		$this->loader->add_filter( 'manage_edit-moonlight-popup_sortable_columns', $plugin_admin, 'custom_column_sortable' );

		/**
		 * Add custom column content.
		 */
		$this->loader->add_action( 'pre_get_posts', $plugin_admin, 'custom_column_sortable_orderby' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new WP_Public();

		/**
		 * Enqueue files.
		 */
		// Styles.
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		// Scripts.
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		/**
		 * Shortcodes
		 */
		// Inline Link.
		$this->loader->add_shortcode( self::PREFIX . '_inline_link', $plugin_public, 'shortcode_inline_link' );
		// Inline Content.
		$this->loader->add_shortcode( self::PREFIX . '_inline_content', $plugin_public, 'shortcode_inline_content' );

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
	 * @return    Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

}
