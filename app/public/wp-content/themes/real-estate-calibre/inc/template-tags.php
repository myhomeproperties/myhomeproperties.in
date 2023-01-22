<?php
/**
* Template hooks
* @package real-estate-calibre
*/


//Top Bar
if ( ! function_exists( 'real_estate_calibre_topbar_settings' ) ) {
	function real_estate_calibre_topbar_settings() {
		$real_estate_salient_topbar_enable = get_theme_mod('real_estate_salient_topbar_enable');
		if( $real_estate_salient_topbar_enable ){
		?>
		<div class="top-head container-fluid">
			<div class="container clearfix">
				<div class="row">
					<div class="top-middle col-md-8 col-sm-6">
						<?php if ( get_theme_mod( 'real_estate_calibre_top_mobile', __('email@textdomain.com', 'real-estate-calibre') ) !== '') : ?>
							<p><?php echo esc_html( get_theme_mod( 'real_estate_calibre_top_mobile') ); ?></p>
						<?php endif; ?>
					</div>
					<div class="top-right col-md-4 col-sm-6">
						<div class="top-social-icons">
							<?php if(get_theme_mod('real_estate_salient_topbarsocial_enable')) : ?>
								<a href="<?php echo esc_url( get_theme_mod( 'real_estate_salient_topbar_facebook' ) ); ?>" class="social-facebook" title="<?php echo esc_attr__( 'Facebook', 'real-estate-calibre' );?>"><i class="fab fa-facebook-f"></i></a>
								<a href="<?php echo esc_url( get_theme_mod( 'real_estate_salient_topbar_twitter' ) ); ?>" class="social-twitter" title="<?php echo esc_attr__( 'Twitter', 'real-estate-calibre' );?>"><i class="fab fa-twitter"></i></a>
								<a href="<?php echo esc_url( get_theme_mod( 'real_estate_calibre_topbar_insta' ) ); ?>" class="social-instagram" title="<?php echo esc_attr__( 'Instagram', 'real-estate-calibre' );?>"><i class="fab fa-instagram"></i></a>
							<?php endif; ?>
							<?php if( get_theme_mod( 'real_estate_salient_topbarsubmit_enable' ) ) : ?>
								<a class="top-submit" href="<?php echo esc_url( get_permalink( get_theme_mod( 'real_estate_salient_submit_page') ) ); ?>"><?php _e( 'Submit', 'real-estate-calibre' ); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
	}}
}


if ( ! function_exists( 'real_estate_calibre_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function real_estate_calibre_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;


/* -- Logo */
if ( ! function_exists( 'real_estate_calibre_logo_settings' ) ) {
	function real_estate_calibre_logo_settings() {
		?>
	    <?php 
		/**
		 * Header and Navigation menu for normal screens
		 */
		?>
	    <div id="site-header" class="site-header container-fluid">
			<div class="container">
				<div class="row">
					<div class="site-branding logo col-md-3">
						<?php real_estate_calibre_custom_logo(); 
						if ( is_front_page() && is_home() ) : ?>		
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; ?></p>
						<?php endif; ?>
					</div>
					<div class="col-md-9">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<div class="main-navigation-links">
								<?php wp_nav_menu( array( 'theme_location' => 'catnav') ); ?>
							</div>
						</nav><!-- #site-navigation -->
					</div>
				</div>
			</div>
		</div>		
		<?php
	}
}



/* -- Slider */
if ( ! function_exists( 'real_estate_calibre_slider_content' ) ) {
	function real_estate_calibre_slider_content() {
		?>
		<?php if( get_theme_mod( 'real_estate_salient_slide_enable' ) ) : ?>
		<div class="slidercont">   
		<?php
		$counter = 0;
		$slide_type = 'post';
		if ( get_theme_mod( 'real_estate_salient_slide_type' ) == "property" and class_exists( 'Essential_Real_Estate' ) ){
			$slide_type = 'property';
		}
		$args = array(
		'post_type' => $slide_type,
		'ignore_sticky_posts' => true,
		'posts_per_page' => 3,
		'orderby' => 'date',
		'order' => 'DESC',
		'post_status' => 'publish',
		);

		$latestloop = new WP_Query($args);
		?>

		<?php if (get_theme_mod('real_estate_salient_slide_type') == "property" and class_exists('Essential_Real_Estate')) : ?>
		<div class="nivoSlider slider-overlay clearfix" id="slider">
			<?php if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post(); $counter++; ?>
			<?php $property_id = get_the_ID(); ?>
			<img src="<?php echo esc_url( get_the_post_thumbnail_url( $property_id, 'real-estate-salient-slider' ) );?>" title="#slidecaption<?php echo $counter; ?>">
			<?php 
			endwhile;
			endif;
			?>
		</div>

		<?php
		$counter = 0;
		$latestloop = new WP_Query($args);
		if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post(); $counter++;

		
		$property_id = get_the_ID();
		$price = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price', true);
		$beds = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bedrooms', true);
		$bath = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bathrooms', true);
		$size = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_land', true);
		$property_address = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_address', true);
		$price_prefix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_prefix', true);
		$price_unit = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_unit', true);
		$price_short = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_short', true);
		$price_postfix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_postfix', true);
		?>
		<div id="slidecaption<?php echo $counter; ?>" class="nivo-html-caption">
			<div class="slider-contents">
				<div class="slider-content-top">
					<h2><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h2>
					<span class="slide-content-address"><i class="fas fa-map-marker-alt"></i></span>
					<span class="slide-content-address"><?php echo esc_html($property_address);?></span>
					<div class="slider-price">
						<span class="slide-content-address"><i class="fa fa-tag"></i></span>
						<span class="slide-content-price"><?php echo esc_html($price_prefix).' '.esc_html(ere_get_format_money($price_short, $price_unit)).' '.esc_html($price_postfix); ?></span>
					</div>
				</div>
				<div class="slider-content-bottom clearfix">
					<div class="slider-bottom-left">
						<div class="slide-bedroom">
							<span><i class="fas fa-bed"></i></span>
							<span><p><?php echo esc_html($beds); ?></p></span>
						</div>
						<div class="slide-bathrooms">
							<span><i class="fas fa-bath"></i></span>
							<span><p><?php echo esc_html($bath); ?></p></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php  
		    endwhile;
		    wp_reset_postdata();
		    endif;
		    endif;
		?>
	

	<?php if (get_theme_mod('real_estate_salient_slide_type') == "post") : ?>
		<div class="nivoSlider slider-overlay clearfix" id="slider">
			<?php if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post(); $counter++; ?>
				<?php $property_id = get_the_ID(); ?>
				<img src="<?php echo esc_url( get_the_post_thumbnail_url( $property_id, 'real-estate-salient-slider' ) );?>" title="#slidecaption<?php echo $counter; ?>">
			<?php 
				endwhile;
				endif;
			?>
		</div>
		<?php
		$counter = 0;
		$latestloop = new WP_Query($args);
		if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post(); $counter++; ?>
		<div id="slidecaption<?php echo $counter; ?>" class="nivo-html-caption">
			<div class="slider-contents container post-slider">
				<div class="slider-content-top">
					<h2><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h2>
					<span class="slide-content-address">&nbsp;&nbsp;<?php the_excerpt();?></span>
				</div>
			</div>
		</div>
		<?php 
		    endwhile;
		    endif;
		    wp_reset_postdata();
		    
		?>
	<?php endif; ?>
	
		</div>
		<?php endif; ?>

		<?php
	}
}


/* -- Home Properties */
if ( ! function_exists( 'real_estate_calibre_home_properties' ) ) {
	function real_estate_calibre_home_properties() {
		?>
		<?php if (get_theme_mod('real_estate_salient_home_properties_enable') AND class_exists('Essential_Real_Estate')) : ?>
			<section class="home-recent-two" id="content">
				<div class="container">					
					<div class="recent-properties-title">
						<?php if(get_theme_mod('real_estate_salient_home_properties_title')) : ?>
							<h2><?php echo esc_html(get_theme_mod('real_estate_salient_home_properties_title', __('Recent Properties','real-estate-calibre'))); ?></h2>
						<?php endif; ?>
						<?php if(get_theme_mod('real_estate_salient_home_properties_desc')) : ?>
							<p><?php echo esc_html(get_theme_mod('real_estate_salient_home_properties_desc', __('You are seeing recently added properties','real-estate-calibre'))); ?></p>
						<?php endif; ?>
					</div>					
				</div>
				<div class="container">					
					<div class="ere-property-wrap">
						<div class="ere-property clearfix property-grid  col-gap-30">
							<div class="property-content columns-3 columns-md-3 columns-sm-2 columns-xs-1 columns-mb-1">
								<?php
								// Property item class define
								$custom_property_layout_style = ere_get_option('archive_property_layout_style', 'property-grid');
								$custom_property_items_amount = ere_get_option('archive_property_items_amount', '6');
								$custom_property_image_size = ere_get_option( 'archive_property_image_size', '330x180' );
								$custom_property_columns = ere_get_option('archive_property_columns', '3');
								$custom_property_columns_gap = ere_get_option('archive_property_columns_gap', 'col-gap-30');
								$custom_property_items_md = ere_get_option('archive_property_items_md', '3');
								$custom_property_items_sm = ere_get_option('archive_property_items_sm', '2');
								$custom_property_items_xs = ere_get_option('archive_property_items_xs', '1');
								$custom_property_items_mb = ere_get_option('archive_property_items_mb', '1');

								$property_item_class = array();
								if (isset($_SESSION["property_view_as"]) && !empty($_SESSION["property_view_as"]) && in_array($_SESSION["property_view_as"], array('property-list', 'property-grid'))) {
								    $custom_property_layout_style = $_SESSION["property_view_as"];
								}

								$wrapper_classes = array(
								    'ere-property clearfix',
								    $custom_property_layout_style,
								    $custom_property_columns_gap
								);

								if ($custom_property_layout_style == 'property-list') {
								    $wrapper_classes[] = 'list-1-column';
								}

								if ($custom_property_columns_gap == 'col-gap-30') {
								    $property_item_class[] = 'mg-bottom-30';
								} elseif ($custom_property_columns_gap == 'col-gap-20') {
								    $property_item_class[] = 'mg-bottom-20';
								} elseif ($custom_property_columns_gap == 'col-gap-10') {
								    $property_item_class[] = 'mg-bottom-10';
								} 
								$args = array(
								    'post_type' => 'property',
								    'ignore_sticky_posts' => true,
								    'posts_per_page' => 6,
								    'orderby' => 'date',
								    'order' => 'DESC',
								    'post_status' => 'publish',
								);
								$latestloop = new WP_Query($args);
								if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post(); ?>
								<div class="ere-property ere-item-wrap clearfix">						
									<div class="mg-bottom-30 ere-property-featured">
									<?php ere_get_template('content-property.php', array(
			                            'property_item_class' => $property_item_class,
			                            'custom_property_image_size' => $custom_property_image_size
			                        )); ?>
			                        </div>
		                        </div>
								<?php
							    endwhile;
							    wp_reset_postdata();
							    endif;
							    ?>
					    	</div>
						</div>
					</div>
				</div>
			</section>

		<?php endif;
	}
}


function real_estate_calibre_remove_actions() {
	remove_action( 'real_estate_salient_topbar', 'real_estate_salient_topbar_settings', 0 );
	remove_action( 'real_estate_salient_header', 'real_estate_salient_logo_settings', 0 );
	remove_action( 'real_estate_salient_slider', 'real_estate_salient_slider_content', 0 );
	remove_action( 'real_estate_salient_recent_properties', 'real_estate_salient_home_properties', 0 );

};
add_action( 'init', 'real_estate_calibre_remove_actions');
add_action( 'real_estate_salient_topbar', 'real_estate_calibre_topbar_settings', 10 );
add_action( 'real_estate_salient_header', 'real_estate_calibre_logo_settings', 10 );
add_action( 'real_estate_salient_slider', 'real_estate_calibre_slider_content', 10 );
add_action( 'real_estate_salient_recent_properties', 'real_estate_calibre_home_properties', 10 );