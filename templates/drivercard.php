<div class="drivercard">
    <a class="drivercard__photo" href="<?php the_permalink($guide->ID); ?>">
        <?php if (has_post_thumbnail()) :?>
            <?php the_post_thumbnail('small'); ?>
        <?php else:  ?>
            <img src="//placehold.it/360x480" alt="">
        <?php endif; ?>
    </a>
    <h3 class="drivercard__name"><a href="<?php the_permalink($guide->ID); ?>"><?= get_the_title($guide->ID); ?></a></h3>
    <p class="drivercard__titulus"><?php the_field('role', $guide->ID); ?></p>
</div>