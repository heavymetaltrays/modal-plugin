/**
 * WordPress dependencies
 */
const {
	registerBlockType,
	registerBlockCollection
} = wp.blocks;

// Register Block Collection.
registerBlockCollection( 'modal', {
	title: 'Modal'
} );

// Register Blocks.
import * as inlineLink from 'blocks/inline-link/index.js';
import * as inlineContent from 'blocks/inline-content/index.js';

// Create a list of blocks to loop through.
const blocks = [
	inlineLink,
	inlineContent
];

/**
 * Function to register blocks.
 */
blocks.forEach( ( { name, settings } ) => {

	registerBlockType( name, settings );
	
} );

