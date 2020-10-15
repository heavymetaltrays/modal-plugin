<?php
/**
 * I18n.
 * Define the internationalization functionality.
 *
 * @author   LUNCH LADY <support@lunchlady.co>
 * @license  https://www.gnu.org/licenses/gpl-2.0.en.html GPL-2.0
 * @link     https://github.com/heavymetaltrays/modal-plugin/
 * @version  1.0.0
 *
 * @package  Modal
 */

namespace LUNCH_LADY\Modal;

class Plugin_I18n {

	/**
	 * Loads the plugin text domain for translation.
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			ID,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}
