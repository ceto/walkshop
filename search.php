<?php get_template_part('templates/page', 'header'); ?>
<div class="wrapper wrapper--narrow">
    <div class="row column">
    <?php if (!have_posts()) : ?>
        <div class="ps ps--narrow">
            <div class="alert alert-warning">
                <?php _e('Sorry, no results were found.', 'sage'); ?>
            </div>
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>

    <?php while (have_posts()) : the_post(); ?>
        <div class="ps ps--narrow">
            <?php get_template_part('templates/content', 'search'); ?>
        </div>
    <?php endwhile; ?>
    <?php the_posts_navigation(); ?>
    </div>
</div>