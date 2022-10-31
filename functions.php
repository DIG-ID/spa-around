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



/**
 * Contact form validaion
 */

add_filter( 'wpcf7_validate_date', 'custom_date_validation', 20, 2 );

function custom_date_validation( $result, $tag ) {

	if ( 'date' === $tag->name ) :
		$appointment_date = isset( $_POST['date'] ) ? trim( $_POST['date'] ) : '';
	endif;

	$today_date = gmdate( get_option( 'date_format' ) );
	var_dump( $today_date );

	if ( $appointment_date > $today_date ) :
		$count = new WP_Query(
			array(
				'post_type'      => 'appointment',
				'post_status '   => 'publish',
				'posts_per_page' => -1,
				'meta_key'       => 'appointment_date',
				'meta_query'     => array(
					array(
						'key'     => 'appointment_date',
						'value'   => $appointment_date,
						'compare' => '=',
					),
				),
			)
		);
		// Loop into all the posts to cout them
		if ( $count->have_posts() ) :
			$count = $count->post_count;
			wp_reset_postdata();
		else : 
			$count = 0;
		endif;

		if ( $count > 0 && $count <= 5 ) :

			global $post;
			$author_id = $post->post_author;

			$appoint_post = array(
				'post_type'    => 'appointment',
				'post_title'   => 'Appointment NR:',
				'post_content' => 'This is my post.',
				'post_status'  => 'publish',
				'post_author'  => $author_id,
				'post_date'    => date( get_option( 'date_format' ) ),
			);

			wp_insert_post( $appoint_post );

			$result->validate( $tag, 'new post was created' );
		else :
				$result->invalidate( $tag, 'The appointments are full to this date, please choose another one' );
		endif;
	else :
		$result->invalidate( $tag, 'the date needs to be x' );
	endif;

	return $result;
}
