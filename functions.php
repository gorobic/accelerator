<?php
if (!function_exists('theme_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function theme_setup()
    {

        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain('text_domain', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support('automatic-feed-links');

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');

        /**
         * Enable support for custom logo.
         */
        add_theme_support('custom-logo');

        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus(array(
            'primary'   => __('Primary Menu', 'text_domain'),
            'secondary' => __('Secondary Menu', 'text_domain')
        ));

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
    }
} // theme_setup
add_action('after_setup_theme', 'theme_setup');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function widgets_init()
{
    register_sidebar(
        array(
            'name'          => __('Footer widgets', 'text_domain'),
            'id'            => 'footer-widgets',
            'description'   => __('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'text_domain'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
}
add_action('widgets_init', 'widgets_init');

// Add customize options
function acep_theme_customize_register($wp_customize)
{

    $wp_customize->add_setting('acep_footer_text', array(
        'capability' => 'edit_theme_options',
        //'sanitize_callback' => 'acep_sanitize_text',
    ));

    $wp_customize->add_control('acep_footer_text', array(
        'type' => 'textarea',
        'section' => 'title_tagline', // Add a default or your own section
        'label' => __('Footer text'),
        //'description' => __( 'This is a custom dropdown pages option.' ),
    ));

    // $wp_customize->add_setting( 'acep_thankyou_page', array(
    // 	'capability' => 'edit_theme_options',
    // 	'sanitize_callback' => 'acep_sanitize_dropdown_pages',
    // ) );

    // $wp_customize->add_control( 'acep_thankyou_page', array(
    // 	'type' => 'dropdown-pages',
    // 	'section' => 'title_tagline', // Add a default or your own section
    // 	'label' => __( 'Thank You page' ),
    // ) );
}
add_action('customize_register', 'acep_theme_customize_register');

function acep_sanitize_dropdown_pages($page_id, $setting)
{
    // Ensure $input is an absolute integer.
    $page_id = absint($page_id);

    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ('publish' == get_post_status($page_id) ? $page_id : $setting->default);
}

function acep_sanitize_text($text)
{
    return sanitize_text_field($text);
}

// Enqueue Scrips and styles
function custom_enqueue_wp()
{

    wp_dequeue_script('lightbox2');
    wp_deregister_script('lightbox2');
    wp_dequeue_style('lightbox2');
    wp_deregister_style('lightbox2');
    wp_dequeue_script('prettyphoto');
    wp_deregister_script('prettyphoto');
    wp_dequeue_style('prettyphoto');
    wp_deregister_style('prettyphoto');

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/modules/bootstrap/dist/js/bootstrap.bundle.min.js', array('jquery'), filemtime(get_template_directory() . '/modules/bootstrap/dist/js/bootstrap.min.js'), true);
    //wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/modules/bootstrap/dist/css/bootstrap.min.css', array(), filemtime(get_template_directory().'/modules/bootstrap/dist/css/bootstrap.min.css') );
    wp_enqueue_style('acep-font', get_template_directory_uri() . '/assets/fonts/acep/style.css', '', filemtime(get_template_directory() . '/assets/fonts/acep/style.css'));
    wp_enqueue_style('modules-bundle', get_template_directory_uri() . '/assets/css/modules/bundle.css', array('acep-font', 'slick', 'fancybox'), filemtime(get_template_directory() . '/assets/css/modules/bundle.css'));
    wp_enqueue_style('bundle', get_template_directory_uri() . '/assets/css/bundle.css', array('acep-font', 'slick', 'fancybox'), filemtime(get_template_directory() . '/assets/css/bundle.css'));
    wp_enqueue_style('slick', get_template_directory_uri() . '/modules/slick/slick.css', array('acep-font'), filemtime(get_template_directory() . '/modules/slick/slick.css'));
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/modules/fancybox/jquery.fancybox.min.css', array(), filemtime(get_template_directory() . '/modules/fancybox/jquery.fancybox.min.css'));
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'));
    // wp_enqueue_style( 'responsive', get_template_directory_uri().'/assets/css/responsive.css', array('style'), filemtime(get_template_directory().'/assets/css/responsive.css') );

    wp_enqueue_script('fancybox', get_template_directory_uri() . '/modules/fancybox/jquery.fancybox.min.js', array('jquery'), filemtime(get_template_directory() . '/modules/fancybox/jquery.fancybox.min.js'), true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/modules/slick/slick.min.js', array('jquery'), filemtime(get_template_directory() . '/modules/slick/slick.min.js'), true);
    wp_enqueue_script('masonry', get_template_directory_uri() . '/modules/masonry/masonry.pkgd.min.js', array('jquery'), filemtime(get_template_directory() . '/modules/slick/slick.min.js'), true);
    wp_enqueue_script('lazy', get_template_directory_uri() . '/modules/jquery.lazy-master/jquery.lazy.min.js', array('jquery', 'slick'), filemtime(get_template_directory() . '/modules/jquery.lazy-master/jquery.lazy.min.js'), true);
    wp_enqueue_script('index', get_template_directory_uri() . '/assets/js/index.js', array('jquery', 'slick', 'lazy', 'fancybox', 'masonry'), filemtime(get_template_directory() . '/assets/js/index.js'), true);
}
add_action('wp_enqueue_scripts', 'custom_enqueue_wp');

// wpml shortcodes --------------------

add_shortcode('wpml_language', 'wpml_find_language');

/* 
 * Shortcode [wpml_language language="en"] [/wpml_language]
 */

function wpml_find_language($attr, $content = null)
{

    extract(shortcode_atts(array(

        'language' => '',

    ), $attr));

    $current_language = ICL_LANGUAGE_CODE;

    if ($current_language == $language) {
        $output = do_shortcode($content);
    } else {
        $output = "";
    }

    return $output;
}

require get_parent_theme_file_path('/modules/wp-bootstrap-5-navwalker/wp-bootstrap-5-navwalker.php');
require get_parent_theme_file_path('/inc/functions-posttypes-taxonomies.php');
require get_parent_theme_file_path('/inc/functions-wpbakery.php');
require get_parent_theme_file_path('/inc/functions-acf.php');
