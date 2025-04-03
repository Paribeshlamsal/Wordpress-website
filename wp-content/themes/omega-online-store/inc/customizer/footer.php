<?php
/**
* Footer Settings.
*
* @package Omega Online Store
*/

$omega_online_store_default = omega_online_store_get_default_theme_options();

$wp_customize->add_section( 'omega_online_store_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Settings', 'omega-online-store' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_online_store_theme_option_panel',
	)
);

$wp_customize->add_setting('omega_online_store_display_footer',
    array(
    'default' => $omega_online_store_default['omega_online_store_display_footer'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
)
);
$wp_customize->add_control('omega_online_store_display_footer',
    array(
        'label' => esc_html__('Enable Footer', 'omega-online-store'),
        'section' => 'omega_online_store_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'omega_online_store_footer_column_layout',
	array(
	'default'           => $omega_online_store_default['omega_online_store_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'omega_online_store_sanitize_select',
	)
);
$wp_customize->add_control( 'omega_online_store_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'omega-online-store' ),
	'section'     => 'omega_online_store_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'omega-online-store' ),
		'2' => esc_html__( 'Two Column', 'omega-online-store' ),
		'3' => esc_html__( 'Three Column', 'omega-online-store' ),
	    ),
	)
);

$wp_customize->add_setting( 'omega_online_store_footer_widget_title_alignment',
        array(
    'default'           => $omega_online_store_default['omega_online_store_footer_widget_title_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_online_store_sanitize_footer_widget_title_alignment',
    )
);
$wp_customize->add_control( 'omega_online_store_footer_widget_title_alignment',
    array(
    'label'       => esc_html__( 'Footer Widget Title Alignment', 'omega-online-store' ),
    'section'     => 'omega_online_store_footer_widget_area',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'omega-online-store' ),
        'center'  => esc_html__( 'Center', 'omega-online-store' ),
        'right'    => esc_html__( 'Right', 'omega-online-store' ),
        ),
    )
);

$wp_customize->add_setting( 'omega_online_store_footer_copyright_text',
	array(
	'default'           => $omega_online_store_default['omega_online_store_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'omega_online_store_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'omega-online-store' ),
	'section'  => 'omega_online_store_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('omega_online_store_copyright_font_size',
    array(
        'default'           => $omega_online_store_default['omega_online_store_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_number_range',
    )
);
$wp_customize->add_control('omega_online_store_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'omega-online-store'),
        'section'     => 'omega_online_store_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'omega_online_store_footer_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'omega_online_store_footer_background_color', array(
    'label'     => __('Footer Widget Background Color', 'omega-online-store'),
    'description' => __('It will change the complete footer widget background color.', 'omega-online-store'),
    'section' => 'omega_online_store_footer_widget_area',
    'settings' => 'omega_online_store_footer_background_color',
)));

$wp_customize->add_setting('omega_online_store_footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'omega_online_store_footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','omega-online-store'),
    'section' => 'omega_online_store_footer_widget_area'
)));

$wp_customize->add_setting('omega_online_store_enable_to_the_top',
    array(
        'default' => $omega_online_store_default['omega_online_store_enable_to_the_top'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_enable_to_the_top',
    array(
        'label' => esc_html__('Enable To The Top', 'omega-online-store'),
        'section' => 'omega_online_store_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'omega_online_store_to_the_top_text',
    array(
    'default'           => $omega_online_store_default['omega_online_store_to_the_top_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_online_store_to_the_top_text',
    array(
    'label'    => esc_html__( 'Edit Text Here', 'omega-online-store' ),
    'section'  => 'omega_online_store_footer_widget_area',
    'type'     => 'text',
    )
);