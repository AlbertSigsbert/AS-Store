<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SaveForLaterController extends Controller
{
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return back()->with('success', 'Item has been removed!');
    }

    /**
     * Switch an item of Save for later to Shopping Cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moveToCart($id)
    {
      $item = Cart::instance('saveForLater')->get($id);

      Cart::instance('saveForLater')->remove($id);

      $duplicates = Cart::instance('default')->search(function($cartItem , $rowId) use($id){
        return $rowId === $id;
      });

        if($duplicates->isNotEmpty())
        {
            return redirect()->route('cart.index')->with('success' , 'Item is already in your Cart!');
        }

      Cart::instance('default')->add($item->id , $item->name , 1, $item->price)->associate('App\Product');

      return redirect()->route('cart.index')->with('success' ,'Item has been saved moved to Cart!');


    }
}
