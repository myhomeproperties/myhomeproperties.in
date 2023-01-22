<?php
/**
 * The template for displaying Archive pages.
 * @package Construction Realestate
 */
get_header(); ?>

<main id="skip_content" role="main">
    <div class="container main-wrapper">
        <?php
        $construction_realestate_layout_option = get_theme_mod( 'construction_realestate_layout_options','Right Sidebar');
        if($construction_realestate_layout_option == 'One Column'){ ?>
            <div id="services_section" class="blog-section">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :
                    /* Start the Loop */          
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content',get_post_format() );           
                    endwhile;
                    else :
                        get_template_part( 'no-results' ); 
                    endif; 
                ?>
                <?php if( get_theme_mod( 'construction_realestate_enable_post_pagination',true) != '') { ?>
                    <div class="navigation">
                        <?php construction_realestate_pagination_type(); ?>
                    </div>
                <?php } ?>
            </div>
        <?php }else if($construction_realestate_layout_option == 'Three Columns'){ ?>
            <div class="row m-0">
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
                <div id="services_section" class="blog-section col-lg-6 col-md-6">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */          
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content',get_post_format() );           
                        endwhile;
                        else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'construction_realestate_enable_post_pagination',true) != '') { ?>
                        <div class="navigation">
                            <?php construction_realestate_pagination_type(); ?>
                        </div>
                    <?php } ?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
            </div>
        <?php }else if($construction_realestate_layout_option == 'Four Columns'){ ?>
            <div class="row m-0">
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
                <div id="services_section" class="blog-section col-lg-3 col-md-3">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if ( have_posts() ) :
                    /* Start the Loop */          
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content',get_post_format() );           
                        endwhile;
                        else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'construction_realestate_enable_post_pagination',true) != '') { ?>
                        <div class="navigation">
                            <?php construction_realestate_pagination_type(); ?>
                        </div>
                    <?php } ?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
            </div>
        <?php }else if($construction_realestate_layout_option == 'Grid Layout'){ ?>
            <div class="row m-0">
                <div id="services_section" class="blog-section <?php if( get_theme_mod( 'construction_realestate_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <div class="row">
                        <?php if ( have_posts() ) :
                        /* Start the Loop */          
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/grid-layout' );           
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                    </div>
                    <?php if( get_theme_mod( 'construction_realestate_enable_post_pagination',true) != '') { ?>
                        <div class="navigation">
                            <?php construction_realestate_pagination_type(); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="<?php if( get_theme_mod( 'construction_realestate_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
            </div>
        <?php }else if($construction_realestate_layout_option == 'Left Sidebar'){ ?>        
            <div class="row m-0">
                <div class="<?php if( get_theme_mod( 'construction_realestate_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
                <div id="services_section" class="blog-section <?php if( get_theme_mod( 'construction_realestate_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>   
                    <?php if ( have_posts() ) :
                        /* Start the Loop */          
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content',get_post_format() );
                        endwhile;
                        else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'construction_realestate_enable_post_pagination',true) != '') { ?>
                        <div class="navigation">
                            <?php construction_realestate_pagination_type(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php }else if($construction_realestate_layout_option == 'Right Sidebar'){ ?>
            <div class="row m-0">
                <div id="services_section" class="blog-section <?php if( get_theme_mod( 'construction_realestate_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */          
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content',get_post_format() );
                        endwhile;
                        else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'construction_realestate_enable_post_pagination',true) != '') { ?>
                        <div class="navigation">
                            <?php construction_realestate_pagination_type(); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="<?php if( get_theme_mod( 'construction_realestate_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
            </div>
        <?php }else{?>
            <div class="row m-0">
                <div id="services_section" class="blog-section <?php if( get_theme_mod( 'construction_realestate_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */          
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content',get_post_format() );
                        endwhile;
                        else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'construction_realestate_enable_post_pagination',true) != '') { ?>
                        <div class="navigation">
                            <?php construction_realestate_pagination_type(); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="<?php if( get_theme_mod( 'construction_realestate_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
            </div>
        <?php }?>
    </div>
</main>
<div class="clearfix"></div>

<?php get_footer(); ?>