</div>
</div>
<footer class="container">
    <?php
    $related_subsite = get_field('acep_related_subsite');
    if ($related_subsite) {
        if ($related_subsite != get_current_blog_id()) {
            $sites = get_sites();
            $sites_ids = array_column($sites, 'blog_id');
            if (in_array($related_subsite, $sites_ids)) {
                $related_subsite_id = $related_subsite;
            }
        }
    }

    if ($related_subsite_id) {
        switch_to_blog($related_subsite_id);
    }

    if (get_theme_mod('acep_footer_text')) { ?>
        <div class="footer-disclaimer border-top py-4 py-md-5">
            <?php echo do_shortcode(get_theme_mod('acep_footer_text')); ?>
        </div>
    <?php } ?>

    <?php
    $footer_widgets_slug = 'footer-logos';
    $footer_widgets_posts = get_posts([
        'post_type' => 'wp_block',
        'title'     => $footer_widgets_slug,
    ]);

    // If a block was located print it and return true.
    if ($footer_widgets_posts && isset($footer_widgets_posts[0])) { ?>
        <div class="py-3 border-top">
            <?php echo do_blocks($footer_widgets_posts[0]->post_content); ?>
        </div>
    <?php } ?>
    <?php if (have_rows('acep_options_media_partners', 'options')) { ?>
        <div class="footer-media-partners border-top py-3">
            <?php if (get_field('acep_options_media_partners_header', 'options')) { ?>
                <div class="text-center mb-1 h3">
                    <?php the_field('acep_options_media_partners_header', 'options'); ?>
                </div>
            <?php } ?>
            <div class="row align-items-center justify-content-center">
                <?php while (have_rows('acep_options_media_partners', 'options')) {
                    the_row(); ?>
                    <div class="col-auto">
                        <div class="position-relative">
                            <img class="lazy" data-src="<?php the_sub_field('acep_options_media_partner_logo'); ?>" alt="">
                            <?php if (get_sub_field('acep_options_media_partner_url')) { ?>
                                <a href="<?php the_sub_field('acep_options_media_partner_url'); ?>" class="stretched-link" target="_blank" rel="nofollow"></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <?php if ($related_subsite_id) {
        restore_current_blog();
    } ?>
</footer>
</div>

<?php wp_footer(); ?>
</body>

</html>