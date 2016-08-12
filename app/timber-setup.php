<?php namespace AgreableProductPlugin;

use Timber;
use stdClass;

class TimberSetup {
 function __construct() {
    add_filter('timber/loader/paths', array($this, 'add_timber_paths'));
    add_filter('timber_context', array($this, 'add_to_context'));
  }

  public function add_to_context($context) {
    $context['product_plugin'] = new stdClass();
    $context['product_plugin']->js_string = $this->get_javascript_string();
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
    return $paths;
  }
}

new TimberSetup();
