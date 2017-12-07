<div class="row column">
    <section class="promotion promotion--wide">
        <figure class="promotion__fig">
            <?php
            $thebg=get_field('pw_bgimage', 'option');
            echo wp_get_attachment_image( $thebg[ID], 'medium_Large' );
            ?>
        </figure>
        <div class="promotion__body">
            <h3 class="promotion__title"><?php the_field('pw_title', 'option'); ?></h3>
            <h4 class="promotion__subtitle"><?php the_field('pw_subtitle', 'option'); ?></h4>
            <a href="<?php the_field('pw_buttontarget', 'option'); ?>" class="promotion__action button hollow"><?php the_field('pw_buttontext', 'option'); ?></a>
        </div>
    </section>
</div>
