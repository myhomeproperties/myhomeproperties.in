<?php
/**
 * The template part for displaying content
 * @package Automobile Car Dealer
 * @subpackage construction_realestate
 * @since 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="mainbox-post p-4">
    <h2 class="section-title pb-2 mb-2"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <?php if( get_theme_mod( 'construction_realestate_metafields_date',true) != '') { ?>
      <div class="date-box pb-1"><i class="<?php echo esc_attr(get_theme_mod('construction_realestate_post_date_icon','far fa-calendar-alt')); ?>"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></div>  
    <?php }?>
    <div class="box-image">
      <?php 
        if(has_post_thumbnail()) { 
          the_post_thumbnail(); 
        }
      ?>
    </div>
    <div class="new-text my-2">
      <?php $construction_realestate_theme_lay = get_theme_mod( 'construction_realestate_content_settings','Excerpt');
      if($construction_realestate_theme_lay == 'Content'){ ?>
        <?php the_content(); ?>
      <?php }
      if($construction_realestate_theme_lay == 'Excerpt'){ ?>
        <?php if(get_the_excerpt()) { ?>
          <?php $construction_realestate_excerpt = get_the_excerpt(); echo esc_html( construction_realestate_string_limit_words( $construction_realestate_excerpt, esc_attr(get_theme_mod('construction_realestate_post_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('construction_realestate_post_discription_suffix','[...]') ); ?>
        <?php }?>
      <?php }?>
    </div>  
    <?php if( get_theme_mod( 'construction_realestate_post_category',true) != '') { ?>
      <div class="cat-box mt-1">
        <i class="<?php echo esc_attr(get_theme_mod('construction_realestate_category_icon','fas fa-folder-open')); ?>"></i><?php the_category(); ?>
      </div>
    <?php }?>
    <div class="clearfix"></div>
  </div>
</article>