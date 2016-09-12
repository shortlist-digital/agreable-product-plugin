<?php namespace AgreableProductPlugin\Hooks;

class Krux {

  public function init() {
    \add_filter('agreable_krux_datalayer_generator_filter', array($this, 'krux_filter'), 10);
  }

  public function krux_filter($krux_data) {
    global $post;

    if ($post->post_type === 'product') {
      $product_categories = wp_get_object_terms($post->ID, 'product_categories');
      foreach($product_categories as $product_category) {
        if (isset($product_category->slug) && $product_category->slug !== 'category-winner') {
          $krux_data[0]->campaign = 'Best Beauty'; // TODO: refactor
          $krux_data[0]->category = 'beauty'; // TODO: refactor
          $krux_data[0]->subcategories = [$product_category->slug];
        }
      }
    } else if ($post->post_type === 'product_collection') {
      $krux_data[0]->campaign = 'Best Beauty'; // TODO: refactor
      $krux_data[0]->category = 'beauty'; // TODO: refactor
    }

    return $krux_data;
  }
}
