<article <?php post_class('presslink'); ?>>
    <h4 class="presslink__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <p class="presslink__src">
        <span class="presslink__src__medium">
            <?php if (get_field('hascustomauthor')) : ?>
                <?= get_field('customauthorname'); ?>
            <?php else: ?>
                <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a>
            <?php endif; ?>
        </span>
        <time class="presslink__src__date" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
    </p>
</article>