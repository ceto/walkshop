<?php while (have_posts()) : the_post(); ?>
<article class="walk">
    <header class="walk__head ps ps--narrow">
        <div class="row column">
            <p class="walk__presents"><?php the_field('owner') ?> <span>presents</span></p>
            <h1 class="walk__title"><?php the_title(); ?></h1>
            <h2 class="walk__subtitle"><?php the_field('subtitle') ?></h2>
        </div>
    </header>
    <div class="walk__banner" data-equalizer adata-equalize-on="medium">
        <div class="walk__banner__one" adata-equalizer-watch>
            <figure class="walk__herofig">
                <?php the_post_thumbnail('full'); ?>
            </figure>
        </div>
        <div id="ticketblock" class="walk__banner__two" data-equalizer-watch data-magellan-target="ticketblock">
            <div class="walk__important">
                <ul class="facts">
                    <li>Prices <span class="facts__value"><?php the_field('price') ?></span></li>
                    <li>Duration <span class="facts__value"><?php the_field('duration') ?></span></li>
                </ul>
            </div>
            <section class="walk__events">
                <h3 class="walk__events__title">READY TO GET STARTED? <span>Get in touch by Email</span></h3>
                <ul class="dateboxlister">
                    <li>
                        <div class="datebox adatebox--secondary">
                            <p>Reservation is available</p>
                            <a data-open="newsletterModal" href="mailto:info&setamuhely.hu"
                                class="datebox__action"><span>Send e-mail</span></a>
                        </div>
                    </li>
                </ul>
            </section>
        </div>
    </div>
    <section class="walk__lead ps ps--narrow ps--nobottom">
        <div class="row">
            <div class="columns large-8 large-offset-2">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </section>
    <section class="walk__main ps ps--notop">
        <div class="row">
            <div class="columns large-8 large-offset-2 ps ps--narrow bodycopy">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <?php
    $image_ids = get_field('gallery', false, false);
    if( $image_ids ): ?>
    <section class="walk__gallery">
        <header class="sectionheader sectionheader--small">
            <h3 class="sectionheader__title">Photos…</h3>
            <nav class="sectionheader__nav"><a class="showall" href="">Start gallery</a></nav>
        </header>
        <div class="bupapslider">
            <div class="owl-carousel owl-slider">
                <?php foreach( $image_ids as $image_id ): ?>
                <div class="bupapslider__item">
                    <?= wp_get_attachment_image( $image_id, 'medium_Large', true, array( 'class' => 'bupapslider__img') ); ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php if( have_rows('bottomtestimonials') || have_rows('press') ): ?>
    <footer class="walk__footer ps ps--narrow">
        <div class="row">
            <?php if( have_rows('bottomtestimonials') ): ?>
            <div class="columns large-6">
                <section class="walk__testiblock ps ps--narrow">
                    <h3 class="widget__title text-right">Testimonials</h3>
                    <div class="owl-carousel owl-testi owl-theme-testi">
                        <?php while ( have_rows('bottomtestimonials') ) : the_row(); ?>
                        <div>
                            <blockquote class="walk__quote">
                                <?php the_sub_field('text') ?>
                                <cite><?php the_sub_field('citename') ?><br><em><?php the_sub_field('citerole') ?></em></cite>
                            </blockquote>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            </div>
            <?php endif; ?>
            <?php if( have_rows('press') ): ?>
            <div class="columns large-6">
                <section class="walk__media ps ps--narrow">
                    <h3 class="widget__title">TV, press and radio…</h3>
                    <ul class="presslist">
                        <?php while ( have_rows('press') ) : the_row(); ?>
                        <li>
                            <div class="presslink">
                                <h4 class="presslink__title"><a href="<?php the_sub_field('url') ?>"
                                        target="_blank"><?php the_sub_field('title') ?></a></h4>
                                <p class="presslink__src">
                                    <span class="presslink__src__medium"><?php the_sub_field('medium') ?></span>
                                    <span class="presslink__src__date"><?php the_sub_field('date') ?></span>
                                </p>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </section>
            </div>
            <?php endif; ?>
        </div>
    </footer>
    <?php endif; ?>
</article>
<?php endwhile; ?>
<div class="ps ps--narrow ps--extralight ps--bordered" data-magellan>
    <div class="row column">
        <h3 class="nicetitle nicetitle--withbutton">Ready to get Started?<span>Get in touch by Email</span></h3>
        <a href="mailto:info@setamuhely.hu" class="button alert">E-mail reservation</a>
    </div>
</div>
<?php get_template_part('templates/featwalks' ); ?>