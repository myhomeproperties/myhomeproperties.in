<?php
	
require get_template_directory() . '/core/includes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function real_esatate_property_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'real-esatate-property' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	real_esatate_property_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'real_esatate_property_register_recommended_plugins' );