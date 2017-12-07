<?php
/**
* Template Name: Documentation
*/
?>
<?php while (have_posts()) : the_post(); ?>
<div class="ps">
    <div class="row">

        <div class="columns large-8">
            <h1><?php the_title(); ?></h1>
            <?php if ( has_excerpt() != '' ) :?>
                <div class="thepage__lead lead"><?php the_excerpt(); ?></div>
            <?php endif; ?>
            <?php the_content(); ?>
            <?php if( have_rows('sections') ) : ?>
                <?php $iter=0; ?>
            <ul class="accordion accordion--documentation" data-accordion data-allow-all-closed="true">
                <?php while( have_rows('sections') ): the_row();  ?>
                <li class="accordion-item <?= (++$iter==1)?'is-active':''; ?>" data-accordion-item >
                    <a href="#<?= sanitize_title(get_sub_field('title')) ?>" class="accordion-title"><?= get_sub_field('title') ?></a>
                    <div id="<?= sanitize_title(get_sub_field('title')) ?>" class="accordion-content" data-tab-content>
                        <div class="bodycopy">
                            <p class="lead"><?= get_sub_field('lead') ?></p>
                            <?= get_sub_field('content') ?>
                        </div>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <div class="columns large-4">
            <?php get_template_part('templates/promotion'); ?>
        </div>
    </div>
</div>
<?php endwhile; ?>