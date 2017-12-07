<?php while (have_posts()) : the_post(); ?>
<div class="ps">
    <div class="row">
        <div class="columns large-8 large-centered">
            <h1><?php the_title(); ?></h1>
            <?php if ( has_excerpt() != '' ) :?>
                <div class="thepage__lead lead"><?php the_excerpt(); ?></div>
            <?php endif; ?>
            <?php the_content(); ?>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </div>
    </div>
</div>
<?php endwhile; ?>