<?php
/**
* Custom Addons.
*
* @package Omega Online Store
*/

$omega_online_store_default = omega_online_store_get_default_theme_options();

$wp_customize->add_section( 'omega_online_store_theme_pagination_options',
    array(
    'title'      => esc_html__( 'Customizer Custom Settings', 'omega-online-store' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'omega_online_store_theme_addons_panel',
    )
);

$wp_customize->add_setting('omega_online_store_theme_loader',
    array(
        'default' => $omega_online_store_default['omega_online_store_theme_loader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_theme_loader',
    array(
        'label' => esc_html__('Enable Preloader', 'omega-online-store'),
        'section' => 'omega_online_store_theme_pagination_options',
        'type' => 'checkbox',
    )
);

// Add Pagination Enable/Disable option to Customizer
$wp_customize->add_setting( 'omega_online_store_enable_pagination', 
    array(
        'default'           => true, // Default is enabled
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_enable_pagination', // Sanitize the input
    )
);

// Add the control to the Customizer
$wp_customize->add_control( 'omega_online_store_enable_pagination', 
    array(
        'label'    => esc_html__( 'Enable Pagination', 'omega-online-store' ),
        'section'  => 'omega_online_store_theme_pagination_options', // Add to the correct section
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting( 'omega_online_store_theme_pagination_type', 
    array(
        'default'           => 'numeric', // Set "numeric" as the default
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_pagination_type', // Use our sanitize function
    )
);

$wp_customize->add_control( 'omega_online_store_theme_pagination_type',
    array(
        'label'       => esc_html__( 'Pagination Style', 'omega-online-store' ),
        'section'     => 'omega_online_store_theme_pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'numeric'      => esc_html__( 'Numeric (Page Numbers)', 'omega-online-store' ),
            'newer_older'  => esc_html__( 'Newer/Older (Previous/Next)', 'omega-online-store' ), // Renamed to "Newer/Older"
        ),
    )
);

$wp_customize->add_setting( 'omega_online_store_theme_pagination_options_alignment',
    array(
    'default'           => $omega_online_store_default['omega_online_store_theme_pagination_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_online_store_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'omega_online_store_theme_pagination_options_alignment',
    array(
    'label'       => esc_html__( 'Pagination Alignment', 'omega-online-store' ),
    'section'     => 'omega_online_store_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'omega-online-store' ),
        'Right' => esc_html__( 'Right', 'omega-online-store' ),
        'Left'  => esc_html__( 'Left', 'omega-online-store' ),
        ),
    )
);

$wp_customize->add_setting('omega_online_store_theme_breadcrumb_enable',
array(
    'default' => $omega_online_store_default['omega_online_store_theme_breadcrumb_enable'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
)
);
$wp_customize->add_control('omega_online_store_theme_breadcrumb_enable',
    array(
        'label' => esc_html__('Enable Breadcrumb', 'omega-online-store'),
        'section' => 'omega_online_store_theme_pagination_options',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'omega_online_store_theme_breadcrumb_options_alignment',
    array(
    'default'           => $omega_online_store_default['omega_online_store_theme_breadcrumb_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_online_store_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'omega_online_store_theme_breadcrumb_options_alignment',
    array(
    'label'       => esc_html__( 'Breadcrumb Alignment', 'omega-online-store' ),
    'section'     => 'omega_online_store_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'omega-online-store' ),
        'Right' => esc_html__( 'Right', 'omega-online-store' ),
        'Left'  => esc_html__( 'Left', 'omega-online-store' ),
        ),
    )
);

$wp_customize->add_setting('omega_online_store_breadcrumb_font_size',
    array(
        'default'           => $omega_online_store_default['omega_online_store_breadcrumb_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_number_range',
    )
);
$wp_customize->add_control('omega_online_store_breadcrumb_font_size',
    array(
        'label'       => esc_html__('Breadcrumb Font Size', 'omega-online-store'),
        'section'     => 'omega_online_store_theme_pagination_options',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);