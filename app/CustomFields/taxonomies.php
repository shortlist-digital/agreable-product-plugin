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

function filter_post_type_link($link, $post)
{

    if ($post->post_type != 'product')
        return $link;


    if ($cats = get_the_terms($post->ID, 'product_categories'))
        $link = str_replace('%product_categories%', array_pop($cats)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);
