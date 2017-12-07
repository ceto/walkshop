<section class="promotion">
    <figure class="promotion__fig">
        <?php
            $thebg=get_field('ps_bgimage', 'option');
            echo wp_get_attachment_image( $thebg[ID], 'medium_Large' );
        ?>
    </figure>
    <div class="promotion__body">
        <h3 class="promotion__title"><?php the_field('ps_title', 'option'); ?></h3>
        <h4 class="promotion__subtitle"><?php the_field('ps_subtitle', 'option'); ?></h4>
        <a href="<?php the_field('ps_buttontarget', 'option'); ?>" class="promotion__action button hollow"><?php the_field('ps_buttontext', 'option'); ?></a>
    </div>
</section>