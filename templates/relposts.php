<?php $relposts = get_field('relatedposts'); ?>
<?php if ( is_array($relposts) ) : ?>
<aside class="promoposts thepost__promoposts ps ps--narrow">
    <h2 class="indentedtitle"><?= __('Related posts', 'airon') ?></h2>
    <ul class="promopost">
        <?php foreach ( $relposts as $key => $post) : ?>
        <?php setup_postdata( $post ); ?>
        <li class="promopost__item">
            <h3 class="promopost__title"><time class="promopost__updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
    <a class="promoposts__action" href="<?php the_permalink(get_option( 'page_for_posts' )); ?>"><?= __('See all posts') ?>&hellip;</a>
</aside>
<?php endif; ?>