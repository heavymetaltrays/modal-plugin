<?php
/**
 * Admin.
 * Admin-specific functionality.
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
 * Main class for admin.
 */
class WP_Admin {

	// Constants.
	const NAME    = MOONLIGHT_NAME;
	const ID      = MOONLIGHT_ID;
	const PREFIX  = MOONLIGHT_PREFIX;
	const VERSION = MOONLIGHT_VERSION;
	const PATH    = MOONLIGHT_PATH;
	const URL     = MOONLIGHT_URL;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
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

			include MOONLIGHT_PATH . 'admin/partials/' . MOONLIGHT_ID . '-documentation-detail.php';

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		// Documentation CSS.
		wp_register_style(
			self::ID . '-documentation',
			self::URL . 'admin/css/' . self::ID . '-documentation.css',
			array(),
			'1.0.0',
			'all'
		);

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// Documentation JS.
		wp_register_script(
			self::ID . '-documentation',
			self::URL . 'admin/js/' . self::ID . '-documentation-min.js',
			array(),
			'1.0.0',
			true
		);

	}

	/**
	 * Register the resources necessary for custom blocks.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_blocks() {

		// Blocks CSS.
		wp_enqueue_style(
			self::ID . '-blocks',
			self::URL . 'admin/css/' . self::ID . '-blocks.css',
			array(),
			'1.0.0',
			'all'
		);

		// Blocks JS.
		wp_enqueue_script(
			self::ID . '-blocks',
			self::URL . 'admin/js/' . self::ID . '-blocks-min.js',
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

	}

	/**
	 * Add plugin action links.
	 *
	 * @param array  $links       An array of plugin action links.
	 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
	 *
	 * @since    1.0.0
	 * @return   array
	 */
	public function settings_links( $links, $plugin_file ) {

		if ( self::ID . '-plugin/' . self::ID . '.php' !== $plugin_file ) {

			return $links;

		}

		$settings_link = array(
			'<a href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '">' . __( 'Documentation', 'moonlight' ) . '</a>',
		);

		return array_merge( $settings_link, $links );

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function dashboard_pages() {

		add_submenu_page(
			'plugins.php',
			'Moonlight',
			'Moonlight',
			'manage_options',
			self::ID,
			array(
				$this,
				'documentation',
			),
			99
		);

		global $submenu;
		$permalink = esc_url( admin_url( 'plugins.php?page=' . self::ID ) );
		$submenu['edit.php?post_type=' . self::ID . '-popup'][] = array( 'Learn More', 'manage_options', $permalink );

	}

	/**
	 * Render the documentation page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function documentation() {

		include 'partials/' . self::ID . '-documentation.php';

	}

	/**
	 * Remove admin notices on documentation page.
	 *
	 * @since    1.0.0
	 */
	public function hide_documentation_notices() {

		if ( is_admin() && isset( $_GET['page'] ) && 'moonlight' === $_GET['page'] ) {

			remove_all_actions( 'admin_notices' );
			remove_all_actions( 'all_admin_notices' );

		}

	}

	/**
	 * Register custom post types.
	 *
	 * @since    1.0.0
	 */
	public function custom_post_types() {

		$labels = array(
			'name'                  => _x( 'Popups', 'Post Type General Name', 'moonlight' ),
			'singular_name'         => _x( 'Popup', 'Post Type Singular Name', 'moonlight' ),
			'menu_name'             => __( 'Popups', 'moonlight' ),
			'name_admin_bar'        => __( 'Popup', 'moonlight' ),
			'archives'              => __( 'Popup Archives', 'moonlight' ),
			'attributes'            => __( 'Popup Attributes', 'moonlight' ),
			'parent_item_colon'     => __( 'Parent Popup:', 'moonlight' ),
			'all_items'             => __( 'All Popups', 'moonlight' ),
			'add_new_item'          => __( 'Add New Popup', 'moonlight' ),
			'add_new'               => __( 'Add New', 'moonlight' ),
			'new_item'              => __( 'New Popup', 'moonlight' ),
			'edit_item'             => __( 'Edit Popup', 'moonlight' ),
			'update_item'           => __( 'Update Popup', 'moonlight' ),
			'view_item'             => __( 'View Popup', 'moonlight' ),
			'view_items'            => __( 'View Popups', 'moonlight' ),
			'search_items'          => __( 'Search Popup', 'moonlight' ),
			'not_found'             => __( 'Not found', 'moonlight' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'moonlight' ),
			'featured_image'        => __( 'Featured Image', 'moonlight' ),
			'set_featured_image'    => __( 'Set featured image', 'moonlight' ),
			'remove_featured_image' => __( 'Remove featured image', 'moonlight' ),
			'use_featured_image'    => __( 'Use as featured image', 'moonlight' ),
			'insert_into_item'      => __( 'Insert into popup', 'moonlight' ),
			'uploaded_to_this_item' => __( 'Uploaded to this popup', 'moonlight' ),
			'items_list'            => __( 'Popups list', 'moonlight' ),
			'items_list_navigation' => __( 'Popups list navigation', 'moonlight' ),
			'filter_items_list'     => __( 'Filter popups list', 'moonlight' ),
		);

		$args = array(
			'label'                 => __( 'Popup', 'moonlight' ),
			'description'           => __( 'Popup Description', 'moonlight' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 100,
			'menu_icon'             => 'dashicons-marker',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);

		register_post_type( 'moonlight-popup', $args );

	}

	/**
	 * Init meta boxes.
	 *
	 * @since    1.0.0
	 */
	public function init_metabox() {

		add_action( 'add_meta_boxes', array( $this, 'add_metabox' ) );
		add_action( 'save_post', array( $this, 'save_metabox' ), 10, 2 );

	}

	/**
	 * Add meta boxes.
	 *
	 * @since    1.0.0
	 */
	public function add_metabox() {

		add_meta_box(
			'moonlight-group-id-options',
			__( 'Group ID', 'moonlight' ),
			array( $this, 'render_group_id_options_metabox' ),
			'moonlight-popup',
			'side',
			'default'
		);

	}

	/**
	 * Render meta boxes.
	 *
	 * @param object $post Post.
	 *
	 * @since    1.0.0
	 */
	public function render_group_id_options_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'moonlight_nonce_action', 'moonlight_nonce' );

		// Retrieve an existing value from the database.
		$moonlight_group_id = get_post_meta( $post->ID, 'moonlight_group_id', true );

		// Set default values.
		if( empty( $moonlight_group_id ) ) $moonlight_group_id = '';

		// Form fields.
		echo '<div class="components-base-control">';
			echo '<div class="components-base-control__field">';
				echo '<label for="moonlight_group_id" class="moonlight_group_id_label components-base-control__label">' . __( 'Add New Group ID', 'moonlight' ) . '</label>';
				echo '<input type="text" id="moonlight_group_id" name="moonlight_group_id" class="moonlight_group_id_field components-text-control__input" placeholder="' . esc_attr__( 'group-1', 'moonlight' ) . '" value="' . esc_attr( $moonlight_group_id ) . '" />';
			echo '</div>';
		echo '</div>';
		echo '<p class="description">' . __( 'Associates this content with other paired elements.', 'moonlight' ) . '</p>';

	}

	/**
	 * Save meta boxes.
	 *
	 * @param object $post_id Post ID.
	 * @param object $post Post.
	 *
	 * @since    1.0.0
	 */
	public function save_metabox( $post_id, $post ) {

		// Add nonce for security and authentication.
		$nonce_name   = isset( $_POST['moonlight_nonce'] ) ? $_POST['moonlight_nonce'] : '';
		$nonce_action = 'moonlight_nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) )
			return;

		// Check if a nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
			return;

		// Check if the user has permissions to save data.
		if ( ! current_user_can( 'edit_post', $post_id ) )
			return;

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) )
			return;

		// Sanitize user input.
		$moonlight_new_moonlight_group_id = isset( $_POST[ 'moonlight_group_id' ] ) ? sanitize_text_field( $_POST[ 'moonlight_group_id' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'moonlight_group_id', sanitize_title( $moonlight_new_moonlight_group_id ) );

	}

	/**
	 * Add meta to rest.
	 *
	 * @since    1.0.0
	 */
	public function add_meta_to_rest() {

		\register_rest_field(
			'moonlight-popup',
			'moonlight_group_id',
			array(
				'get_callback' => function( $post_arr ) {
					return get_post_meta( $post_arr['id'], 'moonlight_group_id', true );
				},
			)
		);

	}

	/**
	 * Add custom columns.
	 *
	 * @param array $columns  Included columns.
	 *
	 * @since    1.0.0
	 */
	public function custom_columns( $columns ) {

		$columns['popup_class'] = __( 'Class', 'moonlight' );
		$columns['popup_group'] = __( 'Group ID', 'moonlight' );

		return $columns;

	}

	/**
	 * Add custom column content.
	 *
	 * @param array $column   Included column.
	 * @param int   $post_id  Post ID.
	 *
	 * @since    1.0.0
	 */
	public function custom_column_content( $column, $post_id ) {

		// Class column.
		if ( 'popup_class' === $column ) {

			echo self::ID . '-popup-' . $post_id;

		}

		// Group ID column.
		if ( 'popup_group' === $column ) {

			echo get_post_meta( $post_id, 'moonlight_group_id', true );

		}

	}

	/**
	 * Sort custom columns.
	 *
	 * @param array $columns   Included columns.
	 *
	 * @since    1.0.0
	 */
	public function custom_column_sortable( $columns ) {

		$columns['popup_group'] = 'moonlight_group_id';

		return $columns;

	}

	/**
	 * Sortby custom columns.
	 *
	 * @param object $query   Posts.
	 *
	 * @since    1.0.0
	 */
	public function custom_column_sortable_orderby( $query ) {

		if( ! is_admin() || ! $query->is_main_query() ) {

			return;

		}

		if ( 'moonlight_group_id' === $query->get( 'orderby') ) {

			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', 'moonlight_group_id' );

		}

	}

}
