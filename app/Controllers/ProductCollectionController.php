<?php
namespace AgreableProductPlugin\Controllers;

use Herbert\Framework\Models\Post;
use Timber;
use TimberPost;
use Exception;
use stdClass;

class ProductCollectionController {
  /**
   * Intro screen for the product collection
   */
  public function intro($product_collection_slug) {
    if (!$product_collection = $this->get_product_collection_by_slug($product_collection_slug)) {
      throw new Exception('Post not found');
    }

    $context = Timber::get_context();

    global $post; // Set the $post globally, for wp_head and other functions
    $post = new TimberPost($product_collection);

    $context['product_collection'] = $post;

    Timber::render('@AgreableProductPlugin/intro.twig', $context, false);

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
