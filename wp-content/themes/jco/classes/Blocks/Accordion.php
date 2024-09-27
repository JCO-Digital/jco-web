<?php
/**
 * Example default block
 *
 * @package Jcore\Ilme\Blocks
 */

namespace Jcore\Ilme\Blocks;

use Jcore\Ydin\Blocks\Block;

/**
 * Example block
 * This is an example of a simple block
 */
class Accordion extends Block {
	/**
	 * The block name, will be transformed to be compliant with Gutenberg.
	 *
	 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-registration/#block-name
	 *
	 * @var string
	 */
	protected static string $name = 'Accordion';
	/**
	 * Block description, can be any string.
	 *
	 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-registration/#description-optional
	 *
	 * @var string
	 */
	protected static string $description = 'Accordion for use in pages';
	/**
	 * Keywords for the block, useful for making the block easily searchable
	 *
	 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-registration/#keywords-optional
	 *
	 * @var array
	 */
	protected static array $keywords = array( 'Accordion' );

	/**
	 * Registers the fields
	 *
	 * @return array
	 */
	public function register_fields(): array {
		return array(
			array(
				'key'               => 'field_5d7249c8af035',
				'label'             => 'Accordion',
				'name'              => 'accordion',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'collapsed'         => '',
				'min'               => 0,
				'max'               => 0,
				'layout'            => 'block',
				'button_label'      => 'Add item',
				'sub_fields'        => array(
					array(
						'key'               => 'field_5d724ad6af036',
						'label'             => 'Item Title',
						'name'              => 'item_title',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_5d724ad6af0363482',
						'label'             => 'Item text',
						'name'              => 'item_text',
						'type'              => 'textarea',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'maxlength'         => '',
						'rows'              => '',
						'new_lines'         => '',
					),
				),
			),
		);
	}
}