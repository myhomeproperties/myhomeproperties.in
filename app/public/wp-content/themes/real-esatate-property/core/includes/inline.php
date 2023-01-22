<?php


$real_esatate_property_custom_css = '';

	/*---------------------------text-transform-------------------*/

	$real_esatate_property_text_transform = get_theme_mod( 'menu_text_transform_real_esatate_property','CAPITALISE');
    if($real_esatate_property_text_transform == 'CAPITALISE'){

		$real_esatate_property_custom_css .='#main-menu ul li a{';

			$real_esatate_property_custom_css .='text-transform: capitalize ; font-size: 14px !important;';

		$real_esatate_property_custom_css .='}';

	}else if($real_esatate_property_text_transform == 'UPPERCASE'){

		$real_esatate_property_custom_css .='#main-menu ul li a{';

			$real_esatate_property_custom_css .='text-transform: uppercase ; font-size: 14px !important';

		$real_esatate_property_custom_css .='}';

	}else if($real_esatate_property_text_transform == 'LOWERCASE'){

		$real_esatate_property_custom_css .='#main-menu ul li a{';

			$real_esatate_property_custom_css .='text-transform: lowercase ; font-size: 14px !important';

		$real_esatate_property_custom_css .='}';
	}

	/*---------------------------Container Width-------------------*/

		$real_esatate_property_container_width = get_theme_mod('real_esatate_property_container_width');

				$real_esatate_property_custom_css .='body{';

					$real_esatate_property_custom_css .='width: '.esc_attr($real_esatate_property_container_width).'%; margin: auto';

				$real_esatate_property_custom_css .='}';


	/*---------------------------Slider-content-alignment-------------------*/


	$real_esatate_property_slider_content_alignment = get_theme_mod( 'real_esatate_property_slider_content_alignment','RIGHT-ALIGN');

	 if($real_esatate_property_slider_content_alignment == 'LEFT-ALIGN'){

			$real_esatate_property_custom_css .='.blog_box{';

				$real_esatate_property_custom_css .='text-align:left;';

			$real_esatate_property_custom_css .='}';


		}else if($real_esatate_property_slider_content_alignment == 'CENTER-ALIGN'){

			$real_esatate_property_custom_css .='.blog_box{';

				$real_esatate_property_custom_css .='text-align:center;';

			$real_esatate_property_custom_css .='}';


		}else if($real_esatate_property_slider_content_alignment == 'RIGHT-ALIGN'){

			$real_esatate_property_custom_css .='.blog_box{';

				$real_esatate_property_custom_css .='text-align:right;';

			$real_esatate_property_custom_css .='}';

		}
