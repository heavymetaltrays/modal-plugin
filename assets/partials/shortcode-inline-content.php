<?php
/**
 * Partial.
 * Modulating the work.
 *
 * @author   LUNCH LADY <support@lunchlady.co>
 * @license  https://www.gnu.org/licenses/gpl-2.0.en.html GPL-2.0
 * @link     https://github.com/heavymetaltrays/modal-plugin/
 * @version  1.0.0
 *
 * @package  Modal
 */

namespace LUNCH_LADY\Modal;

// Attributes.

$atts = shortcode_atts(
	array(
		'class'     => '',
		'paired_id' => '',
	),
	$atts
);

// Class.

$class = '';

if ( '' !== trim( sanitize_html_class( do_shortcode( esc_attr( $atts['class'] ) ) ) ) ) {

	$class = sanitize_html_class( do_shortcode( esc_attr( $atts['class'] ) ) );

}

// Paired ID.

$paired_id = '999999';

if ( '' !== trim( wp_strip_all_tags( do_shortcode( esc_attr( $atts['paired_id'] ) ) ) ) ) {

	$paired_id = sanitize_title( do_shortcode( esc_attr( $atts['paired_id'] ) ) );

}

// Labeledby.

$labeledby = '';

if ( '' !== trim( sanitize_html_class( do_shortcode( esc_attr( $atts['labeledby'] ) ) ) ) ) {

	$labeledby = sanitize_html_class( do_shortcode( esc_attr( $atts['labeledby'] ) ) );

}

// Output.

echo '<div id="' . esc_attr( $paired_id ) . '" class="wp-shortcode-' . ID . '-inline-content ' . esc_attr( $class ) . '" modal-paired="' . esc_attr( $paired_id ) . '" style="display:none;" role="region" aria-labeledby="' . $labeledby . '">';

	echo do_shortcode( $output );

echo '</div>';
