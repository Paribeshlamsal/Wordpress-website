<?php
/**
 * The sidebar containing the main widget area
 * @package Omega Online Store
 */

$omega_online_store_default = omega_online_store_get_default_theme_options();
$post_id = get_the_ID(); // Get the post ID.

if ( is_page() || ( function_exists('is_shop') && is_shop() ) ) {
    $omega_online_store_global_sidebar_layout = esc_html( get_theme_mod( 'omega_online_store_page_sidebar_layout', $omega_online_store_default['omega_online_store_global_sidebar_layout'] ) );
} elseif ( is_single() ) {
    $omega_online_store_global_sidebar_layout = esc_html( get_theme_mod( 'omega_online_store_post_sidebar_layout', $omega_online_store_default['omega_online_store_global_sidebar_layout'] ) );
} else {
    $omega_online_store_global_sidebar_layout = esc_html( get_theme_mod( 'omega_online_store_global_sidebar_layout', $omega_online_store_default['omega_online_store_global_sidebar_layout'] ) );
}

// Hide the sidebar if 'no-sidebar' is selected.
if ( !is_active_sidebar('sidebar-1') || $omega_online_store_global_sidebar_layout === 'no-sidebar' ) {
    return;
}

$omega_online_store_sidebar_column_class = $omega_online_store_global_sidebar_layout === 'left-sidebar' ? 'column-order-1' : 'column-order-2';
?>

<aside id="secondary" class="widget-area <?php echo esc_attr( $omega_online_store_sidebar_column_class ); ?>">
    <div class="widget-area-wrapper">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</aside>