<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $products = new ProductController();
        $posts = new BlogPostController();
        return view('store.home.home')->with([
            'newest_products' =>  $products->newest_products(),
            'newest_posts' => $posts->newest_posts(),
        ]);
    }
}
