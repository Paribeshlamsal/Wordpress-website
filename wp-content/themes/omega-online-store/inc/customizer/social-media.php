<?php
/**
* Header Options.
*
* @package Omega Online Store
*/

$omega_online_store_default = omega_online_store_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'omega_online_store_social_media_setting',
	array(
	'title'      => esc_html__( 'Social Media Settings', 'omega-online-store' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_online_store_theme_option_panel',
	)
);

$wp_customize->add_setting( 'omega_online_store_header_layout_facebook_link',
    array(
    'default'           => '#',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_online_store_header_layout_facebook_link',
    array(
    'label'    => esc_html__( 'Facebook Link', 'omega-online-store' ),
    'section'  => 'omega_online_store_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_online_store_header_layout_twitter_link',
    array(
    'default'           => '#',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_online_store_header_layout_twitter_link',
    array(
    'label'    => esc_html__( 'Twitter Link', 'omega-online-store' ),
    'section'  => 'omega_online_store_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_online_store_header_layout_pintrest_link',
    array(
    'default'           => '#',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_online_store_header_layout_pintrest_link',
    array(
    'label'    => esc_html__( 'Pintrest Link', 'omega-online-store' ),
    'section'  => 'omega_online_store_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_online_store_header_layout_instagram_link',
    array(
    'default'           => '#',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_online_store_header_layout_instagram_link',
    array(
    'label'    => esc_html__( 'Instagram Link', 'omega-online-store' ),
    'section'  => 'omega_online_store_social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_online_store_header_layout_youtube_link',
    array(
    'default'           => '#',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_online_store_header_layout_youtube_link',
    array(
    'label'    => esc_html__( 'Youtube Link', 'omega-online-store' ),
    'section'  => 'omega_online_store_social_media_setting',
    'type'     => 'url',
    )
);