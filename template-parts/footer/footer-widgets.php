<?php if (is_active_sidebar('footer-widgets')) { ?>

    <div class="container py-4">
        <aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e('Footer', 'text_domain'); ?>">
            <?php dynamic_sidebar('footer-widgets'); ?>
        </aside><!-- .widget-area -->
    </div>

<?php } ?>