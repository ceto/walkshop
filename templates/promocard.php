<div class="promocard">
    <figure class="promocard__fig">
        <a href="<?php the_permalink(); ?>" class="promocard__img">
            <?php the_post_thumbnail('medium_large'); ?>
        </a>
    </figure>
    <div class="promocard__body">
        <h3 class="promocard__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <p class="promocard__text"><a href="<?php the_permalink(); ?>"><?php the_field('subtitle') ?></a></p>

        <p class="promocard__subtext">
            <a href="<?php the_permalink(); ?>" class="walkcard__button"><?= _e('Click for details', 'bupap'); ?></a>
        </p>

    </div>
</div>