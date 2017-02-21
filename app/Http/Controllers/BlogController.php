<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getSingle($slug){
        $post = Post::where('slug','=',$slug)->first();
        return view('blog.single')->withPost($post);
    }
    public function getIndex(){
        $post = Post::paginate(2);

        return view('blog.index')->withPosts($post);
    }

}
