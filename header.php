<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="d-flex flex-column justify-content-between h-100">
        <div>
            <div class="container overflow-hidden">

                <?php
                $header_widgets_slug = 'header-logos';
                $header_widgets_posts = get_posts([
                    'post_type' => 'wp_block',
                    'title'     => $header_widgets_slug,
                ]);

                // If a block was located print it and return true.
                if ($header_widgets_posts && isset($header_widgets_posts[0])) { ?>
                    <div class="py-3 border-bottom">
                        <?php echo do_blocks($header_widgets_posts[0]->post_content); ?>
                    </div>
                <?php } ?>

                <div class="row gx-5 flex-md-nowrap header-logos py-3 justify-content-center align-items-center">
                    <div class="col-md-auto flex-shrink-1 text-center">
                        <a href="<?php echo esc_url(get_bloginfo('url')); ?>" class="site-logo">
                            <?php
                            if (has_custom_logo()) {
                                $custom_logo_id = esc_attr(get_theme_mod('custom_logo'));
                                $logo = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
                                <img src="<?php echo esc_url($logo[0]); ?>" class="custom-logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <?php } else { ?>
                                <?php echo esc_attr(get_bloginfo('name')); ?>
                            <?php } ?>
                        </a>
                    </div>

                    <?php if (have_rows('logos_header_left', 'options')) {
                        while (have_rows('logos_header_left', 'options')) {
                            the_row(); ?>
                            <?php $link = get_sub_field('logo_url'); ?>
                            <div class="col-auto flex-shrink-1">
                                <a <?php if ($link) { ?> target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>" href="<?php echo esc_url($link['url']); ?>" <?php } ?>>
                                    <img src="<?php echo get_sub_field('logo_img') ?>">
                                </a>
                            </div>
                    <?php }
                    } ?>

                    <?php if (have_rows('logos_header_right', 'options')) {
                        $i = 1;
                        while (have_rows('logos_header_right', 'options')) {
                            the_row(); ?>
                            <?php $link = get_sub_field('logo_url'); ?>
                            <div class="col-auto flex-shrink-1 <?php if ($i === 1) {
                                                                    echo 'ms-md-auto';
                                                                } ?>">
                                <a <?php if ($link) { ?> target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>" href="<?php echo esc_url($link['url']); ?>" <?php } ?>>
                                    <img src="<?php echo get_sub_field('logo_img') ?>">
                                </a>
                            </div>
                    <?php $i++;
                        }
                    } ?>

                </div>

                <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>

                <div class="main">