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

    // Cancel early if product collection doesn't exist
    if (!$product_collection = $this->get_product_collection_from_slug($product_collection_slug, $category_slug)) {
      throw new Exception('Post not found');
    }

    // Set the $post globally, for wp_head and other functions
    global $post;
    $post = new TimberPost($product_collection);

    // Set new context and assign data
    $context = Timber::get_context();
    $context['product_collection'] = $post;

    // Get current category
    $categories = $product_collection->get_field('categories');
    $post_title = $product_collection->post_title;
    $category_index = 0;

    // Loop through all categories and return matching category
    foreach ($categories as $index => $category) {
      // Sanitize category name
      $category_name = $this->sanitise_category_for_slug($category['name']);
      // Check if name and current category slug match
      if ($category_name === $category_slug) {
        // Return matching category, set page title, update index of category within array
        $context['product_collection_category'] = $category;
        $context['page_title'] = $this->set_page_title($category['name'], $post_title);
        $category_index = $index;
        break;
      }
    }

    // Cancel if category slug doesn't match any catgories
    if (!isset($context['product_collection_category'])) {
      throw new Exception('Product collection category not found');
    }

    // If category is not the first or last item in the array, create prev/next objects
    if ($category_index > 0) {
      $context['product_collection_category_prev'] = $categories[$category_index - 1];
    }
    if ($category_index < sizeof($categories) - 1) {
      $context['product_collection_category_next'] = $categories[$category_index + 1];
    }
    $context['page_title'] = $context['product_collection_category']['name'] . ' - ' .
      $product_collection->post_title . ' - ' . get_bloginfo();
    $context['schema_type'] = 'SomeProducts';

    // Render template
    Timber::render('@AgreableProductPlugin/category.twig', $context, false);
  }

  public function set_page_title($post, $collection) {
    return $post . ' - ' . $collection . ' - ' . get_bloginfo();
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
