<?php namespace AgreableProductPlugin;

/** @var \Herbert\Framework\Router $router */

$router->get([
  'as'   => 'productCollectionIntro',
  'uri'  => '/shop/{product_collection_slug}',
  'uses' => __NAMESPACE__ . '\Controllers\ProductCollectionController@intro'
]);

$router->get([
    'as'   => 'productCollectionCategory',
    'uri'  => '/shop/{product_collection_slug}/{category_slug}',
    'uses' => __NAMESPACE__ . '\Controllers\CategoryController@showProducts'
]);

$router->get([
    'as'   => 'productCollectionSingleProduct',
    'uri'  => '/product/{product_slug}',
    'uses' => __NAMESPACE__ . '\Controllers\ProductController@showProduct'
]);
