<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main my-5 text-center" role="main">
        <h1 class="mb-4">
            404
        </h1>

        <p class="mb-4">
            <?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for.', 'accelerator'); ?>
        </p>

        <a href="/" class="btn btn-outline-primary rounded-0 text-uppercase">
        <?php _e('Go to home page', 'accelerator'); ?>
        </a>

    </main>
</div>

<?php get_footer(); ?>