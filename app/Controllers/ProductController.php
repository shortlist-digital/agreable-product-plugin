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

    add_filter('agreable_category_hierarchy_filter', function($category_hierarchy) {
      global $post;
      $product_categories = wp_get_object_terms($post->ID, 'product_categories');
      if (count($product_categories) > 0) {
        $category_hierarchy->parent = new stdClass();
        $category_hierarchy->parent->slug = $product_categories[0]->slug;
        $category_hierarchy->parent->name = $product_categories[0]->name;
      }
      return $category_hierarchy;
    });


    $context = setcookie('Product_Collection', 'recently_viewed');
    $context = $this->recently_viewed_products();
    $context = Timber::get_context();
    $context['product'] = $post;

    $context['page_title'] = $post->post_title . ' - ' . get_bloginfo();

    Timber::render('@AgreableProductPlugin/single-product.twig', $context, false);

  }

  protected function recently_viewed_products() {
    $cookie_array = $_COOKIE['Product_Collection'];

    $cookie_array = array_map( 'absint', (array) explode(',', $cookie_array) );

    $cookie_args =  array(
      'post_type' => 'product',
      'post__in' => $cookie_array
    );
    $cookie_query = get_posts($cookie_args);

    if (count($cookie_query) > 1) {
      return new TimberPost($cookie_query);
    }
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
