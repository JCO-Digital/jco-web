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
		'customer' => array(
			'name'          => __( 'Customers', 'jcore' ),
			'singular_name' => __( 'Customer', 'jcore' ),
		),
		'year'     => array(
			'name'          => __( 'Years', 'jcore' ),
			'singular_name' => __( 'Year', 'jcore' ),
		),
		'cost'     => array(
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
}

add_action( 'init', '\Jcore\Ilme\cases_post_type' );
