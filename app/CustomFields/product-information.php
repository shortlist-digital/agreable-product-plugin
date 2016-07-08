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
        'name' => 'text',
        'type' => 'text',
      ),
      array (
        'key' => $key . '_description',
        'label' => 'Product Description',
        'name' => 'text',
        'type' => 'strict_wysiwyg',
        'simplify' => true,
        'no_return' => true,
      ),
    	array (
	      'key' => $key . '_image',
	      'label' => 'Image',
	      'name' => 'image',
	      'type' => 'image',
	      'required' => 1,
	      'conditional_logic' => 0,
	      'return_format' => 'array',
	      'preview_size' => 'large',
	      'library' => 'all',
	    ),
       array (
        'key' => $key . '_price',
        'label' => 'Product Price',
        'name' => 'text',
        'type' => 'text',
        'wrapper' => array (
          'width' => '50%',
        ),
      ),
      array (
        'key' => $key . '_offer',
        'label' => 'Product Offer',
        'description' => 'If there is no offer please leave it blank',
        'name' => 'text',
        'type' => 'text',
        'wrapper' => array (
          'width' => '50%',
        ),
      ),
      array (
        'key' => $key . '_affiliate_link',
        'label' => 'Product Affiliate Link',
        'name' => 'link',
        'type' => 'url',
      ),
      array (
        'key' => $key . '_quote',
        'label' => 'Product Quote',
        'name' => 'text',
        'type' => 'strict_wysiwyg',
        'simplify' => true,
        'no_return' => true,
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
