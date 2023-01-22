<?php
//Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


//Enque styles and scripts
function real_estate_calibre_enqueue_styles() {

	$parenthandle = 'real-estate-salient-style';
    $theme = wp_get_theme();
    //Load Parent theme style.css
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    //Load child theme style.css
    wp_enqueue_style( 'real-estate-calibre', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );

	// Load Nivo Slider
	wp_enqueue_style( 'real-estate-calibre-nivo', get_stylesheet_directory_uri() . '/css/nivo-slider.css' );
	wp_enqueue_style( 'real-estate-calibre-custom-two-css', get_stylesheet_directory_uri(). '/css/customproperty.css', array());

	// Load Nivo Slider
	wp_enqueue_script( 'real-estate-calibre-nivo-slider', get_stylesheet_directory_uri() . '/js/nivo.slider.js', array( 'jquery' ) );
	// Load navigation 
	wp_enqueue_script( 'real-estate-calibre-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array( 'jquery' ) );
	// Load custom jquery 
	wp_enqueue_script( 'real-estate-calibre', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'real_estate_calibre_enqueue_styles', 10 );


/**
 * Load Google Font
 */
function real_estate_calibre_enque_google_font() {
	// Include the file.
	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	// Load the webfont.
	wp_enqueue_style( 'real-estate-calibre-opensans', wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800' ), array(), '1.0');
}
add_action( 'wp_enqueue_scripts', 'real_estate_calibre_enque_google_font' );

/**
 * Customizer settings for Mobile on top bar
 */
function real_estate_calibre_customize($wp_customize) {

	//Remove unused feature
	$wp_customize->remove_setting('real_estate_salient_myaccount_page');
	$wp_customize->remove_control('real_estate_salient_myaccount_page');
	$wp_customize->remove_setting('real_estate_salient_topbar_linkedin');
	$wp_customize->remove_control('real_estate_salient_topbar_linkedin');

	// Add customizer option to add contact number or text on left side
	$wp_customize->add_setting('real_estate_calibre_top_mobile', array(
	    'sanitize_callback' => 'sanitize_text_field',
	    'default' => __('Reach us  +00-000-000','real-estate-calibre')
	));

	$wp_customize->add_control('real_estate_calibre_top_mobile', array(
	    'label'   => __('Top bar text','real-estate-calibre'),
	    'section' => 'real_estate_salient_topbar',
	    'description' => __( 'Add your contact number or any other text here', 'real-estate-salient' ),
	    'type' => 'text',
	    'priority'   => 2
	));

	// Add customizer option to add instagram link
	$wp_customize->add_setting('real_estate_calibre_topbar_insta', array(
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control('real_estate_calibre_topbar_insta', array(
		'label'   => __('Instagram url','real-estate-calibre'),
		'section' => 'real_estate_salient_topbar',
		'type' => 'text',
		'priority'   => 6
	));
}

add_action( 'customize_register', 'real_estate_calibre_customize', 999, 1 );

/**
 * Template settings additions.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';

