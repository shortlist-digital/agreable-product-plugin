<?php
namespace AgreableProductPlugin\Controllers;

use Herbert\Framework\Models\Post;
use Timber;
use TimberPost;
use Exception;
use stdClass;

class ProductController {
   /**
   * Single product screen
   */
  public function showProduct($product_slug) {

     if (!$post = $this->get_product_by_slug($product_slug)) {
      throw new Exception('Post not found');
    }
    $context = Timber::get_context();
    $context['product'] = new TimberPost($post);

    Timber::render('@AgreableProductPlugin/single-product.twig', $context, false);

  }

  protected function get_product_by_slug($product_slug) {
    $args = array(
      'name' => $product_slug,
      'posts_per_page' => 1,
      'post_type' => array('product', 'product_collection'),
      'post_status' => 'publish'
    );
    $posts_array = get_posts($args);

    if (count($posts_array) > 0) {
      return new TimberPost($posts_array[0]);
    }
  }
}
