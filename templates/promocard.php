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

            <?php
                $privevents = tribe_get_events( array(
                'posts_per_page' => -1,
                'meta_key' => '_tribe_linked_post_walk',
                'meta_value' => get_the_id(),
                ) );
            ?>

        <p class="promocard__subtext">
        <?php if (!empty($privevents)) : ?>
            <svg class="icon promocard__statusicon"><use xlink:href="#icon-calendar-alt"></use></svg>
            <ul class="promocard__list">
                <?php foreach ($privevents as $post) :?>
                    <li>
                        <?php setup_postdata( $post ); //var_dump($post);?>
                        <time datetime="<?= tribe_get_start_time( null, DATE_RFC2822 ) ?>">
                          <?= tribe_get_start_time( null, 'F' ) ?>
                          <?= tribe_get_start_time( null, 'j.' ) ?>
                        </time>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p class="promocard__subtext">
                <?= _e('Schedule is coming soon', 'bupap'); ?>
            </p>
        <?php endif; ?>
    </div>
</div>