<?php

function bu_event_excerpt_override($excerpt) {
  $linkedwalks = tribe_get_linked_posts_by_post_type( get_the_ID(), 'walk' );
  if (!empty($linkedwalks)) {
    return wpautop(get_the_excerpt($linkedwalks[0]->ID));
  } else {
    return $excerpt;
  }
}
add_filter('tribe_events_get_the_excerpt', 'bu_event_excerpt_override' );


function bu_remove_somemenuitem() {
  remove_submenu_page( 'edit.php?post_type=tribe_events', 'edit.php?post_type=tribe_venue' );
  remove_submenu_page( 'edit.php?post_type=tribe_events', 'edit.php?post_type=tribe_organizer' );
  remove_submenu_page( 'edit.php?post_type=tribe_events', 'edit-tags.php?taxonomy=tribe_events_cat&amp;post_type=tribe_events' );
  remove_submenu_page( 'edit.php?post_type=tribe_events', 'edit-tags.php?taxonomy=post_tag&amp;post_type=tribe_events' );
  remove_submenu_page( 'edit.php?post_type=tribe_events', 'tribe-app-shop' );
  remove_submenu_page( 'edit.php?post_type=tribe_events', 'aggregator' );
}
add_action( 'admin_menu', 'bu_remove_somemenuitem', 999 );



function bu_link_walks_to_events() {
  tribe_register_linked_post_type( 'walk', array(
            'singular_name'           => 'Walk',
            'singular_name_lowercase' => 'walk',
            'allow_multiple'          => false,
            'allow_creation'          => false
        ) );
}
add_action( 'init', 'bu_link_walks_to_events' );


function my_community_required_fields( $fields ) {
    if ( ! is_array( $fields ) ) {
        return $fields;
    }
    $fields[] = 'walk';
    return $fields;
}
add_filter( 'tribe_events_community_required_fields', 'my_community_required_fields', 10, 1 );

function bu_remove_organizers_from_events( $default_types ) {
  if ( ! is_array( $default_types ) || empty( $default_types ) ) {
    return $default_types;
  }
  if ( ( $key = array_search( 'tribe_organizer', $default_types ) ) !== false ) {
    unset( $default_types[ $key ] );
  }
  return $default_types;
}
add_filter( 'tribe_events_register_default_linked_post_types', 'bu_remove_organizers_from_events' );

function bu_remove_venues_from_events( $default_types ) {
  if ( ! is_array( $default_types ) || empty( $default_types ) ) {
    return $default_types;
  }
  if ( ( $key = array_search( 'tribe_venue', $default_types ) ) !== false ) {
    unset( $default_types[ $key ] );
  }
  return $default_types;
}
add_filter( 'tribe_events_register_default_linked_post_types', 'bu_remove_venues_from_events' );

/**
 * Example for adding event data to WooCommerce checkout for Events Calendar tickets.
 * @link http://theeventscalendar.com/support/forums/topic/event-title-and-date-in-cart/
 */
function bu_woocommerce_cart_item_name_event_title( $title, $values, $cart_item_key ) {
  $ticket_meta = get_post_meta( $values['product_id'] );
  $event_id = absint( $ticket_meta['_tribe_wooticket_for_event'][0] );
  $linkedwalks = tribe_get_linked_posts_by_post_type( $event_id, 'walk' );
  $walk_id = absint( $linkedwalks[0]->ID );
  if ( $walk_id ) {
    $title = sprintf( '<a href="%s">%s</a><br><small>%s &middot; %s</small>', get_permalink( $walk_id ), get_the_title( $walk_id ), tribe_get_start_date($event_id, false), $title );
  }
  return $title;
}
add_filter( 'woocommerce_cart_item_name', 'bu_woocommerce_cart_item_name_event_title', 10, 3 );



/**
 * Adds event start date to ticket order titles in email and checkout screens.
 *
 * @return string
 */
function bu_add_date_to_order_title( $title, $item ) {
    $event = tribe_events_get_ticket_event( $item['product_id'] );
    if ( $event !== false ) {
      $linkedwalks = tribe_get_linked_posts_by_post_type(  $event->ID, 'walk' );
      $walk_id = absint( $linkedwalks[0]->ID );
      if ( $walk_id ) {
        $title = sprintf( '<a href="%s">%s</a><br><small>%s &middot; %s</small>', get_permalink( $walk_id ), get_the_title( $walk_id ), tribe_get_start_date($event, false), $title );
      } else {
        $title .= '<br><small>' . tribe_get_start_date( $event ).'</small>';
      }



    }
    return $title;
}
add_filter( 'woocommerce_order_item_name', 'bu_add_date_to_order_title', 100, 2 );