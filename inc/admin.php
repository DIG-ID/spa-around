<?php
/**
 * Customize WordPress Admin look and feel.
 */


// Disable default dashboard widgets
function digid_disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['wpseo-dashboard-overview'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts'] );
}
add_action( 'wp_dashboard_setup', 'digid_disable_default_dashboard_widgets', 999 );


/************* CUSTOM LOGIN PAGE *****************/


// Updated to proper 'enqueue' method
// http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function digid_theme_login_css() {
	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'admin-login-css', get_theme_file_uri( '/dist/admin.css' ), array(), $theme_version );
}
add_action( 'login_enqueue_scripts', 'digid_theme_login_css', 10 );

// Changing the logo link from wordpress.org to your site
function digid_theme_login_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'digid_theme_login_url' );

// Changing the alt text on the logo to show your site name
function digid_theme_login_title() {
	return get_option( 'blogname' );
}
add_filter( 'login_headertext', 'digid_theme_login_title' );


/************* CUSTOMIZE ADMIN *******************/

// Custom Backend Footer
/*function theme_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://crew.pt" target="_blank">Crew - Creative Web</a></span>.', 'vlb-group' );
}

add_filter( 'admin_footer_text', 'theme_custom_admin_footer' );*/


// Change login page logo
function digid_theme_login_logo() {
	echo '<style type="text/css">
	h1 a {
		background-image: url(' . get_template_directory_uri() . '/assets/imgs/sa-logo-vertical-rgb-white.svg) !important;
	}
	</style>';
}

add_action( 'login_head', 'digid_theme_login_logo' );


// remove WordPress logo from admin bar

function digid_remove_wp_links( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}

add_action( 'admin_bar_menu', 'digid_remove_wp_links', 999 );

