<?php
  // 1. customize ACF path
  add_filter('acf/settings/path', 'airon_acf_settings_path');
   function airon_acf_settings_path( $path ) {
      $path = get_stylesheet_directory() . '/lib/acf/';
      return $path;
  }
  // 2. customize ACF dir
  add_filter('acf/settings/dir', 'airon_acf_settings_dir');
  function airon_acf_settings_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/lib/acf/';
    return $dir;
  }

  // 3. Hide ACF field group menu item
  //add_filter('acf/settings/show_admin', '__return_false');

  // 4. Include ACF
  include_once( get_stylesheet_directory() . '/lib/acf/acf.php' );

    // 6. Save JSON
    add_filter('acf/settings/save_json', 'walkshop_acf_json_save_point');
    function walkshop_acf_json_save_point( $path ) {
        $path = get_stylesheet_directory() . '/lib/acfjson';
        return $path;
    }


    // 7. Load JSON
    add_filter('acf/settings/load_json', 'walkshop_acf_json_load_point');
    function walkshop_acf_json_load_point( $paths ) {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/lib/acfjson';
        return $paths;
    }

  function speccolor($spec_id) {
    return '#'.get_field( 'color', 'specialization_'.$spec_id );
  }

  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
  }

  function bupap_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'bupap_mime_types');


  function isitaguidefor($guide, $walk) {
      $yes=false;
      $guides_objects = get_field('guides', $walk);
      foreach( $guides_objects as $possibleguide) {
          if ($guide == $possibleguide) {
              $yes=true;
          }
      }
      return $yes;
  }

  $diffdef = array (
    '1' => 'Könnyű',
    '2' => 'Közepes',
    '3' => 'Nehéz',
    '4' => 'Durva'
  );


  /*
 * Hides QR codes from the Email/Tickets sent to purchasers
 */
function bupap_tribe_remove_qr () {
  if ( class_exists( 'Tribe__Tickets_Plus__Main' ) ) {
    $qr_class = Tribe__Tickets_Plus__Main::instance()->qr();
    remove_action( 'tribe_tickets_ticket_email_ticket_bottom', array( $qr_class, 'inject_qr' ) );
  }
}
add_action( 'init', 'bupap_tribe_remove_qr', 10 );


add_filter( 'tribe-events-bar-should-show', '__return_false' );


//Dequeue Styles
function bupap_dequeue_unnecessary_styles() {
  if (!is_admin()) {
    wp_dequeue_style( 'event-tickets-plus-tickets' );
    wp_deregister_style( 'event-tickets-plus-tickets' );

    wp_dequeue_style( 'tribe-events-custom-jquery-styles' );
    wp_deregister_style( 'tribe-events-custom-jquery-styles' );

    wp_dequeue_style( 'tribe-events-calendar-style' );
    wp_deregister_style( 'tribe-events-calendar-style' );
  }

}
add_action( 'wp_print_styles', 'bupap_dequeue_unnecessary_styles' );

//Dequeue JavaScripts
function bupap_dequeue_unnecessary_scripts() {
  if (!is_admin()) {

    wp_dequeue_script( 'event-tickets-plus-attendees-list' );
    wp_deregister_script( 'event-tickets-plus-attendees-list' );

    wp_dequeue_script( 'jquery-cookie' );
    wp_deregister_script( 'jquery-cookie' );

    wp_dequeue_script( 'jquery-deparam' );
    wp_deregister_script( 'jquery-deparam' );

    wp_dequeue_script( 'event-tickets-meta' );
    wp_deregister_script( 'event-tickets-meta' );

    wp_dequeue_script( 'tribe-events-list' );
    wp_deregister_script( 'tribe-events-list' );

    wp_dequeue_script( 'tribe-events-calendar-script' );
    wp_deregister_script( 'tribe-events-calendar-script' );

    wp_dequeue_script( 'tribe-events-jquery-resize' );
    wp_deregister_script( 'tribe-events-jquery-resize' );
  }

}
add_action( 'wp_print_scripts', 'bupap_dequeue_unnecessary_scripts',100 );


function insite_inspect_scriptsandstyles() {
    global $wp_styles, $wp_scripts;
    echo PHP_EOL.'<!-- Script Handles: ';
    foreach( $wp_scripts->queue as $handle ) :
        echo $handle . ' || ';
    endforeach;
    echo ' -->'.PHP_EOL;
    echo PHP_EOL.'<!-- Style Handles: ';
    foreach( $wp_styles->queue as $handle ) :
        echo $handle . ' || ';
    endforeach;
    echo ' -->'.PHP_EOL;
}
//add_action( 'wp_print_scripts', 'insite_inspect_scriptsandstyles' );
