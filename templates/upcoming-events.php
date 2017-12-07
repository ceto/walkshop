<?php
$events = tribe_get_events( array(
    'posts_per_page' => 3,
    'start_date' => date( 'Y-m-d H:i:s' )
) );
?>
<?php foreach ($events as $post) :?>
<?php  tribe_get_template_part( 'list/single', 'minievent' ); ?>
<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
<a class="littlemore" href="<?= get_post_type_archive_link( 'tribe_events' ); ?>">Teljes menetrend itt</a>