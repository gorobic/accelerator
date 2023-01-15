<?php 

$acep_recent_posts_number = intval($atts['acep_recent_posts_number']);
$acep_recent_posts_columns = intval($atts['acep_recent_posts_columns']);

$args = array(
	'post_type' => 'post',
	'posts_per_page' => ($acep_recent_posts_number > 0 && $acep_recent_posts_number <= 12) ? $acep_recent_posts_number : 3,
	'nopaging' => false,
);

$acep_recent_posts = new WP_Query($args);

if ($acep_recent_posts->have_posts()) { ?>
    <div class="posts-wrap row justify-content-center row-cols-1 row-cols-md-<?php echo ($acep_recent_posts_columns === 1) ? 1 : 2 ?> row-cols-xl-<?php echo ($acep_recent_posts_columns > 0 && $acep_recent_posts_columns <=3) ? $acep_recent_posts_columns : 3 ?> gy-4">
        <?php while ($acep_recent_posts->have_posts()){ $acep_recent_posts->the_post(); ?>
            <div class="col">
                <?php get_template_part('template-parts/content/content', 'excerpt'); ?>
            </div>
        <?php } wp_reset_postdata(); ?>
    </div>
<?php } ?>