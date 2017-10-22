<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        return response()->success(compact('posts'));
    }
    public function show(Post $posts)
    {

        $posts = Subreddit::findOrFail(3)->posts()->get();

        return view('posts/show')->with('posts', $posts)
                                  ;
    }
}