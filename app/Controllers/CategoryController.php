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
    if (!$product_collection = $this->get_product_collection_from_slug($product_collection_slug, $category_slug)) {
      throw new Exception('Post not found');
    }

    $context = Timber::get_context();
    $context['product_collection'] = new TimberPost($product_collection);



    foreach ($product_collection->get_field('categories') as $category) {
      if ($this->sanitise_category_for_slug($category['name']) === $this->sanitise_category_for_slug($category_slug)) {
        $context['product_collection_category'] = $category;
      }
    }
    if (!isset($context['product_collection_category'])) {
      throw new Exception('Product collection category not found');
    }

    Timber::render('@AgreableProductPlugin/category.twig', $context, false);
  }

  protected function sanitise_category_for_slug($category_name) {
    return strtolower(preg_replace("/[^a-zA-Z]+/", "", $category_name));
  }

  protected function get_product_collection_from_slug($product_collection_slug) {
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
