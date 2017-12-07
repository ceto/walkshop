<?php
    $tickets = TribeEventsTickets::get_all_event_tickets(get_the_ID());

    global $woocommerce;
    $is_there_any_product         = false;
    $is_there_any_product_to_sell = false;
    //$unavailability_messaging     = is_callable( array( $this, 'do_not_show_tickets_unavailable_message' ) );


    ob_start();

    $cart_classes = (array) apply_filters( 'tribe_events_tickets_woo_cart_class', array( 'cart' ) );

?>

    <div class="reveal__body">
        <form id="buy-tickets"
            action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ) ?>"
            class="<?php echo esc_attr( implode( ' ', $cart_classes ) ); ?>"
            method="post"
            enctype='multipart/form-data'
        >
            <ul class="ticketlist">
            <?php foreach ( $tickets as $ticket ) : ?>

                <?php

                    global $product;
                    if ( class_exists( 'WC_Product_Simple' ) ) {
                        $product = new WC_Product_Simple( $ticket->product );
                    } else {
                        $product = new WC_Product( $ticket->product );
                    }

                    $is_there_any_product = true;
                    $ticket_stock = $ticket->stock();
                    $data_product_id = '';
                ?>
                <!-- <pre><?php var_dump($ticket) ?></pre> -->

                <?php if ( $ticket->date_in_range( current_time( 'timestamp' ) )  ) : ?>
                    <?php
                        $is_there_any_product = true;

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

                        <li class="ticket" id="ticket-<?php esc_attr( $ticket->ID ); ?>" data-product-id="<?php esc_attr( $ticket->ID ); ?>">
                            <div class="ticket__namewrap">
                                <label class="ticket__name" for="conference-2017-1-ticket-00">
                                    <?= $ticket->name ?>
                                </label>
                                <p class="ticket__description">
                                    <?=  $ticket->description ?>
                                    <?php
                                        $is_there_any_product_to_sell = true;

                                        $remaining = $ticket->remaining();

                                        if ( $remaining ) : ?>
                                            <span class="tribe-tickets-remaining">
                                                <?php
                                                    echo sprintf( esc_html__( '%1$s available', 'event-tickets-plus' ),
                                                        '<span class="available-stock" data-product-id="' . esc_attr( $ticket->ID ) . '">' . esc_html( $remaining ) . '</span>'
                                                    );
                                                ?>
                                            </span>
                                    <?php else : ?>
                                        <span class="tickets_nostock"><?= esc_html__( 'Out of stock!', 'event-tickets-plus' ); ?></span>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="ticket__pricequantitywrap">
                                <div class="ticket__pricequantity">
                                    <div class="ticket__price">
                                        <span class="ticket__price__costs"><?= $ticket->price; ?> Ft.</span>
                                    </div>
                                    <div class="ticket__quantity ">
                                        <?php woocommerce_quantity_input( array(
                                            'input_name'  => 'quantity[' . $ticket->ID.']',
                                            'input_value' => 0,
                                            'min_value'   => 0,
                                            'max_value'   => $must_login ? 0 : $max_quantity, // Currently WC does not support a 'disable' attribute
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
                    <div class="formactions__action woocommerce add-to-cart">
                        <button name="add-to-cart" class="button alert tribe-button" type="submit" value="<?= $ticket->ID ?>"><?php esc_html_e( 'Add to cart', 'event-tickets-plus' );?></button>
                    </div>
                <?php endif; ?>
                <div class="formactions__instruction">
                    <p>Kedvezményre feljogosító iratokat a helyszínen ellenőrizzük.</p>
                </div>
            </div>
        </form>
        <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
