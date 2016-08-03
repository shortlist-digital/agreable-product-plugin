<?php
namespace AgreableProductPlugin\Controllers;

use Herbert\Framework\Models\Post;
use Timber;
use TimberPost;
use Exception;
use stdClass;

class CategoryController {


  /**
   * Product category page
   */
  public function showProducts($product_collection_slug, $category_slug) {
    
    if (!$product_collection = $this->get_products_by_category($product_collection_slug, $category_slug)) {
      throw new Exception('Post not found');
    }
    
    $context = Timber::get_context();
    $context['product_collection'] = $product_collection;

    Timber::render('@AgreableProductPlugin/category.twig', $context, false);
  }
  
  protected function get_products_by_category($product_collection_slug, $category_slug) {
    $args = array(
      'name' => $product_collection_slug,
      'posts_per_page' => 1,
      'post_type' => 'product_collection',
      'post_status' => 'publish',
      'tax_query' => array(
        array(
          'taxonomy' => $category_slug,
          'field' => 'id',
          'terms' => array('9')
        )
      )
    );
    $posts_array = get_posts($args);
    if (count($posts_array) > 0) {
      return new TimberPost($posts_array[0]);
    }
  }
}