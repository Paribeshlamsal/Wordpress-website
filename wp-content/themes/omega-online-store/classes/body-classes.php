<?php
/**
* Body Classes.
* @package Omega Online Store
*/
 
 if (!function_exists('omega_online_store_body_classes')) :

    function omega_online_store_body_classes($omega_online_store_classes) {
        $omega_online_store_default = omega_online_store_get_default_theme_options();
        global $post;
    
        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $omega_online_store_classes[] = 'hfeed';
        }
    
        // Adds a class of no-sidebar when there is no sidebar present.
        if (!is_active_sidebar('sidebar-1')) {
            $omega_online_store_classes[] = 'no-sidebar';
        }
    
        $omega_online_store_global_sidebar_layout = esc_html(get_theme_mod('omega_online_store_global_sidebar_layout', $omega_online_store_default['omega_online_store_global_sidebar_layout']));
        $omega_online_store_page_sidebar_layout = esc_html(get_theme_mod('omega_online_store_page_sidebar_layout', $omega_online_store_global_sidebar_layout));
        $omega_online_store_post_sidebar_layout = esc_html(get_theme_mod('omega_online_store_post_sidebar_layout', $omega_online_store_global_sidebar_layout));
    
        if (is_page() || (function_exists('is_shop') && is_shop())) {
            $omega_online_store_classes[] = $omega_online_store_page_sidebar_layout;
        } elseif (is_single()) {
            $omega_online_store_classes[] = $omega_online_store_post_sidebar_layout;
        } else {
            $omega_online_store_classes[] = $omega_online_store_global_sidebar_layout;
        }
    
        return $omega_online_store_classes;
    }
    
endif;

add_filter('body_class', 'omega_online_store_body_classes');