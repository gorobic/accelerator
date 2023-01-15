<?php 
// Post types and taxonomies
function acep_create_posttypes_and_taxonomies() {
    register_post_type( 'acep_artists',
        array(
            'labels' => array(
                'name' => __( 'Artists' ),
                'singular_name' => __( 'Artist' )
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions'),
            'has_archive' => false,
			'hierarchical' => false,
            'rewrite' => array('slug' => 'artist'),
        )
    );

    register_post_type( 'acep_works',
        array(
            'labels' => array(
                'name' => __( 'Works' ),
                'singular_name' => __( 'Work' )
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions'),
            'has_archive' => false,
			'hierarchical' => false,
            'rewrite' => array('slug' => 'work'),
        )
    );

    

    register_taxonomy('acep_edition',array('acep_artists'), array(
        'hierarchical' => true,
        'has_archive' => false,
        'publicly_queryable'=> false,
        'labels' => array(
            'name' => _x('Editions','taxonomy general name'),
            'singular_name' => _x('Edition','taxonomy general name'),
        ),
        // 'rewrite' => array( 'slug' => 'edition' ),
    ));

    register_taxonomy('acep_exhibition',array('acep_works'), array(
        'hierarchical' => true,
        'has_archive' => false,
        'publicly_queryable'=> false,
        'labels' => array(
            'name' => _x('Exhibitions','taxonomy general name'),
            'singular_name' => _x('Exhibition','taxonomy general name'),
        ),
    ));

}
add_action( 'init', 'acep_create_posttypes_and_taxonomies' );