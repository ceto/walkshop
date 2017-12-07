<?php $featwalks = get_field('featuredwalks', 'option'); ?>
<section class="ps">
    <header class="sectionheader">
        <h3 class="sectionheader__title">Ajánljuk figyelmedbe</h3>
        <nav class="sectionheader__nav"><a class="showall" href="<?php the_field('walklisterpage', 'option'); ?>">Összes séta</a></nav>
    </header>
    <ul class="promoted__list">
        <?php foreach( $featwalks as $post): ?>
        <?php setup_postdata($post); ?>
        <li><?php get_template_part('templates/promocard' ); ?></li>
        <?php endforeach; ?>
    </ul>
</section>
<?php wp_reset_postdata(); ?>