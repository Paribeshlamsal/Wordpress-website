<?php

	require get_template_directory() . '/inc/homepage-setup/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function omega_online_store_register_recommended_plugins() {
	$plugins = array(
		
		array(
			'name'             => __( 'WooCommerce Currency Switcher', 'omega-online-store' ),
			'slug'             => 'woocommerce-currency-switcher',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Google Language Translator', 'omega-online-store' ),
			'slug'             => 'google-language-translator',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'omega-online-store' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'TI WooCommerce Wishlist', 'omega-online-store' ),
			'slug'             => 'ti-woocommerce-wishlist',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)

	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'omega_online_store_register_recommended_plugins' );