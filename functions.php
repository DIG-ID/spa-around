<?php
/**
 * Setup theme
 */
function digid_theme_setup() {

	register_nav_menus(
		array(
			'main'       => __( 'Main Menu', 'digid' ),
			'footer'     => __( 'Footer Menu', 'digid' ),
			'copyrights' => __( 'Copyrights Menu', 'digid' ),
			'contacts'   => __( 'Contacts Menu', 'digid' ),
		)
	);

	add_theme_support( 'menus' );

	add_theme_support( 'custom-logo' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_image_size( 'card', 430, 250, array( 'center', 'center' ) );

	add_image_size( 'banner-header', 1920, 400, array( 'center', 'center' ) );

	add_image_size( 'gallery-item', 920, 500, array( 'center', 'center' ) );

	add_image_size( 'avatar', 250, 250, array( 'center', 'center' ) );

	add_image_size( 'properties-logos', 200, 120, array( 'center', 'center' ) );

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
	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/dist/main.js', array( 'jquery' ), $theme_version, false );
	wp_enqueue_script( 'isotope-scripts', get_stylesheet_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), $theme_version, true );
	/*if ( is_page_template( array( 'page-templates/page-home.php', 'page-templates/page-contact.php' ) ) ) :
		wp_enqueue_script( 'google-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDWfZm2mgcrwPZBLQO2YhYFlM2GKqLOZsM', array(), $theme_version, true );
		wp_enqueue_script( 'google-map-settings', get_stylesheet_directory_uri() . '/assets/js/google-maps.js', array( 'jquery' ), $theme_version, true );
	endif;*/

		// Register Theme main style.
		wp_register_style( 'theme-styles', get_template_directory_uri() . '/dist/main.css', array(), $theme_version );

		// Add styles inline.
		wp_add_inline_style( 'theme-styles', dig_get_font_face_styles() );
	
		// Enqueue theme stylesheet.
		wp_enqueue_style( 'theme-styles' );
}

add_action( 'wp_enqueue_scripts', 'digid_theme_enqueue_styles' );

/**
 * Get font face styles.
 * Called by functions twentytwentytwo_styles() and twentytwentytwo_editor_styles() above.
 */
function dig_get_font_face_styles() {

	return "
		@font-face {
			font-family:'roc-grotesk';
			src:url('https://use.typekit.net/af/9ef671/00000000000000007735b7cc/30/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n3&v=3') format('woff2'),url('https://use.typekit.net/af/9ef671/00000000000000007735b7cc/30/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n3&v=3') format('woff'),url('https://use.typekit.net/af/9ef671/00000000000000007735b7cc/30/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n3&v=3') format('opentype');
			font-display:auto;
			font-style:normal;
			font-weight:300;
			font-stretch:normal;
		}
		@font-face {
			font-family:'roc-grotesk';
			src:url('https://use.typekit.net/af/5eb19c/00000000000000007735b7d0/30/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n5&v=3') format('woff2'),url('https://use.typekit.net/af/5eb19c/00000000000000007735b7d0/30/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n5&v=3') format('woff'),url('https://use.typekit.net/af/5eb19c/00000000000000007735b7d0/30/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n5&v=3') format('opentype');
			font-display:auto;
			font-style:normal;
			font-weight:500;
			font-stretch:normal;
		}
		@font-face {
			font-family:'roc-grotesk-wide';
			src:url('https://use.typekit.net/af/ece23c/00000000000000007735b7ca/30/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3') format('woff2'),url('https://use.typekit.net/af/ece23c/00000000000000007735b7ca/30/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3') format('woff'),url('https://use.typekit.net/af/ece23c/00000000000000007735b7ca/30/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3') format('opentype');
			font-display:auto;
			font-style:normal;
			font-weight:600;
			font-stretch:normal;
		}

	";

}

/**
 * Changes the class on the custom logo in the header.php
 */
function digid_custom_logo_output( $html ) {
	$html = str_replace( 'custom-logo-link', 'navbar-brand', $html );
	return $html;
}

add_filter( 'get_custom_logo', 'digid_custom_logo_output', 10 );


/**
 * Hide native posts from custom role user
 */
function digid_hide_posts_from_custom_role() {

	$user = wp_get_current_user();
	$allowed_roles = array( 'porperty-owner' );

	if ( array_intersect( $allowed_roles, $user->roles ) ) :
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
	endif;

}

/*
 * Sets the post types that can appear on the homepage.
 */
function digid_set_home_post_types( $query ) {

	$is_target_query = ! is_admin() && $query->is_main_query() && $query->is_home;

	if ( $is_target_query ) :
			$target_types = array( 'post', 'events', 'offer', 'spa', 'property' );
			$query->set( 'post_type', $target_types );
	endif;
}

add_action( 'pre_get_posts', 'digid_set_home_post_types', 10, 1 );

/**
 * Helper to debug
 *
 * @param [type] $output
 * @param boolean $with_script_tags
 * @return void
 */
function console_log( $output, $with_script_tags = true ) {
	$js_code = 'console.log(' . wp_json_encode( $output, JSON_HEX_TAG ) . ');';
	if ( $with_script_tags ) :
			$js_code = '<script>' . $js_code . '</script>';
	endif;
	echo $js_code;
}

// Theme customizer options.
require get_template_directory() . '/inc/customizer.php';

// Theme custom template tags.
require get_template_directory() . '/inc/theme-template-tags.php';

// Theme custom nav menu walker for bootstrap 5.
require get_template_directory() . '/inc/custom-walker.php';

// Theme custom contact form 7 settings.
//require get_template_directory() . '/inc/contact-form-settings.php';

// Theme custom columns.
//require get_template_directory() . '/inc/admin-columns.php';
