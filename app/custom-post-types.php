<?php

/** @var  \Herbert\Framework\Application $container */
\add_action( 'init', function() {

	$labels = [
    'name'                => _x( 'Products', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Product', 'text_domain' ),
    'name_admin_bar'      => __( 'Product', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Product:', 'text_domain' ),
    'all_items'           => __( 'All Products', 'text_domain' ),
    'add_new_item'        => __( 'Add New Product', 'text_domain' ),
    'add_new'             => __( 'Add New Product', 'text_domain' ),
    'new_item'            => __( 'New Product', 'text_domain' ),
    'edit_item'           => __( 'Edit Product', 'text_domain' ),
    'update_item'         => __( 'Update Product', 'text_domain' ),
    'view_item'           => __( 'View Product', 'text_domain' ),
    'search_items'        => __( 'Search Products', 'text_domain' ),
    'not_found'           => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
  ];

  $rewrite = [
    'slug'                => 'product',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  ];

  $args = [
    'label'               => __( 'product', 'text_domain' ),
    'description'         => __( 'List of Products', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( ),
    'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-cart',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
  ];

  register_post_type('product', $args);
}
,0);
