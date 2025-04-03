<?php
/**
 * Settings for demo import
 *
 */

/**
 * Define constants
 **/
if ( ! defined( 'WHIZZIE_DIR' ) ) {
	define( 'WHIZZIE_DIR', dirname( __FILE__ ) );
}
require trailingslashit( WHIZZIE_DIR ) . 'homepage-setup-contents.php';
$omega_online_store_current_theme = wp_get_theme();
$omega_online_store_theme_title = $omega_online_store_current_theme->get( 'Name' );


/**
 * Make changes below
 **/

// Change the title and slug of your wizard page
$config['omega_online_store_page_slug'] 	= 'omega-online-store';
$config['omega_online_store_page_title']	= 'Homepage Setup';

$config['steps'] = array(
	'plugins' => array(
		'id'			=> 'plugins',
		'title'			=> __( 'Install and Activate Essential Plugins', 'omega-online-store' ),
		'icon'			=> 'admin-plugins',
		'button_text'	=> __( 'Install Plugins', 'omega-online-store' ),
		'can_skip'		=> true
	),
	'widgets' => array(
		'id'			=> 'widgets',
		'title'			=> __( 'Setup Home Page', 'omega-online-store' ),
		'icon'			=> 'welcome-widgets-menus',
		'button_text'	=> __( 'Start Home Page Setup', 'omega-online-store' ),
		'can_skip'		=> true
	),
	'done' => array(
		'id'			=> 'done',
		'title'			=> __( 'Customize Your Site', 'omega-online-store' ),
		'icon'			=> 'yes',
	)
);

/**
 * This kicks off the wizard
 **/
if( class_exists( 'Omega_Online_Store_Whizzie' ) ) {
	$Omega_Online_Store_Whizzie = new Omega_Online_Store_Whizzie( $config );
}