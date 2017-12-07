<?php
/**
* Template Name: About Us Page with Guide list
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part( 'templates/hero','narrow'); ?>
<div data-sticky-container>
    <nav class="stickynav sticky" data-sticky data-anchor="psecseries" data-stick-to="top" data-margin-top="0" data-margin-bottom="0" data-sticky-on="small">
        <div class="row collapse">
            <div class="columns">
                <div class="stickynav__inner">
                    <div class="stickynav__themenu">
                        <ul class="scrollmenu scrollmenu--topsticker" data-magellan data-bar-offset="0">
                            <li><a href="#<?= sanitize_title('Kik vagyunk') ?>">Kik vagyunk</a></li>
                            <li><a href="#<?= sanitize_title('A Csapat') ?>">A Csapat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<?php $iter=0; ?>
<div id="psecseries" class="psecseries" data-megellan-target="psecseries">
    <?php $iter++; ?>
    <section id="<?= sanitize_title('Kik vagyunk') ?>" data-magellan-target="<?= sanitize_title('Kik vagyunk') ?>" class="ps <?= ($iter%2==0)?'ps--extralight':'' ?>">
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
    <?php $iter++; ?>
    <section id="<?= sanitize_title('A Csapat') ?>" data-magellan-target="<?= sanitize_title('A Csapat') ?>" class="ps <?= ($iter%2==0)?'ps--extralight':'' ?>">
        <header class="sectionheader">
            <h3 class="sectionheader__title">Akikkel együtt sétálhatsz</h3>
        </header>
        <?php
            $gargs = array(
                'post_type' => 'guide',
                'order'               => 'ASC',
                'orderby'             => 'menu_order',
                'posts_per_page'         => -1,
            );
            $allguides = new WP_Query( $gargs );
            ?>
        <div class="row medium-up-2 large-up-3 dctable">
            <?php while ($allguides->have_posts()) : $allguides->the_post(); ?>
                <div class="columns">
                    <?php get_template_part('templates/drivercard' ); ?>
                </div>
            <?php endwhile ?>
        </div>
        <?php wp_reset_postdata(); ?>
    </section>
</div>
<?php endwhile; ?>