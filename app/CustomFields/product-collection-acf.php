<?php

add_action('agreable_app_theme_init', function() {
  $key = 'product_collection';
  register_field_group(array(
    'key' => $key,
    'title' => 'Product Collections',
    'fields' => array(
      array (
        'key' => $key . '_landing_page_sell',
        'label' => 'Product Collection Sell',
        'name' => 'landing_page_sell',
        'type' => 'strict_wysiwyg',
        'required' => 0
      ),
      array (
        'key' => $key . '_favicon',
        'label' => 'Product Collection Favicon',
        'name' => 'product_collection_favicon',
        'type' => 'image',
        'required' => 0,
        'wrapper' => array (
          'width' => '30%',
        )
      ),
      array (
        'key' => $key . '_landing_page_background_image',
        'label' => 'Product Collection Main Background Image',
        'instructions' => 'Main background image for the product collection intro page',
        'name' => 'landing_page_background_image',
        'type' => 'image',
        'required' => 0,
        'wrapper' => array (
          'width' => '35%',
        )
      ),
      array (
        'key' => $key . '_landing_page_background_image_mobile',
        'label' => 'Product Collection Main Background Mobile Image',
        'instructions' => 'Pick a different image or crop for mobile devices',
        'name' => 'landing_page_background_image_mobile',
        'type' => 'image',
        'required' => 0,
        'wrapper' => array (
          'width' => '35%',
        )
      ),
      array (
        'key' => $key . '_pages',
        'label' => 'Product Collection Pages',
        'name' => 'pages',
        'type' => 'repeater',
        'layout' => 'block',
        'button_label' => 'Add Another Page',
        'sub_fields' => array (
          array (
            'key' => $key . '_page_title',
            'label' => 'Title',
            'name' => 'page_title',
            'type' => 'text'
          ),
          array (
            'key' => $key . '_page_image',
            'label' => 'Hero Image',
            'instructions' => 'Large hero image for the page',
            'name' => 'page_image',
            'type' => 'image',
            'wrapper' => array (
              'width' => '50%',
            )
          ),
          array (
            'key' => $key . '_page_image_mobile',
            'label' => 'Hero Image - Mobile',
            'instructions' => 'Pick a different image or crop for mobile devices',
            'name' => 'page_image_mobile',
            'type' => 'image',
            'wrapper' => array (
              'width' => '50%',
            )
          ),
          array (
            'key' => $key . '_page_body',
            'label' => 'Content',
            'name' => 'page_body',
            'type' => 'strict_wysiwyg'
          )
        )
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
              'width' => '30%',
            )
          ),
          array (
            'key' => $key . '_image',
            'label' => 'Category Image',
            'instructions' => 'Large hero image for the category page',
            'name' => 'category_image',
            'type' => 'image',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '35%',
            )
          ),
          array (
            'key' => $key . '_image_mobile',
            'label' => 'Category Mobile Image',
            'instructions' => 'Pick a different image or crop for mobile devices',
            'name' => 'category_image_mobile',
            'type' => 'image',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '35%',
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
