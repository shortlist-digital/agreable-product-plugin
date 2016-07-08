<?php

/** @var  \Herbert\Framework\Application $container */
\add_action( 'init', function() {

	$labels = array(
    'name'                => _x('Products', 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x('Product', 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __('Product', 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'all_items'           => __('All Products', 'text_domain'),
    'view_item'           => __('View Product', 'text_domain'),
    'add_new_item'        => __('Add New Product', 'text_domain'),
    'add_new'             => __('Add New', 'text_domain'),
    'edit_item'           => __('Edit Product', 'text_domain'),
    'update_item'         => __('Update Product', 'text_domain'),
    'search_items'        => __('Search Products', 'text_domain'),
    'not_found'           => __('Not found', 'text_domain'),
    'not_found_in_trash'  => __('Not found in Trash', 'text_domain'),
  );

  $args = array(
    'label'               => __('product post', 'text_domain'),
    'description'         => __('products', 'text_domain'),
    'labels'              => $labels,
    'supports'            => array('title','thumbnail','revisions','author'),
    'taxonomies'          => array('category','post_tag'),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-cart',
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
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
    'rewrite' => false,
    'query_var' => true,
  );

  \register_post_type('product', $args);
}
,0);
