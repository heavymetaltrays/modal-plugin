<?php
/**
 * Deactivator.
 * Fired during deactivation.
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
 * Main class for deactivation.
 */
class Deactivator {

	// Constants.
	const NAME    = MOONLIGHT_NAME;
	const ID      = MOONLIGHT_ID;
	const PREFIX  = MOONLIGHT_PREFIX;
	const VERSION = MOONLIGHT_VERSION;
	const PATH    = MOONLIGHT_PATH;
	const URL     = MOONLIGHT_URL;

	/**
	 * Things to occur during deactivation.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		// Remove customizer data.
		if ( '1' === get_option( self::PREFIX . '_clear_data_customizer' ) ) {
			foreach ( wp_load_alloptions() as $option => $value ) {
				if ( strpos( $option, self::PREFIX ) === 0 ) {
					delete_option( $option );
				}
			}
		}

	}

}
