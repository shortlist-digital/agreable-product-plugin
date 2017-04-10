<?php
namespace AgreableProductPlugin\Controllers;

use Herbert\Framework\Models\Post;
use Timber;
use TimberPost;
use Exception;
use stdClass;

class BrandController {

  public function showBrands($product_collection_slug) {

    // Cancel early if product collection doesn't exist
    if (!$product_collection = $this->get_product_collection($product_collection_slug)) {
      throw new Exception('Post not found');
    }

    // Set the $post globally, for wp_head and other functions
    global $post;
    $post = new TimberPost($product_collection);

    // Set new context and assign data
    $context = Timber::get_context();
    $context['product_collection'] = $product_collection;
    $context['page_title'] = 'Best Beauty Brands';

    $brands = get_terms('beauty_product_brand', array(
      'hide_empty' => false
    ));
    $a_to_z = range('A', 'Z');
    $alphabet = array('0–9' => array(
      'character' => '0–9',
      'brands' => array()
    ));

    foreach ($brands as $index => $brand) {
      // get first letter from title and uppercase
      $letter = strtoupper(mb_substr($brand->name, 0, 1, 'utf-8'));
      $is_a_to_z = in_array($letter, $a_to_z);
      // create array item to push to (if it doesn't exist)
      if (!isset($alphabet[$letter]) && $is_a_to_z) {
        $alphabet[$letter] = array(
          'character' => $letter,
          'brands' => array()
        );
      }
      // push to array unless it's outside of a-z, then pop it into 0-9
      if ($is_a_to_z) {
        array_push($alphabet[$letter]['brands'], $brand);
      } else {
        array_push($alphabet['0–9']['brands'], $brand);
      }
    }

    // bump 0-9 to the end of the array
    $temp_0_9 = $alphabet['0–9'];
    unset($alphabet['0–9']);
    $alphabet['0–9'] = $temp_0_9;

    $context['alphabet'] = $alphabet;

    // Render template
    Timber::render('@AgreableProductPlugin/brands.twig', $context, false);
  }

  public function showBrandProducts($product_collection_slug, $brand_slug) {

    // Cancel early if product collection doesn't exist
    if (!$product_collection = $this->get_product_collection($product_collection_slug)) {
      throw new Exception('Post not found');
    }

    // Set the $post globally, for wp_head and other functions
    global $post;
    $post = new TimberPost($product_collection);

    // Set new context and assign data
    $context = Timber::get_context();
    $context['product_collection'] = $product_collection;

    $products = get_posts(array(
      'orderby' => 'title',
      'order' => 'ASC',
      'posts_per_page' => -1,
      'post_type' => 'product',
      'post_status' => 'publish',
      'tax_query' => array(
        array(
          'taxonomy' => 'beauty_product_brand',
          'field' => 'slug',
          'terms' => $brand_slug
        )
      )
    ));
    $brand = get_term_by('slug', $brand_slug, 'beauty_product_brand');

    $context['brand'] = $brand;
    $context['products'] = $products;
    $context['page_title'] = $product_collection->post_title . ' - ' . $brand->name;

    // Render template
    Timber::render('@AgreableProductPlugin/brand-products.twig', $context, false);
  }

  protected function get_product_collection($product_collection_slug) {

    // Cancel early if product collection doesn't exist
    if (!$product_collection = $this->get_product_collection_from_slug($product_collection_slug)) {
      throw new Exception('Post not found');
    }

    // Set the $post globally, for wp_head and other functions
    global $post;
    return new TimberPost($product_collection);
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
