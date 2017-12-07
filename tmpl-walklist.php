<?php
/**
* Template Name: Cascaded List of Walks
*/
?>
<?php
$topics = get_terms( array(
'taxonomy' => 'topic',
'hide_empty' => false,
'orderby' => 'count',
'order' => 'desc'
));
?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part( 'templates/hero','narrow'); ?>
<div data-sticky-container>
    <nav class="stickynav sticky" data-sticky data-anchor="walkseries" data-stick-to="top" data-margin-top="0" data-margin-bottom="0" data-sticky-on="small">
        <div class="row collapse">
            <div class="columns">
                <div class="stickynav__inner">
                    <div class="stickynav__themenu">
                        <ul class="scrollmenu scrollmenu--topsticker" data-magellan data-bar-offset="0">
                            <?php foreach ( $topics as $topic ) :  ?>
                            <li><a href="#<?= $topic->slug ?>"><?= $topic->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<div id="walkseries" class="walkseries" data-megellan-target="walkseries">

    <?php foreach ( $topics as $topic ) :  ?>
    <section id="<?= $topic->slug ?>" data-magellan-target="<?= $topic->slug ?>" class="wseries ps">
        <header class="wseries__head">
            <h3 class="wseries__shorttitle"><?= $topic->name ?></h3>
            <h2 class="wseries__title"><?= get_field('subtitle','topic_'.$topic->term_id) ?></h2>
            <p class="wseries__lead"><?= $topic->description ?></p>
        </header>
        <?php
        $args = array(
        'post_type' => array('walk'),
        'order'               => 'ASC',
        'orderby'             => 'menu_order',
        'posts_per_page'         => -1,
        'tax_query' => array(
        array(
        'taxonomy'         => 'topic',
        'field'            => 'id',
        'terms'            => $topic->term_id,
        )
        ),
        );
        $walks = new WP_Query( $args );
        ?>
        <div class="wseries__items">
            <ul class="wseries__list">
                <?php while ($walks->have_posts()) : $walks->the_post(); ?>
                <li><?php get_template_part('templates/walkcard'); ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <?php wp_reset_postdata(); ?>
    </section>
    <?php endforeach; ?>
</div>
<div class="ps ps--narrow">
    <?php get_template_part('templates/promotion','wide'); ?>
</div>
<?php endwhile; ?>