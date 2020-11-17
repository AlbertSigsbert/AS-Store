<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderPlaced;
use App\Order;
use App\OrderProduct;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Exception;
use Cartalyst\Stripe\Exception\CardErrorException;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(Cart::instance('default')->count() == 0)
       {
           return redirect()->route('shop.index');
       }

       if(auth()->user() && request()->is('guestCheckout'))
       {
          return redirect()->route('checkout.index');
       }

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

        try
         {
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

           $order = $this->addToOrdersTables($request , null);

           Mail::send( new OrderPlaced($order));

           //SUCCESSFUL
         Cart::instance('default')->destroy();
         session()->forget('coupon');

         return redirect()->route('confirmation.index')->with('success' , 'Thank you! Your payment has been successfully accepted');
        }

        catch (CardErrorException $e)
         {
            $this->addToOrdersTables($request , $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    protected function addToOrdersTables($request , $error)
    {
        //Insert into order table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null ,
            'billing_email'=> $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'billing_name_on_card' => $request->name_on_card,
            'billing_discount' =>  $this->getNumbers()->get('discount'),
            'billing_discount_code' =>$this->getNumbers()->get('code'),
            'billing_subtotal' =>  $this->getNumbers()->get('newSubtotal'),
            'billing_tax' =>  $this->getNumbers()->get('newTax'),
            'billing_total' =>  $this->getNumbers()->get('newTotal'),
            //'payment_gateway' => '',
            //'shipped' => '',
            'error' => $error,
        ]);
            //Insert into order_product table
            foreach (Cart::content() as $item)
            {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->model->id,
                    'quantity' => $item->qty
                ]);
            }

            return $order;
    }


    private function getNumbers()
    {
        $subTotal = Cart::subtotal();
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0; //Null coalescing operator since php 7
        $code = session()->get('coupon')['name'] ?? null ;
        $newSubtotal = ($subTotal - $discount);
        if($newSubtotal < 0)
        {
             $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax ;
        $newTotal = $newSubtotal + $newTax;



        return collect([
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
            'code'=> $code
        ]);
    }
}
