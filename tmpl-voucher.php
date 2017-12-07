<?php
/**
* Template Name: Voucher Page
*/
?>
<?php
    global $woocommerce;

?>
<?php while (have_posts()) : the_post(); ?>
<?php $prodlist = get_field('products'); ?>
<?php foreach ($prodlist as $key => $prodid) : ?>
    <?php
        if ( class_exists( 'WC_Product_Simple' ) ) {
            $_product = new WC_Product_Simple( $prodid );
        } else {
            $_product = new WC_Product( $prodid );
        }
        $_product_id = $_product->get_id();
    ?>

    <div class="ps <?= ($key%2==1)?'ps--extralight ps--bordered':'' ?>">
        <div class="row">
            <div class="columns large-6 <?= ($key%2==1)?'large-push-6':'' ?>">
                <figure class="shopitem__fig">
                    <?= $_product->get_image('medium_Large') ?>
                </figure>
            </div>
            <div class="columns large-6 <?= ($key%2==1)?'large-pull-6':'' ?>">
                <div class="bodycopy">
                    <h2 class="shopitem__title"><?= $_product->get_name(); ?></h2>
                    <div class="shopitem__lead"><?= wpautop($_product->post->post_excerpt) ?></div>
                    <?= wpautop($_product->get_description()); ?>
                    <p class="shopitem__price"><span class="shopitem__price__label">Ár:</span> <?= $_product->get_price_html(); ?></p>
                    <a data-open="addtocartModal-<?= $_product_id ?>" href="#" class="button alert"><?= $_product->get_name(); ?> vásárlása</a>
                </div>
            </div>
        </div>
        <?php get_template_part('templates/addtocartmodal','universal' ); ?>
    </div>
<?php endforeach;?>
<?php wp_reset_postdata(); ?>


<div class="ps ps--narrow ps--light aps--bordered" data-magellan>
    <div class="row column">
        <h3 class="nicetitle nicetitle--withbutton">Sétautalványt kaptam<span>Segítünk a használátában</span></h3>
        <a href="#ticketblock" class="button">Használati útmutató</a>
    </div>
</div>
<div class="ps">
    <div class="row">
        <div class="columns large-6">
            <h2><?php the_title() ?></h2>
            <div class="bodycopy">
                <?php if ( has_excerpt() != '' ) :?>
                    <div class="thepage__lead lead"><?php the_excerpt(); ?></div>
                <?php endif; ?>
                <?php the_content(); ?>
            </div>
        </div>
        <div class="columns large-6">
            <div class="bodycopy">
            </div>
        </div>
    </div>
</div>
<div class="ps ps--narrow">
    <?php get_template_part('templates/promotion','wide'); ?>
</div>

<?php endwhile; ?>