<div class="meta">
<p class="meta__by">
    <?php if (get_field('hascustomauthor')) : ?>
        <?= get_field('customauthorname'); ?>
    <?php else: ?>
        <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a>
    <?php endif; ?>
</p>
<time class="meta__updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
<?php // echo get_the_category_list( '|', $parents, $post_id ); ?>
</div>
