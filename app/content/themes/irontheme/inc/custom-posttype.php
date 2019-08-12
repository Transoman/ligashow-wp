<?php
// Register Region Post Type
function region_post_type() {

	$labels = array(
		'name'                  => _x( 'Регионы', 'Post Type General Name', 'ith' ),
		'singular_name'         => _x( 'Регион', 'Post Type Singular Name', 'ith' ),
		'menu_name'             => __( 'Регионы', 'ith' ),
		'name_admin_bar'        => __( 'Регионы', 'ith' ),
		'archives'              => __( 'Item Archives', 'ith' ),
	);
	$args = array(
		'label'                 => __( 'Регион', 'ith' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-location-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'region', $args );

}
add_action( 'init', 'region_post_type', 0 );


// Register popup Post Type
function popup_post_type() {

	$labels = array(
		'name'                  => _x( 'Модальные окна', 'Post Type General Name', 'ith' ),
		'singular_name'         => _x( 'Модальное окно', 'Post Type Singular Name', 'ith' ),
		'menu_name'             => __( 'Модальные окна', 'ith' ),
		'name_admin_bar'        => __( 'Модальные окна', 'ith' ),
		'archives'              => __( 'Модальные окна', 'ith' ),
	);
	$args = array(
		'label'                 => __( 'Модальное окно', 'ith' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-editor-expand',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'popup', $args );

}
add_action( 'init', 'popup_post_type', 0 );