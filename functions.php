<?php
/**
 * Setup theme
 */
function digid_theme_setup() {

	register_nav_menus(
		array(
			'main' => __( 'Main Menu', 'digid' ),
		)
	);

	add_theme_support( 'menus' );

	add_theme_support( 'custom-logo' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

}

add_action( 'after_setup_theme', 'digid_theme_setup' );

/**
 * Register our sidebars and widgetized areas.
 */
function digid_theme_footer_widgets_init() {

	register_sidebar(
		array(
			'name'          => 'Footer',
			'id'            => 'footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		),
	);

}

add_action( 'widgets_init', 'digid_theme_footer_widgets_init' );


/**
 * Enqueue styles and scripts
 */
function digid_theme_enqueue_styles() {

	//Get the theme data
	$the_theme     = wp_get_theme(); 
	$theme_version = $the_theme->get( 'Version' );
	wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/dist/main.css', array(), $theme_version );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/dist/main.js', array( 'jquery' ), $theme_version, false );
	/*if ( is_page_template( array( 'page-templates/page-home.php', 'page-templates/page-contact.php' ) ) ) :
		wp_enqueue_script( 'google-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDWfZm2mgcrwPZBLQO2YhYFlM2GKqLOZsM', array(), $theme_version, true );
		wp_enqueue_script( 'google-map-settings', get_stylesheet_directory_uri() . '/assets/js/google-maps.js', array( 'jquery' ), $theme_version, true );
	endif;*/
}

add_action( 'wp_enqueue_scripts', 'digid_theme_enqueue_styles' );

/**
 * Remove post type links
 */
function digid_remove_posts_type() {
	remove_menu_page( 'edit.php' );
}

add_action( 'admin_menu', 'digid_remove_posts_type' );

/**
 * Remove "quick drafts" post from dashboard
 */
function digid_remove_posts_quickdraft() {
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

add_action( 'admin_bar_menu', 'digid_remove_posts_from_menu', 9999 );

/**
 * Remove "New post" links
 */
function digid_remove_posts_from_menu( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'new-post' );
}

add_action( 'wp_dashboard_setup', 'digid_remove_posts_quickdraft', 9999 );

// Theme customizer options.
require get_template_directory() . '/inc/customizer.php';

// Theme custom template tags.
require get_template_directory() . '/inc/theme-template-tags.php';
