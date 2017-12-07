<?php while (have_posts()) : the_post(); ?>
<?php  get_template_part('templates/post', 'header'); ?>
<div class="ps ps--narrow ps--nobottom">
    <?php get_template_part('templates/promotion','wide'); ?>
</div>
<article <?php post_class('thepost ps'); ?>>
    <div class="row">
        <div class="columns">
            <header class="thepost__header">
                <div class="thepost__meta">
                    <?php get_template_part('templates/entry-meta'); ?>
                </div>
                <h1 class="thepost__title"><?php the_title(); ?></h1>
            </header>
            <?php if ( has_excerpt() != '' ) :?>
            <div class="thepost__lead lead"><?php the_excerpt(); ?></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="columns large-8">
            <?php if (has_post_thumbnail() ) : ?>
            <figure class="thepost_featimage">
                <?php the_post_thumbnail('medium_Large' ); ?>
            </figure>
            <?php endif; ?>
            <div class="thepost__content content">
                <?php the_content(); ?>
            </div>
            <footer class="thepost__footer">
                <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
            </footer>
            <?php get_template_part('templates/relposts'); ?>
            <?php comments_template('/templates/comments.php'); ?>
        </div>
        <div class="columns large-4">
            <div class="thepost__aside">
                <?php get_template_part('templates/promotion'); ?>
                <br>
                <?php get_template_part('templates/upcoming','events'); ?>
            </div>
        </div>
    </div>
</article>
<?php endwhile; ?>
<?php get_template_part('templates/featwalks' ); ?>