<?php
/**
* Template Name: Multiple Sections with Sticky Nav
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part( 'templates/hero','narrow'); ?>
<?php if( have_rows('sections') ) : ?>
    <div data-sticky-container>
        <nav class="stickynav sticky" data-sticky data-anchor="psecseries" data-stick-to="top" data-margin-top="0" data-margin-bottom="0" data-sticky-on="small">
            <div class="row collapse">
                <div class="columns">
                    <div class="stickynav__inner">
                        <div class="stickynav__themenu">
                            <ul class="scrollmenu scrollmenu--topsticker" data-magellan data-bar-offset="0">
                                <?php while( have_rows('sections') ): the_row(); ?>
                                    <li><a href="#<?= sanitize_title(get_sub_field('title')) ?>"><?= get_sub_field('title') ?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <?php $iter=0; ?>
    <div id="psecseries" class="psecseries" data-megellan-target="psecseries">
        <?php while( have_rows('sections') ): the_row(); $iter++; ?>
            <section id="<?= sanitize_title(get_sub_field('title')) ?>" data-magellan-target="<?= sanitize_title(get_sub_field('title')) ?>" class="wseries ps <?= ($iter%2==0)?'wseries--even':'' ?>">
                <header class="wseries__head">
                    <h3 class="wseries__shorttitle"><?= get_sub_field('title') ?></h3>
                    <h2 class="wseries__title"><?= get_sub_field('subtitle') ?></h2>
                    <p class="wseries__lead"><?= get_sub_field('lead') ?></p>
                    <p><a data-toggle="<?= sanitize_title(get_sub_field('title')) ?>-descr" class="button button tiny">Mutasd a részleteket</a></p>
                </header>
                 <div id="<?= sanitize_title(get_sub_field('title')) ?>-descr" class="wseries__description bodycopy is-hidden" data-toggler="is-hidden">
                    <?= get_sub_field('content') ?>
                </div>
            </section>
        <?php endwhile; ?>

    </div>
<?php endif; ?>
<?php endwhile; ?>