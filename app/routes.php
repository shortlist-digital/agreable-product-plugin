<?php namespace AgreableProductPlugin;

/** @var \Herbert\Framework\Router $router */

$router->get([
  'as'   => 'productCollectionSingleProduct',
  'uri'  => '/shop/product/{product_slug}',
  'uses' => __NAMESPACE__ . '\Controllers\ProductController@showProduct'
]);

$router->get([
  'as'   => 'productCollectionIntro',
  'uri'  => '/shop/best-beauty/{product_collection_slug}',
  'uses' => __NAMESPACE__ . '\Controllers\ProductCollectionController@intro'
]);

$router->get([
  'as'   => 'productCollectionSubpage',
  'uri'  => '/shop/best-beauty/{product_collection_slug}/page/{page_slug}',
  'uses' => __NAMESPACE__ . '\Controllers\ProductCollectionController@subpage'
]);

$router->get([
  'as'   => 'productCollectionCategory',
  'uri'  => '/shop/best-beauty/{product_collection_slug}/{category_slug}',
  'uses' => __NAMESPACE__ . '\Controllers\CategoryController@showProducts'
]);
