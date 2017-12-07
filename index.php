<div class="ps ps--narrow ps--nobottom">
    <?php get_template_part('templates/promotion','wide'); ?>
</div>
<?php if (!have_posts()) : ?>
<div class="ps ps--narrow">
    <div class="row">
        <div class="columns large-8 large-centered">
            <?php _e('Sorry, no results were found.', 'sage'); ?>
            <?php get_search_form(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="ps ps--narrow">
    <div class="row">
        <div class="columns large-8">
            <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
            <?php endwhile; ?>
            <?php the_posts_navigation(); ?>
        </div>
        <div class="columns large-4">
            <div class="thearchive__aside ps ps--narrow">
                <?php get_template_part('templates/promotion'); ?>
                <br><br>
                <?php get_template_part('templates/upcoming','events'); ?>
            </div>
        </div>
    </div>
</div>