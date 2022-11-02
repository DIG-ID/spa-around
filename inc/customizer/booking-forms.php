<?php

// Adds customizer section for the social icons.
$wp_customize->add_section(
	'booking_forms_section',
	array(
		'priority'       => 70,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Booking Forms', 'digid' ),
		'description'    => __( 'Edit here the shortcodes for booking forms', 'digid' ),
		'panel'          => 'digid_theme_panel',
	)
);

$wp_customize->add_setting(
	'spa_form_shortcode',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'spa_form_shortcode',
		array(
			'label'   => __( 'SPA Form Shortcode', 'digid' ),
			'type'    => 'text',
			'section' => 'booking_forms_section',
		)
	)
);

$wp_customize->add_setting(
	'events_form_shortcode',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'events_form_shortcode',
		array(
			'label'   => __( 'Events Form Shortcode', 'digid' ),
			'type'    => 'text',
			'section' => 'booking_forms_section',
		)
	)
);

$wp_customize->add_setting(
	'offers_form_shortcode',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'offers_form_shortcode',
		array(
			'label'   => __( 'Offers Form Shortcode', 'digid' ),
			'type'    => 'text',
			'section' => 'booking_forms_section',
		)
	)
);
