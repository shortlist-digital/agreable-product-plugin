<?php namespace AgreableProductPlugin;

use Timber;
use TimberPost;
use stdClass;

class TimberSetup {
 function __construct() {
    add_filter('timber/loader/paths', array($this, 'add_timber_paths'));
    add_filter('timber_context', array($this, 'add_to_context'));
  }

  public function add_to_context($context) {

    $product_collection = new TimberPost(get_page_by_path('best-beauty', OBJECT, 'product_collection'));
    $product_collection_categories = get_field('categories', $product_collection->ID);

    $context['product_plugin'] = new stdClass();
    $context['product_plugin']->js_string = $this->get_javascript_string();
    $context['product_plugin']->secondary_navigation = wp_get_nav_menu_items('best-beauty');
    $context['product_plugin']->product_collection = $product_collection;
    $context['product_plugin']->product_collection_categories = $product_collection_categories;
    $context['product_plugin']->social = new stdClass();
    $context['product_plugin']->social->facebook_app_id = get_field('facebook_app_id', 'option');
    $context['product_plugin']->social->twitter_id = get_field('twitter_id', 'option');

    return $context;
  }

  protected function get_javascript_string() {
    $plugin_root = realpath(__DIR__ . '/..');
    $port_file = 'webpack-current-port.tmp';
    $port_file_location = $plugin_root . '/' . $port_file;

    if (getenv('WP_ENV') === 'development' && file_exists($port_file_location)) {
      $port_number = file_get_contents($port_file_location);
      return "<script src='http://localhost:$port_number/static/app.js'></script>";
    }

    return '<script>' . file_get_contents($plugin_root . '/resources/assets/app.js') .
      '</script>';
  }

  public function add_timber_paths($paths){
    $herbert_config = include __DIR__ . '/../herbert.config.php';

    array_push($paths, ['AgreableProductPlugin' => __DIR__ . '/../resources/views']);
    array_push($paths, ['AgreableProductPlugin' => __DIR__ . '/../resources/img']);
    return $paths;
  }
}

new TimberSetup();
