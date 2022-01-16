<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main my-5" role="main">
        <?php if (have_posts()) { ?>
        <div class="posts-wrap row gy-4">
            <?php while (have_posts()){ the_post(); ?>
                <div class="col-md-6 col-xl-4">
                    <?php get_template_part('template-parts/content/content', 'excerpt'); ?>
                </div>
            <?php } ?>
        </div>
        <div class="text-center">
            <?php echo paginate_links(
                array(
                    'prev_next' => false
                )
            ); ?>
        </div>
        <?php } else { ?>

            <p>
                <?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for.', 'accelerator'); ?>
            </p>
            <?php //get_search_form(); ?>

        <?php } ?>
    </main>
</div>

<?php get_footer(); ?>