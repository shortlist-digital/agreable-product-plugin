<?php 

namespace AgreableProductPlugin\Controllers;

use Herbert\Framework\Models\Post;
use \Timber;
use \TimberPost;
use \Exception;
use \stdClass;

class SingleProductController {
    /**
     * Show the post
     */
    public function showProduct($product)
    {

        $post = Post::find($product);

        return view('@AgreableProductPlugin/single-product.twig', ['product' => $post]);

    }

}
