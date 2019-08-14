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


// Register Portfolio Post Type
function portfolio_post_type() {

	$labels = array(
		'name'                  => _x( 'Портфолио', 'Post Type General Name', 'ith' ),
		'singular_name'         => _x( 'Портфолио', 'Post Type Singular Name', 'ith' ),
		'menu_name'             => __( 'Портфолио', 'ith' ),
		'name_admin_bar'        => __( 'Портфолио', 'ith' ),
		'archives'              => __( 'Портфолио', 'ith' ),
	);
	$args = array(
		'label'                 => __( 'Портфолио', 'ith' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'portfolio_cat' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio_post_type', 0 );


// Register Services Post Type
function services_post_type() {

	$labels = array(
		'name'                  => _x( 'Услуги', 'Post Type General Name', 'ith' ),
		'singular_name'         => _x( 'Услуга', 'Post Type Singular Name', 'ith' ),
		'menu_name'             => __( 'Услуги', 'ith' ),
		'name_admin_bar'        => __( 'Услуги', 'ith' ),
		'archives'              => __( 'Услуги', 'ith' ),
	);
	$args = array(
		'label'                 => __( 'Услуга', 'ith' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'services_cat' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-list-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'services', $args );

}
add_action( 'init', 'services_post_type', 0 );


// Register Popular Order Post Type
function popular_order_post_type() {

	$labels = array(
		'name'                  => _x( 'Популярные заказы', 'Post Type General Name', 'ith' ),
		'singular_name'         => _x( 'Популярный заказ', 'Post Type Singular Name', 'ith' ),
		'menu_name'             => __( 'Популярные заказы', 'ith' ),
		'name_admin_bar'        => __( 'Популярные заказы', 'ith' ),
		'archives'              => __( 'Популярные заказы', 'ith' ),
	);
	$args = array(
		'label'                 => __( 'Популярный заказ', 'ith' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-chart-area',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'popular_order', $args );

}
add_action( 'init', 'popular_order_post_type', 0 );