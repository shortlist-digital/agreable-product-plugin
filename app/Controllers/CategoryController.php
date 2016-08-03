<?php
namespace AgreableProductPlugin\Controllers;

use Herbert\Framework\Models\Post;
use \Timber;
use \TimberPost;
use \Exception;
use \stdClass;

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
    $context['js_string'] = $this->get_javascript_string();

    Timber::render('@AgreableProductPlugin/category.twig', $context, false);
  }
  
  protected function get_javascript_string() {
    $plugin_root = realpath(__DIR__ . '/../..');
    $port_file = 'webpack-current-port.tmp';
    $port_file_location = $plugin_root . '/' . $port_file;
      $port_number = file_get_contents($port_file_location);
    if (getenv('WP_ENV') === 'development' && file_exists($port_file_location)) {
      return "<script src='http://localhost:$port_number/static/app.js'></script>";
    }
    return '<script>' . file_get_contents($plugin_root . '/resources/assets/app.js') .
      '</script>';
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