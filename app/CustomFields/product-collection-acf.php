<?php

add_action('agreable_app_theme_init', function() {
  $key = 'product_collection';
  register_field_group(array(
    'key' => $key,
    'title' => 'Product Collections',
    'fields' => array(
      array (
        'key' => $key . '_categories',
        'label' => 'Categories',
        'name' => 'categories',
        'type' => 'repeater',
        'required' => 0,
        'conditional_logic' => 0,
        'layout' => 'block',
        'button_label' => 'Add Another Category',
        'sub_fields' => array (
          array (
            'key' => $key . '_name',
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
            'required' => 0,
            'conditional_logic' => 0,
            'readonly' => 0,
            'disabled' => 0,
          ),
          array (
            'key' => $key . 'sub_category',
            'label' => 'Sub categories',
            'name' => 'sub_categories',
            'type' => 'repeater',
            'required' => 0,
            'conditional_logic' => 0,
            'layout' => 'table',
            'button_label' => 'Add Another Sub Category',
            'sub_fields' => array (
              array (
                'key' => $key . 'sub_category_name',
                'label' => 'Name',
                'name' => 'name',
                'type' => 'text',
                'required' => 0,
                'conditional_logic' => 0,
                'readonly' => 0,
                'disabled' => 0,
              ),
              array (
                'key' => $key . 'products',
                'label' => 'Products',
                'name' => 'products',
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
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'product_collection'
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
