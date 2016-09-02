<?php namespace AgreableProductPlugin\Hooks;

class SocialMediaAcf {

  public function init() {
    \add_filter('agreable_base_theme_social_media_acf', array($this, 'social_media_acf'), 10);
  }

  public function social_media_acf($acf_definition) {
    $acf_definition['location'][] = [
      [
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'product_collection'
      ], [
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'product'
      ]
    ];

    return $acf_definition;
  }
}
