<?php

namespace Jcore\Ilme;

function cases_post_type() {
	/**
	 * Post Type: Cases.
	 */

	$labels = array(
		'name'          => __( 'Cases', 'jcore' ),
		'singular_name' => __( 'Case', 'jcore' ),
	);

	$args = array(
		'label'                 => __( 'Cases', 'jcore' ),
		'labels'                => $labels,
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'rest_base'             => '',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'delete_with_user'      => false,
		'exclude_from_search'   => false,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'rewrite'               => array(
			'slug'       => 'case',
			'with_front' => true,
		),
		'query_var'             => true,
		'menu_icon'             => 'dashicons-grid-view',
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'post_tag', 'category', 'customer', 'year', 'cost' ),
		'show_in_graphql'       => false,
	);

	register_post_type( 'case', $args );

	$taxonomies = array(
		'customers' => array(
			'name'          => __( 'Customers', 'jcore' ),
			'singular_name' => __( 'Customer', 'jcore' ),
		),
		'years'     => array(
			'name'          => __( 'Years', 'jcore' ),
			'singular_name' => __( 'Year', 'jcore' ),
		),
		'costs'     => array(
			'name'          => __( 'Cost', 'jcore' ),
			'singular_name' => __( 'Cost', 'jcore' ),
		),
	);

	foreach ( $taxonomies as $taxonomy => $labels ) {
		$args = array(
			'label'                 => $labels['name'],
			'labels'                => $labels,
			'public'                => true,
			'publicly_queryable'    => true,
			'hierarchical'          => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'query_var'             => true,
			'rewrite'               => array(
				'slug'       => $taxonomy,
				'with_front' => false,
			),
			'show_admin_column'     => false,
			'show_in_rest'          => true,
			'rest_base'             => $taxonomy,
			'rest_controller_class' => 'WP_REST_Terms_Controller',
			'show_in_quick_edit'    => true,
		);

		register_taxonomy( $taxonomy, array( 'case' ), $args );
	}
	if ( function_exists( 'acf_add_local_field_group' ) ) {
		acf_add_local_field_group(
			array(
				'key'                   => 'group_66f3e6e67af5e',
				'title'                 => 'case extras',
				'fields'                => array(
					array(
						'key'               => 'field_66f3e6e6d5a7c',
						'label'             => 'bg-image',
						'name'              => 'bg-image',
						'aria-label'        => '',
						'type'              => 'image',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'array',
						'library'           => 'all',
						'translations'      => 'copy_once',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => 'jpg, webp, png',
						'allow_in_bindings' => 0,
						'preview_size'      => 'medium',
					),
					array(
						'key'               => 'field_66f3e79d73a0c',
						'label'             => 'link_out',
						'name'              => 'link_out',
						'aria-label'        => '',
						'type'              => 'link',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'array',
						'translations'      => 'copy_once',
						'allow_in_bindings' => 0,
					),
					array(
						'key'               => 'field_66f3e7c86dab8',
						'label'             => 'video_bg',
						'name'              => 'video_bg',
						'aria-label'        => '',
						'type'              => 'file',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'array',
						'library'           => 'all',
						'translations'      => 'copy_once',
						'min_size'          => '',
						'max_size'          => '',
						'mime_types'        => 'mp4, webm, avif',
						'allow_in_bindings' => 0,
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'case',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 0,
			)
		);
	}
}

add_action( 'init', '\Jcore\Ilme\cases_post_type' );
