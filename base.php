<?php
use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
    <?php get_template_part('templates/head'); ?>
    <body <?php body_class(); ?>>
        <div class="off-canvas-wrapper">
            <div class="off-canvas-content" data-off-canvas-content>
                <?php
                    do_action('get_header');
                    get_template_part('templates/topbar');
                ?>
                <div class="document" role="document">
                    <main class="main" role="main">
                        <?php include Wrapper\template_path(); ?>
                    </main><!-- /.main -->
                </div><!-- /.document -->
                <?php
                    do_action('get_footer');
                    get_template_part('templates/footer');
                ?>
            </div>
            <div class="off-canvas position-left mobilenavcanvas" id="mobilenavcanvas" data-off-canvas data-auto-focus="false">
                <?php get_template_part('templates/mobilecanvas'); ?>
            </div>
        </div>
        <?php get_template_part('templates/svg','icons'); ?>
        <?php wp_footer(); ?>
    </body>
</html>