<?php
/**
 * Public.
 * Public-specific functionality.
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
 * Main class for public.
 */
class WP_Public {

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

		return;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		// Fancybox CSS.
		wp_register_style(
			self::ID . '-fancybox',
			self::URL . 'public/css/jquery.fancybox.min.css',
			array(),
			'3.5.7',
			'all'
		);

		wp_enqueue_style( self::ID . '-fancybox' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// jQuery JS.
		wp_enqueue_script( 'jquery' );

		// Fancybox JS.
		wp_register_script(
			self::ID . '-fancybox',
			self::URL . 'public/js/jquery.fancybox.min.js',
			array( 'jquery' ),
			'3.5.7',
			true
		);

		wp_enqueue_script( self::ID . '-fancybox' );

		// Auto JS.
		wp_register_script(
			self::ID . '-auto',
			self::URL . 'public/js/' . self::ID . '-auto-min.js',
			array(),
			'1.0.0',
			true
		);

		$auto_data = array(
			'pluginURL' => self::URL,
		);
		wp_localize_script(
			self::ID . '-auto',
			self::PREFIX,
			$auto_data
		);

		wp_enqueue_script( self::ID . '-auto' );

	}

	/**
	 * Creates a custom shortcode.
	 *
	 * @param array  $atts    The shortcode attributes available.
	 * @param string $output  The content within the shortcode.
	 *
	 * @since  1.0.0
	 * @return string
	 */
	public function shortcode_inline_link( $atts, $output = null ) {

		ob_start();

		include 'partials/' . self::ID . '-shortcode-inline-link.php';

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

	/**
	 * Creates a custom shortcode.
	 *
	 * @param array  $atts    The shortcode attributes available.
	 * @param string $output  The content within the shortcode.
	 *
	 * @since  1.0.0
	 * @return string
	 */
	public function shortcode_inline_content( $atts, $output = null ) {

		ob_start();

		include 'partials/' . self::ID . '-shortcode-inline-content.php';

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

}
