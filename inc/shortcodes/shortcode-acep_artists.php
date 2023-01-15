<?php 
$args = array(
	'post_type' => 'acep_artists',
	'posts_per_page' => -1,
	'nopaging' => true,
);

if($atts['acep_artists_editions']){
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'acep_edition',
            'field'    => 'id',
            'terms'    => explode(',', $atts['acep_artists_editions']),
        ),
    );
}

$acep_artists = new WP_Query($args);

if ($acep_artists->have_posts()) {

    $columns = intval($atts['acep_artists_columns']); 
?>
    <div class="overflow-hidden">
        <div class="row gy-4 row-cols-2 row-cols-lg-<?php echo ($columns > 0 && $columns <= 12) ? $columns : 5; ?> <?php echo $atts['el_class']; ?>">
            <?php while ($acep_artists->have_posts()){ $acep_artists->the_post(); ?>
                <div class="col acep-artist">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                        <div class="lazy ratio ratio-1x1 bg-cover bg-dark bg-opacity-10 featured-image" data-src="<?php echo get_the_post_thumbnail_url(); ?>">
                            <div>
                                <div class="arrow">
                                    <span class="acepicon-arrow-right"></span>
                                </div>
                            </div>
                        </div>
                        <header class="entry-header mt-3">
                            <?php if(get_the_title()){ ?>
                                <h2 class="title fs-5 fw-normal">
                                    <?php echo the_title(); ?>
                                </h2>
                            <?php } ?>
                        </header>
                    </a>
                </div>
            <?php } wp_reset_postdata(); ?>
        </div>
    </div>
<?php } ?>