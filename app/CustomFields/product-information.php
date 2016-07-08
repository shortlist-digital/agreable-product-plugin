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
        'required' => 1,
      ),
      array (
        'key' => $key . '_description',
        'label' => 'Product Description',
        'name' => 'text',
        'type' => 'strict_wysiwyg',
        'simplify' => true,
        'no_return' => true,
        'required' => 1,
      ),
    	array (
	      'key' => $key . '_image',
	      'label' => 'Image',
	      'name' => 'product_image',
	      'type' => 'image',
	      'required' => 1,
	      'conditional_logic' => 0,
	      'return_format' => 'array',
	      'preview_size' => 'large',
	      'library' => 'all',
        'required' => 1,
	    ),
       array (
        'key' => $key . '_price',
        'label' => 'Product Price',
        'name' => 'product_price',
        'type' => 'text',
        'wrapper' => array (
          'width' => '50%',
        ),
        'required' => 1,
      ),
      array (
        'key' => $key . '_offer',
        'label' => 'Product Offer',
        'description' => 'If there is no offer please leave it blank',
        'name' => 'product_offer',
        'type' => 'text',
        'wrapper' => array (
          'width' => '50%',
        ),
        'required' => 0,
      ),
      array (
        'key' => $key . '_affiliate_link',
        'label' => 'Product Affiliate Link',
        'name' => 'product_link',
        'type' => 'url',
        'required' => 1,
      ),
      array (
        'key' => $key . '_quote',
        'label' => 'Product Quote',
        'name' => 'product_text',
        'type' => 'strict_wysiwyg',
        'simplify' => true,
        'no_return' => true,
        'required' => 1,
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
