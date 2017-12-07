<?php
/**
* Template Name: Wider Page Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
<div class="ps">
    <div class="row">
        <div class="columns xlarge-10 xlarge-centered">
            <?php the_content(); ?>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </div>
    </div>
</div>
<?php endwhile; ?>