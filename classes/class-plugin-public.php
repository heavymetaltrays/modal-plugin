<?php
/**
 * Public.
 * The public-facing functionality of the plugin.
 *
 * @author   LUNCH LADY <support@lunchlady.co>
 * @license  https://www.gnu.org/licenses/gpl-2.0.en.html GPL-2.0
 * @link     https://github.com/heavymetaltrays/modal-plugin/
 * @version  1.0.0
 *
 * @package  Modal
 */

namespace LUNCH_LADY\Modal;

class Plugin_Public {

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct() {}

	/**
	 * Public scripts.
	 */
	public function enqueue_scripts() {

		// jQuery JS.
		wp_enqueue_script( 'jquery' );

		// Fancybox CSS.
		wp_register_style(
			ID . '-fancybox',
			URL . 'assets/css/jquery.fancybox.min.css',
			array(),
			'3.5.7',
			'all'
		);

		wp_enqueue_style( ID . '-fancybox' );

		// Fancybox JS.
		wp_register_script(
			ID . '-fancybox',
			URL . 'assets/js/jquery.fancybox.min.js',
			array( 'jquery' ),
			'3.5.7',
			true
		);

		wp_enqueue_script( ID . '-fancybox' );

		// Public CSS.
		wp_register_style(
			ID . '-public',
			URL . 'assets/css/' . ID . '-public.css',
			array(),
			'1.0.0',
			'all'
		);

		wp_enqueue_style( ID . '-public' );

		// Public JS.
		wp_register_script(
			ID . '-public',
			URL . 'assets/js/' . ID . '-public-min.js',
			array(),
			'1.0.0',
			true
		);

		$public_data = array(
			'pluginURL' => URL,
		);
		wp_localize_script(
			ID . '-public',
			PREFIX,
			$public_data
		);

		wp_enqueue_script( ID . '-public' );

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

		include URL . 'assets/partials/shortcode-inline-link.php';

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

		include URL . 'assets/partials/shortcode-inline-content.php';

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

}
