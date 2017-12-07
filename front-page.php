<?php while (have_posts()) : the_post(); ?>
<?php get_template_part( 'templates/hero'); ?>
<section class="home__welcome ps ps--extralight ps--bordered">
    <div class="row">
        <div class="columns large-8 axlarge-7 bodycopy">
            <h1><?php the_title(); ?></h1>
            <?php if ( has_excerpt() != '' ) :?>
                <div class="thepage__lead lead"><?php the_excerpt(); ?></div>
            <?php endif; ?>
            <div class="wseries__lead">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="columns large-4">
        <br>
            <?php get_template_part('templates/promotion'); ?>
        </div>
    </div>
</section>
<?php $featwalks = get_field('featuredwalks', 'option'); ?>
<section class="home__featured ps aps--narrow">
    <header class="sectionheader">
        <h3 class="sectionheader__title">Legnépszerűbb séták</h3>
        <nav class="sectionheader__nav"><a class="showall" href="<?php the_field('walklisterpage', 'option'); ?>">Mutasd mind</a></nav>
    </header>
    <ul class="promoted__list">
        <?php foreach( $featwalks as $post): ?>
        <?php setup_postdata($post); ?>
        <li><?php get_template_part('templates/promocard' ); ?></li>
        <?php endforeach; ?>
    </ul>
</section>
<?php wp_reset_postdata(); ?>
<section class="home__news ps ps--extralight ps--bordered">
    <div class="row column">
            <?php
                $fpargs = array(
                'post_type' => 'post',
                'posts_per_page'         => 3,
                );
                $freshposts = new WP_Query( $fpargs );
            ?>
            <h3 class="wseries__shorttitle">Műhelyhírek és aktualitások</h3>
            <ul class="presslist">
                <?php while ($freshposts->have_posts()) : $freshposts->the_post(); ?>
                <li>
                    <?php get_template_part('templates/content','presspost' ); ?>
                </li>
                <?php endwhile ?>
            </ul>
            <?php wp_reset_postdata(); ?>
            <br>
            <a class="littlemore" href="<?= get_permalink( get_option( 'page_for_posts' ) ); ?>">További cikkek</a>
    </div>
</section>
<?php endwhile; ?>