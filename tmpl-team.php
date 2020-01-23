<?php
/**
* Template Name: About Us Page with Guide list
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part( 'templates/hero','narrow'); ?>
<div id="psecseries" class="psecseries" data-megellan-target="psecseries">
    <section id="<?= sanitize_title('Kik vagyunk') ?>" data-magellan-target="<?= sanitize_title('Kik vagyunk') ?>"
        class="ps ps--extralight">
        <div class="row">
            <div class="columns large-8">
                <div class="bodycopy">
                    <h1><?php the_title() ?></h1>
                    <?php if ( has_excerpt() != '' ) :?>
                    <div class="lead"><?php the_excerpt(); ?></div>
                    <?php endif; ?>
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="columns large-4"><br><?php get_template_part('templates/promotion'); ?></div>
        </div>
    </section>
</div>
<?php endwhile; ?>