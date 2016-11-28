<?php
add_action('admin_init', function() {
if (!get_role('products_editor')) {
    // Add Products editor role
    add_role('products_editor',
      'Products Editor',
      array(
        'read' => true,
        'edit_posts' => true,
        'delete_posts' => true,
        'publish_posts' => true,
        'upload_files' => true,
      )
    );
  }
  // Add the roles you'd like to administer the custom post types
  $roles = array('products_editor','administrator');
  // Loop through each role and assign capabilities
  foreach($roles as $the_role) {
    $role = get_role($the_role);
    $role->add_cap('read_product');
    $role->add_cap('read_private_products');
    $role->add_cap('edit_product');
    $role->add_cap('edit_products');
    $role->add_cap('edit_others_products');
    $role->add_cap('edit_published_products');
    $role->add_cap('publish_products');
    $role->add_cap('delete_others_products');
    $role->add_cap('delete_private_products');
    $role->add_cap('delete_published_products');
    $role->add_cap('read_product_collection');
    $role->add_cap('read_private_product_collections');
    $role->add_cap('edit_product_collection');
    $role->add_cap('edit_product_collections');
    $role->add_cap('edit_others_product_collections');
    $role->add_cap('edit_published_product_collections');
    $role->add_cap('publish_product_collections');
    $role->add_cap('delete_others_product_collections');
    $role->add_cap('delete_private_product_collections');
    $role->add_cap('delete_published_product_collections');
  }
    get_role($roles[0])->remove_cap('edit_posts');
});
