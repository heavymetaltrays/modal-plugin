<?php
/**
 * I18n.
 * Defines internationalization.
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
 * Main class for translation.
 */
class I18n {

	// Constants.
	const NAME    = MOONLIGHT_NAME;
	const ID      = MOONLIGHT_ID;
	const PREFIX  = MOONLIGHT_PREFIX;
	const VERSION = MOONLIGHT_VERSION;
	const PATH    = MOONLIGHT_PATH;
	const URL     = MOONLIGHT_URL;

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		// Loads a plugin’s translated strings.
		\load_plugin_textdomain(
			self::ID,
			false,
			self::PATH . 'languages/'
		);

	}

}
