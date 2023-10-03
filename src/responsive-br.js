// import { ReactComponent as Icon } from './icon.svg';
import { __ } from '@wordpress/i18n';
import { registerFormatType, insert } from '@wordpress/rich-text';
import { BlockControls } from '@wordpress/block-editor';
import { ToolbarGroup, ToolbarItem, DropdownMenu } from '@wordpress/components';
import { useSelect } from '@wordpress/data';

const breakPoints = [
	// 'xs',
	'sm',
	'md',
	'lg',
	'xl',
	// 'xxl',
];

// 改行を挿入する
const insertBR = (value, onChange, breakPoint) => {
	onChange(insert(
		value,
		`[br-${breakPoint}]`,
		value.start,
		value.end
	));
};

// 許可するブロック
const allowBlocks = [
	'core/paragraph',
	'core/heading',
];

registerFormatType(`iwc/responsive-br`, {
	title: 'IWC Responsive Br',
	tagName: 'br',
	className: null,
	edit: (props) => {
		const { onChange, value } = props;

		/*
		 * ブロック制限
		 */
		const selectedBlock = useSelect( ( select ) => {
			return select( 'core/block-editor' ).getSelectedBlock();
		}, [] );
		// console.log({selectedBlock});
		if ( selectedBlock && allowBlocks.includes( selectedBlock.name ) == false ) {
			return null;
		}
		// if ( selectedBlock && selectedBlock.name !== 'core/paragraph' ) ) {
		// 		return null;
		// }

		return (
			<BlockControls group="block">
				<ToolbarGroup>
					<ToolbarItem>
						{(toggleProps) => (
							<DropdownMenu
								icon="editor-break"
								toggleProps={toggleProps}
								label="Responsive Br"
								controls={breakPoints.map((breakPoint) => {
									return {
										title:
										`改行( ${breakPoint} )`,
										icon: 'editor-break',
										onClick: () => {
											insertBR(
												value,
												onChange,
												breakPoint
											);
										},
									};
								})}
							/>
						)}
					</ToolbarItem>
				</ToolbarGroup>
			</BlockControls>
		);
	},
});