<?php
    $linkedwalks = tribe_get_linked_posts_by_post_type( get_the_ID(), 'walk' );
    $thewalk = $linkedwalks[0];
    $tickets = TribeEventsTickets::get_all_event_tickets(get_the_ID());
    global $woocommerce;

    $global_stock_enabled = true;
?>
<aside class="reveal reveal--nopad" id="addtocartModal-<?= get_the_id(); ?>" data-reveal>
    <header class="reveal__header">
        <p class="reveal__pretitle">Jelentkezés sétaidőpontra</p>
        <h3 class="reveal__title"><?= get_the_title($thewalk->ID); ?></h3>
        <p class="reveal__posttitle"><?= tribe_get_start_time( null, 'Y. F j. l - H:i' ) ?></p>
    </header>

    <div class="reveal__body">
        <div class="callout" data-closable>
            <p><small><strong>Zöld színű BUPAP-sétautalványod van?</strong> Ebben az esetben nem kell regisztrálnod. Résztvételi szándékodat jelezd a <a href="mailto:info@walkshop.hu">info@walkshop.hu</a> címen! Az utalványt feltétlenül hozd magaddal!</small></p>
            <button class="close-button" aria-label="Dismiss info" type="button" data-close>
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="ticketform<?= get_the_ID()  ?>"
            action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ) ?>"
            class="ticketform"
            method="post"
            enctype='multipart/form-data'
            data-abide validate
        >
            <ul class="ticketlist">
            <?php $is_there_any_product_to_sell = false; ?>
            <?php foreach ( $tickets as $ticket ) : ?>

                <?php

                    global $product;
                    if ( class_exists( 'WC_Product_Simple' ) ) {
                        $product = new WC_Product_Simple( $ticket->product );
                    } else {
                        $product = new WC_Product( $ticket->product );
                    }

                    $ticket_stock = $ticket->stock();
                    $data_product_id = '';
                    $remaining = $ticket->remaining();
                ?>

                <?php if ( $ticket->date_in_range( current_time( 'timestamp' ) ) && $remaining ) : ?>
                    <?php
                        $is_there_any_product_to_sell = true;

                        echo sprintf( '<input type="hidden" name="product_id[]" value="%d">', esc_attr( $ticket->ID ) );

                        // Max quantity will be left open if backorders allowed, restricted to 1 if the product is
                        // constrained to be sold individually or else set to the available stock quantity
                        $max_quantity = $product->backorders_allowed() ? '' : $product->get_stock_quantity();
                        $max_quantity = $product->is_sold_individually() ? 1 : $max_quantity;
                        $original_stock = $ticket->original_stock();

                        // For global stock enabled tickets with a cap, use the cap as the max quantity
                        if ( $global_stock_enabled && Tribe__Tickets__Global_Stock::CAPPED_STOCK_MODE === $ticket->global_stock_mode() ) {
                            $max_quantity = $ticket->global_stock_cap();
                            $original_stock = $ticket->global_stock_cap();
                        }
                    ?>

                        <li id="ticket-<?=esc_attr( $ticket->ID ); ?>" class="ticket" data-product-id="<?= esc_attr( $ticket->ID ); ?>">
                            <div class="ticket__namewrap">
                                <label class="ticket__name" for="quantity[<?= $ticket->ID ?>]">
                                    <?= $ticket->name ?>
                                    <?php
                                        $is_there_any_product_to_sell = true;



                                        if ( $remaining ) : ?>
                                            <?php if ($remaining <= 2) : ?>
                                                <small class="tribe-tickets-remaining">
                                                    <?php
                                                        echo sprintf( esc_html__( '%1$s available', 'event-tickets-plus' ),
                                                            '<span class="available-stock" data-product-id="' . esc_attr( $ticket->ID ) . '">' . esc_html( $remaining ) . '</span>'
                                                        );
                                                    ?>
                                                </small>
                                            <?php endif; ?>

                                    <?php else : ?>
                                        <small class="tickets_nostock"><?= esc_html__( 'Out of stock!', 'event-tickets-plus' ); ?></small>
                                    <?php endif; ?>
                                </label>
                                <p class="ticket__description">
                                    <?=  $ticket->description ?>
                                </p>
                            </div>
                            <div class="ticket__pricequantitywrap">
                                <div class="ticket__pricequantity">
                                    <div class="ticket__price">
                                        <span class="ticket__price__costs"><?= $ticket->price; ?> Ft/fő</span>
                                    </div>
                                    <div class="ticket__quantity" data-product-id="<?= esc_attr( $ticket->ID ); ?>">
                                        <?php woocommerce_quantity_input( array(
                                            'input_name'  => 'quantity[' . $ticket->ID.']',
                                            'input_value' => 2,
                                            'min_value'   => 0,
                                            'max_value'   => $remaining, // Currently WC does not support a 'disable' attribute
                                        ) ); ?>
                                    </div>
                                </div>
                            </div>
                        </li>

                <?php endif; ?>

            <?php endforeach; ?>
            </ul>
            <div class="formactions">
                <?php if ( $is_there_any_product_to_sell ) : ?>
                    <div class="formactions__action">
                        <button name="bupap-add-to-cart" class="button alert" type="submit" value="1">Tovább</button>
                    </div>
                    <div class="formactions__instruction">
                        <?php if ( sizeof( $woocommerce->cart->cart_contents) > 0 ) : ?>
                            <p>
                                Már vannak egyéb jegyek a kosaradban. Ha szeretnéd befejezni a megkezdett vásárlásodat <a href="<?= $woocommerce->cart->get_cart_url() ?>">kattints&nbsp;ide.</a> Egyéb esetben kosarad tartalmát a fenti jegyekkel felül fogjuk írni.
                            </p>
                        <?php else: ?>
                            <p>Kuponod van? Kedvezményedet a következő oldalon tudod érvényesíteni.</p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="formactions__instruction">
                        <p>Nincsenek elérhető jegyek a sétához.</p>
                    </div>
                <?php endif; ?>
            </div>
        </form>

    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</aside>
