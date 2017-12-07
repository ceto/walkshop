<nav class="topbar">
    <div class="topbar__inner">
        <div class="topbar__home">
            <a href="<?= esc_url(home_url('/')); ?>" class="sitelogo">Sétaműhely</a>
        </div>
        <div class="topbar__mainnav show-for-tablet">
            <?php
                if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu dropdown menu--main', 'items_wrap' => '<ul class="%2$s" data-dropdown-menu data-click-open="true" data-disable-hover="true">%3$s</ul>']);
                endif;
            ?>
        </div>
        <div class="topbar__actionblock">
            <a class="topbar__button topbar__button--menutoggler hide-for-tablet" data-toggle="mobilenavcanvas" href="#">
                <svg class="icon"><use xlink:href="#icon-menu"></use></svg><br>
                Menü
            </a>
        </div>
    </div>
</nav>
