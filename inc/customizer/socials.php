<?php

// Adds customizer section for the social icons.
$wp_customize->add_section(
	'social_section',
	array(
		'priority'       => 80,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Socials', 'digid' ),
		'description'    => __( 'Edit here the links for digid socials', 'digid' ),
		'panel'          => 'digid_theme_panel',
	)
);

// Facebook
$wp_customize->add_setting(
	'facebook_url',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url',
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'facebook_url',
		array(
			'label'   => __( 'Facebook', 'digid' ),
			'type'    => 'url',
			'section' => 'social_section',
		)
	)
);

// LinkedIn
$wp_customize->add_setting(
	'linkedin_url',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url',
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'linkedin_url',
		array(
			'label'   => __( 'LinkedIn', 'digid' ),
			'type'    => 'url',
			'section' => 'social_section',
		)
	)
);

// Instagram
$wp_customize->add_setting(
	'instagram_url',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url',
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'instagram_url',
		array(
			'label'   => __( 'Instagram', 'digid' ),
			'type'    => 'url',
			'section' => 'social_section',
		)
	)
);