<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class BlogController extends Controller
{
  public function index()
  {
     $posts = Post::inRandomOrder()->take(4)->where('featured', true)->get();
     return view('blogs.index')->withPosts($posts);
  }

  public function show($slug)
  {
      $post = Post::where('slug', '=',  $slug)->firstOrFail();

      return view('blogs.single-post')->withPost($post);
  }
}
