<?php if ( is_active_sidebar( 'footer-widgets' )){ ?>

<div class="bg-light">
    <div class="container py-4">
        <aside class="widget-area row" role="complementary"
            aria-label="<?php esc_attr_e( 'Footer', 'text_domain' ); ?>">
            <?php dynamic_sidebar( 'footer-widgets' ); ?>
        </aside><!-- .widget-area -->
    </div>
</div>

<?php } ?>