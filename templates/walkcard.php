<div class="walkcard">
    <figure class="walkcard__fig">
        <a href="<?php the_permalink(); ?>" class="walkcard__img">
            <?php the_post_thumbnail('medium_large'); ?>
        </a>
    </figure>
    <header class="walkcard__head">
        <h3 class="walkcard__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <h4 class="walkcard__subtitle"><?php the_field('subtitle') ?></h4>
    </header>
    <div class="walkcard__body">
        <?php the_excerpt(); ?>
    </div>
    <footer class="walkcard__foot">
        <div class="walkcard__actions">
            <a href="<?php the_permalink(); ?>" class="walkcard__button"><?= _e('Click for details', 'bupap'); ?></a>
        </div>
    </footer>
</div>