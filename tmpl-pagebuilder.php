<?php
/**
 * Template Name: Pagebuilder
 */
?>
<?php use Roots\Sage\Titles; ?>
<?php $pagehaspswpgallery = false; ?>
<?php while (have_posts()) : the_post(); ?>
<?php if( have_rows('sections') ): $siter=1?>
    <?php while( have_rows('sections') ): the_row(); ?>
        <?php switch ( get_row_layout() ) {
            case 'hero' : ?>
            <section id="section-<?= $siter++ ?>" class="hero" data-magellan>
                <figure class="hero__bg">
                    <?php $headerimage = get_sub_field('bgimage'); ?>
                    <?= wp_get_attachment_image($headerimage['id'],'xxlarge'); ?>
                </figure>
                <div class="row column">
                    <div class="hero__inner">
                        <div class="hero__content" data-magellan data-bar-offset="0">
                            <p class="hero__subtext"><?php the_sub_field('subtext') ?></p>
                            <h3 class="hero__maintext"><?php the_sub_field('maintext') ?></h3>
                            <p class="hero__lead"><?php the_sub_field('lead') ?></p>
                            <a href="<?php the_sub_field('buttonurl') ?>" class="hero__action hero__action--down"><?php the_sub_field('buttontext') ?></a>
                        </div>
                    </div>
                </div>
            </section>
            <?php break; ?>
            <?php case 'mpt' : ?>
            <section id="section-<?= $siter++ ?>" class="mpt <?= get_sub_field('mpt_style').' '.get_sub_field('mpt_width').' '.get_sub_field('mpt_hflow'); ?>" data-magellan>
                <div class="mpt__content">
                    <?php the_sub_field('mpt_content'); ?>
                </div>
                <?php if ($mpt_image = get_sub_field('mpt_image')) : ?>
                <div class="mpt__media">
                    <figure class="mpt__fig">
                        <?= wp_get_attachment_image( $mpt_image, 'mptimage' ); ?>
                    </figure>
                </div>
                <?php endif; ?>
                <?php if ($mpt_bg = get_sub_field('mpt_bg')) : ?>
                <div class="mpt__bg">
                    <?= wp_get_attachment_image( $mpt_bg, 'mptbg' ); ?>
                </div>
                <?php endif; ?>
            </section>
            <?php break; ?>
            <?php case 'gridgallery' : ?>
                <?php if ( $gridgallery_gallery = get_sub_field('gridgallery_gallery') ): ?>
                    <?php if ( get_sub_field('gridgallery_layout') === 'grid' ): ?>
                        <?php $pagehaspswpgallery = true; ?>
                        <section id="section-<?= $siter++ ?>" class="pagewrap xlight">
                            <ul class="gridgallery" itemscope itemtype="http://schema.org/ImageGallery">
                            <?php foreach( $gridgallery_gallery as $gitem ) : ?>
                                <?php $ratio = $gitem['height'] / $gitem['width'] * 100; ?>
                                <li>
                                <figure class="mediaitem" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                    <a class="mediaitem__link" href="<?php echo esc_url($gitem['url']); ?>" itemprop="contentUrl" caption="<?= esc_html($gitem['caption']); ?>" data-size="<?= $gitem['width'].'x'.$gitem['height'] ?>" style="padding-bottom: <?= $ratio.'%'; ?>">
                                        <img class="mediaitem__media" src="<?php echo esc_url($gitem['sizes']['medium']); ?>" itemprop="thumbnail" alt="<?php echo esc_attr($gitem['alt']); ?>" />
                                    </a>
                                    <?php if ($gitem['caption']) : ?>
                                    <figcaption class="mediaitem__caption"><?php echo esc_html($gitem['caption']); ?></figcaption>
                                    <?php endif; ?>
                                </figure>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </section>
                    <?php else : ?>
                        <?php $image_ids = get_sub_field('gridgallery_gallery', false, false); ?>
                        <section id="section-<?= $siter++ ?>">
                            <header class="pagewrap notop nobottom" style="position: absolute; z-index:2; padding-top:1rem;">
                                <nav class="sectionheader__nav">
                                    <div id="slidernav" class="slidernav owl-nav"></div>
                                </nav>
                            </header>

                            <div class="bupapslider">
                                <div class="owl-carousel owl-slider">
                                    <?php foreach( $image_ids as $image_id ): ?>
                                    <div class="bupapslider__item">
                                        <?= wp_get_attachment_image( $image_id, 'medium_large', true, array( 'class' => 'bupapslider__img') ); ?>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                <?php endif; ?>
            <?php break; ?>
            <?php case 'testimonials' :?>
                <?php if( have_rows('testimonials') ): ?>
                    <section id="section-<?= $siter++ ?>" class="pagewrap axlight">
                        <div class="xnarrowwrap">
                            <div class="walk__testiblock ps ps--narrow">
                                <h3 class="widget__title text-right">
                                    <?php _e('Velünk voltak, fülünkbe súgták', 'dt'); ?>
                                </h3>
                                <div class="owl-carousel owl-testi owl-theme-testi">
                                    <?php while ( have_rows('testimonials') ) : the_row(); ?>
                                    <div>
                                        <blockquote class="walk__quote">
                                            <?php the_sub_field('text') ?>
                                            <cite><?php the_sub_field('citename') ?><br><em><?php the_sub_field('citerole') ?></em></cite>
                                        </blockquote>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php endif; ?>
            <?php break; ?>

        <?php } ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php endwhile; ?>
<?php if ($pagehaspswpgallery) { get_template_part('templates/pswp'); } ?>






