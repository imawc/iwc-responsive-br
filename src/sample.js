import { __ } from '@wordpress/i18n';
import { registerFormatType, toggleFormat } from '@wordpress/rich-text';
import { BlockControls } from '@wordpress/block-editor';
import { ToolbarGroup, ToolbarButton, DropdownMenu } from '@wordpress/components';

const MyCustomButton = ( { isActive, onChange, value } ) => {
		return (
				<BlockControls>
						<ToolbarGroup>
								<ToolbarButton
										icon="editor-code"
										title="Sample output"
										onClick={ () => {
												onChange(
														toggleFormat( value, {
																type: 'my-custom-format/sample-output',
														} )
												);
										} }
										isActive={ isActive }
								/>
						</ToolbarGroup>
				</BlockControls>
		);
};

registerFormatType( 'my-custom-format/sample-output', {
		title: 'Sample output',
		tagName: 'span',
		className: 'test',
		edit: MyCustomButton,
} );