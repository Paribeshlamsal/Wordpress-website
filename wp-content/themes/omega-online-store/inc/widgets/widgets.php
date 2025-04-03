<?php
/**
* Widget Functions.
*
* @package Omega Online Store
*/

function omega_online_store_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'omega-online-store'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'omega-online-store'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $omega_online_store_default = omega_online_store_get_default_theme_options();
    $omega_online_store_footer_column_layout = absint( get_theme_mod( 'omega_online_store_footer_column_layout',$omega_online_store_default['omega_online_store_footer_column_layout'] ) );

    for( $i = 0; $i < $omega_online_store_footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','omega-online-store'); }
    	if( $i == 1 ){ $count = esc_html__('Two','omega-online-store'); }
    	if( $i == 2 ){ $count = esc_html__('Three','omega-online-store'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'omega-online-store').$count,
	        'id' => 'omega-online-store-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'omega-online-store'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'omega_online_store_widgets_init');