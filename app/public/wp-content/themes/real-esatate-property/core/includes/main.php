<?php

add_action( 'admin_menu', 'real_esatate_property_getting_started' );
function real_esatate_property_getting_started() {    	    	
	add_theme_page( esc_html__('Get Started', 'real-esatate-property'), esc_html__('Get Started', 'real-esatate-property'), 'edit_theme_options', 'real-esatate-property-guide-page', 'real_esatate_property_test_guide');   
}

function real_esatate_property_admin_enqueue_scripts() {
	wp_enqueue_style( 'real-esatate-property-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
}
add_action( 'admin_enqueue_scripts', 'real_esatate_property_admin_enqueue_scripts' );

if ( ! defined( 'REAL_ESTATE_PROPERTY_DOCS_FREE' ) ) {
define('REAL_ESTATE_PROPERTY_DOCS_FREE',__('https://www.misbahwp.com/docs/real-estate-property-free-docs/','real-esatate-property'));
}
if ( ! defined( 'REAL_ESTATE_PROPERTY_DOCS_PRO' ) ) {
define('REAL_ESTATE_PROPERTY_DOCS_PRO',__('https://www.misbahwp.com/docs/real-estate-property-pro-docs','real-esatate-property'));
}
if ( ! defined( 'REAL_ESTATE_PROPERTY_BUY_NOW' ) ) {
define('REAL_ESTATE_PROPERTY_BUY_NOW',__('https://www.misbahwp.com/themes/property-wordpress-theme/','real-esatate-property'));
}
if ( ! defined( 'REAL_ESTATE_PROPERTY_SUPPORT_FREE' ) ) {
define('REAL_ESTATE_PROPERTY_SUPPORT_FREE',__('https://wordpress.org/support/theme/real-esatate-property','real-esatate-property'));
}
if ( ! defined( 'REAL_ESTATE_PROPERTY_REVIEW_FREE' ) ) {
define('REAL_ESTATE_PROPERTY_REVIEW_FREE',__('https://wordpress.org/support/theme/real-esatate-property/reviews/#new-post','real-esatate-property'));
}
if ( ! defined( 'REAL_ESTATE_PROPERTY_DEMO_PRO' ) ) {
define('REAL_ESTATE_PROPERTY_DEMO_PRO',__('https://www.misbahwp.com/demo/real-estate-property/','real-esatate-property'));
}

function real_esatate_property_test_guide() { ?>
	<?php $real_esatate_property_theme = wp_get_theme(); ?>
	
	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( REAL_ESTATE_PROPERTY_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'real-esatate-property' ) ?></a>			
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'real-esatate-property' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( REAL_ESTATE_PROPERTY_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'real-esatate-property' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( REAL_ESTATE_PROPERTY_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'real-esatate-property' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','real-esatate-property'); ?><?php echo esc_html( $real_esatate_property_theme ); ?>  <span><?php esc_html_e('Version: ', 'real-esatate-property'); ?><?php echo esc_html($real_esatate_property_theme['Version']);?></span></h3>
				<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $real_esatate_property_theme->get_screenshot() ); ?>" />
				<div id="description-inside">
					<?php
						$real_esatate_property_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $real_esatate_property_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postbox donate">
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','real-esatate-property'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','real-esatate-property'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','real-esatate-property'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('LearnPress Campatiblity','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','real-esatate-property'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>		    
	  		</div>
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'real-esatate-property' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','real-esatate-property'); ?></p>
					<div id="admin_pro_links">			
						<a class="blue-button-2" href="<?php echo esc_url( REAL_ESTATE_PROPERTY_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'real-esatate-property' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( REAL_ESTATE_PROPERTY_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'real-esatate-property' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( REAL_ESTATE_PROPERTY_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'real-esatate-property' ) ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>