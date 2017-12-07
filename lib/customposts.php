<?php

// Register Class Post Type
function bupap_custom_post_types() {


  // Teachers
  $labels = array(
    'name'                  => _x( 'Walks', 'Walk General Name', 'bupap' ),
    'singular_name'         => _x( 'Walk', 'Walk Singular Name', 'bupap' ),
    'singular_name_lowercase' => 'walk',
    'menu_name'             => __( 'Walks', 'bupap' ),
    'name_admin_bar'        => __( 'Walk', 'bupap' ),
    'archives'              => __( 'Walk Archives', 'bupap' ),
    'parent_item_colon'     => __( 'Parent Walk:', 'bupap' ),
    'all_items'             => __( 'Walks', 'bupap' ),
    'add_new_item'          => __( 'Add New Walk', 'bupap' ),
    'add_new'               => __( 'Add Walk', 'bupap' ),
    'new_item'              => __( 'New Walk', 'bupap' ),
    'edit_item'             => __( 'Edit Walk', 'bupap' ),
    'update_item'           => __( 'Update Walk', 'bupap' ),
    'view_item'             => __( 'View Walk', 'bupap' ),
    'search_items'          => __( 'Search Walk', 'bupap' ),
    'not_found'             => __( 'Not found', 'bupap' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'bupap' ),
    'featured_image'        => __( 'Walk Photo', 'bupap' ),
    'set_featured_image'    => __( 'Set Walk photo', 'bupap' ),
    'remove_featured_image' => __( 'Remove Walk photo', 'bupap' ),
    'use_featured_image'    => __( 'Use as Walk photo', 'bupap' ),
    'insert_into_item'      => __( 'Insert into Walk', 'bupap' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Walk', 'bupap' ),
    'items_list'            => __( 'Walks list', 'bupap' ),
    'items_list_navigation' => __( 'Walks list navigation', 'bupap' ),
    'filter_items_list'     => __( 'Filter Walks list', 'bupap' ),
  );
  $args = array(
    'label'                 => __( 'Walk', 'bupap' ),
    'description'           => __( 'Walk Description', 'bupap' ),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt'),
    'taxonomies'            => array('walktag', 'topic'),
    'rewrite'               => array('slug' => __('seta','bupap')),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    //'show_in_menu'          => 'edit.php?post_type=event',
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-universal-access-alt',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'walk', $args );


  //Guides
  $labels = array(
    'name'                  => _x( 'Guide', 'Guide General Name', 'bupap' ),
    'singular_name'         => _x( 'Guide', 'Guide Singular Name', 'bupap' ),
    'menu_name'             => __( 'Guides', 'bupap' ),
    'name_admin_bar'        => __( 'Guide', 'bupap' ),
    'archives'              => __( 'Guide Archives', 'bupap' ),
    'parent_item_colon'     => __( 'Parent Guide:', 'bupap' ),
    'all_items'             => __( 'Guides', 'bupap' ),
    'add_new_item'          => __( 'Add New Guide', 'bupap' ),
    'add_new'               => __( 'Add New', 'bupap' ),
    'new_item'              => __( 'New Guide', 'bupap' ),
    'edit_item'             => __( 'Edit Guide', 'bupap' ),
    'update_item'           => __( 'Update Guide', 'bupap' ),
    'view_item'             => __( 'View Guide', 'bupap' ),
    'search_items'          => __( 'Search Guide', 'bupap' ),
    'not_found'             => __( 'Not found', 'bupap' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'bupap' ),
    'featured_image'        => __( 'Guide Photo', 'bupap' ),
    'set_featured_image'    => __( 'Set Guide photo', 'bupap' ),
    'remove_featured_image' => __( 'Remove Guide photo', 'bupap' ),
    'use_featured_image'    => __( 'Use as Guide photo', 'bupap' ),
    'insert_into_item'      => __( 'Insert into Guide', 'bupap' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Guide', 'bupap' ),
    'items_list'            => __( 'Guides list', 'bupap' ),
    'items_list_navigation' => __( 'Guides list navigation', 'bupap' ),
    'filter_items_list'     => __( 'Filter Guides list', 'bupap' ),
  );
  $args = array(
    'label'                 => __( 'Guides', 'bupap' ),
    'description'           => __( 'Guide Description', 'bupap' ),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
    'taxonomies'            => array(),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => 'edit.php?post_type=walk',
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-universal-access-alt',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );

  register_post_type( 'guide', $args );

}
add_action( 'init', 'bupap_custom_post_types', 0 );

function bupap_remove_date_from_head( $defaults ) {
    unset($defaults['date']);
    return $defaults;
}
add_filter('manage_walk_posts_columns', 'bupap_remove_date_from_head');
add_filter('manage_guide_posts_columns', 'bupap_remove_date_from_head');

function bupap_topic_tax() {
    // Topic Taxonomy
    $labels = array(
        'name'                    => _x( 'Topics', 'Walk Topic', 'text-domain' ),
        'singular_name'            => _x( 'Topic', 'Walk Topic', 'text-domain' ),
        'search_items'            => __( 'Search Topic', 'text-domain' ),
        'popular_items'            => __( 'Popular Topic', 'text-domain' ),
        'all_items'                => __( 'All Topic', 'text-domain' ),
        'parent_item'            => __( 'Parent Topic', 'text-domain' ),
        'parent_item_colon'        => __( 'Parent Topic', 'text-domain' ),
        'edit_item'                => __( 'Edit Topic', 'text-domain' ),
        'update_item'            => __( 'Update Topic', 'text-domain' ),
        'add_new_item'            => __( 'Add New Topic', 'text-domain' ),
        'new_item_name'            => __( 'New Topic Name', 'text-domain' ),
        'add_or_remove_items'    => __( 'Add or remove Topic', 'text-domain' ),
        'choose_from_most_used'    => __( 'Choose from most used text-domain', 'text-domain' ),
        'menu_name'                => __( 'Topics', 'text-domain' ),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical'      => true,
        'show_tagcloud'     => false,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => true,
        'query_var'         => true,
        'capabilities'      => array(),
    );

    register_taxonomy( 'topic', array( 'walk' ), $args );

    //Walk tags taxonomy
    $labels = array(
        'name'                    => _x( 'Tags', 'Walk Tag', 'text-domain' ),
        'singular_name'            => _x( 'Tag', 'Walk Tag', 'text-domain' ),
        'search_items'            => __( 'Search Tag', 'text-domain' ),
        'popular_items'            => __( 'Popular Tag', 'text-domain' ),
        'all_items'                => __( 'All Tag', 'text-domain' ),
        'parent_item'            => __( 'Parent Tag', 'text-domain' ),
        'parent_item_colon'        => __( 'Parent Tag', 'text-domain' ),
        'edit_item'                => __( 'Edit Tag', 'text-domain' ),
        'update_item'            => __( 'Update Tag', 'text-domain' ),
        'add_new_item'            => __( 'Add New Tag', 'text-domain' ),
        'new_item_name'            => __( 'New Tag Name', 'text-domain' ),
        'add_or_remove_items'    => __( 'Add or remove Tag', 'text-domain' ),
        'choose_from_most_used'    => __( 'Choose from most used text-domain', 'text-domain' ),
        'menu_name'                => __( 'Tags', 'text-domain' ),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical'      => false,
        'show_tagcloud'     => false,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => true,
        'query_var'         => true,
        'capabilities'      => array(),
    );

    register_taxonomy( 'walktags', array( 'walk' ), $args );
}

add_action( 'init', 'bupap_topic_tax' );


add_post_type_support( 'page', 'excerpt' );
