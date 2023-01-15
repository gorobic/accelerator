        </div>
    </div>
    <footer class="container">
        <div class="border-top border-bottom py-4 py-md-5">
            <?php echo do_shortcode(get_theme_mod( 'acep_footer_text' )); ?>
        </div>

        <div class="row footer-logos align-items-center py-3">
            <div class="col-md-4 text-center text-md-start">
                <a href="https://eeagrants.org/" class="eea-grants-logo" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo-iceland-lichtenstein-norway-grant.svg'; ?>" alt="Iceland Lichtenstein Norway Grant logo">
                </a>
            </div>
            <div class="col-md-8 text-center text-md-end">
                <div class="row align-items-center justify-content-center justify-content-md-end">
                    <div class="col-auto">
                        <a href="http://www.cultura.ro/" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo-ministerul-culturii.png'; ?>" alt="Ministerul Culturii logo">
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="https://www.umpcultura.ro/" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo-ump.svg'; ?>" alt="UMP logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php if( have_rows('acep_options_media_partners', 'options') ){ ?>
            <div class="footer-media-partners border-top py-3">
                <?php if(get_field('acep_options_media_partners_header', 'options')){ ?>
                    <div class="text-center mb-1 h3">
                        <?php the_field('acep_options_media_partners_header', 'options'); ?>
                    </div>
                <?php } ?>
                <div class="row align-items-center justify-content-center">
                    <?php while( have_rows('acep_options_media_partners', 'options') ) { the_row(); ?>
                        <div class="col-auto">
                            <div class="position-relative">
                                <img class="lazy" data-src="<?php the_sub_field('acep_options_media_partner_logo'); ?>" alt="">
                                <?php if(get_sub_field('acep_options_media_partner_url')){ ?>
                                    <a href="<?php the_sub_field('acep_options_media_partner_url'); ?>" class="stretched-link" target="_blank" rel="nofollow"></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </footer>
</div>

<?php wp_footer(); ?>
</body>

</html>