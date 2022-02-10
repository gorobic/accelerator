<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="d-flex flex-column justify-content-between h-100">
        <div>
            <div class="container overflow-hidden">

                <div class="row gx-5 flex-md-nowrap header-logos py-3 justify-content-center align-items-center">
                    <div class="col-md-auto flex-shrink-1 text-center">
                        <a href="<?php echo esc_url(get_bloginfo('url')); ?>" class="site-logo">
                            <?php 
                            if(has_custom_logo()){
                                $custom_logo_id = esc_attr(get_theme_mod( 'custom_logo' ));
                                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
                                <img src="<?php echo esc_url( $logo[0] ); ?>" class="custom-logo"
                                alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <?php }else{ ?>
                                <?php echo esc_attr(get_bloginfo('name')); ?>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="col-auto flex-shrink-1">
                        <a target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo-acep.svg'; ?>" alt="ACEP logo">
                        </a>
                    </div>
                    <div class="col-auto ms-md-auto flex-shrink-1">
                        <a href="http://www.gaepgallery.com/" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/gaep_logo.svg'; ?>" alt="GAEP logo">
                        </a>
                    </div>
                    <div class="col-auto flex-shrink-1">
                        <a href="https://i8.is/" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo-i8.svg'; ?>" alt="i8 logo">
                        </a>
                    </div>
                    
                </div>

                <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
                
                <div class="main">