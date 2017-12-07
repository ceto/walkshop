<?php while (have_posts()) : the_post(); ?>
<article <?php post_class('theguide ps'); ?>>
    <div class="row">
        <div class="columns tablet-4">
            <?php if (has_post_thumbnail() ) : ?>
                <figure class="theguide_featimage">
                    <?php the_post_thumbnail('medium_Large' ); ?>
                </figure>
            <?php else:  ?>
                <figure class="theguide_featimage">
                    <img src="http://placehold.it/768x1024" alt="">
                </figure>
            <?php endif; ?>
            <footer class="theguide__footer">
                <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
            </footer>
        </div>
        <div class="columns tablet-8">
            <div class="theguide__aside">
                <header class="theguide__header">
                    <h1 class="theguide__title"><?php the_title(); ?></h1>
                    <p class="theguide__role"><?php the_field(role) ?></p>
                </header>
                <?php if ( has_excerpt() != '' ) :?>
                    <div class="theguide__lead lead"><?php the_excerpt(); ?></div>
                <?php endif; ?>
                <div class="theguide__content bodycopy">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</article>
<?php
    $currguide = $post;
    $noofwalks = 0;
    $wargs = array(
        'post_type' => 'walk',
        'order'               => 'ASC',
        'orderby'             => 'menu_order',
        'posts_per_page'         => -1,
    );
    $allwalks = new WP_Query( $wargs );
?>
<section class="ps aps--narrow ps--extralight ps--bordered">
    <header class="sectionheader">
        <h3 class="sectionheader__title">Találkozhatsz vele</h3>
        <nav class="sectionheader__nav"><a class="showall" href="<?php the_field('walklisterpage', 'option'); ?>">Összes séta</a></nav>
    </header>
    <ul class="promoted__list">
        <?php while ($allwalks->have_posts()) : $allwalks->the_post(); ?>
            <?php if (isitaguidefor($currguide,$post)) :?>
                <li><?php get_template_part('templates/promocard' ); ?></li>
                <?php  if (++$noofwalks == 3 ) {break;} ?>
            <?php endif; ?>
        <?php endwhile; ?>
        <?php if ($noofwalks==0) : ?>
            <li><p>Feltöltés alatt</p></li>
        <?php endif; ?>
    </ul>
</section>
<?php wp_reset_postdata(); ?>
<?php endwhile; ?>