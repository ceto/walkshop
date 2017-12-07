<section class="hero hero--narrow">
    <figure class="hero__bg">
            <?php $headerimage = get_field('bgimage'); ?>
            <?= wp_get_attachment_image($headerimage['id'],'full'); ?>
    </figure>
    <div class="row column">
        <div class="hero__inner">
            <div class="hero__content" data-magellan data-bar-offset="0">
                <p class="hero__subtext"><?php the_field('maintext') ?></p>
                <h3 class="hero__maintext"><?php the_field('subtext') ?></h3>
                <p class="hero__lead"><?php the_field('lead') ?></p>
            </div>
        </div>
    </div>
</section>