<?php 
$args = array(
	'post_type' => 'acep_works',
	'posts_per_page' => -1,
	'nopaging' => true,
	'orderby' => 'menu_order',
	'order' => 'ASC',
);
var_dump($atts['acep_works_ids']);
if($atts['acep_works_ids']){
    $args['post__in'] = explode(',', $atts['acep_works_ids']);
    $args['orderby'] = 'post__in';
}else{
    if($atts['acep_works_exhibitions']){
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'acep_exhibition',
                'field'    => 'id',
                'terms'    => explode(',', $atts['acep_works_exhibitions']),
            ),
        );
    }
    
    if($atts['acep_works_authors']){
        $args['meta_query'] = array(
            'relation'      => 'AND',
            array(
                'key' => 'acep_work_author',
                'compare'    => 'LIKE',
                'value'    => $atts['acep_works_authors'],
            ),
        );
    }
}

$acep_works = new WP_Query($args);

if ($acep_works->have_posts()) {

    $columns = intval($atts['acep_works_columns']); 
?>
    <div class="overflow-hidden">
        <div class="row acep-works gy-4 row-cols-1 row-cols-lg-<?php echo ($columns > 0 && $columns <= 12) ? $columns : 3; ?> <?php echo $atts['el_class']; ?>">
            <?php while ($acep_works->have_posts()){ $acep_works->the_post(); ?>
                <div class="col acep-work">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                        <?php /*echo wp_get_attachment_image( $image_id, 'large' );*/ ?> 
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>   
                    
                        <header class="entry-header mt-3">
                            <?php if(get_field('acep_work_author')){ ?>
                                <div class="text-center fs-5">
                                    <?php $i = 1; foreach(get_field('acep_work_author') as $author){ ?>
                                        <?php
                                        echo get_the_title($author); 
                                        echo ($i != count(get_field('acep_work_author'))) ? ', ' : '';
                                        ?>
                                    <?php $i++; } ?>
                                </div>
                            <?php } ?>
                            <?php if(get_the_title()){ ?>
                                <h3 class="title fs-6 fw-normal text-center mb-0">
                                    <?php echo the_title(); ?>
                                </h3>
                            <?php } ?>
                        </header>
                    </a>
                </div>
            <?php } wp_reset_postdata(); ?>
        </div>
    </div>
<?php } ?>