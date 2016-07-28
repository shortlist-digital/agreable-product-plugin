<?php
namespace AgreableProductPlugin\Controllers;

use Herbert\Framework\Models\Post;
use \TimberPost;
use \Exception;
use \stdClass;

class ProductCollectionController {
  /**
   * Intro screen for the product collection
   */
  public function intro($product_collection_slug) {

    if (!$product_collection = $this->get_product_collection_by_slug($product_collection_slug)) {
      throw new Exception('Post not found');
    }

    return view('@AgreableProductPlugin/intro.twig', [
      'product_collection' => $product_collection,
      'js_string' => $this->get_javascript_string()
    ]);
  }

  protected function get_javascript_string() {
    $plugin_root = realpath(__DIR__ . '/../..');
    $port_file = 'webpack-current-port.tmp';
    $port_file_location = $plugin_root . '/' . $port_file;

    if (getenv('WP_ENV') === 'development' && file_exists($port_file_location)) {
      $port_number = file_get_contents($port_file_location);
      return "<script src='http://localhost:$port_number/static/app.js'></script>";
    }

    return '<script>' . file_get_contents($plugin_root . '/resources/assets/app.js') .
      '</script>';
  }


  protected function get_product_collection_by_slug($product_collection_slug) {
    $args = array(
      'name' => $product_collection_slug,
      'posts_per_page' => 1,
      'post_type' => 'product_collection',
      'post_status' => 'publish'
    );
    $posts_array = get_posts($args);

    if (count($posts_array) > 0) {
      return new TimberPost($posts_array[0]);
    }
  }
}
