<?php 

$acc_recent_posts_number = intval($atts['acc_recent_posts_number']);
$acc_recent_posts_columns = intval($atts['acc_recent_posts_columns']);

$args = array(
	'post_type' => 'post',
	'posts_per_page' => ($acc_recent_posts_number > 0 && $acc_recent_posts_number <= 12) ? $acc_recent_posts_number : 3,
	'nopaging' => false,
);

$acc_recent_posts = new WP_Query($args);

if ($acc_recent_posts->have_posts()) { ?>
    <div class="posts-wrap row gy-4">
        <?php while ($acc_recent_posts->have_posts()){ $acc_recent_posts->the_post(); ?>
            <div class="col-md-<?php echo ($acc_recent_posts_columns === 1) ? 12 : 6 ?> col-xl-<?php echo ($acc_recent_posts_columns > 0 && $acc_recent_posts_columns <=3) ? 12/$acc_recent_posts_columns : 3 ?>">
                <?php get_template_part('template-parts/content/content', 'excerpt'); ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>