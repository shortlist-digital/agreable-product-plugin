<?php

/** @var  \Herbert\Framework\Application $container */
function product_cpt() {

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
    'slug'                => 'shop/product',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  ];

  $args = [
    'label'               => __( 'product', 'text_domain' ),
    'description'         => __( 'List of Products', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( ),
    'taxonomies'          => array( 'product_categories'  ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 50,
    'menu_icon'           => 'dashicons-cart',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite' => $rewrite,
    'capability_type' => 'product',
    'capabilities' => array(
      'publish_posts' => 'publish_products',
      'edit_posts' => 'edit_products',
      'edit_others_posts' => 'edit_others_products',
      'delete_posts' => 'delete_products',
      'delete_private_posts' => 'delete_private_products',
      'delete_others_posts' => 'delete_others_products',
      'read_private_posts' => 'read_private_products',
      'edit_post' => 'edit_product',
      'delete_post' => 'delete_product',
      'read_post' => 'read_product',
    ),
    'map_meta_cap' => true,
  ];

  register_post_type('product', $args);
}

function product_collection_cpt() {

  $labels = [
    'name'                => _x( 'Product Collection', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Product Collection', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Product Collection', 'text_domain' ),
    'name_admin_bar'      => __( 'Product Collection', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Product Collection:', 'text_domain' ),
    'all_items'           => __( 'All Product Collections', 'text_domain' ),
    'add_new_item'        => __( 'Add A New Product Collection', 'text_domain' ),
    'add_new'             => __( 'Add A New Product Collection', 'text_domain' ),
    'new_item'            => __( 'New Product Collection', 'text_domain' ),
    'edit_item'           => __( 'Edit Product Collection', 'text_domain' ),
    'update_item'         => __( 'Update Product Collection', 'text_domain' ),
    'view_item'           => __( 'View Product Collection', 'text_domain' ),
    'search_items'        => __( 'Search Product Collections', 'text_domain' ),
    'not_found'           => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
  ];

  $rewrite = [
    'slug'                => 'shop',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  ];

  $args = [
    'label'               => __( 'product_collection', 'text_domain' ),
    'description'         => __( 'List of Product Collections', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( ),
    'taxonomies'          => array( 'product_collection'  ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 50,
    'menu_icon'           => 'dashicons-store',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type' => 'product_collection',
    'capabilities' => array(
      'publish_posts' => 'publish_product_collections',
      'edit_posts' => 'edit_product_collections',
      'edit_others_posts' => 'edit_others_product_collections',
      'delete_posts' => 'delete_product_collections',
      'delete_private_posts' => 'delete_private_product_collections',
      'delete_others_posts' => 'delete_others_product_collections',
      'read_private_posts' => 'read_private_product_collections',
      'edit_post' => 'edit_product_collection',
      'delete_post' => 'delete_product_collection',
      'read_post' => 'read_product_collection',
    ),
    'map_meta_cap' => true,
  ];

  register_post_type('product_collection', $args);
}

// Hook into the 'init' action
add_action( 'init', 'product_cpt', 0 );
add_action( 'init', 'product_collection_cpt', 0 );
