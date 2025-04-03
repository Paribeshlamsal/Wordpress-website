<?php

$omega_online_store_custom_css = "";

	$omega_online_store_theme_pagination_options_alignment = get_theme_mod('omega_online_store_theme_pagination_options_alignment', 'Center');
	if ($omega_online_store_theme_pagination_options_alignment == 'Center') {
		$omega_online_store_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$omega_online_store_custom_css .= 'justify-content: center;margin: 0 auto;';
		$omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_theme_pagination_options_alignment == 'Right') {
		$omega_online_store_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$omega_online_store_custom_css .= 'justify-content: right;margin: 0 0 0 auto;';
		$omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_theme_pagination_options_alignment == 'Left') {
		$omega_online_store_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$omega_online_store_custom_css .= 'justify-content: left;margin: 0 auto 0 0;';
		$omega_online_store_custom_css .= '}';
	}

	$omega_online_store_theme_breadcrumb_enable = get_theme_mod('omega_online_store_theme_breadcrumb_enable',true);
    if($omega_online_store_theme_breadcrumb_enable != true){
        $omega_online_store_custom_css .='nav.breadcrumb-trail.breadcrumbs,nav.woocommerce-breadcrumb{';
            $omega_online_store_custom_css .='display: none;';
        $omega_online_store_custom_css .='}';
    }

	$omega_online_store_theme_breadcrumb_options_alignment = get_theme_mod('omega_online_store_theme_breadcrumb_options_alignment', 'Left');
	if ($omega_online_store_theme_breadcrumb_options_alignment == 'Center') {
	    $omega_online_store_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $omega_online_store_custom_css .= 'text-align: center !important;';
	    $omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_theme_breadcrumb_options_alignment == 'Right') {
	    $omega_online_store_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $omega_online_store_custom_css .= 'text-align: Right !important;';
	    $omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_theme_breadcrumb_options_alignment == 'Left') {
	    $omega_online_store_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $omega_online_store_custom_css .= 'text-align: Left !important;';
	    $omega_online_store_custom_css .= '}';
	}

	$omega_online_store_single_page_content_alignment = get_theme_mod('omega_online_store_single_page_content_alignment', 'left');
	if ($omega_online_store_single_page_content_alignment == 'left') {
	    $omega_online_store_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $omega_online_store_custom_css .= 'text-align: left !important;';
	    $omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_single_page_content_alignment == 'center') {
	    $omega_online_store_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $omega_online_store_custom_css .= 'text-align: center !important;';
	    $omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_single_page_content_alignment == 'right') {
	    $omega_online_store_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $omega_online_store_custom_css .= 'text-align: right !important;';
	    $omega_online_store_custom_css .= '}';
	}

	$omega_online_store_single_post_content_alignment = get_theme_mod('omega_online_store_single_post_content_alignment', 'left');
	if ($omega_online_store_single_post_content_alignment == 'left') {
	    $omega_online_store_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $omega_online_store_custom_css .= 'text-align: left !important;justify-content: left;';
	    $omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_single_post_content_alignment == 'center') {
	    $omega_online_store_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $omega_online_store_custom_css .= 'text-align: center !important;justify-content: center;';
	    $omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_single_post_content_alignment == 'right') {
	    $omega_online_store_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $omega_online_store_custom_css .= 'text-align: right !important;justify-content: right;';
	    $omega_online_store_custom_css .= '}';
	}

	$omega_online_store_menu_text_transform = get_theme_mod('omega_online_store_menu_text_transform', 'Capitalize');
	if ($omega_online_store_menu_text_transform == 'Capitalize') {
	    $omega_online_store_custom_css .= '.site-navigation .primary-menu > li a{';
	    $omega_online_store_custom_css .= 'text-transform: Capitalize !important;';
	    $omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_menu_text_transform == 'uppercase') {
	    $omega_online_store_custom_css .= '.site-navigation .primary-menu > li a{';
	    $omega_online_store_custom_css .= 'text-transform: uppercase !important;';
	    $omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_menu_text_transform == 'lowercase') {
	    $omega_online_store_custom_css .= '.site-navigation .primary-menu > li a{';
	    $omega_online_store_custom_css .= 'text-transform: lowercase !important;';
	    $omega_online_store_custom_css .= '}';
	}

	$omega_online_store_footer_widget_title_alignment = get_theme_mod('omega_online_store_footer_widget_title_alignment', 'left');
	if ($omega_online_store_footer_widget_title_alignment == 'left') {
	    $omega_online_store_custom_css .= 'h2.widget-title{';
	    $omega_online_store_custom_css .= 'text-align: left !important;';
	    $omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_footer_widget_title_alignment == 'center') {
	    $omega_online_store_custom_css .= 'h2.widget-title{';
	    $omega_online_store_custom_css .= 'text-align: center !important;';
	    $omega_online_store_custom_css .= '}';
	} else if ($omega_online_store_footer_widget_title_alignment == 'right') {
	    $omega_online_store_custom_css .= 'h2.widget-title{';
	    $omega_online_store_custom_css .= 'text-align: right !important;';
	    $omega_online_store_custom_css .= '}';
	}

    $omega_online_store_show_hide_related_product = get_theme_mod('omega_online_store_show_hide_related_product',true);
    if($omega_online_store_show_hide_related_product != true){
        $omega_online_store_custom_css .='.related.products{';
            $omega_online_store_custom_css .='display: none;';
        $omega_online_store_custom_css .='}';
    }

	/*-------------------- Global First Color -------------------*/

	$omega_online_store_global_color = get_theme_mod('omega_online_store_global_color', '#3D3A3C'); // Add a fallback if the color isn't set

	if ($omega_online_store_global_color) {
		$omega_online_store_custom_css .= ':root {';
		$omega_online_store_custom_css .= '--global-color: ' . esc_attr($omega_online_store_global_color) . ';';
		$omega_online_store_custom_css .= '}';
	}	

	/*-------------------- Content Font -------------------*/

	$omega_online_store_content_typography_font = get_theme_mod('omega_online_store_content_typography_font', 'Figtree'); // Add a fallback if the color isn't set

	if ($omega_online_store_content_typography_font) {
		$omega_online_store_custom_css .= ':root {';
		$omega_online_store_custom_css .= '--font-main: ' . esc_attr($omega_online_store_content_typography_font) . ';';
		$omega_online_store_custom_css .= '}';
	}

	/*-------------------- Heading Font -------------------*/

	$omega_online_store_heading_typography_font = get_theme_mod('omega_online_store_heading_typography_font', 'Figtree'); // Add a fallback if the color isn't set

	if ($omega_online_store_heading_typography_font) {
		$omega_online_store_custom_css .= ':root {';
		$omega_online_store_custom_css .= '--font-head: ' . esc_attr($omega_online_store_heading_typography_font) . ';';
		$omega_online_store_custom_css .= '}';
	}