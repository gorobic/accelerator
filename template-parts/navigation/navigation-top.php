<nav class="navbar navbar-expand-lg navbar-light border-top border-bottom">
    <button class="navbar-toggler border-0 px-0 ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#header-nav-bar" aria-controls="header-nav-bar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse w-100" id="header-nav-bar">
        <?php if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container' => null,
                'menu_class' => 'navbar-nav w-100 justify-content-center text-uppercase',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
        } ?>
    </div>
</nav>