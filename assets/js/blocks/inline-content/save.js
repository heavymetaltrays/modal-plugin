/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Component } = wp.element;
const { InnerBlocks } = wp.blockEditor;

// Imports.
import slugify from '../../components/slugify';

/**
 * Block save function.
 */
class inlineContentSave extends Component {

	render() {

		// Props.

		const {
			attributes,
			className
		} = this.props;

		// Attributes

		const {
			pairedID,
			textColor,
			backgroundColor,
			labeledbyID
		} = attributes;

		// Custom styles.

		const customStyles = {
			color: textColor ? textColor : "",
			backgroundColor: backgroundColor ? backgroundColor : "",
			display: "none"
		};

		// Output.

		return (
			<div
				id={`${ pairedID ? slugify( pairedID ) : "" }`}
				className={`${ className ? className : "" }`}
				modal-paired={`${ pairedID ? slugify( pairedID ) : "" }`}
				style={ customStyles }
				role={`region`}
				aria-labeledby={`${ labeledbyID ? slugify( labeledbyID ) : "" }`}
			>
				<InnerBlocks.Content />
			</div>
		);

	}

}

export default inlineContentSave;
