<?php

add_action('agreable_app_theme_init', function() {
  $key = 'product_collection';
  register_field_group(array(
    'key' => $key,
    'title' => 'Product Collections',
    'fields' => array(
      array (
        'key' => 'product_collection_logo',
        'label' => 'Product Collection Logo',
        'name' => 'product_collection_logo',
        'type' => 'image',
        'required' => 0,
        'wrapper' => array (
          'width' => '50%',
        )
      ),
      array (
        'key' => $key . '_background_image',
        'label' => 'Product Collection Main Background Image',
        'name' => 'main_background_image',
        'type' => 'image',
        'required' => 0,
        'wrapper' => array (
          'width' => '50%',
        )
      ),
      array (
        'key' => $key . '_landing_sell',
        'label' => 'Product Collection Sell',
        'name' => 'product_collection_sell',
        'type' => 'strict_wysiwyg',
        'required' => 0
      ),
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
            'label' => 'Category Name',
            'name' => 'name',
            'type' => 'text',
            'required' => 0,
            'conditional_logic' => 0,
            'readonly' => 0,
            'disabled' => 0,
            'wrapper' => array (
              'width' => '50%',
            )
          ),
          array (
            'key' => $key . '_image',
            'label' => 'Category Image',
            'name' => 'category_image',
            'type' => 'image',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '50%',
            )
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
                'label' => 'Sub Category Name',
                'name' => 'sub_category_name',
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
