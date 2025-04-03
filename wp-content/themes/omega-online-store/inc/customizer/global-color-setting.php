<?php
/**
* Global Color Settings.
*
* @package Omega Online Store
*/

$omega_online_store_default = omega_online_store_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'omega_online_store_global_color_setting',
	array(
	'title'      => esc_html__( 'Global Color Settings', 'omega-online-store' ),
	'priority'   => 1,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_online_store_theme_option_panel',
	)
);

$wp_customize->add_setting( 'omega_online_store_global_color',
    array(
    'default'           => '#3D3A3C',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'omega_online_store_global_color',
    array(
        'label'      => esc_html__( 'Global Color', 'omega-online-store' ),
        'section'    => 'omega_online_store_global_color_setting',
        'settings'   => 'omega_online_store_global_color',
    ) ) 
);