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
class inlineLinkEdit extends Component {

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
						<TextControl
							label={ __( "Group ID", "modal" ) }
							help={ __( "Associates this content with other paired elements.", "modal" ) }
							type="text"
							value={ groupID }
							onChange={ ( groupID ) => setAttributes( { groupID } ) }
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
						label={ __( "Custom CSS ID", "modal" ) }
						type="text"
						value={ attrID }
						onChange={ ( attrID ) => setAttributes( { attrID } ) }
					/>
				</InspectorAdvancedControls>
				<div
					id={`${ attrID ? attrID : "" }`}
					className={`${ className ? className : "" }`}
					data-src={`#${ pairedID ? slugify( pairedID ) : "" }`}
					data-fancybox={`${ groupID ? groupID : "" }`}
					data-touch={`false`}
					style={ customStyles }
					role={`button`}
					aria-pressed={`false`}
					aria-expanded={`false`}
					aria-controls={`${ pairedID ? slugify( pairedID ) : "" }`}
				>
					<InnerBlocks />
				</div>
			</Fragment>
		);

	}

}

export default inlineLinkEdit;
