<?php

add_action('agreable_app_theme_init', function() {
  $key = 'product';
  register_field_group(array(
    'key' => $key,
    'title' => 'Product Information',
    'fields' => array(
      array (
        'key' => $key . '_brand_name',
        'label' => 'Brand Name',
        'name' => 'brand_name',
        'type' => 'text',
        'instructions' => 'This is the brand name of the product',
        'required' => 1,
        'wrapper' => array (
          'width' => '50%',
        ),
      ),
      array (
        'key' => $key . '_rating',
        'label' => 'Product Rating',
        'name' => 'product_rating',
        'type' => 'number',
        'instructions' => 'Give a rating out of 5, if there is no rating leave blank',
        'required' => 0,
        'wrapper' => array (
          'width' => '50%',
        ),
      ),
      array (
        'key' => $key . '_description',
        'label' => 'Product Description',
        'name' => 'product_description',
        'type' => 'strict_wysiwyg',
        'simplify' => true,
        'no_return' => false,
        'required' => 1,
      ),
      array (
        'key' => $key . '_images',
        'label' => 'Product Image(s)',
        'name' => 'product_images',
        'type' => 'gallery',
        'required' => 0,
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'min' => 1,
      ),
      array (
        'key' => $key . '_price',
        'label' => 'Product Price',
        'name' => 'product_price',
        'type' => 'text',
        'instructions' => 'Please make sure the £ sign is included',
        'wrapper' => array (
          'width' => '50%',
        ),
        'required' => 0, // Not mandatory - temporary
      ),
      array (
        'key' => $key . '_offer',
        'label' => 'Product Offer',
        'name' => 'product_offer',
        'instructions' => 'If there is no offer please leave it blank',
        'type' => 'text',
        'wrapper' => array (
          'width' => '50%',
        ),
        'required' => 0,
      ),
      array (
        'key' => $key . '_affiliate_link',
        'label' => 'Product Affiliate Link',
        'name' => 'product_affiliate_link',
        'type' => 'url',
        'required' => 0, // Not mandatory - temporary
      ),
      array (
        'key' => $key . '_quote',
        'label' => 'Product Quote',
        'name' => 'product_text',
        'type' => 'strict_wysiwyg',
        'instructions' => "This can be a quote from a member of the beauty council or someone from Stylist. Do not add quote marks",
        'simplify' => true,
        'no_return' => true,
        'required' => 1,
      ),
      array (
        'key' => $key . '_quote_author',
        'label' => 'Product Quote Author',
        'name' => 'product_quote_author',
        'type' => 'text',
        'instructions' => "Author of the person who was quoted.",
        'simplify' => true,
        'no_return' => true,
        'required' => 1,
      ),
      array (
        'key' => 'more_products',
        'label' => 'You may also like',
        'name' => 'more_products',
        'instructions' => 'Please choose 3 products to show in this section',
        'type' => 'post_object',
        'required' => 0,
        'conditional_logic' => 0,
        'post_type' => 'product',
        'taxonomy' => array (
        ),
        'allow_null' => 0,
        'multiple' => 1,
        'return_format' => 'object',
        'ui' => 1,
      ),
     ),
    'location' => array(
      array(
        array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'product'
        )
      )
    ),
    'menu_order' => 2,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
        0 => 'the_content',
        1 => 'discussion',
        2 => 'comments'
    )
  ));
});
