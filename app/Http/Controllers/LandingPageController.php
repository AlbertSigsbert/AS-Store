<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(8)->where('featured', true)->get();
        $posts = Post::inRandomOrder()->take(3)->where('featured', true)->get();
        return view('landing-page')->with([
                        'products'=> $products,
                        'posts' => $posts
                        ]);
    }


}
