<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Constants
 */
define( 'THEME_URL', get_template_directory_uri() );

if ( ! function_exists( 'ith_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function ith_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on ith, use a find and replace
     * to change 'ith' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'ith', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'primary' => esc_html__( 'Главное меню', 'ith' ),
      'footer' => esc_html__( 'Футер', 'ith' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );


    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );

    add_image_size( 'portfolio_cat', 344, 344, true );
    add_image_size( 'services_cat', 425, 355, true );
    add_image_size( 'partner', 113, 85, true );
    add_image_size( 'single', 710, 545, true );
    add_image_size( 'single-portfolio', 630, 355, true );
    add_image_size( 'similar-portfolio-slider', 660, 610, true );
    add_image_size( 'product_cat', 235, 270, true );
    add_image_size( 'product_modal', 440, 440, true );
    add_image_size( 'project', 340, 143, true );
  }
endif;
add_action( 'after_setup_theme', 'ith_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ith_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters( 'ith_content_width', 640 );
}
add_action( 'after_setup_theme', 'ith_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function ith_scripts() {
  wp_enqueue_style( 'ith-style', get_stylesheet_uri() );

  wp_enqueue_script( 'ith-main', get_template_directory_uri() . '/js/common.js', array(), '', true);

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'ith_scripts' );

/**
 * Remove tag p in CF7
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Validate Phone Number CF7
 */
function custom_filter_wpcf7_is_tel( $result, $tel ) {
	$result = preg_match( '/\+[0-9]{1}\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}/', $tel );
	return $result;
}
add_filter( 'wpcf7_is_tel', 'custom_filter_wpcf7_is_tel', 10, 2 );

function js_variables(){
  $variables = array (
    'ajax_url' => admin_url('admin-ajax.php'),
  );
  echo '<script type="text/javascript">window.wp_data = ' . json_encode($variables) . ';</script>';
}
add_action('wp_head','js_variables');

add_filter( 'wp_terms_checklist_args', 'set_checked_ontop_default', 10 );
function set_checked_ontop_default( $args ) {
	if( ! isset($args['checked_ontop']) )
		$args['checked_ontop'] = false;

	return $args;
}

/**
 * Get any posts
 */
function get_any_post($post_type, $count = null, $tax_name = null, $tax_id = null, $orderby = 'ID') {
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$args = array(
		'post_type' => $post_type,
		'post_status' => 'publish',
		'posts_per_page' => $count ? $count : get_option('posts_per_page'),
		'paged' => $paged,
		'order' => 'ASC',
		'orderby' => $orderby
	);

	if ($tax_id && $tax_name) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => $tax_name,
				'field' => 'term_id',
				'terms' => $tax_id
			)
		);
	}

	$query = new WP_Query( $args );
	return $query;
}