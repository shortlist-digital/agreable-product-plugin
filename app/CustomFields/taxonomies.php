<?php

function product_taxonomy() {
  register_taxonomy(
    'product_categories',  //The name of the taxonomy.
    'product',        //post type name
    array(
      'hierarchical' => true,
      'label' => 'Product Categories',
      'query_var' => true,
      'rewrite' => array(
        'slug' => 'products',
        'with_front' => false
      )
    )
  );
}
add_action( 'init', 'product_taxonomy');
