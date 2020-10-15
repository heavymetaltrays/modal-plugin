<?php
/**
 * Deactivator.
 * Fired during plugin deactivation.
 *
 * @author   LUNCH LADY <support@lunchlady.co>
 * @license  https://www.gnu.org/licenses/gpl-2.0.en.html GPL-2.0
 * @link     https://github.com/heavymetaltrays/modal-plugin/
 * @version  1.0.0
 *
 * @package  Modal
 */

namespace LUNCH_LADY\Modal;

class Plugin_Deactivator {

	/**
	 * Things to occur during deactivation.
	 */
	public static function deactivate() {

		// Remove customizer data.
		if ( '1' === get_option( PREFIX . '_clear_data_customizer' ) ) {

			foreach ( wp_load_alloptions() as $option => $value ) {

				if ( strpos( $option, PREFIX ) === 0 ) {

					delete_option( $option );

				}

			}

		}

	}

}
