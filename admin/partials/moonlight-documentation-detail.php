<?php
/**
 * Partial.
 * Modulating the work.
 *
 * @author   LUNCH LADY <support@lunchlady.co>
 * @license  https://www.gnu.org/licenses/gpl-2.0.en.html GPL-2.0
 * @link     https://lunchlady.co/
 * @version  1.0.0
 *
 * @package  LUNCH_LADY\Moonlight
 */

namespace LUNCH_LADY\Moonlight;

if ( $title ) {

	echo '<h4>';

		echo esc_html( $title );

	echo '</h4>';

}

if ( $description ) {

	echo '<p>';

		echo esc_html( $description );

	echo '</p>';

}

if ( $details ) {

	echo wp_kses_post( listed_array( $details ) );

}
