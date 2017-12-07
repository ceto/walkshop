<article <?php post_class('ps ps--narrow'); ?>>
        <header class="hentry__header">
            <div class="hentry__meta">
              <?php get_template_part('templates/entry-meta'); ?>
            </div>
            <h2 class="hentry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>
        <div class="hentry__summary">
            <?php the_excerpt(); ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="button tiny hentry__readmore"><?php _e('Read more', 'bupap'); ?>&hellip;</a>
</article>