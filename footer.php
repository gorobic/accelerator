        </div>
    </div>
    <footer class="container">
        <div class="border-top border-bottom py-4 py-md-5">
            <?php echo do_shortcode(get_theme_mod( 'acc_footer_text' )); ?>
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

    </footer>
</div>
<?php wp_footer(); ?>
</body>

</html>