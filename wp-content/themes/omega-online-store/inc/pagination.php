<?php
/**
 *
 * Pagination Functions
 *
 * @package Omega Online Store
 */

/**
 * Pagination for archive.
 */
function omega_online_store_render_posts_pagination() {
    // Get the setting to check if pagination is enabled
    $omega_online_store_is_pagination_enabled = get_theme_mod( 'omega_online_store_enable_pagination', true );

    // Check if pagination is enabled
    if ( $omega_online_store_is_pagination_enabled ) {
        // Get the selected pagination type from the Customizer
        $omega_online_store_pagination_type = get_theme_mod( 'omega_online_store_theme_pagination_type', 'numeric' );

        // Check if the pagination type is "newer_older" (Previous/Next) or "numeric"
        if ( 'newer_older' === $omega_online_store_pagination_type ) :
            // Display "Newer/Older" pagination (Previous/Next navigation)
            the_posts_navigation(
                array(
                    'prev_text' => __( '&laquo; Newer', 'omega-online-store' ),  // Change the label for "previous"
                    'next_text' => __( 'Older &raquo;', 'omega-online-store' ),  // Change the label for "next"
                    'screen_reader_text' => __( 'Posts navigation', 'omega-online-store' ),
                )
            );
        else :
            // Display numeric pagination (Page numbers)
            the_posts_pagination(
                array(
                    'prev_text' => __( '&laquo; Previous', 'omega-online-store' ),
                    'next_text' => __( 'Next &raquo;', 'omega-online-store' ),
                    'type'      => 'list', // Display as <ul> <li> tags
                    'screen_reader_text' => __( 'Posts navigation', 'omega-online-store' ),
                )
            );
        endif;
    }
}
add_action( 'omega_online_store_posts_pagination', 'omega_online_store_render_posts_pagination', 10 );