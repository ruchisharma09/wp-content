<?php
/**
 * Functions which enhance the theme by creating custom post types
 *
 * @package Roll_Your_Dice
 */	

function dice_post_types() {
    $labels = array(
        'name'                  => _x( 'Recipes', 'Post type general name', 'dice' ),
        'singular_name'         => _x( 'Recipe', 'Post type singular name', 'dice' ),
        'menu_name'             => _x( 'Recipes', 'Admin Menu text', 'dice' ),
        'name_admin_bar'        => _x( 'Recipe', 'Add New on Toolbar', 'dice' ),
        'add_new'               => __( 'Add New', 'dice' ),
        'add_new_item'          => __( 'Add New recipe', 'dice' ),
        'new_item'              => __( 'New recipe', 'dice' ),
        'edit_item'             => __( 'Edit recipe', 'dice' ),
        'view_item'             => __( 'View recipe', 'dice' ),
        'all_items'             => __( 'All recipes', 'dice' ),
        'search_items'          => __( 'Search recipes', 'dice' ),
        'parent_item_colon'     => __( 'Parent recipes:', 'dice' ),
        'not_found'             => __( 'No recipes found.', 'dice' ),
        'not_found_in_trash'    => __( 'No recipes found in Trash.', 'dice' ),
        'featured_image'        => _x( 'Recipe Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'dice' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'dice' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'dice' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'dice' ),
        'archives'              => _x( 'Recipe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'dice' ),
        'insert_into_item'      => _x( 'Insert into recipe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'dice' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this recipe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'dice' ),
        'filter_items_list'     => _x( 'Filter recipes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'dice' ),
        'items_list_navigation' => _x( 'Recipes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'dice' ),
        'items_list'            => _x( 'Recipes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'dice' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Recipe custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'recipe' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'show_in_rest'       => true
    );
      
    register_post_type( 'dice_recipe', $args );
}
add_action( 'init', 'dice_post_types' );