/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Component, Fragment } = wp.element;
const { PanelColorSettings, InspectorControls, InspectorAdvancedControls, InnerBlocks } = wp.blockEditor;
const { PanelBody, TextControl } = wp.components;

// Imports.
import slugify from '../../components/slugify';

/**
 * Block edit function.
 */
class inlineContentEdit extends Component {

	render() {

		// Props.

		const {
			attributes,
			className,
			setAttributes
		} = this.props;

		// Attributes.

		const {
			pairedID,
			textColor,
			backgroundColor,
			labeledbyID
		} = attributes;

		// Custom styles.

		const customStyles = {
			color: textColor ? textColor : "",
			backgroundColor: backgroundColor ? backgroundColor : ""
		};

		// Output.

		return (
			<Fragment>
				<InspectorControls>
					<PanelBody 
						title={ __( "Options", "modal" ) } 
						initialOpen={ false }
					>
						<TextControl
							label={ __( "Paired ID", "modal" ) }
							help={ __( "Associates this content with another paired element.", "modal" ) }
							type="text"
							value={ pairedID }
							onChange={ ( pairedID ) => setAttributes( { pairedID } ) }
						/>
					</PanelBody>
					<PanelColorSettings
						title={ __( "Color settings", "modal" ) }
						initialOpen={ false }
						colorSettings={ [
							{
								label: __( "Text Color", "modal" ),
								value: textColor,
								onChange: ( textColor ) => setAttributes( { textColor } )
							},
							{
								label: __( "Background Color", "modal" ),
								value: backgroundColor,
								onChange: ( backgroundColor ) => setAttributes( { backgroundColor } )
							}
						] }
					>
					</PanelColorSettings>
				</InspectorControls>
				<InspectorAdvancedControls>
					<TextControl
						label={ __( "Labeledby ID", "accordion" ) }
						type="text"
						value={ labeledbyID }
						onChange={ ( labeledbyID ) => setAttributes( { labeledbyID } ) }
					/>
				</InspectorAdvancedControls>
				<div
					id={`${ pairedID ? slugify( pairedID ) : "" }`}
					className={`${ className ? className : "" }`}
					modal-paired={`${ pairedID ? slugify( pairedID ) : "" }`}
					style={ customStyles }
					role={`region`}
					aria-labeledby={`${ labeledbyID ? slugify( labeledbyID ) : "" }`}
				>
					<InnerBlocks />
				</div>
			</Fragment>
		);

	}

}

export default inlineContentEdit;
