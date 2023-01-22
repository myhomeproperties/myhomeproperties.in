<?php
	add_action( 'wp_enqueue_scripts', 'vw_real_estate_enqueue_styles' );
	function vw_real_estate_enqueue_styles() {
    	$parent_style = 'vw-construction-estate-basic-style'; // Style handle of parent theme.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );		
		wp_enqueue_style( 'vw-real-estate-style', get_stylesheet_uri(), array( $parent_style ) );
		require get_parent_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'vw-real-estate-style',$vw_construction_estate_custom_css );
		require get_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'vw-real-estate-style',$vw_construction_estate_custom_css );
		wp_enqueue_style( 'vw-real-estate-block-style', get_theme_file_uri('/css/blocks.css') );
		wp_enqueue_style( 'vw-real-estate-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
	}

	add_action( 'init', 'vw_real_estate_remove_parent_function');
	function vw_real_estate_remove_parent_function() {
		remove_action( 'admin_notices', 'vw_construction_estate_activation_notice' );
		remove_action( 'wp_enqueue_scripts', 'vw_construction_estate_header_style' );
		remove_action( 'admin_menu', 'vw_construction_estate_gettingstarted' );
		unregister_sidebar( 'social-icon' );
	}

	function vw_real_estate_customize_register() {
		global $wp_customize;
		$wp_customize->remove_setting( 'vw_construction_estate_topbar_padding_top_bottom' );
		$wp_customize->remove_control( 'vw_construction_estate_topbar_padding_top_bottom' );
		$wp_customize->remove_setting( 'vw_construction_estate_topbar_hide_show' );
		$wp_customize->remove_control( 'vw_construction_estate_topbar_hide_show' );
		$wp_customize->remove_setting( 'vw_construction_estate_call' );
		$wp_customize->remove_control( 'vw_construction_estate_call' );
		$wp_customize->remove_setting( 'vw_construction_estate_contact_icon' );
		$wp_customize->remove_control( 'vw_construction_estate_contact_icon' );
		$wp_customize->remove_setting( 'vw_construction_estate_time' );
		$wp_customize->remove_control( 'vw_construction_estate_time' );
		$wp_customize->remove_setting( 'vw_construction_estate_time1' );
		$wp_customize->remove_control( 'vw_construction_estate_time1' );
		$wp_customize->remove_setting( 'vw_construction_estate_sticky_header' );
		$wp_customize->remove_control( 'vw_construction_estate_sticky_header' );
		$wp_customize->remove_setting( 'vw_construction_estate_sticky_header_padding' );
		$wp_customize->remove_control( 'vw_construction_estate_sticky_header_padding' );
		$wp_customize->remove_setting( 'vw_construction_estate_stickyheader_hide_show' );
		$wp_customize->remove_control( 'vw_construction_estate_stickyheader_hide_show' );
		$wp_customize->remove_setting( 'vw_construction_estate_resp_topbar_hide_show' );
		$wp_customize->remove_control( 'vw_construction_estate_resp_topbar_hide_show' );
		$wp_customize->remove_setting( 'vw_construction_estate_phone_icon' );
		$wp_customize->remove_control( 'vw_construction_estate_phone_icon' );
		$wp_customize->remove_setting( 'vw_construction_estate_slider_opacity_color' );
		$wp_customize->remove_control( 'vw_construction_estate_slider_opacity_color' );
		$wp_customize->remove_section( 'vw_construction_estate_social_links' );
	}
	add_action( 'customize_register', 'vw_real_estate_customize_register', 11 );

	function vw_real_estate_header_style() {
		if ( get_header_image() ) :
		$custom_css = "
	        .page-template-custom-home-page #header, #header{
				background-image:url('".esc_url(get_header_image())."');
				background-position: center top;
				background-size: 100%;
			}";
		   	wp_add_inline_style( 'vw-real-estate-style', $custom_css );
		endif;
	}
	add_action( 'wp_enqueue_scripts', 'vw_real_estate_header_style' );

	function vw_real_estate_scripts() {	
		wp_enqueue_script( 'Custom JS ', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'vw_real_estate_scripts' );

	if ( ! defined( 'VW_CONSTRUCTION_ESTATE_GETSTARTED_URL' ) ) {
	define( 'VW_CONSTRUCTION_ESTATE_GETSTARTED_URL', 'themes.php?page=vw_real_estate_guide');
}
	
	function vw_real_estate_customizer ( $wp_customize ) {

		//Category section
		$wp_customize->add_section( 'vw_real_estate_category_section' , array(
	    	'title'      => __( 'Category Section', 'vw-real-estate' ),
			'priority'   => null,
			'panel' => 'vw_construction_estate_homepage_panel'
		) );

		$wp_customize->add_setting('vw_real_estate_section_text',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_real_estate_section_text',array(
			'label'	=> __('Add Section Text','vw-real-estate'),
			'input_attrs' => array(
	            'placeholder' => __( 'CATEGORIES', 'vw-real-estate' ),
	        ),
			'section'=> 'vw_real_estate_category_section',
			'type'=> 'text'
		));

		$wp_customize->add_setting('vw_real_estate_section_title',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_real_estate_section_title',array(
			'label'	=> __('Add Section Title','vw-real-estate'),
			'input_attrs' => array(
	            'placeholder' => __( 'Browse By Category', 'vw-real-estate' ),
	        ),
			'section'=> 'vw_real_estate_category_section',
			'type'=> 'text'
		));

		$categories = get_categories();
		$cat_post = array();
		$cat_post[]= 'select';
		$i = 0;	
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cat_post[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('vw_real_estate_category',array(
			'default'	=> 'select',
			'sanitize_callback' => 'vw_real_estate_sanitize_select',
		));
		$wp_customize->add_control('vw_real_estate_category',array(
			'type'    => 'select',
			'choices' => $cat_post,
			'label' => __('Select category to display category section on homepage','vw-real-estate'),
			'description' => __('Image Size (340 x 255)','vw-real-estate'),
			'section' => 'vw_real_estate_category_section',
		));
	}
	add_action( 'customize_register', 'vw_real_estate_customizer' );

	define('VW_REAL_ESTATE_FREE_THEME_DOC',__('https://www.vwthemesdemo.com/docs/free-vw-real-estate/','vw-real-estate'));
	define('VW_REAL_ESTATE_SUPPORT',__('https://wordpress.org/support/theme/vw-real-estate/','vw-real-estate'));
	define('VW_REAL_ESTATE_REVIEW',__('https://wordpress.org/support/theme/vw-real-estate/reviews','vw-real-estate'));
	define('VW_REAL_ESTATE_BUY_NOW',__('https://www.vwthemes.com/themes/real-estate-wordpress-theme/','vw-real-estate'));
	define('VW_REAL_ESTATE_LIVE_DEMO',__('https://www.vwthemes.net/vw-real-estate-pro/','vw-real-estate'));
	define('VW_REAL_ESTATE_PRO_DOC',__('https://www.vwthemesdemo.com/docs/vw-real-estate-pro/','vw-real-estate'));
	define('VW_REAL_ESTATE_FAQ',__('https://www.vwthemes.com/faqs/','vw-real-estate'));
	define('VW_REAL_ESTATE_CONTACT',__('https://www.vwthemes.com/contact/','vw-real-estate'));
	define('VW_REAL_ESTATE_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','vw-real-estate'));
	define('VW_REAL_ESTATE_CREDIT',__('https://www.vwthemes.com/themes/free-real-estate-wordpress-theme/','vw-real-estate'));

	if ( ! function_exists( 'vw_real_estate_credit' ) ) {
		function vw_real_estate_credit(){
			echo "<a href=".esc_url(VW_REAL_ESTATE_CREDIT)." target='_blank'>". esc_html__('Real Estate WordPress Theme','vw-real-estate') ."</a>";
		}
	}

	/**
	 * Enqueue block editor style
	 */
	function vw_real_estate_block_editor_styles() {
	    wp_enqueue_style( 'vw-real-estate-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
	}
	add_action( 'enqueue_block_editor_assets', 'vw_real_estate_block_editor_styles' );

	function vw_real_estate_sanitize_choices( $input, $setting ) {
	    global $wp_customize; 
	    $control = $wp_customize->get_control( $setting->id ); 
	    if ( array_key_exists( $input, $control->choices ) ) {
	        return $input;
	    } else {
	        return $setting->default;
	    }
	}

	function vw_real_estate_sanitize_select( $input, $setting ){      
	    $input = sanitize_key($input);
	    $choices = $setting->manager->get_control( $setting->id )->choices;
	    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );      
	}

	function vw_real_estate_sanitize_dropdown_pages( $page_id, $setting ) {
	  	$page_id = absint( $page_id );
	  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

// Customizer Pro
load_template( ABSPATH . WPINC . '/class-wp-customize-section.php' );

class VW_Real_Estate_Customize_Section_Pro extends WP_Customize_Section {
	public $type = 'vw-real-estate';
	public $pro_text = '';
	public $pro_url = '';
	public function json() {
		$json = parent::json();
		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		return $json;
	}
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

final class VW_Construction_Estate_Customize {
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}
		return $instance;
	}
	private function __construct() {}
	private function setup_actions() {
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}
	public function sections( $manager ) {
		// Register custom section types.
		$manager->register_section_type( 'VW_Real_Estate_Customize_Section_Pro' );
		// Register sections.
		$manager->add_section( new VW_Real_Estate_Customize_Section_Pro( $manager, 'vw_real_estate',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW REAL ESTATE', 'vw-real-estate' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-real-estate' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/real-estate-wordpress-theme/'),
		) ) );

		// Register sections.
		$manager->add_section(new VW_Real_Estate_Customize_Section_Pro($manager,'vw_real_estate2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-real-estate' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-real-estate' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-vw-real-estate/'),
		)));
	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'vw-real-estate-customize-controls', get_stylesheet_directory_uri() . '/js/customize-controls-child.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'vw-real-estate-customize-controls', get_stylesheet_directory_uri() . '/css/customize-controls-child.css' );
	}
}
VW_Construction_Estate_Customize::get_instance();

/* Theme Setup */
if ( ! function_exists( 'vw_real_estate_setup' ) ) :
 
function vw_real_estate_setup() {
	$GLOBALS['content_width'] = apply_filters( 'vw_real_estate_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', vw_construction_estate_font_url() ) );

	// Theme Activation Notice
	global $pagenow;

	if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
		add_action('admin_notices', 'vw_real_estate_activation_notice');
	}
}
endif;

add_action( 'after_setup_theme', 'vw_real_estate_setup' );

// Notice after Theme Activation
function vw_real_estate_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
		echo '<p>'. esc_html__( 'Thank you for choosing VW Real Estate Theme. Would like to have you on our Welcome page so that you can reap all the benefits of our VW Real Estate Theme.', 'vw-real-estate' ) .'</p>';
		echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=vw_real_estate_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'vw-real-estate' ) .'</a></span>';
		echo '<span class="demo-btn"><a href="'. esc_url( 'https://www.vwthemes.net/vw-real-estate-pro/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'vw-real-estate' ) .'</a></span>';
		echo '<span class="upgrade-btn"><a href="'. esc_url( 'https://www.vwthemes.com/themes/real-estate-wordpress-theme/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE PRO', 'vw-real-estate' ) .'</a></span>';
	echo '</div>';
}

/* getstart */
require get_theme_file_path('/inc/getstart/getstart.php');

/* Block Pattern */
require get_theme_file_path('/inc/block-patterns/block-patterns.php');

/* TGM Plugin Activation */
require get_theme_file_path('/inc/tgm/tgm.php');

/* Plugin Activation */
require get_theme_file_path('/inc/getstart/plugin-activation.php');