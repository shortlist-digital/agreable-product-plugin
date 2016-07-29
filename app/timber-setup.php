<?php namespace AgreableProductPlugin;

use \Timber;

class TimberSetup {

  public function __construct() {

    add_filter('timber/loader/paths', array($this, 'add_timber_paths'));

  }

  public function add_timber_paths($paths){
    $herbert_config = include __DIR__ . '/../herbert.config.php';

    array_push($paths, ['AgreableProductPlugin' => '/vagrant/web/app/dev/agreable-product-plugin/resources/views']);
    return $paths;
  }
}

new TimberSetup();
