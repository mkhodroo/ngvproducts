<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function newest_posts()
    {
        return BlogPost::where('post_status', 'publish')->where('post_type', 'post')->get();
    }
}
