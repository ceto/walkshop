<?php
    global $woocommerce;
    global $_product;
    global $_product_id;
?>
<aside class="reveal reveal--nopad" id="addtocartModal-<?= $_product_id ?>" data-reveal>
    <header class="reveal__header">
        <h3 class="reveal__title"><?= $_product->get_name(); ?> vásárlása</h3>
        <p class="reveal__posttitle">Add meg a kívánt mennyiséget</p>
    </header>

    <div class="reveal__body">
        <form id="ticketform<?= get_the_ID()  ?>"
            action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ) ?>"
            class="ticketform"
            method="post"
            enctype='multipart/form-data'
        >
            <ul class="ticketlist">
                        <li id="ticket-<?= $_product_id ?>" class="ticket" data-product-id="<?= $_product_id ?>">
                            <div class="ticket__namewrap">
                                <label class="ticket__name" for="quantity[]">
                                    <?= $_product->get_name(); ?>
                                </label>
                                <p class="ticket__description">
                                    <?= $_product->post->post_excerpt ?>
                                </p>
                            </div>
                            <div class="ticket__pricequantitywrap">
                                <div class="ticket__pricequantity">
                                    <div class="ticket__price">
                                        <span class="ticket__price__costs"><?= $_product->get_price_html(); ?></span>
                                    </div>
                                    <div class="ticket__quantity" data-product-id="<?= $_product_id ?>">
                                        <?php
                                            if ( $_product->is_sold_individually() ) {
                                                echo '<input type="number" name="quantity['.$_product_id.']" disabled="disabled" value="1" />';
                                            } else {
                                                woocommerce_quantity_input( array(
                                                    'input_name'  => 'quantity['.$_product_id.']',
                                                    'input_value' => 1,
                                                    'min_value'   => 0,
                                                    'max_value'   => 100, // Currently WC does not support a 'disable' attribute
                                                ) );
                                            }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </li>
            </ul>
            <div class="formactions">
                   <div class="formactions__action">
                        <button name="bupap-add-to-cart" class="button alert" type="submit" value="1">Tovább</button>
                    </div>
                    <div class="formactions__instruction">
                    <?php if ( sizeof( $woocommerce->cart->cart_contents) > 0 ) : ?>
                        <p>
                           Ezt a terméket csak önállóan tudod megrendelni. A kosárba adás gombbal kosaradat először ürítjük. Ha szeretnéd befejezni a megkezdett vásárlásodat <a href="<?= $woocommerce->cart->get_cart_url() ?>">kattints&nbsp;ide.</a>
                        </p>
                    <?php endif; ?>
                    </div>
            </div>
        </form>
    </div>
        <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
        </button>
</aside>