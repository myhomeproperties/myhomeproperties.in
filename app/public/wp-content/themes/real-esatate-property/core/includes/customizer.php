<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'real_esatate_property_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'real-esatate-property' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'real_esatate_property_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'real-esatate-property' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'real-esatate-property' ),
			'off' => esc_html__( 'Disable', 'real-esatate-property' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'real_esatate_property_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'real-esatate-property' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'real-esatate-property' ),
			'off' => esc_html__( 'Disable', 'real-esatate-property' ),
		],
	] );

	//FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'real_esatate_property_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'real-esatate-property' ),
	) );

	Kirki::add_section( 'real_esatate_property_font_style_section', array(
		'title'      => esc_attr__( 'Typography Option',  'real-esatate-property' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_all_headings_typography',
		'section'     => 'real_esatate_property_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'real_esatate_property_all_headings_typography',
		'label'       => esc_attr__( 'Heading Typography',  'real-esatate-property' ),
		'description' => esc_attr__( 'Select the typography options for your heading.',  'real-esatate-property' ),
		'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).',  'real-esatate-property' ),
		'section'     => 'real_esatate_property_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_body_content_typography',
		'section'     => 'real_esatate_property_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'real_esatate_property_body_content_typography',
		'label'       => esc_attr__( 'Content Typography',  'real-esatate-property' ),
		'description' => esc_attr__( 'Select the typography options for your heading.',  'real-esatate-property' ),
		'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).',  'real-esatate-property' ),
		'section'     => 'real_esatate_property_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

	// PANEL

	Kirki::add_panel( 'real_esatate_property_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'real-esatate-property' ),
	) );

	// Scroll Top

	Kirki::add_section( 'real_esatate_property_section_scroll', array(
	    'title'          => esc_html__( 'Additional Settings', 'real-esatate-property' ),
	    'description'    => esc_html__( 'Scroll To Top', 'real-esatate-property' ),
	    'panel'          => 'real_esatate_property_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'real_esatate_property_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_section_scroll',
		'default'     => '1',
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_real_esatate_property',
		'label'       => esc_html__( 'Menus Text Transform', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_section_scroll',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'real-esatate-property' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'real-esatate-property' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'real-esatate-property' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'real-esatate-property' ),

		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'real_esatate_property_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_section_scroll',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	// POST SECTION

	Kirki::add_section( 'real_esatate_property_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'real-esatate-property' ),
	    'description'    => esc_html__( 'Here you can get different post settings', 'real-esatate-property' ),
	    'panel'          => 'real_esatate_property_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_enable_post_heading',
		'section'     => 'real_esatate_property_section_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Post Settings.', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'real_esatate_property_blog_admin_enable',
		'label'       => esc_html__( 'Post Author Enable / Disable Button', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'real-esatate-property' ),
			'off' => esc_html__( 'Disable', 'real-esatate-property' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'real_esatate_property_blog_comment_enable',
		'label'       => esc_html__( 'Post Comment Enable / Disable Button', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'real-esatate-property' ),
			'off' => esc_html__( 'Disable', 'real-esatate-property' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_excerpt_post_heading',
		'section'     => 'real_esatate_property_section_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Text.', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'real_esatate_property_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	// HEADER SECTION

	Kirki::add_section( 'real_esatate_property_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'real-esatate-property' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'real-esatate-property' ),
	    'panel'          => 'real_esatate_property_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_email_address_heading',
		'section'     => 'real_esatate_property_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Email Address', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'real_esatate_property_header_email_address',
		'section'  => 'real_esatate_property_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_phone_number_heading',
		'section'     => 'real_esatate_property_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Number', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'real_esatate_property_header_phone_number',
		'section'  => 'real_esatate_property_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_enable_search',
		'section'     => 'real_esatate_property_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'real_esatate_property_search_box_enable',
		'section'     => 'real_esatate_property_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'real-esatate-property' ),
			'off' => esc_html__( 'Disable', 'real-esatate-property' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_header_property_btn_heading',
		'section'     => 'real_esatate_property_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Property Button', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Text', 'real-esatate-property' ),
		'settings' => 'real_esatate_property_header_property_btn_text',
		'section'  => 'real_esatate_property_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'link',
		'label'       => esc_html__( 'Link', 'real-esatate-property' ),
		'settings' => 'real_esatate_property_header_property_btn_link',
		'section'  => 'real_esatate_property_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_enable_socail_link',
		'section'     => 'real_esatate_property_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'real_esatate_property_section_header',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'real-esatate-property' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'real-esatate-property' ),
		'settings'     => 'real_esatate_property_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'real-esatate-property' ),
				'description' => esc_html__( 'Add the social media text ex: Facebook.', 'real-esatate-property' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'real-esatate-property' ),
				'description' => esc_html__( 'Add the social icon url here.', 'real-esatate-property' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'real_esatate_property_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'real-esatate-property' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'real-esatate-property' ),
        'panel'          => 'real_esatate_property_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_enable_heading',
		'section'     => 'real_esatate_property_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'real_esatate_property_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_blog_slide_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'real-esatate-property' ),
			'off' => esc_html__( 'Disable', 'real-esatate-property' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'real_esatate_property_slide_title_enable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'real-esatate-property' ),
			'off' => esc_html__( 'Disable', 'real-esatate-property' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'real_esatate_property_slide_text_enable_disable',
		'label'       => esc_html__( 'Slide Text Enable / Disable', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'real-esatate-property' ),
			'off' => esc_html__( 'Disable', 'real-esatate-property' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'real_esatate_property_slide_button_enable_disable',
		'label'       => esc_html__( 'Slide Button Enable / Disable', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'real-esatate-property' ),
			'off' => esc_html__( 'Disable', 'real-esatate-property' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_slider_heading',
		'section'     => 'real_esatate_property_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'real_esatate_property_blog_slide_number',
		'label'       => esc_html__( 'Slide Content Range', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_blog_slide_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'real_esatate_property_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'real-esatate-property' ),
		'priority'    => 10,
		'choices'     => real_esatate_property_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_slider_text_heading_4',
		'section'     => 'real_esatate_property_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Slider Text', 'real-esatate-property' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'real_esatate_property_excerpt_number',
		'label'       => esc_html__( 'Number of text to show', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_blog_slide_section',
		'default'     => 20,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'real_esatate_property_slider_content_alignment',
		'label'       => esc_html__( 'Slider Content Alignment', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_blog_slide_section',
		'default'     => 'RIGHT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'real-esatate-property' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'real-esatate-property' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'real-esatate-property' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'real-esatate-property' ),

		],
	] );

	// PROPERTIES SECTION

	Kirki::add_section( 'real_esatate_property_popular_section', array(
        'title'          => esc_html__( 'Properties Settings', 'real-esatate-property' ),
        'description'    => esc_html__( 'You have to select category to show properties.', 'real-esatate-property' ),
        'panel'          => 'real_esatate_property_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_about_enable_heading',
		'section'     => 'real_esatate_property_popular_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Properties', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'real_esatate_property_your_properties_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_popular_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'real-esatate-property' ),
			'off' => esc_html__( 'Disable', 'real-esatate-property' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_properties_heading',
		'section'     => 'real_esatate_property_popular_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Properties Section', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Section Title', 'real-esatate-property' ),
		'settings' => 'real_esatate_property_section_title',
		'section'  => 'real_esatate_property_popular_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Section Text', 'real-esatate-property' ),
		'settings' => 'real_esatate_property_section_text',
		'section'  => 'real_esatate_property_popular_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Section Button Text', 'real-esatate-property' ),
		'settings' => 'real_esatate_property_section_btn_text',
		'section'  => 'real_esatate_property_popular_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'link',
		'label'       => esc_html__( 'Section Button Text', 'real-esatate-property' ),
		'settings' => 'real_esatate_property_section_btn_link',
		'section'  => 'real_esatate_property_popular_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'real_esatate_property_your_properties_number',
		'label'       => esc_html__( 'Number of properties to show', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_popular_section',
		'default'     => '',
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'real_esatate_property_your_properties_category',
		'label'       => esc_html__( 'Select the category to show properties', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_popular_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'real-esatate-property' ),
		'priority'    => 10,
		'choices'     => real_esatate_property_get_categories_select(),
	] );

	// FOOTER SECTION

	Kirki::add_section( 'real_esatate_property_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'real-esatate-property' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'real-esatate-property' ),
        'panel'          => 'real_esatate_property_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_footer_text_heading',
		'section'     => 'real_esatate_property_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'real_esatate_property_footer_text',
		'section'  => 'real_esatate_property_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'real_esatate_property_footer_enable_heading',
		'section'     => 'real_esatate_property_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'real-esatate-property' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'real_esatate_property_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'real-esatate-property' ),
		'section'     => 'real_esatate_property_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'real-esatate-property' ),
			'off' => esc_html__( 'Disable', 'real-esatate-property' ),
		],
	] );
}
