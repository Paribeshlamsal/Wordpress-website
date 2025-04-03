<?php
/**
* Header Options.
*
* @package Omega Online Store
*/

$omega_online_store_default = omega_online_store_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'omega_online_store_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'omega-online-store' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_online_store_theme_option_panel',
	)
);

$wp_customize->add_setting( 'omega_online_store_header_layout_20_per_discount_text',
    array(
    'default'           => $omega_online_store_default['omega_online_store_header_layout_20_per_discount_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_online_store_header_layout_20_per_discount_text',
    array(
    'label'    => esc_html__( 'Header Shipping Text', 'omega-online-store' ),
    'section'  => 'omega_online_store_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'omega_online_store_header_layout_email_address',
    array(
    'default'           => $omega_online_store_default['omega_online_store_header_layout_email_address'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_online_store_header_layout_email_address',
    array(
    'label'    => esc_html__( 'Header Email Address', 'omega-online-store' ),
    'section'  => 'omega_online_store_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('omega_online_store_header_layout_enable_translator',
    array(
        'default' => $omega_online_store_default['omega_online_store_header_layout_enable_translator'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_header_layout_enable_translator',
    array(
        'label' => esc_html__('Enable Google Translator', 'omega-online-store'),
        'section' => 'omega_online_store_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_online_store_menu_font_size',
    array(
        'default'           => $omega_online_store_default['omega_online_store_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_number_range',
    )
);
$wp_customize->add_control('omega_online_store_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'omega-online-store'),
        'section'     => 'omega_online_store_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'omega_online_store_menu_text_transform',
    array(
    'default'           => $omega_online_store_default['omega_online_store_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_online_store_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'omega_online_store_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'omega-online-store' ),
    'section'     => 'omega_online_store_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'omega-online-store' ),
        'uppercase'  => esc_html__( 'Uppercase', 'omega-online-store' ),
        'lowercase'    => esc_html__( 'Lowercase', 'omega-online-store' ),
        ),
    )
);

$wp_customize->add_setting('omega_online_store_sticky',
    array(
        'default' => $omega_online_store_default['omega_online_store_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'omega-online-store'),
        'section' => 'omega_online_store_button_header_setting',
        'type' => 'checkbox',
    )
);