<?php
/**
 * The template part for displaying gallery post
 * @package Construction Realestate
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
  <div class="box-image">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo ( get_post_gallery() );
          echo '</div>';
        };
      };
    ?>
  </div>
  <h2 class="section-title pb-2 mb-2"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
  <?php if( get_theme_mod( 'construction_realestate_metafields_date',true) != '' || get_theme_mod( 'construction_realestate_metafields_author',true) != '' || get_theme_mod( 'construction_realestate_metafields_comment',true) != '') { ?>
    <div class="metabox mb-3">
      <?php if( get_theme_mod( 'construction_realestate_metafields_date',true) != '') { ?>
        <span class="entry-date me-3"><i class="<?php echo esc_attr(get_theme_mod('construction_realestate_post_date_icon','far fa-calendar-alt')); ?> me-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>" class="me-2"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('construction_realestate_single_post_meta_seperator') ); ?>
      <?php }?>
      <?php if( get_theme_mod( 'construction_realestate_metafields_author',true) != '') { ?>
        <span class="entry-author me-3"><i class="<?php echo esc_attr(get_theme_mod('construction_realestate_post_author_icon','fas fa-user')); ?> me-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>" class="me-2"><?php the_author(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></span><?php echo esc_html( get_theme_mod('construction_realestate_single_post_meta_seperator') ); ?>
      <?php }?>
      <?php if( get_theme_mod( 'construction_realestate_metafields_comment',true) != '') { ?>
        <i class="<?php echo esc_attr(get_theme_mod('construction_realestate_post_comment_icon','fas fa-comments')); ?> me-2"></i><span class="entry-comments me-3"> <?php comments_number( __('0 Comment', 'construction-realestate'), __('0 Comments', 'construction-realestate'), __('% Comments', 'construction-realestate') ); ?></span>
      <?php }?>
    </div>
  <?php }?>
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
    <div class="cat-box mt-3">
      <i class="<?php echo esc_attr(get_theme_mod('construction_realestate_category_icon','fas fa-folder-open')); ?>"></i><?php the_category(); ?>
    </div>
  <?php }?>
  <div class="clearfix"></div>
</article>