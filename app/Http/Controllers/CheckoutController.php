<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Exception;
use Cartalyst\Stripe\Exception\CardErrorException;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('checkout')->with([
            'discount' => $this->getNumbers()->get('discount'),
            'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
            'newTax' =>  $this->getNumbers()->get('newTax'),
            'newTotal' => $this->getNumbers()->get('newTotal')
            ]);
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
    public function store(CheckoutRequest $request)
    {
        $contents = Cart::content()->map(function($item){
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();
        try {
           $charge = Stripe::charges()->create([
               'amount' => $this->getNumbers()->get('newTotal'),
               'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,

                'metadata' => [
                    //Change to Order ID after we switch to DB
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect( session()->get('coupon'))->toJson()
                ],
           ]);

           //SUCCESSFUL
         Cart::instance('default')->destroy();
         session()->forget('coupon');

          return redirect()->route('confirmation.index')->with('success' , 'Thank you! Your payment has been successfully accepted');
        }
        catch (CardErrorException $e)  {

            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    private function getNumbers()
    {
        $subTotal = Cart::subtotal();
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0; //Null coalescing operator since php 7
        $newSubtotal = ($subTotal - $discount);
        $newTax = $newSubtotal * $tax ;
        $newTotal = $newSubtotal + $newTax;



        return collect([
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal
        ]);
    }
}
