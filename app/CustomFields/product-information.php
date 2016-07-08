<?php

add_action('agreable_app_theme_init', function() {
  $key = 'product';
  register_field_group(array(
    'key' => $key,
    'title' => 'Product Information',
    'fields' => array(
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
