<?php
/**
 * Functions which enhance the theme by creating custom post types
 *
 * @package Roll_Your_Dice
 */	

function dice_post_types() {
    $labels = array(
        'name'                  => _x( 'Store Locations', 'Post type general name', 'dice' ),
        'singular_name'         => _x( 'Store Location', 'Post type singular name', 'dice' ),
        'menu_name'             => _x( 'Store Locations', 'Admin Menu text', 'dice' ),
        'name_admin_bar'        => _x( 'Store Location', 'Add New on Toolbar', 'dice' ),
        'add_new'               => __( 'Add New', 'dice' ),
        'add_new_item'          => __( 'Add New store location', 'dice' ),
        'new_item'              => __( 'New store location', 'dice' ),
        'edit_item'             => __( 'Edit store location', 'dice' ),
        'view_item'             => __( 'View store location', 'dice' ),
        'all_items'             => __( 'All store locations', 'dice' ),
        'search_items'          => __( 'Search store locations', 'dice' ),
        'parent_item_colon'     => __( 'Parent store locations:', 'dice' ),
        'not_found'             => __( 'No store locations found.', 'dice' ),
        'not_found_in_trash'    => __( 'No store locations found in Trash.', 'dice' ),
        'featured_image'        => _x( 'Store Location Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'dice' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'dice' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'dice' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'dice' ),
        'archives'              => _x( 'Store Location archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'dice' ),
        'insert_into_item'      => _x( 'Insert into store location', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'dice' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this store location', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'dice' ),
        'filter_items_list'     => _x( 'Filter store locations list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'dice' ),
        'items_list_navigation' => _x( 'Store Locations list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'dice' ),
        'items_list'            => _x( 'Store Locations list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'dice' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Store Location custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'store location' ),
        'capability_type'    => 'post',
        'has_archive'        => 'store location',
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'show_in_rest'       => true
    );
      
    register_post_type( 'dice_recipe', $args );
}
add_action( 'init', 'dice_post_types' );