<section class="hero hero--home">
    <figure class="hero__bg">
        <?php $headerimage = get_field('bgimage'); ?>
        <?= wp_get_attachment_image($headerimage['id'],'full'); ?>
    </figure>
    <div class="row column">
        <div class="hero__inner">
            <div class="hero__content" data-magellan data-bar-offset="0">
                <p class="hero__subtext"><?php the_field('subtext') ?></p>
                <h3 class="hero__maintext"><?php the_field('maintext') ?></h3>
                <p class="hero__lead"><?php the_field('lead') ?></p>
                <a href="<?php the_field('buttonurl') ?>" class="hero__action hero__action--down"><?php the_field('buttontext') ?></a>
            </div>
        </div>
    </div>
</section>