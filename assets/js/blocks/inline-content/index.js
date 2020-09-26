// Imports.
import edit from './edit';
import save from './save';
import icon from './icon';
import metadata from './block.json';

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;

/**
 * Block constants.
 */
const { name, category, attributes } = metadata;

const settings = {

	title: __( "Modal Inline Content", "modal" ),
	description: __( 'A wrapping element block, after engaging an Modal Inline Link this paired modal element displays.', "modal" ),
	icon,
	category,
	keywords: [ __( "inline modal popup content modal", "modal" ) ],
	supports: {
		align: [ 'wide', 'full' ]
	},
	attributes,
	edit,
	save

};

export { name, category, metadata, settings };
