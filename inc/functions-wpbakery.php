<?php
add_action('vc_before_init', 'acc_wpbakery_extend');

function acc_wpbakery_extend() {

    vc_map( 
        array(
            "name" => __("Accelerator Persons", "accelerator"),
            "base" => "acc_persons",
            "as_parent" => array('only' => 'acc_person'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
                    "heading" => __("Number of columns (for desktop)", "accelerator"),
                    "param_name" => "acc_persons_number",
                    "value" => 4,
                    "description" => __('', "accelerator")
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", "accelerator"),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "accelerator")
                )
            ),
            "js_view" => 'VcColumnView'
        ) 
    );
    vc_map( 
        array(
            "name" => __("Accelerator Person", "accelerator"),
            "base" => "acc_person",
            "content_element" => true,
            "admin_enqueue_css" => get_stylesheet_directory_uri() . '/inc/assets-wpbakery/acc-person.css',
            "as_child" => array('only' => 'acc_persons'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params' => array(
                array(
                    "type" => "attach_image",
                    "holder" => "img",
                    "class" => "",
                    "admin_label" => false,
                    "heading" => __( "Image", "accelerator" ),
                    "param_name" => "acc_person_img",
                    "value" => __( "", "accelerator" ),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "admin_label" => false,
                    "heading" => __("Full name", "accelerator"),
                    "param_name" => "acc_person_name",
                    "value" => __("", "accelerator"),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "admin_label" => false,
                    "heading" => __("Person title", "accelerator"),
                    "param_name" => "acc_person_title",
                    "value" => __("", "accelerator"),
                ),
                array(
                    "type" => "textarea_html",                            
                    "class" => "",
                    "admin_label" => false,
                    "heading" => __("Description", "accelerator"),
                    "param_name" => "content",
                    "value" => __("", "accelerator"),
                ),
            )
        ) 
    );
    //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_acc_persons extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_acc_person extends WPBakeryShortCode {
        }
    }

    vc_map(
        array(
            "name" => __("Accelerator Carousel", "accelerator"), // Element name
            "base" => "accelerator_carousel", // Element shortcode
            "class" => "box-repeater",
            "category" => __('Content', 'accelerator'),
            'params' => array(
                array(
                    'type' => 'param_group',
                    'param_name' => 'accelerator_carousel_items',
                    'params' => array(
                        array(
                            "type" => "attach_image",
                            "holder" => "img",
                            "class" => "",
                            "heading" => __( "Image", "accelerator" ),
                            "param_name" => "accelerator_carousel_items_img",
                            "value" => __( "", "accelerator" ),
                        ),
                        array(
                            "type" => "textarea",
                            "holder" => "div",
                            "class" => "",
                            "admin_label" => true,
                            "heading" => __("Title", "accelerator"),
                            "param_name" => "accelerator_carousel_items_title",
                            "value" => __("", "accelerator"),
                        ),
                        array(
                            "type" => "textarea",                            
                            "class" => "",
                            "admin_label" => false,
                            "heading" => __("Description", "accelerator"),
                            "param_name" => "accelerator_carousel_items_description",
                            "value" => __("", "accelerator"),
                        ),
                        array(
                            "type" => "vc_link",                            
                            "class" => "",
                            "admin_label" => false,
                            "heading" => __("Link", "accelerator"),
                            "param_name" => "accelerator_carousel_items_link",
                            "value" => __("", "accelerator"),
                        ),
                    )
                ),                    
            )
        )
    );

    vc_map(

        array(

            "name" => __("Accelerator Recent Posts", "accelerator"),
            "base" => "acc_recent_posts",
            "show_settings_on_create" => true,
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Number of posts","accelerator"),
                    "description" => __("Enter number of posts to display.", "accelerator"),
                    "param_name" => "acc_recent_posts_number",
                    "value" => '3',
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Number of columns (for desktop)","accelerator"),
                    "param_name" => "acc_recent_posts_columns",
                    "value" => array(1,2,3),
                ),
            ),
        ) 
    );
}


add_shortcode('accelerator_carousel', 'acc_carousel_funct');
function acc_carousel_funct($atts) {
    ob_start();
    $atts = shortcode_atts(array(
        //'accelerator_carousel_heading'=>'',
        'accelerator_carousel_items' =>'',        
    ), $atts, 'accelerator_carousel');

    //$heading = $atts['accelerator_carousel_heading'];  
    $items = vc_param_group_parse_atts($atts['accelerator_carousel_items']);

    include(locate_template('inc/shortcodes/shortcode-acc_carousel.php'));

    return ob_get_clean();
}

add_shortcode('acc_recent_posts', 'acc_recent_posts_funct');
function acc_recent_posts_funct($atts) {
    ob_start();
    $atts = shortcode_atts(array(
        'acc_recent_posts_number' => '3',
        'acc_recent_posts_columns' => '3',        
    ), $atts, 'acc_recent_posts');

    include(locate_template('inc/shortcodes/shortcode-acc_recent_posts.php'));

    return ob_get_clean();
}

add_shortcode('acc_persons', 'acc_persons_funct');
function acc_persons_funct($atts, $content) {
    ob_start();
    $atts = shortcode_atts(array(
        'acc_persons_number' => '6',
        'el_class' => '',        
    ), $atts, 'acc_persons');

    include(locate_template('inc/shortcodes/shortcode-acc_persons.php'));

    return ob_get_clean();
}

add_shortcode('acc_person', 'acc_person_funct');
function acc_person_funct($atts, $content) {
    ob_start();
    $atts = shortcode_atts(array(
        'acc_person_img' => '',
        'acc_person_name' => '', 
        'acc_person_title' => '',      
    ), $atts, 'acc_person');

    include(locate_template('inc/shortcodes/shortcode-acc_person.php'));

    return ob_get_clean();
}