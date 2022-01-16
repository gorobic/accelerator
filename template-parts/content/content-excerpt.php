<article <?php post_class(''); ?> id="post-<?php the_ID(); ?>">
    <a href="<?php echo esc_url( get_permalink() ); ?>" class="text-center text-decoration-none">
        <div class="lazy ratio ratio-16x9 bg-cover bg-dark bg-opacity-10" data-src="<?php echo get_the_post_thumbnail_url(); ?>"></div>
        <header class="entry-header mt-3">
            <h2 class="title fs-5 fw-normal">
                <?php the_title(); ?>
            </h2>
        </header>
    </a>
</article>