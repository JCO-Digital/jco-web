<?php
/**
 * Case Data inserted in gutenberg content (on case post type)
 *
 * @package Jcore\Blocks\Blocks
 */

namespace Jcore\Ilme\Blocks;

use Jcore\Ydin\Blocks\Block;

/**
 * Social Media Icons Block
 */
class CaseData extends Block {
	/**
	 * The block name, will be transformed to be compliant with Gutenberg.
	 *
	 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-registration/#block-name
	 *
	 * @var string
	 */
	protected static string $name = 'Case_Data';
	/**
	 * Block description, can be any string.
	 *
	 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-registration/#description-optional
	 *
	 * @var string
	 */
	protected static string $description = 'Show Case data on case-post';
	/**
	 * Keywords for the block, useful for making the block easily searchable
	 *
	 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-registration/#keywords-optional
	 *
	 * @var array
	 */
	protected static array $keywords = array( 'Case, Post-type, Data, Year, Cost, Customer' );

	/**
	 * Registers the fields
	 *
	 * @return array
	 */
	public function register_fields(): array {
		return array(
			array(
				'key'               => 'field_5ea6a32fdsfsd456casef',
				'label'             => 'Show the Case Data',
				'name'              => 'show_all',
				'type'              => 'true_false',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'message'           => '',
				'default_value'     => 1,
				'ui'                => 1,
				'ui_on_text'        => '',
				'ui_off_text'       => '',
			),
		);
	}
}
