<?php

function omega_online_store_enqueue_fonts() {
    $omega_online_store_default_font_content = 'Figtree';
    $omega_online_store_default_font_heading = 'Figtree';

    $omega_online_store_font_content = esc_attr(get_theme_mod('omega_online_store_content_typography_font', $omega_online_store_default_font_content));
    $omega_online_store_font_heading = esc_attr(get_theme_mod('omega_online_store_heading_typography_font', $omega_online_store_default_font_heading));

    $omega_online_store_css = '';

    // Always enqueue main font
    $omega_online_store_css .= '
    :root {
        --font-main: ' . $omega_online_store_font_content . ', ' . (in_array($omega_online_store_font_content, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('omega-online-store-style-font-general', get_template_directory_uri() . '/fonts/' . $omega_online_store_font_content . '/font.css');

    // Always enqueue header font
    $omega_online_store_css .= '
    :root {
        --font-head: ' . $omega_online_store_font_heading . ', ' . (in_array($omega_online_store_font_heading, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('omega-online-store-style-font-h', get_template_directory_uri() . '/fonts/' . $omega_online_store_font_heading . '/font.css');

    // Add inline style
    wp_add_inline_style('omega-online-store-style-font-general', $omega_online_store_css);
}
add_action('wp_enqueue_scripts', 'omega_online_store_enqueue_fonts', 50);