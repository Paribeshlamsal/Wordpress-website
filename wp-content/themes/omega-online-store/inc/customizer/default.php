<?php
/**
 * Default Values.
 *
 * @package Omega Online Store
 */

if ( ! function_exists( 'omega_online_store_get_default_theme_options' ) ) :
	function omega_online_store_get_default_theme_options() {

		$omega_online_store_defaults = array();
		
		// Options.
        $omega_online_store_defaults['omega_online_store_logo_width_range']                                  = 300;
		$omega_online_store_defaults['omega_online_store_global_sidebar_layout']					            = 'right-sidebar';
        $omega_online_store_defaults['omega_online_store_header_layout_email_address']      = esc_html__( 'support@example.com', 'omega-online-store' );
        $omega_online_store_defaults['omega_online_store_header_layout_20_per_discount_text']      = esc_html__( 'Free International Shipping On Order Over $60', 'omega-online-store' );
        $omega_online_store_defaults['omega_online_store_header_layout_enable_translator']          = 1;
        $omega_online_store_defaults['omega_online_store_product_enable_wishlist']          = 1;
        $omega_online_store_defaults['omega_online_store_theme_loader']                 = 0;
        $omega_online_store_defaults['omega_online_store_pagination_layout']         = 'numeric';
        $omega_online_store_defaults['omega_online_store_theme_pagination_options_alignment']         = 'Center';
        $omega_online_store_defaults['omega_online_store_theme_breadcrumb_options_alignment']         = 'Left';
		$omega_online_store_defaults['omega_online_store_footer_column_layout'] 						 = 3;
        $omega_online_store_defaults['omega_online_store_menu_font_size']                 = 15;
        $omega_online_store_defaults['omega_online_store_copyright_font_size']                 = 16;
        $omega_online_store_defaults['omega_online_store_breadcrumb_font_size']                 = 16;
        $omega_online_store_defaults['omega_online_store_excerpt_limit']                 = 10;
        $omega_online_store_defaults['omega_online_store_menu_text_transform']                 = 'capitalize';
        $omega_online_store_defaults['omega_online_store_single_page_content_alignment']                 = 'left';  
        $omega_online_store_defaults['omega_online_store_per_columns']                 = 3;  
        $omega_online_store_defaults['omega_online_store_product_per_page']                 = 9;
		$omega_online_store_defaults['omega_online_store_footer_copyright_text'] 				         = esc_html__( 'All rights reserved.', 'omega-online-store' );
        $omega_online_store_defaults['omega_online_store_twp_navigation_type']              			 = 'theme-normal-navigation';
        $omega_online_store_defaults['omega_online_store_post_author']                		= 1;
        $omega_online_store_defaults['omega_online_store_post_date']                		= 1;
        $omega_online_store_defaults['omega_online_store_post_category']                	= 1;
        $omega_online_store_defaults['omega_online_store_post_tags']                		= 1;
        $omega_online_store_defaults['omega_online_store_floating_next_previous_nav']       = 1;
        $omega_online_store_defaults['omega_online_store_header_banner']               		= 1;
        $omega_online_store_defaults['omega_online_store_sticky']                 = 0;
        $omega_online_store_defaults['omega_online_store_background_color']               	= '#fff';
        $omega_online_store_defaults['omega_online_store_display_footer']            = 1;
        $omega_online_store_defaults['omega_online_store_footer_widget_title_alignment']                 = 'left'; 
        $omega_online_store_defaults['omega_online_store_show_hide_related_product']          = 1;
        $omega_online_store_defaults['omega_online_store_display_archive_post_image']            = 1;
        $omega_online_store_defaults['omega_online_store_product_section_title']           =esc_html__( 'Best Sellers', 'omega-online-store' );
        $omega_online_store_defaults['omega_online_store_product_section_button_title']           = esc_html__( 'View All Products', 'omega-online-store' );
        $omega_online_store_defaults['omega_online_store_product_section_button_url']           = esc_html__( '#', 'omega-online-store' );
        $omega_online_store_defaults['omega_online_store_global_color']                                   = '#3D3A3C';
        $omega_online_store_defaults['omega_online_store_display_archive_post_category']          = 1;
        $omega_online_store_defaults['omega_online_store_display_archive_post_title']             = 1;
        $omega_online_store_defaults['omega_online_store_display_archive_post_content']           = 1;
        $omega_online_store_defaults['omega_online_store_display_archive_post_button']            = 1;
        $omega_online_store_defaults['omega_online_store_display_single_post_image']            = 1;
        $omega_online_store_defaults['omega_online_store_display_archive_post_format_icon']       = 1;
        
        $omega_online_store_defaults['omega_online_store_display_single_post_image']            = 1;
        $omega_online_store_defaults['omega_online_store_display_archive_post_format_icon']       = 1;

        $omega_online_store_defaults['omega_online_store_enable_to_the_top']                      = 1;
        $omega_online_store_defaults['omega_online_store_to_the_top_text']                      = esc_html__( 'To The Top', 'omega-online-store' );
        $omega_online_store_defaults['omega_online_store_theme_breadcrumb_enable']                 = 1;
        $omega_online_store_defaults['omega_online_store_single_post_content_alignment']                 = 'left';


		// Pass through filter.
		$omega_online_store_defaults = apply_filters( 'omega_online_store_filter_default_theme_options', $omega_online_store_defaults );

		return $omega_online_store_defaults;
	}
endif;
