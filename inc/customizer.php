<?php
/**
 * Register theme customizer
 */

function digid_theme_customizer_register( $wp_customize ) {
	// New panel for the theme options.
	$wp_customize->add_panel(
		'digid_theme_panel',
		array(
			'priority'       => 20,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'DIGID Theme Options', 'digid' ),
			'description'    => __( 'Theme options for the DIGID Theme', 'digid' ),
		)
	);

	require get_parent_theme_file_path( '/inc/customizer/socials.php' );

}
add_action( 'customize_register', 'digid_theme_customizer_register' );