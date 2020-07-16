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
class inlineLinkSave extends Component {

	render() {

		// Props.

		const {
			attributes,
			className
		} = this.props;

		// Attributes

		const {
			pairedID,
			groupID,
			textColor,
			backgroundColor,
			attrID
		} = attributes;

		// Custom styles.

		const customStyles = {
			color: textColor ? textColor : "",
			backgroundColor: backgroundColor ? backgroundColor : ""
		};

		// Output.

		return (
			<a
				id={`${ attrID ? attrID : "" }`}
				className={`${ className ? className : "" }`}
				data-src={`#${ pairedID ? slugify( pairedID ) : "" }`}
				data-fancybox={`${ groupID ? groupID : "" }`}
				data-touch={`false`}
				href={`javascript:;`}
				style={ customStyles }
			>
				<InnerBlocks.Content />
			</a>
		);

	}

}

export default inlineLinkSave;
