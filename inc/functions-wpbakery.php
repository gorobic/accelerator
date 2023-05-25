<?php
add_action('vc_before_init', 'acep_wpbakery_extend');

function acep_wpbakery_extend() {

    vc_map( 
        array(
            "name" => __("ACEP Persons", "acep"),
            "base" => "acep_persons",
            "as_parent" => array('only' => 'acep_person'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "content_element" => true,
            "show_settings_on_create" => false,
            "is_container" => true,
            "params" => array(
            // add params same as with any other content element
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "admin_label" => false,
                    "heading" => __("Number of columns (for desktop)", "acep"),
                    "param_name" => "acep_persons_number",
                    "value" => 4,
                    "description" => __('', "acep")
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", "acep"),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "acep")
                )
            ),
            "js_view" => 'VcColumnView'
        ) 
    );
    vc_map( 
        array(
            "name" => __("ACEP Person", "acep"),
            "base" => "acep_person",
            "content_element" => true,
            "admin_enqueue_css" => get_stylesheet_directory_uri() . '/inc/assets-wpbakery/acep-person.css',
            "as_child" => array('only' => 'acep_persons'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params' => array(
                array(
                    "type" => "attach_image",
                    "holder" => "img",
                    "class" => "",
                    "admin_label" => false,
                    "heading" => __( "Image", "acep" ),
                    "param_name" => "acep_person_img",
                    "value" => __( "", "acep" ),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "admin_label" => false,
                    "heading" => __("Full name", "acep"),
                    "param_name" => "acep_person_name",
                    "value" => __("", "acep"),
                ),
                array(
                    "type" => "textarea",
                    "holder" => "div",
                    "class" => "",
                    "admin_label" => false,
                    "heading" => __("Person title", "acep"),
                    "param_name" => "acep_person_title",
                    "value" => __("", "acep"),
                ),
                array(
                    "type" => "textarea_html",                            
                    "class" => "",
                    "admin_label" => false,
                    "heading" => __("Description", "acep"),
                    "param_name" => "content",
                    "value" => __("", "acep"),
                ),
            )
        ) 
    );
    //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_acep_persons extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_acep_person extends WPBakeryShortCode {
        }
    }

    vc_map(
        array(
            "name" => __("ACEP Carousel", "acep"), // Element name
            "base" => "acep_carousel", // Element shortcode
            "class" => "box-repeater",
            "category" => __('Content', 'acep'),
            'params' => array(
                array(
                    'type' => 'param_group',
                    'param_name' => 'acep_carousel_items',
                    'params' => array(
                        array(
                            "type" => "attach_image",
                            "holder" => "img",
                            "class" => "",
                            "heading" => __( "Image", "acep" ),
                            "param_name" => "acep_carousel_items_img",
                            "value" => __( "", "acep" ),
                        ),
                        array(
                            "type" => "textarea",
                            "holder" => "div",
                            "class" => "",
                            "admin_label" => true,
                            "heading" => __("Title", "acep"),
                            "param_name" => "acep_carousel_items_title",
                            "value" => __("", "acep"),
                        ),
                        array(
                            "type" => "textarea",                            
                            "class" => "",
                            "admin_label" => false,
                            "heading" => __("Description", "acep"),
                            "param_name" => "acep_carousel_items_description",
                            "value" => __("", "acep"),
                        ),
                        array(
                            "type" => "vc_link",                            
                            "class" => "",
                            "admin_label" => false,
                            "heading" => __("Link", "acep"),
                            "param_name" => "acep_carousel_items_link",
                            "value" => __("", "acep"),
                        ),
                    )
                ),                    
            )
        )
    );

    vc_map(

        array(

            "name" => __("ACEP Recent Posts", "acep"),
            "base" => "acep_recent_posts",
            "show_settings_on_create" => true,
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Number of posts","acep"),
                    "description" => __("Enter number of posts to display.", "acep"),
                    "param_name" => "acep_recent_posts_number",
                    "value" => '3',
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Number of columns (for desktop)","acep"),
                    "param_name" => "acep_recent_posts_columns",
                    "value" => array(1,2,3),
                ),
            ),
        ) 
    );

    $terms_editions = get_terms( array(
        'taxonomy' => 'acep_edition',
        'hide_empty' => false,
        // 'fields' => array('ids','name')
    ) );
    
    foreach ($terms_editions as $item) {
        $terms_editions_result[$item->name] = $item->term_id;
    }

    vc_map(
        array(
            "name" => __("ACEP Artists", "acep"),
            "base" => "acep_artists",
            "show_settings_on_create" => true,
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Number of columns (for desktop)", "acep"),
                    "param_name" => "acep_artists_columns",
                    "value" => 5,
                    "description" => __('', "acep")
                ),
                array(
                    "type" => "checkbox",
                    "heading" => __("Select Edition(s)"),
                    "param_name" => "acep_artists_editions",
                    "value" => $terms_editions_result,
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", "acep"),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "acep")
                )
            ),
        ) 
    );

    $terms_exhibitions = get_terms( array(
        'taxonomy' => 'acep_exhibition',
        'hide_empty' => false,
        // 'fields' => array('ids','name')
    ) );
    
    foreach ($terms_exhibitions as $item) {
        $terms_exhibitions_result[$item->name] = $item->term_id;
    }

    $args = array( 
        'post_type' => 'acep_artists', 
        'suppress_filters' => false,
        'posts_per_page' => -1
    );
    $posts_artists = new WP_Query( $args );

    $posts_artists_result = array('Select' => '');
    
    foreach ($posts_artists->posts as $item) {
        $posts_artists_result[$item->post_title] = $item->ID;
    }

    vc_map(
        array(
            "name" => __("ACEP Works", "acep"),
            "base" => "acep_works",
            "show_settings_on_create" => true,
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Number of columns (for desktop)", "acep"),
                    "param_name" => "acep_works_columns",
                    "value" => 3,
                    "description" => __('', "acep")
                ),
                array(
                    "type" => "checkbox",
                    "heading" => __("Select Exhibition(s)"),
                    "param_name" => "acep_works_exhibitions",
                    "value" => $terms_exhibitions_result,
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Select Author(s)"),
                    "param_name" => "acep_works_authors",
                    "value" => $posts_artists_result,
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Works ID-s (comma separated values)", "acep"),
                    "param_name" => "acep_works_ids",
                    "description" => __('If you fill in this field, the fields above will be ignored', "acep")
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", "acep"),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "acep")
                )
            ),
        ) 
    );

    vc_map(
        array(
            "name" => __("ACEP Grid Gallery", "acep"),
            "base" => "acep_grid_gallery",
            "show_settings_on_create" => true,
            "params" => array(
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "admin_label" => false,
                    "heading" => __("Image minimum width (in pixel)", "acep"),
                    "param_name" => "acep_grid_gallery_img_min_width",
                    "value" => 100,
                    "description" => __('Max value ~ 200', "acep")
                ),
                array(
                    "type" => "attach_images",
                    "heading" => __("Images", "acep"),
                    "param_name" => "acep_grid_gallery_imgs",
                    "description" => __('Avoid placing images whose height is more than width in the last position. Use Drang and Drop to reorder images.', "acep")
                ),
            ),
        ) 
    );
}


add_shortcode('acep_carousel', 'acep_carousel_funct');
function acep_carousel_funct($atts) {
    ob_start();
    $atts = shortcode_atts(array(
        //'acep_carousel_heading'=>'',
        'acep_carousel_items' =>'',        
    ), $atts, 'acep_carousel');

    //$heading = $atts['acep_carousel_heading'];  
    $items = vc_param_group_parse_atts($atts['acep_carousel_items']);

    include(locate_template('inc/shortcodes/shortcode-acep_carousel.php'));

    return ob_get_clean();
}

add_shortcode('acep_recent_posts', 'acep_recent_posts_funct');
function acep_recent_posts_funct($atts) {
    ob_start();
    $atts = shortcode_atts(array(
        'acep_recent_posts_number' => '3',
        'acep_recent_posts_columns' => '3',        
    ), $atts, 'acep_recent_posts');

    include(locate_template('inc/shortcodes/shortcode-acep_recent_posts.php'));

    return ob_get_clean();
}

add_shortcode('acep_artists', 'acep_artists_funct');
function acep_artists_funct($atts) {
    ob_start();
    $atts = shortcode_atts(array(
        'acep_artists_editions' => false,
        'acep_artists_columns' => '5',  
        'el_class' => '',
    ), $atts, 'acep_artists');

    include(locate_template('inc/shortcodes/shortcode-acep_artists.php'));

    return ob_get_clean();
}

add_shortcode('acep_works', 'acep_works_funct');
function acep_works_funct($atts) {
    ob_start();
    $atts = shortcode_atts(array(
        'acep_works_exhibitions' => false,
        'acep_works_authors' => false,
        'acep_works_columns' => '3', 
        'acep_works_ids' => false,  
        'el_class' => '',
    ), $atts, 'acep_works');

    include(locate_template('inc/shortcodes/shortcode-acep_works.php'));

    return ob_get_clean();
}

add_shortcode('acep_persons', 'acep_persons_funct');
function acep_persons_funct($atts, $content) {
    ob_start();
    $atts = shortcode_atts(array(
        'acep_persons_number' => '6',
        'el_class' => '',        
    ), $atts, 'acep_persons');

    include(locate_template('inc/shortcodes/shortcode-acep_persons.php'));

    return ob_get_clean();
}

add_shortcode('acep_person', 'acep_person_funct');
function acep_person_funct($atts, $content) {
    ob_start();
    $atts = shortcode_atts(array(
        'acep_person_img' => '',
        'acep_person_name' => '', 
        'acep_person_title' => '',      
    ), $atts, 'acep_person');

    include(locate_template('inc/shortcodes/shortcode-acep_person.php'));

    return ob_get_clean();
}

add_shortcode('acep_grid_gallery', 'acep_grid_gallery_funct');
function acep_grid_gallery_funct($atts, $content) {
    ob_start();
    $atts = shortcode_atts(array(
        'acep_grid_gallery_imgs' => '',
        'acep_grid_gallery_img_min_width' => '100',
    ), $atts, 'acep_grid_gallery');

    $image_ids = explode(",", $atts['acep_grid_gallery_imgs']);

    include(locate_template('inc/shortcodes/shortcode-acep_grid_gallery.php'));

    return ob_get_clean();
}