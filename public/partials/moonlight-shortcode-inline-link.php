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

// Attributes.

$atts = shortcode_atts(
	array(
		'id'        => '',
		'class'     => '',
		'paired_id' => '',
		'group_id'  => '',
	),
	$atts
);

// ID.

$id = '';

if ( '' !== trim( sanitize_html_class( do_shortcode( esc_attr( $atts['id'] ) ) ) ) ) {

	$id = sanitize_html_class( do_shortcode( esc_attr( $atts['id'] ) ) );

}

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

// Group ID.

$group_id = '';

if ( do_shortcode( esc_attr( $atts['group_id'] ) ) ) {

	$group_id = do_shortcode( esc_attr( $atts['group_id'] ) );

}

// Output.

echo '<a id="' . esc_attr( $id ) . '" class="wp-shortcode-' . self::ID . '-inline-link ' . esc_attr( $class ) . '"  data-src="#' . esc_attr( $paired_id ) . '" data-fancybox="' . esc_attr( $group_id ) . '" data-touch="false" href="javascript:;">';

	echo do_shortcode( $output );

echo '</a>';
