<?php
/**
* Color Settings.
* @package Omega Online Store
*/

$omega_online_store_default = omega_online_store_get_default_theme_options();

$wp_customize->add_setting( 'omega_online_store_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'omega_online_store_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'omega-online-store' ),
        'section'    => 'colors',
        'settings'   => 'omega_online_store_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'omega_online_store_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'omega_online_store_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'omega-online-store' ),
        'section'    => 'colors',
        'settings'   => 'omega_online_store_border_color',
    ) ) 
);