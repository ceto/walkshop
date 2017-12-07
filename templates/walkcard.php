<?php
    $events = tribe_get_events( array(
        'posts_per_page' => -1,
        'meta_key' => '_EventStartDate',
        'order_by' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key'     => '_tribe_linked_post_walk',
                'value'   => get_the_id()
            )
        )
    ) );
?>
<div class="walkcard">
    <figure class="walkcard__fig">
        <a href="<?php the_permalink(); ?>" class="walkcard__img">
            <?php the_post_thumbnail('medium_large'); ?>
        </a>
    </figure>
    <header class="walkcard__head">
        <h3 class="walkcard__title"><a href="<?php the_permalink(); ?>"><?= (!empty($events))?'<svg class="icon"><use xlink:href="#icon-calendar-alt"></use></svg> ':''  ?><?php the_title(); ?></a></h3>
        <h4 class="walkcard__subtitle"><?php the_field('subtitle') ?></h4>
    </header>
    <div class="walkcard__body">
        <?php the_excerpt(); ?>
    </div>
    <footer class="walkcard__foot">
        <div class="walkcard__actions">
            <a href="<?php the_permalink(); ?>" class="walkcard__button"><?= (!empty($events))?'Regisztráció és jegyvásárlás':'Tovább a részletekre'  ?></a>
        </div>
    </footer>
</div>