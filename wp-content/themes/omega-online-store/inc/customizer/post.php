<?php
/**
* Posts Settings.
*
* @package Omega Online Store
*/

$omega_online_store_default = omega_online_store_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'omega_online_store_single_posts_settings',
    array(
    'title'      => esc_html__( 'Single Meta Information Settings', 'omega-online-store' ),
    'priority'   => 35,
    'capability' => 'edit_theme_options',
    'panel'      => 'omega_online_store_theme_option_panel',
    )
);

$wp_customize->add_setting('omega_online_store_display_single_post_image',
    array(
        'default' => $omega_online_store_default['omega_online_store_display_single_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_display_single_post_image',
    array(
        'label' => esc_html__('Enable Single Posts Image', 'omega-online-store'),
        'section' => 'omega_online_store_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_online_store_post_author',
    array(
        'default' => $omega_online_store_default['omega_online_store_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'omega-online-store'),
        'section' => 'omega_online_store_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_online_store_post_date',
    array(
        'default' => $omega_online_store_default['omega_online_store_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'omega-online-store'),
        'section' => 'omega_online_store_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_online_store_post_category',
    array(
        'default' => $omega_online_store_default['omega_online_store_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'omega-online-store'),
        'section' => 'omega_online_store_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_online_store_post_tags',
    array(
        'default' => $omega_online_store_default['omega_online_store_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'omega-online-store'),
        'section' => 'omega_online_store_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'omega_online_store_single_page_content_alignment',
    array(
    'default'           => $omega_online_store_default['omega_online_store_single_page_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_online_store_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'omega_online_store_single_page_content_alignment',
    array(
    'label'       => esc_html__( 'Single Page Content Alignment', 'omega-online-store' ),
    'section'     => 'omega_online_store_single_posts_settings',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'omega-online-store' ),
        'center'  => esc_html__( 'Center', 'omega-online-store' ),
        'right'    => esc_html__( 'Right', 'omega-online-store' ),
        ),
    )
);

$wp_customize->add_setting( 'omega_online_store_single_post_content_alignment',
    array(
    'default'           => $omega_online_store_default['omega_online_store_single_post_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_online_store_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'omega_online_store_single_post_content_alignment',
    array(
    'label'       => esc_html__( 'Single Post Content Alignment', 'omega-online-store' ),
    'section'     => 'omega_online_store_single_posts_settings',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'omega-online-store' ),
        'center'  => esc_html__( 'Center', 'omega-online-store' ),
        'right'    => esc_html__( 'Right', 'omega-online-store' ),
        ),
    )
);

// Archive Post Section.
$wp_customize->add_section( 'omega_online_store_posts_settings',
    array(
    'title'      => esc_html__( 'Archive Meta Information Settings', 'omega-online-store' ),
    'priority'   => 36,
    'capability' => 'edit_theme_options',
    'panel'      => 'omega_online_store_theme_option_panel',
    )
);

$wp_customize->add_setting('omega_online_store_display_archive_post_format_icon',
    array(
        'default' => $omega_online_store_default['omega_online_store_display_archive_post_format_icon'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_display_archive_post_format_icon',
    array(
        'label' => esc_html__('Enable Post Format Icon', 'omega-online-store'),
        'section' => 'omega_online_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_online_store_display_archive_post_image',
    array(
        'default' => $omega_online_store_default['omega_online_store_display_archive_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_display_archive_post_image',
    array(
        'label' => esc_html__('Enable Posts Image', 'omega-online-store'),
        'section' => 'omega_online_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_online_store_display_archive_post_category',
    array(
        'default' => $omega_online_store_default['omega_online_store_display_archive_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_display_archive_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'omega-online-store'),
        'section' => 'omega_online_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_online_store_display_archive_post_title',
    array(
        'default' => $omega_online_store_default['omega_online_store_display_archive_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_display_archive_post_title',
    array(
        'label' => esc_html__('Enable Posts Title', 'omega-online-store'),
        'section' => 'omega_online_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_online_store_display_archive_post_content',
    array(
        'default' => $omega_online_store_default['omega_online_store_display_archive_post_content'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_display_archive_post_content',
    array(
        'label' => esc_html__('Enable Posts Content', 'omega-online-store'),
        'section' => 'omega_online_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_online_store_display_archive_post_button',
    array(
        'default' => $omega_online_store_default['omega_online_store_display_archive_post_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_online_store_display_archive_post_button',
    array(
        'label' => esc_html__('Enable Posts Button', 'omega-online-store'),
        'section' => 'omega_online_store_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_online_store_excerpt_limit',
    array(
        'default'           => $omega_online_store_default['omega_online_store_excerpt_limit'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_online_store_sanitize_number_range',
    )
);
$wp_customize->add_control('omega_online_store_excerpt_limit',
    array(
        'label'       => esc_html__('Blog Post Excerpt limit', 'omega-online-store'),
        'section'     => 'omega_online_store_posts_settings',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);