<?php
/**
 * Construction Realestate Theme Customizer
 * @package Construction Realestate
 */

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-sizer.php' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function construction_realestate_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/custom-control.php' );
	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_setting( 'construction_realestate_logo_sizer',array(
		'default' => 50,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_logo_sizer',array(
		'label' => esc_html__( 'Logo Sizer','construction-realestate' ),
		'section' => 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('construction_realestate_logo_padding',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_logo_padding',array(
		'label' => esc_html__( 'Logo Padding (px)','construction-realestate' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 100,
        ),
	)));

	$wp_customize->add_setting('construction_realestate_logo_margin',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control(new construction_realestate_Custom_Control( $wp_customize, 'construction_realestate_logo_margin',array(
		'label' => esc_html__( 'Logo Margin  (px)','construction-realestate' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 100,
        ),
	)));

	$wp_customize->add_setting('construction_realestate_site_title_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_site_title_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Site Title','construction-realestate'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('construction_realestate_site_title_font_size',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_site_title_font_size',array(
		'label' => esc_html__( 'Site Title Font Size (px)','construction-realestate' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	// site title color
   $wp_customize->add_setting('construction_realestate_site_title_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_site_title_color', array(
		'label'    => __('Site Title Color', 'construction-realestate'),
		'section'  => 'title_tagline',
		'settings' => 'construction_realestate_site_title_color',
	)));

    $wp_customize->add_setting('construction_realestate_site_tagline_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_site_tagline_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Site Tagline','construction-realestate'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('construction_realestate_site_tagline_font_size',array(
		'default'=> 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_site_tagline_font_size',array(
		'label' => esc_html__( 'Site Tagline Font Size (px)','construction-realestate' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	// site tagline font color
	$wp_customize->add_setting('construction_realestate_site_tagline_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_site_tagline_color', array(
		'label'    => __('Site Tagline Color', 'construction-realestate'),
		'section'  => 'title_tagline',
		'settings' => 'construction_realestate_site_tagline_color',
	)));

	//add home page setting pannel
	$wp_customize->add_panel( 'construction_realestate_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'construction-realestate' ),
	    'description' => __( 'Description of what this panel does.', 'construction-realestate' ),
	) );

    $construction_realestate_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	//Typography
	$wp_customize->add_section('construction_realestate_typography', array(
		'title'    => __('Typography', 'construction-realestate'),
		'panel'    => 'construction_realestate_panel_id',
	));

	//This is body FontFamily picker setting
	$wp_customize->add_setting('construction_realestate_body_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_body_color', array(
		'label'    => __('Body Color', 'construction-realestate'),
		'section'  => 'construction_realestate_typography',
		'settings' => 'construction_realestate_body_color',
	)));

	$wp_customize->add_setting('construction_realestate_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	));
	$wp_customize->add_control(	'construction_realestate_body_font_family', array(
		'section' => 'construction_realestate_typography',
		'label'   => __('Body Fonts', 'construction-realestate'),
		'type'    => 'select',
		'choices' => $construction_realestate_font_array,
	));

	$wp_customize->add_setting('construction_realestate_body_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('construction_realestate_body_font_size', array(
		'label'   => __('Body Font Size', 'construction-realestate'),
		'section' => 'construction_realestate_typography',
		'setting' => 'construction_realestate_body_font_size',
		'type'    => 'text',
	));

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('construction_realestate_paragraph_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_paragraph_color', array(
		'label'    => __('Paragraph Color', 'construction-realestate'),
		'section'  => 'construction_realestate_typography',
		'settings' => 'construction_realestate_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('construction_realestate_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	));
	$wp_customize->add_control(
		'construction_realestate_paragraph_font_family', array(
		'section' => 'construction_realestate_typography',
		'label'   => __('Paragraph Fonts', 'construction-realestate'),
		'type'    => 'select',
		'choices' => $construction_realestate_font_array,
	));

	$wp_customize->add_setting('construction_realestate_paragraph_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('construction_realestate_paragraph_font_size', array(
		'label'   => __('Paragraph Font Size', 'construction-realestate'),
		'section' => 'construction_realestate_typography',
		'setting' => 'construction_realestate_paragraph_font_size',
		'type'    => 'text',
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('construction_realestate_atag_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_atag_color', array(
		'label'    => __('"a" Tag Color', 'construction-realestate'),
		'section'  => 'construction_realestate_typography',
		'settings' => 'construction_realestate_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('construction_realestate_atag_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	));
	$wp_customize->add_control('construction_realestate_atag_font_family', array(
		'section' => 'construction_realestate_typography',
		'label'   => __('"a" Tag Fonts', 'construction-realestate'),
		'type'    => 'select',
		'choices' => $construction_realestate_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('construction_realestate_li_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_li_color', array(
		'label'    => __('"li" Tag Color', 'construction-realestate'),
		'section'  => 'construction_realestate_typography',
		'settings' => 'construction_realestate_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('construction_realestate_li_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	));
	$wp_customize->add_control('construction_realestate_li_font_family', array(
		'section' => 'construction_realestate_typography',
		'label'   => __('"li" Tag Fonts', 'construction-realestate'),
		'type'    => 'select',
		'choices' => $construction_realestate_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting('construction_realestate_h1_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_h1_color', array(
		'label'    => __('H1 Color', 'construction-realestate'),
		'section'  => 'construction_realestate_typography',
		'settings' => 'construction_realestate_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('construction_realestate_h1_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	));
	$wp_customize->add_control('construction_realestate_h1_font_family', array(
			'section' => 'construction_realestate_typography',
			'label'   => __('H1 Fonts', 'construction-realestate'),
			'type'    => 'select',
			'choices' => $construction_realestate_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('construction_realestate_h1_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('construction_realestate_h1_font_size', array(
		'label'   => __('H1 Font Size', 'construction-realestate'),
		'section' => 'construction_realestate_typography',
		'setting' => 'construction_realestate_h1_font_size',
		'type'    => 'text',
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting('construction_realestate_h2_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_h2_color', array(
		'label'    => __('h2 Color', 'construction-realestate'),
		'section'  => 'construction_realestate_typography',
		'settings' => 'construction_realestate_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('construction_realestate_h2_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	));
	$wp_customize->add_control('construction_realestate_h2_font_family', array(
		'section' => 'construction_realestate_typography',
		'label'   => __('h2 Fonts', 'construction-realestate'),
		'type'    => 'select',
		'choices' => $construction_realestate_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('construction_realestate_h2_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('construction_realestate_h2_font_size', array(
		'label'   => __('h2 Font Size', 'construction-realestate'),
		'section' => 'construction_realestate_typography',
		'setting' => 'construction_realestate_h2_font_size',
		'type'    => 'text',
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting('construction_realestate_h3_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_h3_color', array(
		'label'    => __('h3 Color', 'construction-realestate'),
		'section'  => 'construction_realestate_typography',
		'settings' => 'construction_realestate_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('construction_realestate_h3_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	));
	$wp_customize->add_control('construction_realestate_h3_font_family', array(
		'section' => 'construction_realestate_typography',
		'label'   => __('h3 Fonts', 'construction-realestate'),
		'type'    => 'select',
		'choices' => $construction_realestate_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('construction_realestate_h3_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('construction_realestate_h3_font_size', array(
		'label'   => __('h3 Font Size', 'construction-realestate'),
		'section' => 'construction_realestate_typography',
		'setting' => 'construction_realestate_h3_font_size',
		'type'    => 'text',
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting('construction_realestate_h4_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_h4_color', array(
		'label'    => __('h4 Color', 'construction-realestate'),
		'section'  => 'construction_realestate_typography',
		'settings' => 'construction_realestate_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('construction_realestate_h4_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	));
	$wp_customize->add_control('construction_realestate_h4_font_family', array(
		'section' => 'construction_realestate_typography',
		'label'   => __('h4 Fonts', 'construction-realestate'),
		'type'    => 'select',
		'choices' => $construction_realestate_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('construction_realestate_h4_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('construction_realestate_h4_font_size', array(
		'label'   => __('h4 Font Size', 'construction-realestate'),
		'section' => 'construction_realestate_typography',
		'setting' => 'construction_realestate_h4_font_size',
		'type'    => 'text',
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting('construction_realestate_h5_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_h5_color', array(
		'label'    => __('h5 Color', 'construction-realestate'),
		'section'  => 'construction_realestate_typography',
		'settings' => 'construction_realestate_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('construction_realestate_h5_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	));
	$wp_customize->add_control(
		'construction_realestate_h5_font_family', array(
		'section' => 'construction_realestate_typography',
		'label'   => __('h5 Fonts', 'construction-realestate'),
		'type'    => 'select',
		'choices' => $construction_realestate_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('construction_realestate_h5_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('construction_realestate_h5_font_size', array(
		'label'   => __('h5 Font Size', 'construction-realestate'),
		'section' => 'construction_realestate_typography',
		'setting' => 'construction_realestate_h5_font_size',
		'type'    => 'text',
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting('construction_realestate_h6_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_h6_color', array(
		'label'    => __('h6 Color', 'construction-realestate'),
		'section'  => 'construction_realestate_typography',
		'settings' => 'construction_realestate_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('construction_realestate_h6_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	));
	$wp_customize->add_control('construction_realestate_h6_font_family', array(
		'section' => 'construction_realestate_typography',
		'label'   => __('h6 Fonts', 'construction-realestate'),
		'type'    => 'select',
		'choices' => $construction_realestate_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('construction_realestate_h6_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('construction_realestate_h6_font_size', array(
		'label'   => __('h6 Font Size', 'construction-realestate'),
		'section' => 'construction_realestate_typography',
		'setting' => 'construction_realestate_h6_font_size',
		'type'    => 'text',
	));

	$wp_customize->add_setting('construction_realestate_background_skin',array(
        'default' => 'Without Background',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control('construction_realestate_background_skin',array(
        'type' => 'radio',
        'label' => __('Background Skin','construction-realestate'),
        'description' => __('Here you can add the background skin along with the background image.','construction-realestate'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background Skin','construction-realestate'),
            'Without Background' => __('Without Background Skin','construction-realestate'),
        ),
	) );

	//layout setting
	$wp_customize->add_section( 'construction_realestate_option', array(
    	'title'      => __( 'Layout Settings', 'construction-realestate' ),
		'panel' => 'construction_realestate_panel_id'
	) );

	$wp_customize->add_setting( 'construction_realestate_single_page_breadcrumb',array(
			'default' => true,
	      	'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
	    ) );
	$wp_customize->add_control('construction_realestate_single_page_breadcrumb',array(
	    	'type' => 'checkbox',
	        'label' => __( 'Show / Hide Single Page Breadcrumb','construction-realestate' ),
	        'section' => 'construction_realestate_option'
	  ));

	$wp_customize->add_setting('construction_realestate_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_preloader',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Preloader','construction-realestate'),
       'section' => 'construction_realestate_option'
    ));

    $wp_customize->add_setting('construction_realestate_preloader_type',array(
        'default' => 'First Preloader Type',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control('construction_realestate_preloader_type',array(
        'type' => 'radio',
        'label' => __('Preloader Types','construction-realestate'),
        'section' => 'construction_realestate_option',
        'choices' => array(
            'First Preloader Type' => __('First Preloader Type','construction-realestate'),
            'Second Preloader Type' => __('Second Preloader Type','construction-realestate'),
        ),
	) );

	$wp_customize->add_setting('construction_realestate_preloader_bg_color_option', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_preloader_bg_color_option', array(
		'label'    => __('Preloader Background Color', 'construction-realestate'),
		'section'  => 'construction_realestate_option',
	)));

	$wp_customize->add_setting('construction_realestate_preloader_icon_color_option', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_preloader_icon_color_option', array(
		'label'    => __('Preloader Icon Color', 'construction-realestate'),
		'section'  => 'construction_realestate_option',
	)));

	$wp_customize->add_setting('construction_realestate_width_layout_options',array(
        'default' => 'Default',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control('construction_realestate_width_layout_options',array(
        'type' => 'radio',
        'label' => __('Container Box','construction-realestate'),
        'description' => __('Here you can change the Width layout. ','construction-realestate'),
        'section' => 'construction_realestate_option',
        'choices' => array(
            'Default' => __('Default','construction-realestate'),
            'Container Layout' => __('Container Layout','construction-realestate'),
            'Box Layout' => __('Box Layout','construction-realestate'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('construction_realestate_layout_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
	) );
	$wp_customize->add_control('construction_realestate_layout_options',array(
	    'type' => 'radio',
	    'label' => __('Post Sidebar Layout','construction-realestate'),
	    'section' => 'construction_realestate_option',
	    'choices' => array(
	        'One Column' => __('One Column','construction-realestate'),
	        'Three Columns' => __('Three Columns','construction-realestate'),
	        'Four Columns' => __('Four Columns','construction-realestate'),
	        'Grid Layout' => __('Grid Layout','construction-realestate'),
	        'Left Sidebar' => __('Left Sidebar','construction-realestate'),
	        'Right Sidebar' => __('Right Sidebar','construction-realestate')
	    ),
	) );

//sidebar size option
	$wp_customize->add_setting('construction_realestate_sidebar_size',array(
		'default' => 'Sidebar 1/3',
		'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control('construction_realestate_sidebar_size',array(
		'type' => 'radio',
		'label' => __('Sidebar Size Option','construction-realestate'),
		'section' => 'construction_realestate_option',
		'choices' => array(
		   'Sidebar 1/3' => __('Sidebar 1/3','construction-realestate'),
		   'Sidebar 1/4' => __('Sidebar 1/4','construction-realestate'),
		),
	) );

	$wp_customize->add_setting( 'construction_realestate_image_border_radius', array(
		'default'=> 0,
		'transport' => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize,  'construction_realestate_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','construction-realestate' ),
		'section'     => 'construction_realestate_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	)) );

	$wp_customize->add_setting( 'construction_realestate_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize,  'construction_realestate_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','construction-realestate' ),
		'section' => 'construction_realestate_option',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

	//Global Color
	$wp_customize->add_section('construction_realestate_global_color', array(
		'title'    => __('Theme Color Option', 'construction-realestate'),
		'panel'    => 'construction_realestate_panel_id',
	));

	$wp_customize->add_setting('construction_realestate_hi_first_color', array(
		'default'           => '#0075b5',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_hi_first_color', array(
		'label'    => __('Highlight Color', 'construction-realestate'),
		'section'  => 'construction_realestate_global_color',
		'settings' => 'construction_realestate_hi_first_color',
	)));

	//Blog Post Settings
	$wp_customize->add_section('construction_realestate_post_settings', array(
		'title'    => __('Post General Settings', 'construction-realestate'),
		'panel'    => 'construction_realestate_panel_id',
	));

	$wp_customize->add_setting('construction_realestate_post_layouts',array(
        'default' => 'Layout 3',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control(new Construction_Realestate_Image_Radio_Control($wp_customize, 'construction_realestate_post_layouts', array(
        'type' => 'select',
        'label' => __('Post Layouts','construction-realestate'),
        'description' => __('Here you can change the 3 different layouts of post.','construction-realestate'),
        'section' => 'construction_realestate_post_settings',
        'choices' => array(
            'Layout 1' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Layout 2' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Layout 3' => esc_url(get_template_directory_uri()).'/images/layout3.png',
    ))));

	$wp_customize->add_setting('construction_realestate_metafields_date',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date ','construction-realestate'),
       'section' => 'construction_realestate_post_settings'
    ));

    $wp_customize->add_setting('construction_realestate_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_post_date_icon',array(
		'label'	=> __('Post Date Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('construction_realestate_metafields_author',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author','construction-realestate'),
       'section' => 'construction_realestate_post_settings'
    ));

    $wp_customize->add_setting('construction_realestate_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_post_author_icon',array(
		'label'	=> __('Post Author Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('construction_realestate_metafields_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comments','construction-realestate'),
       'section' => 'construction_realestate_post_settings'
    ));

    $wp_customize->add_setting('construction_realestate_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_post_category',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_post_category',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Category','construction-realestate'),
       'section' => 'construction_realestate_post_settings'
    ));

	$wp_customize->add_setting('construction_realestate_category_icon',array(
		'default'	=> 'fas fa-folder-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_category_icon',array(
		'label'	=> __('Category Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_post_settings',
		'type'		=> 'icon'
	)));

    //Post excerpt
	$wp_customize->add_setting( 'construction_realestate_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'construction_realestate_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Content Limit','construction-realestate' ),
		'section'     => 'construction_realestate_post_settings',
		'type'        => 'number',
		'settings'    => 'construction_realestate_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('construction_realestate_content_settings',array(
        'default' =>'Excerpt',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control('construction_realestate_content_settings',array(
        'type' => 'radio',
        'label' => __('Content Settings','construction-realestate'),
        'section' => 'construction_realestate_post_settings',
        'choices' => array(
            'Excerpt' => __('Excerpt','construction-realestate'),
            'Content' => __('Content','construction-realestate'),
        ),
	) );

	$wp_customize->add_setting( 'construction_realestate_post_discription_suffix', array(
		'default'   => esc_html__( '[...]', 'construction-realestate' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'construction_realestate_post_discription_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','construction-realestate' ),
		'section'     => 'construction_realestate_post_settings',
		'type'        => 'text',
		'settings'    => 'construction_realestate_post_discription_suffix',
	) );

	$wp_customize->add_setting( 'construction_realestate_post_button_padding_top',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new construction_realestate_Custom_Control( $wp_customize, 'construction_realestate_post_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','construction-realestate' ),
		'section' => 'construction_realestate_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'construction_realestate_post_button_padding_right',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new construction_realestate_Custom_Control( $wp_customize, 'construction_realestate_post_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','construction-realestate' ),
		'section' => 'construction_realestate_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'construction_realestate_post_button_border_radius',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new construction_realestate_Custom_Control( $wp_customize, 'construction_realestate_post_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','construction-realestate' ),
		'section' => 'construction_realestate_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('construction_realestate_enable_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_enable_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Blog Page Pagination','construction-realestate'),
       'section' => 'construction_realestate_post_settings'
    ));

    $wp_customize->add_setting( 'construction_realestate_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'construction_realestate_sanitize_choices'
    ));
    $wp_customize->add_control( 'construction_realestate_pagination_settings', array(
        'section' => 'construction_realestate_post_settings',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'construction-realestate' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'construction-realestate' ),
            'next-prev' => __( 'Next / Previous', 'construction-realestate' ),
    )));

    $wp_customize->add_setting('construction_realestate_post_block_option',array(
        'default' => 'By Block',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control('construction_realestate_post_block_option',array(
        'type' => 'select',
        'label' => __('Blog Post Shown','construction-realestate'),
        'section' => 'construction_realestate_post_settings',
        'choices' => array(
            'By Block' => __('By Block','construction-realestate'),
            'By Without Block' => __('By Without Block','construction-realestate'),
        ),
	) );

	//Single Post Settings
	$wp_customize->add_section('construction_realestate_single_post_settings', array(
		'title'    => __('Single Post Settings', 'construction-realestate'),
		'panel'    => 'construction_realestate_panel_id',
	));

	$wp_customize->add_setting('construction_realestate_single_post_bradcrumb',array(
		'default' => false,
		'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
	));
	$wp_customize->add_control('construction_realestate_single_post_bradcrumb',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Breadcrumb','construction-realestate'),
		'section' => 'construction_realestate_single_post_settings',
	));

	$wp_customize->add_setting('construction_realestate_single_post_date',array(
		'default' => true,
		'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('construction_realestate_single_post_date',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Date ','construction-realestate'),
		'section' => 'construction_realestate_single_post_settings'
	 ));

	 $wp_customize->add_setting('construction_realestate_single_post_date_icon',array(
		 'default'	=> 'far fa-calendar-alt',
		 'sanitize_callback'	=> 'sanitize_text_field'
	 ));
	 $wp_customize->add_control(new construction_realestate_Icon_Changer(
		 $wp_customize,'construction_realestate_single_post_date_icon',array(
		 'label'	=> __('Single Post Date Icon','construction-realestate'),
		 'transport' => 'refresh',
		 'section'	=> 'construction_realestate_single_post_settings',
		 'type'		=> 'icon'
	 )));

	 $wp_customize->add_setting('construction_realestate_single_post_author',array(
		'default' => true,
		'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('construction_realestate_single_post_author',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Author','construction-realestate'),
		'section' => 'construction_realestate_single_post_settings'
	 ));

	$wp_customize->add_setting('construction_realestate_single_post_author_icon',array(
		 'default'	=> 'fas fa-user',
		 'sanitize_callback'	=> 'sanitize_text_field'
	 ));
	 $wp_customize->add_control(new construction_realestate_Icon_Changer(
	   $wp_customize,'construction_realestate_single_post_author_icon',array(
		 'label'	=> __('Single Post Author Icon','construction-realestate'),
		 'transport' => 'refresh',
		 'section'	=> 'construction_realestate_single_post_settings',
		 'type'		=> 'icon'
	 )));

	 $wp_customize->add_setting('construction_realestate_single_post_comment',array(
		 'default' => true,
		 'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('construction_realestate_single_post_comment',array(
		 'type' => 'checkbox',
		 'label' => __('Enable / Disable Comments','construction-realestate'),
		 'section' => 'construction_realestate_single_post_settings'
	 ));

	  $wp_customize->add_setting('construction_realestate_single_post_comment_icon',array(
		 'default'	=> 'fas fa-comments',
		 'sanitize_callback' => 'sanitize_text_field'
	 ));
	 $wp_customize->add_control(new construction_realestate_Icon_Changer( $wp_customize, 'construction_realestate_single_post_comment_icon', array(
		 'label'	=> __('Single Post Comment Icon','construction-realestate'),
		 'transport' => 'refresh',
		 'section'	=> 'construction_realestate_single_post_settings',
		 'type'		=> 'icon'
	 )));

	$wp_customize->add_setting('construction_realestate_single_post_time',array(
       'default' => false,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
 	));
 	$wp_customize->add_control('construction_realestate_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','construction-realestate'),
       'section' => 'construction_realestate_single_post_settings',
 	));

 	$wp_customize->add_setting('construction_realestate_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new construction_realestate_Icon_Changer(
        $wp_customize,'construction_realestate_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_single_post_featured_image',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_single_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Featured image','construction-realestate'),
       'section' => 'construction_realestate_single_post_settings',
    ));

	$wp_customize->add_setting('construction_realestate_single_post_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_single_post_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tags','construction-realestate'),
       'section' => 'construction_realestate_single_post_settings'
    ));

    $wp_customize->add_setting( 'construction_realestate_single_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'construction_realestate_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','construction-realestate' ),
		'section'     => 'construction_realestate_single_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','construction-realestate'),
		'type'        => 'text',
		'settings'    => 'construction_realestate_single_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'construction_realestate_comment_form_width',array(
		'default' => 100,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_comment_form_width',	array(
		'label' => esc_html__( 'Comment Form Width','construction-realestate' ),
		'section' => 'construction_realestate_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('construction_realestate_title_comment_form',array(
       'default' => __('Leave a Reply', 'construction-realestate'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('construction_realestate_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','construction-realestate'),
       'section' => 'construction_realestate_single_post_settings'
    ));

    $wp_customize->add_setting('construction_realestate_comment_form_button_content',array(
       'default' => __('Post Comment', 'construction-realestate'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('construction_realestate_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','construction-realestate'),
       'section' => 'construction_realestate_single_post_settings'
    ));

	$wp_customize->add_setting('construction_realestate_enable_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_enable_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Pagination','construction-realestate'),
       'section' => 'construction_realestate_single_post_settings'
    ));

	//Social Icons(topbar)
	$wp_customize->add_section('construction_realestate_topbar_header',array(
		'title'	=> __('Social Icon Section','construction-realestate'),
		'description'	=> __('Add Social Link here','construction-realestate'),
		'priority'	=> null,
		'panel' => 'construction_realestate_panel_id',
	));

	$wp_customize->add_setting('construction_realestate_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_facebook_icon',array(
		'label'	=> __('Facebook Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_topbar_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_cont_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('construction_realestate_cont_facebook',array(
		'label'	=> __('Add Facebook link','construction-realestate'),
		'section'	=> 'construction_realestate_topbar_header',
		'setting'	=> 'construction_realestate_cont_facebook',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('construction_realestate_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_twitter_icon',array(
		'label'	=> __('Twitter Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_topbar_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_cont_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('construction_realestate_cont_twitter',array(
		'label'	=> __('Add Twitter link','construction-realestate'),
		'section'	=> 'construction_realestate_topbar_header',
		'setting'	=> 'construction_realestate_cont_twitter',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('construction_realestate_pinterest_icon',array(
		'default'	=> 'fab fa-pinterest',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_pinterest_icon',array(
		'label'	=> __('Pintrest Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_topbar_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_pinterest',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('construction_realestate_pinterest',array(
		'label'	=> __('Add Pintrest link','construction-realestate'),
		'section'	=> 'construction_realestate_topbar_header',
		'setting'	=> 'construction_realestate_pinterest',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('construction_realestate_tumblr_icon',array(
		'default'	=> 'fab fa-tumblr',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_tumblr_icon',array(
		'label'	=> __('Tumblr Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_topbar_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_tumblr',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('construction_realestate_tumblr',array(
		'label'	=> __('Add Tumblr link','construction-realestate'),
		'section'	=> 'construction_realestate_topbar_header',
		'setting'	=> 'construction_realestate_tumblr',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('construction_realestate_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_instagram_icon',array(
		'label'	=> __('Instagram Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_topbar_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_instagram',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('construction_realestate_instagram',array(
		'label'	=> __('Add Instagram link','construction-realestate'),
		'section'	=> 'construction_realestate_topbar_header',
		'setting'	=> 'construction_realestate_instagram',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('construction_realestate_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin-in',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_linkedin_icon',array(
		'label'	=> __('Linkedin Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_topbar_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_linkedin',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('construction_realestate_linkedin',array(
		'label'	=> __('Add Linkedin link','construction-realestate'),
		'section'	=> 'construction_realestate_topbar_header',
		'setting'	=> 'construction_realestate_linkedin',
		'type'		=> 'url'
	));

	//Top Bar(topbar)
	$wp_customize->add_section('construction_realestate_contact',array(
		'title'	=> __('Contact Us','construction-realestate'),
		'description'	=> __('Add contact us here','construction-realestate'),
		'priority'	=> null,
		'panel' => 'construction_realestate_panel_id',
	));

	$wp_customize->add_setting( 'construction_realestate_sticky_header',array(
		'default'=> false,
      	'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ) );
    $wp_customize->add_control('construction_realestate_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Sticky Header','construction-realestate' ),
        'section' => 'construction_realestate_contact'
    ));

    $wp_customize->add_setting('construction_realestate_menu_font_size_option',array(
		'default'=> 15,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize,'construction_realestate_menu_font_size_option',array(
		'label'	=> __('Menu Font Size ','construction-realestate'),
		'section'=> 'construction_realestate_contact',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('construction_realestate_menu_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize,'construction_realestate_menu_padding',array(
		'label'	=> __('Main Menu Padding','construction-realestate'),
		'section'=> 'construction_realestate_contact',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('construction_realestate_text_tranform_menu',array(
        'default' => 'Capitalize',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
    ));
    $wp_customize->add_control('construction_realestate_text_tranform_menu',array(
        'type' => 'select',
        'label' => __('Menu Text Transform','construction-realestate'),
        'section' => 'construction_realestate_contact',
        'choices' => array(
            'Uppercase' => __('Uppercase','construction-realestate'),
            'Lowercase' => __('Lowercase','construction-realestate'),
            'Capitalize' => __('Capitalize','construction-realestate'),
        ),
	) );

    $wp_customize->add_setting('construction_realestate_menu_font_weight',array(
        'default' => '500',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
    ));
    $wp_customize->add_control('construction_realestate_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menu Text Weight','construction-realestate'),
        'section' => 'construction_realestate_contact',
        'choices' => array(
            '100' => __('100','construction-realestate'),
            '200' => __('200','construction-realestate'),
            '300' => __('300','construction-realestate'),
            '400' => __('400','construction-realestate'),
            '500' => __('500','construction-realestate'),
            '600' => __('600','construction-realestate'),
            '700' => __('700','construction-realestate'),
            '800' => __('800','construction-realestate'),
            '900' => __('900','construction-realestate'),
        ),
	) );

    $wp_customize->add_setting('construction_realestate_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_menu_color', array(
		'label'    => __('Menu Color', 'construction-realestate'),
		'section'  => 'construction_realestate_contact',
		'settings' => 'construction_realestate_menu_color',
	)));

	$wp_customize->add_setting('construction_realestate_sub_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_sub_menu_color', array(
		'label'    => __('Submenu Color', 'construction-realestate'),
		'section'  => 'construction_realestate_contact',
		'settings' => 'construction_realestate_sub_menu_color',
	)));

	$wp_customize->add_setting('construction_realestate_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'construction-realestate'),
		'section'  => 'construction_realestate_contact',
		'settings' => 'construction_realestate_menu_hover_color',
	)));

    $wp_customize->add_setting('construction_realestate_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_location_icon',array(
		'label'	=> __('Location Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_location',array(
		'label'	=> __('Enter Street','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_location1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_location1',array(
		'label'	=> __('Enter City','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_time_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_time_icon',array(
		'label'	=> __('Time Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_time',array(
		'label'	=> __('Enter Time','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_time1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_time1',array(
		'label'	=> __('Enter Day','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_phone_icon',array(
		'label'	=> __('Phone Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'construction_realestate_sanitize_phone_number'
	));
	$wp_customize->add_control('construction_realestate_number',array(
		'label'	=> __('Enter Phone No 1.','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_number1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'construction_realestate_sanitize_phone_number'
	));
	$wp_customize->add_control('construction_realestate_number1',array(
		'label'	=> __('Enter Phone No 2.','construction-realestate'),
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_responsive_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_responsive_menu_open_icon',array(
		'label'	=> __('Responsive Open Menu Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_responsive_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_responsive_menu_close_icon',array(
		'label'	=> __('Responsive Close Menu Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_contact',
		'type'		=> 'icon'
	)));

	//home page slider
	$wp_customize->add_section( 'construction_realestate_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'construction-realestate' ),
		'priority'   => null,
		'panel' => 'construction_realestate_panel_id'
	) );

	$wp_customize->add_setting('construction_realestate_slider_hide_show',array(
       	'default' => false,
       	'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
	));
	$wp_customize->add_control('construction_realestate_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide slider','construction-realestate'),
	   	'section' => 'construction_realestate_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'construction_realestate_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'construction_realestate_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'construction_realestate_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'construction-realestate' ),
			'section'  => 'construction_realestate_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('construction_realestate_slider_heading',array(
	'default' => true,
	'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
	));
	$wp_customize->add_control('construction_realestate_slider_heading',array(
	'type' => 'checkbox',
	'label' => __('Enable / Disable Slider Heading','construction-realestate'),
	'section' => 'construction_realestate_slidersettings'
	));

	$wp_customize->add_setting('construction_realestate_slider_text',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_slider_text',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Slider Text','construction-realestate'),
       'section' => 'construction_realestate_slidersettings'
    ));

	$wp_customize->add_setting('construction_realestate_show_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_show_slider_button',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Button','construction-realestate'),
       'section' => 'construction_realestate_slidersettings'
    ));

	$wp_customize->add_setting('construction_realestate_enable_slider_overlay',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_enable_slider_overlay',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Slider Image Overlay','construction-realestate'),
       'section' => 'construction_realestate_slidersettings'
    ));

    $wp_customize->add_setting('construction_realestate_slider_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_slider_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'construction-realestate'),
		'section'  => 'construction_realestate_slidersettings',
		'settings' => 'construction_realestate_slider_overlay_color',
	)));

	$wp_customize->add_setting('construction_realestate_slider_previous_icon',array(
		'default'	=> 'fas fa-chevron-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_slider_previous_icon',array(
		'label'	=> __('Slider Previous Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_slidersettings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_slider_next_icon',array(
		'default'	=> 'fas fa-chevron-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_slider_next_icon',array(
		'label'	=> __('Slider Next Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_slidersettings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_slider_button_text',array(
		'default'	=>  __('KNOW MORE', 'construction-realestate'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_slider_button_text',array(
		'label'	=> __('Slider Button Text','construction-realestate'),
		'section'	=> 'construction_realestate_slidersettings',
		'type'		=> 'text'
	));

	//content layout
    $wp_customize->add_setting('construction_realestate_slider_content_layout',array(
    'default' => 'Center',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control('construction_realestate_slider_content_layout',array(
        'type' => 'radio',
        'label' => __('Slider Content Layout','construction-realestate'),
        'section' => 'construction_realestate_slidersettings',
        'choices' => array(
            'Center' => __('Center','construction-realestate'),
            'Left' => __('Left','construction-realestate'),
            'Right' => __('Right','construction-realestate'),
        ),
	) );

	$wp_customize->add_setting('construction_realestate_option_slider_height',array(
		'default'=> __('550','construction-realestate'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_option_slider_height',array(
		'label'	=> __('Slider Height','construction-realestate'),
		'section'=> 'construction_realestate_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_slider_content_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize,  'construction_realestate_slider_content_top_padding',array(
		'label'	=> __('Top Bottom Slider Content Spacing','construction-realestate'),
		'section'=> 'construction_realestate_slidersettings',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('construction_realestate_slider_content_left_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize,  'construction_realestate_slider_content_left_padding',array(
		'label'	=> __('Left Right Slider Content Spacing','construction-realestate'),
		'section'=> 'construction_realestate_slidersettings',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	//Slider excerpt
	$wp_customize->add_setting( 'construction_realestate_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'construction_realestate_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Content Limit','construction-realestate' ),
		'section'     => 'construction_realestate_slidersettings',
		'type'        => 'number',
		'settings'    => 'construction_realestate_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('construction_realestate_slider_opacity',array(
      'default'              => 0.7,
      'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control( 'construction_realestate_slider_opacity', array(
	'label'       => esc_html__( 'Slider Image Opacity','construction-realestate' ),
	'section'     => 'construction_realestate_slidersettings',
	'type'        => 'select',
	'settings'    => 'construction_realestate_slider_opacity',
	'choices' => array(
		'0' =>  esc_attr('0','construction-realestate'),
		'0.1' =>  esc_attr('0.1','construction-realestate'),
		'0.2' =>  esc_attr('0.2','construction-realestate'),
		'0.3' =>  esc_attr('0.3','construction-realestate'),
		'0.4' =>  esc_attr('0.4','construction-realestate'),
		'0.5' =>  esc_attr('0.5','construction-realestate'),
		'0.6' =>  esc_attr('0.6','construction-realestate'),
		'0.7' =>  esc_attr('0.7','construction-realestate'),
		'0.8' =>  esc_attr('0.8','construction-realestate'),
		'0.9' =>  esc_attr('0.9','construction-realestate')
	),
	));

	//About
	$wp_customize->add_section('construction_realestate_about',array(
		'title'	=> __('About Us Section','construction-realestate'),
		'description'	=> __('Add About Us sections below.','construction-realestate'),
		'panel' => 'construction_realestate_panel_id',
	));

	$wp_customize->add_setting('construction_realestate_show_about_section',array(
	 'default' => true,
	 'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
	));
	$wp_customize->add_control('construction_realestate_show_about_section',array(
	 'type' => 'checkbox',
	 'label' => __('Show / Hide About Us Section','construction-realestate'),
	 'section' => 'construction_realestate_about'
	));

	$wp_customize->add_setting('construction_realestate_sec_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_sec_title',array(
		'label'	=> __('Title','construction-realestate'),
		'section'	=> 'construction_realestate_about',
		'type'		=> 'text'
	));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$posts[]='Select';
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('construction_realestate_about_post_setting',array(
		'default' =>'select post',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	));
	$wp_customize->add_control('construction_realestate_about_post_setting',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','construction-realestate'),
		'section' => 'construction_realestate_about',
	));

	//About excerpt
	$wp_customize->add_setting( 'construction_realestate_about_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'construction_realestate_about_excerpt_number', array(
		'label'       => esc_html__( 'About Content Limit','construction-realestate' ),
		'section'     => 'construction_realestate_about',
		'type'        => 'number',
		'settings'    => 'construction_realestate_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//footer text
	$wp_customize->add_section('construction_realestate_footer_section',array(
		'title'	=> __('Footer Text','construction-realestate'),
		'panel' => 'construction_realestate_panel_id'
	));

	$wp_customize->add_setting('construction_realestate_footer_bg_color', array(
		'default'           => '#20262f',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'construction-realestate'),
		'section'  => 'construction_realestate_footer_section',
	)));

	$wp_customize->add_setting('construction_realestate_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'construction_realestate_footer_bg_image',array(
        'label' => __('Footer Background Image','construction-realestate'),
        'section' => 'construction_realestate_footer_section'
	)));

	$wp_customize->add_setting('footer_widget_areas',array(
        'default'           => 4,
        'sanitize_callback' => 'construction_realestate_sanitize_choices',
    ));
    $wp_customize->add_control('footer_widget_areas',array(
        'type'        => 'radio',
        'label'       => __('Footer widget area', 'construction-realestate'),
        'section'     => 'construction_realestate_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'construction-realestate'),
        'choices' => array(
            '1'     => __('One', 'construction-realestate'),
            '2'     => __('Two', 'construction-realestate'),
            '3'     => __('Three', 'construction-realestate'),
            '4'     => __('Four', 'construction-realestate')
        ),
    ));

    $wp_customize->add_setting('construction_realestate_hide_show_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
	));
	$wp_customize->add_control('construction_realestate_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Back To Top','construction-realestate'),
      	'section' => 'construction_realestate_footer_section',
	));

	$wp_customize->add_setting('construction_realestate_back_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Icon_Changer(
        $wp_customize,'construction_realestate_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','construction-realestate'),
		'transport' => 'refresh',
		'section'	=> 'construction_realestate_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('construction_realestate_scroll_icon_font_size',array(
		'default'=> 22,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','construction-realestate'),
		'section'=> 'construction_realestate_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('construction_realestate_footer_options',array(
        'default' => 'Right align',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control('construction_realestate_footer_options',array(
        'type' => 'radio',
        'label' => __('Back To Top','construction-realestate'),
        'section' => 'construction_realestate_footer_section',
        'choices' => array(
            'Left align' => __('Left align','construction-realestate'),
            'Right align' => __('Right align','construction-realestate'),
            'Center align' => __('Center align','construction-realestate'),
        ),
	) );

	$wp_customize->add_setting( 'construction_realestate_top_bottom_scroll_padding',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_top_bottom_scroll_padding',	array(
		'label' => esc_html__( 'Top Bottom Scroll Padding (px)','construction-realestate' ),
		'section' => 'construction_realestate_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'construction_realestate_left_right_scroll_padding',array(
		'default' => 17,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_left_right_scroll_padding',	array(
		'label' => esc_html__( 'Left Right Scroll Padding (px)','construction-realestate' ),
		'section' => 'construction_realestate_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'construction_realestate_back_to_top_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_back_to_top_border_radius', array(
		'label' => esc_html__( 'Back to Top Border Radius (px)','construction-realestate' ),
		'section' => 'construction_realestate_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('construction_realestate_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_footer_copy',array(
		'label'	=> __('Copyright Text','construction-realestate'),
		'section'	=> 'construction_realestate_footer_section',
		'description'	=> __('Add some text for footer like copyright etc.','construction-realestate'),
		'type'		=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_footer_text_align',array(
        'default' => 'center',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control('construction_realestate_footer_text_align',array(
        'type' => 'radio',
        'label' => __('Copyright Text Alignment ','construction-realestate'),
        'section' => 'construction_realestate_footer_section',
        'choices' => array(
            'left' => __('Left Align','construction-realestate'),
            'right' => __('Right Align','construction-realestate'),
            'center' => __('Center Align','construction-realestate'),
        ),
	) );

	$wp_customize->add_setting('construction_realestate_copyright_text_font_size',array(
		'default'=> 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_copyright_text_font_size',array(
		'label' => esc_html__( 'Copyright Font Size (px)','construction-realestate' ),
		'section'=> 'construction_realestate_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting( 'construction_realestate_footer_text_padding',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_footer_text_padding',	array(
		'label' => esc_html__( 'Copyright Text Padding (px)','construction-realestate' ),
		'section' => 'construction_realestate_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('construction_realestate_copyright_text_background', array(
		'default'           => '#0075b5',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_copyright_text_background', array(
		'label'    => __('Copyright background Color', 'construction-realestate'),
		'section'  => 'construction_realestate_footer_section',
	)));

	//Responsive Media Settings
	$wp_customize->add_section('construction_realestate_responsive_media',array(
		'title'	=> __('Responsive Media','construction-realestate'),
		'panel' => 'construction_realestate_panel_id',
	));

	// site toggle button color
	$wp_customize->add_setting('construction_realestate_toggle_button_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'construction_realestate_toggle_button_color', array(
		'label'    => __('Toggle Button Color', 'construction-realestate'),
		'section'  => 'construction_realestate_responsive_media',
		'settings' => 'construction_realestate_toggle_button_color',
	)));

    $wp_customize->add_setting('construction_realestate_display_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_display_slider',array(
       'type' => 'checkbox',
       'label' => __('Display Slider','construction-realestate'),
       'section' => 'construction_realestate_responsive_media'
    ));

    $wp_customize->add_setting('construction_realestate_display_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_display_slider_button',array(
       'type' => 'checkbox',
       'label' => __('Display Slider Button','construction-realestate'),
       'section' => 'construction_realestate_responsive_media'
    ));

	$wp_customize->add_setting('construction_realestate_display_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_display_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Display Sidebar','construction-realestate'),
       'section' => 'construction_realestate_responsive_media'
    ));

    $wp_customize->add_setting('construction_realestate_display_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_display_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Display Back To Top','construction-realestate'),
       'section' => 'construction_realestate_responsive_media'
    ));

    $wp_customize->add_setting('construction_realestate_display_fixed_header',array(
       'default' => false,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_display_fixed_header',array(
       'type' => 'checkbox',
       'label' => __('Display Sticky Header','construction-realestate'),
       'section' => 'construction_realestate_responsive_media'
    ));

    $wp_customize->add_setting('construction_realestate_display_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_display_preloader',array(
       'type' => 'checkbox',
       'label' => __('Display Preloader','construction-realestate'),
       'section' => 'construction_realestate_responsive_media'
    ));

	//404 Page Setting
	$wp_customize->add_section('construction_realestate_page_not_found',array(
		'title'	=> __('404 Page Not Found / No Result','construction-realestate'),
		'panel' => 'construction_realestate_panel_id',
	));

	$wp_customize->add_setting('construction_realestate_page_not_found_heading',array(
		'default'=> __('404 Not Found', 'construction-realestate'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_page_not_found_heading',array(
		'label'	=> __('404 Heading','construction-realestate'),
		'section'=> 'construction_realestate_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_page_not_found_text',array(
		'default'=> __('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.', 'construction-realestate'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_page_not_found_text',array(
		'label'	=> __('404 Content','construction-realestate'),
		'section'=> 'construction_realestate_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_page_not_found_button',array(
		'default'=> __('Back to Home Page', 'construction-realestate'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_page_not_found_button',array(
		'label'	=> __('404 Button','construction-realestate'),
		'section'=> 'construction_realestate_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_no_search_result_heading',array(
		'default'=> __('Nothing Found', 'construction-realestate'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_no_search_result_heading',array(
		'label'	=> __('No Search Results Heading','construction-realestate'),
		'description'=>__('The search page heading display when no results are found.','construction-realestate'),
		'section'=> 'construction_realestate_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('construction_realestate_no_search_result_text',array(
		'default'=>  __('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'construction-realestate'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_no_search_result_text',array(
		'label'	=> __('No Search Results Text','construction-realestate'),
		'description'=>__('The search page text display when no results are found.','construction-realestate'),
		'section'=> 'construction_realestate_page_not_found',
		'type'=> 'text'
	));

	//Woocommerce Section
	$wp_customize->add_section( 'construction_realestate_woocommerce_section' , array(
    	'title'      => __( 'Woocommerce Settings', 'construction-realestate' ),
    	'description'=>__('The below settings are apply on woocommerce pages.','construction-realestate'),
		'priority'   => null,
		'panel' => 'construction_realestate_panel_id'
	) );

	// Product Columns
	$wp_customize->add_setting( 'construction_realestate_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'construction_realestate_per_columns', array(
		'label'    => __( 'Product per columns', 'construction-realestate' ),
		'section'  => 'construction_realestate_woocommerce_section',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('construction_realestate_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_realestate_product_per_page',array(
		'label'	=> __('Product per page','construction-realestate'),
		'section'	=> 'construction_realestate_woocommerce_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('construction_realestate_shop_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_shop_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable shop page sidebar','construction-realestate'),
       'section' => 'construction_realestate_woocommerce_section',
    ));

    $wp_customize->add_setting('construction_realestate_product_page_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_product_page_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product page sidebar','construction-realestate'),
       'section' => 'construction_realestate_woocommerce_section',
    ));

    $wp_customize->add_setting('construction_realestate_related_product_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_related_product_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','construction-realestate'),
       'section' => 'construction_realestate_woocommerce_section',
    ));

    $wp_customize->add_setting( 'construction_realestate_woo_product_sale_border_radius',array(
		'default' => 100,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_woo_product_sale_border_radius', array(
        'label'  => __('Woocommerce Product Sale Border Radius','construction-realestate'),
        'section'  => 'construction_realestate_woocommerce_section',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    )));

	$wp_customize->add_setting('construction_realestate_wooproduct_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_wooproduct_sale_font_size',array(
		'label'	=> __('Woocommerce Product Sale Font Size','construction-realestate'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'construction_realestate_woocommerce_section',
	)));

    $wp_customize->add_setting('construction_realestate_woo_product_sale_top_bottom_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_woo_product_sale_top_bottom_padding',array(
		'label'	=> __('Woocommerce Product Sale Top Bottom Padding ','construction-realestate'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'construction_realestate_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('construction_realestate_woo_product_sale_left_right_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_woo_product_sale_left_right_padding',array(
		'label'	=> __('Woocommerce Product Sale Left Right Padding','construction-realestate'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'construction_realestate_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('construction_realestate_woo_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'construction_realestate_sanitize_choices'
	));
	$wp_customize->add_control('construction_realestate_woo_product_sale_position',array(
        'type' => 'select',
        'label' => __('Woocommerce Product Sale Position','construction-realestate'),
        'section' => 'construction_realestate_woocommerce_section',
        'choices' => array(
            'Right' => __('Right','construction-realestate'),
            'Left' => __('Left','construction-realestate'),
        ),
	));

	$wp_customize->add_setting( 'construction_realestate_woocommerce_button_padding_top',array(
		'default' => 13,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','construction-realestate' ),
		'section' => 'construction_realestate_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'construction_realestate_woocommerce_button_padding_right',array(
		'default' => 13,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_woocommerce_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','construction-realestate' ),
		'section' => 'construction_realestate_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'construction_realestate_woocommerce_button_border_radius',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','construction-realestate' ),
		'section' => 'construction_realestate_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

    $wp_customize->add_setting('construction_realestate_woocommerce_product_border_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_realestate_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_realestate_woocommerce_product_border_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','construction-realestate'),
       'section' => 'construction_realestate_woocommerce_section',
    ));

	$wp_customize->add_setting( 'construction_realestate_woocommerce_product_padding_top',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_woocommerce_product_padding_top',	array(
		'label' => esc_html__( 'Product Top Bottom Padding (px)','construction-realestate' ),
		'section' => 'construction_realestate_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'construction_realestate_woocommerce_product_padding_right',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_woocommerce_product_padding_right',	array(
		'label' => esc_html__( 'Product Right Left Padding (px)','construction-realestate' ),
		'section' => 'construction_realestate_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'construction_realestate_woocommerce_product_border_radius',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius (px)','construction-realestate' ),
		'section' => 'construction_realestate_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'construction_realestate_woocommerce_product_box_shadow',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'construction_realestate_sanitize_integer'
	));
	$wp_customize->add_control( new Construction_Realestate_Custom_Control( $wp_customize, 'construction_realestate_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow (px)','construction-realestate' ),
		'section' => 'construction_realestate_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('construction_realestate_wooproducts_nav',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'construction_realestate_sanitize_choices'
    ));
    $wp_customize->add_control('construction_realestate_wooproducts_nav',array(
       'type' => 'select',
       'label' => __('Shop Page Products Navigation','construction-realestate'),
       'choices' => array(
            'Yes' => __('Yes','construction-realestate'),
            'No' => __('No','construction-realestate'),
        ),
       'section' => 'construction_realestate_woocommerce_section',
    ));

}

add_action( 'customize_register', 'construction_realestate_customize_register' );
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Construction_Realestate_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Construction_Realestate_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new Construction_Realestate_Customize_Section_Pro($manager,
			'construction_realestate_example_1',
			array(
			'title'    => esc_html__( 'Real Estate Pro', 'construction-realestate' ),
			'pro_text' => esc_html__( 'Go Pro', 'construction-realestate' ),
			'pro_url'  => esc_url('https://www.buywptemplates.com/themes/premium-construction-real-estate-wordpress-theme/'),
			'priority'   => 1
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'construction-realestate-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'construction-realestate-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}

	//Footer widget areas
	function construction_realestate_sanitize_choices( $input ) {
	    $valid = array(
	        '1'     => __('One', 'construction-realestate'),
	        '2'     => __('Two', 'construction-realestate'),
	        '3'     => __('Three', 'construction-realestate'),
	        '4'     => __('Four', 'construction-realestate')
	    );
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
}

// Doing this customizer thang!
Construction_Realestate_Customize::get_instance();
