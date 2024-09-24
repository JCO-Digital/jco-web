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
			'slug'       => 'cases',
			'with_front' => true,
		),
		'query_var'             => true,
		'menu_icon'             => 'dashicons-grid-view',
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'post_tag', 'category' ),
		'show_in_graphql'       => false,
	);

	register_post_type( 'case', $args );
}

add_action( 'init', 'Jcore\Ilme\cases_post_type' );
