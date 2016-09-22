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

    global $post; // Set the $post globally, for wp_head and other functions
    if (!$post = $this->get_product_by_slug($product_slug)) {
      throw new Exception('Post not found');
    }

    $post = new TimberPost($post);

    $context = Timber::get_context();
    $context['product'] = $post;
    $context['page_title'] = $post->post_title . ' by ' . $post->brand_name . ' - ' . get_bloginfo();
    $context['schema_type'] = 'Product';

    Timber::render('@AgreableProductPlugin/single-product.twig', $context, false);

  }
  
  protected function get_product_by_slug($product_slug) {
    $args = array(
      'name' => $product_slug,
      'posts_per_page' => 1,
      'post_type' => array('product'),
      'post_status' => 'publish',
    );
    $posts_array = get_posts($args);

    if (count($posts_array) > 0) {
      return new TimberPost($posts_array[0]);
    }
  }
}
