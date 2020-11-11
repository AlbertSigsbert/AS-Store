<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if(request()->category)
            {
               $products = Product::with('categories')->whereHas('categories', function( $query){
                   $query->where('slug' , request()->category);
               });

               $categories = Category::all();
               $categoryName = optional($categories->where('slug', request()->category)->first())->name;
            }
            else
            {
                $products = Product::where('featured' , true);
                $categories = Category::all();
                $categoryName = 'Featured';
            }

            if (request()->sort == 'low_high') {

              $products = $products->orderBy('price')->paginate(12);

            }
             elseif(request()->sort == 'high_low') {

                $products = $products->orderBy('price', 'desc')->paginate(12);
            }
            else{
                $products =$products->paginate(12);
             }


            return view('shop')->with([
                'products' => $products,
                 'categories' => $categories,
                 'categoryName' => $categoryName
            ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $mightLike = Product::where('slug','!=', $slug)->mightLike()->get();

        return view('product')->with([
                                        'product'=> $product,
                                        'mightLike' => $mightLike
                                        ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);
        $query = $request->input('query');

        // $products = Product::where('name', 'like' , "%$query%")
                           //->orWhere('details', 'like' , "%$query%")
                           //->orWhere('description', 'like' , "%$query%")
                           //->paginate(10);
        //
        $products = Product::search($query)->paginate(10);

        return view('search-results')->with('products' , $products);
    }
}
