<?php
/**
* Additional Woocommerce Settings.
*
* @package Omega Online Store
*/

$omega_online_store_default = omega_online_store_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'omega_online_store_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'omega-online-store' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_online_store_theme_option_panel',
	)
);

	$wp_customize->add_setting('omega_online_store_per_columns',
		array(
		'default'           => $omega_online_store_default['omega_online_store_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'omega_online_store_sanitize_number_range',
		)
	);
	$wp_customize->add_control('omega_online_store_per_columns',
		array(
		'label'       => esc_html__('Product Per Column', 'omega-online-store'),
		'section'     => 'omega_online_store_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('omega_online_store_product_per_page',
		array(
		'default'           => $omega_online_store_default['omega_online_store_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'omega_online_store_sanitize_number_range',
		)
	);
	$wp_customize->add_control('omega_online_store_product_per_page',
		array(
		'label'       => esc_html__('Product Per Page', 'omega-online-store'),
		'section'     => 'omega_online_store_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 15,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('omega_online_store_show_hide_related_product',
    array(
        'default' => $omega_online_store_default['omega_online_store_show_hide_related_product'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
	);
	$wp_customize->add_control('omega_online_store_show_hide_related_product',
	    array(
	        'label' => esc_html__('Enable Related Products', 'omega-online-store'),
	        'section' => 'omega_online_store_additional_woocommerce_options',
	        'type' => 'checkbox',
	    )
	);
