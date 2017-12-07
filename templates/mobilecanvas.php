<nav class="mobilenav">
    <?php
        if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu dropdown menu--mobile vertical', 'items_wrap' => '<ul class="%2$s" data-accordion-menu>%3$s</ul>']);
        endif;
    ?>
</nav>
<?php dynamic_sidebar('sidebar-offcanvas'); ?>
<div class="mobilecontact">
    <p>
    <strong>Contact</strong><br>
    Tel.: <a href="tel:+36.70.408.6888">+36.70.408.6888</a><br>
    E-mail: <a href="mailto:info@setamuhely.hu">info@setamuhely.hu</a>
    </p>
</div>