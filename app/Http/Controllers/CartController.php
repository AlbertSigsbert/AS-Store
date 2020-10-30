<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mightLike = Product::mightLike()->get();
        return view('cart')->with('mightLike' ,$mightLike);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function($cartItem , $rowId) use($request){
             return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty())
        {
          return redirect()->route('cart.index')->with('success' , 'Item is already in your cart!');
        }
        Cart::add($request->id , $request->name , 1, $request->price)->associate('App\Product');

        return redirect()->route('cart.index')->with('success' ,'Item was added to your cart!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Making a custom validator using Validator facade
        $validator = Validator::make($request->all() , [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {

        session()->flash('errors' , collect(['Quantity was updated successfully!']));
        return response()->json(['success' => false] ,400);
        }

        Cart::update($id, $request->quantity);

        session()->flash('success' , 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success', 'Item has been removed!');
    }

    /**
     * Switch an item of Shopping Cart to Save for later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveForLater($id)
    {
      $item = Cart::get($id);

      Cart::remove($id);

      $duplicates = Cart::instance('saveForLater')->search(function($cartItem , $rowId) use($id){
        return $rowId === $id;
      });

        if($duplicates->isNotEmpty())
        {
            return redirect()->route('cart.index')->with('success' , 'Item is already Saved for later!');
        }

      Cart::instance('saveForLater')->add($item->id , $item->name , 1, $item->price)->associate('App\Product');

      return redirect()->route('cart.index')->with('success' ,'Item has been saved for later!');


    }
}
