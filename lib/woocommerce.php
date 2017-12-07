<?php

add_action( 'after_setup_theme', 'bupap_woocommerce_support' );
function bupap_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );



function bupap_change_empty_cart_button_url() {
  return get_post_type_archive_link( 'tribe_events' );
  //Can use any page instead, like return '/sample-page/';
}
add_filter( 'woocommerce_return_to_shop_redirect', 'bupap_change_empty_cart_button_url' );


add_filter( 'woocommerce_billing_fields' , 'bupap_billing_fields_custom' );

function bupap_billing_fields_custom( $fields ) {
  unset($fields['billing_state']);
  unset($fields['billing_company']);
  unset($fields['billing_address_2']);

  //$fields['billing_first_name']['class'] = array( 'form-row-last' );
  //$fields['billing_last_name']['class'] = array( 'form-row-first' );

  //Order Billing fields
  //$fields['billing_last_name']['priority'] = 10;
  //$fields['billing_first_name']['priority'] = 20;
  $fields['billing_email']['priority'] = 30;
  $fields['billing_phone']['priority'] = 40;
  $fields['billing_country']['priority'] = 50;


  return $fields;
}


add_filter( 'woocommerce_shipping_fields' , 'bupap_shipping_fields_custom' );

function bupap_shipping_fields_custom( $fields ) {
  unset($fields['shipping_state']);
  unset($fields['shipping_company']);
  unset($fields['shipping_address_2']);

  //$fields['shipping_first_name']['class'] = array( 'form-row-last' );
  //$fields['shipping_last_name']['class'] = array( 'form-row-first' );

  //Order shipping fields
  //$fields['shipping_last_name']['priority'] = 10;
  //$fields['shipping_first_name']['priority'] = 20;
  $fields['shipping_country']['priority'] = 50;


  return $fields;
}


//remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment','20');
//add_action( 'dd_woocommerce_checkout_payment', 'woocommerce_checkout_payment', 0 );


// before addto cart, only allow 1 item in a cart
//add_filter( 'woocommerce_add_to_cart_validation', 'bupap_empty_cart_before_new_item_added' );

function bupap_empty_cart_before_new_item_added( $cart_item_data ) {

    global $woocommerce;
    $woocommerce->cart->empty_cart();

    // Do nothing with the data and return
    return true;
}


// check for empty-cart get param to clear the cart
add_action( 'init', 'bupap_woocommerce_clear_cart_url' );
function bupap_woocommerce_clear_cart_url() {
  global $woocommerce;

  if ( isset( $_REQUEST['empty-cart'] ) ) {
    $woocommerce->cart->empty_cart();
  }
}





/**
 * AUTO COMPLETE PAID ORDERS IN WOOCOMMERCE
 */
/**
add_action( 'woocommerce_thankyou', 'bupap_woocommerce_auto_complete_paid_order', 20 );
function bupap_woocommerce_auto_complete_paid_order( $order_id ) {
  if ( ! $order_id )
    return;
  $order = wc_get_order( $order_id );

  $containsreal = false;
  foreach ( $order->get_items() as $key => $lineItem ) {
    $is_virtual = get_post_meta( $lineItem['product_id'], '_virtual', true );
    if ( !($is_virtual == 'yes') ) {$containsreal=true;}
  }
  // No updated status for orders delivered with Bank wire, Cash on delivery and Cheque payment methods.
  if ( $containsreal || ( 'bacs' == get_post_meta($order_id, '_payment_method', true) ) || ( 'cod' == get_post_meta($order_id, '_payment_method', true) ) || ( 'cheque' == get_post_meta($order_id, '_payment_method', true) ) ) {
    return;
  }
  // "completed" updated status for paid Orders with all others payment methods
  elseif ( $order->has_status( 'processing' ) ) {
        $order->update_status( 'completed' );
  } else {
        return;
  }
}
*/
